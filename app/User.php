<?php

namespace App;

use App\UserElegant as Elegant;
use Illuminate\Notifications\Notifiable;

class User extends UserElegant
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    function Image()
    {
        return parent::hasMany('App\Image');
    }

}
