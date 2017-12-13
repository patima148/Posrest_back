<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brewing extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function OrderDetail()
    {
        return $this->belongsTo('App\OrderDetail');
    }

    public function Order()
    {
        return $this->belongsTo('App\Order');
    }

    public function Menu()
    {
        return $this->belongsTo('App\Menu');
    }

}
