<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    function Order()
    {
        return $this->belongsTo('app\order');
    }
}
