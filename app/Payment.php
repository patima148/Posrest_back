<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    function User()
    {
        $this->belongsTo('App\User');
    }

    function Clocking()
    {
        $this->hasMany('App\Clocking');
    }

}
