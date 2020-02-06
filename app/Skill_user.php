<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill_user extends Model
{
    protected $table = 'skill_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'skill_id', 'user_id', 'level',
    ];
}
