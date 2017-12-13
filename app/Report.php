<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    function Brewing()
    {
        return $this->hasMany('App\Brewing');
    }

    function OrderDetail()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
