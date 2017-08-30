<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserElegant as UserElegant;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    protected $rules = array(
        'name' => 'required',
        'email' => 'required',
        'role_id' => 'required',
        'branch_id' => 'required'
    );

    protected $hidden = [
        'password', 'remember_token',
    ];

    function Role()
    {
        return $this->belongsTo('App\Role');
    }
    function Branch()
    {
        return $this->belongsTo('App\Branch');
    }
    function Image()
    {
        return $this->belongsTo('App\Image');
    }

}
