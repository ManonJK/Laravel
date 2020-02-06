<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * Récupère les utilisateurs possédant cette compétence.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('level');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'logo',
    ];
}
