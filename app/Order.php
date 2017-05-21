<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function OrderDetail()
    {
        return $this->hasMany('App\orderDetail','order_id');
    }

    //
}
