<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserElegant as UserElegant;
use NotificationChannels\OneSignal\OneSignalButton;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

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
    function Clocking()
    {
        return $this->hasMany('App\Clocking');
    }
    function ClockIn()
    {
        return $this->hasMany('App\ClockIn','clockIn_id');
    }
    function ClockOut()
    {
        return $this->hasMany('App\ClockOut','clockOut_id');
    }

}
