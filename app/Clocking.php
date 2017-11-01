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

    function Branch()
    {
        return $this->belongsTo('App\Branch');
    }


}