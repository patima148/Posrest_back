<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function Menu()
    {
        return $this->hasMany('App\Menu');
    }

}
