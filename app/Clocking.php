<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Clocking extends Model
{
    function User()
    {
        return $this->belongsTo('App\User');
    }

    function ClockIn()
    {
        return $this->hasMany('App\ClockIn','clockIn_id');
    }
    function ClockOut()
    {
        return $this->hasMany('App\ClockOut','clockOut_id');
    }
    function Branch()
    {
        return $this->belongsTo('App\Branch');
    }


}