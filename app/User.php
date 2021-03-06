<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'biography', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
    ];


    /**
     * Récupère les compétences de l'utilisateur.
     */
    public function skills()
    {
        return $this->belongsToMany('App\Skill')->withPivot('level');
    }


    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function isAdministrator() {
        return $this->roles()->where('name', 'Administrateur')->exists();
    }

//    public function isAdmin(){
//        return false;
//    }

}
