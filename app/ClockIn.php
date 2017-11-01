<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;

class ClockIn extends Model
{

    function User()
    {
        return $this->belongsTo('App\User');
    }
    function Clocking()
    {
        return $this->belongsTo('App\Clocking');
    }

}
