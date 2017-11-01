<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClockOut extends Model
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
