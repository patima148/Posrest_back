<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable =
        ["role_name"];
    function User()
    {
        return $this->hasMany('App\User', 'user_role');
    }
}
