<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brewing extends Model
{
    function Barista()
    {
        return $this->belongsTo('App\User');
    }
}
