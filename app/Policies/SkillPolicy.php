<?php

namespace App\Policies;

use App\Skill;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class SkillPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any skills.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //On peut utiliser les gates précédemments définies
//        return Gate::check('viewresource', $user);
        //Ou on peut recoder directement ses propres regles, ce que l'on va faire
        return Auth::check();
    }

    /**
     * Determine whether the user can view the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function view(User $user, Skill $skill)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can create skills.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::check() && ($user->isAdministrator());
    }

    /**
     * Determine whether the user can update the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function update(User $user, Skill $skill)
    {
        return Auth::check() && (Auth::user()->isAdministrator());
    }

    /**
     * Determine whether the user can delete the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function delete(User $user, Skill $skill)
    {
        return Auth::check() && (Auth::user()->isAdministrator());
    }

    /**
     * Determine whether the user can restore the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function restore(User $user, Skill $skill)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function forceDelete(User $user, Skill $skill)
    {
        //
    }
}
