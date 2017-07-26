<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{

    function MaterialsOfMenu()
    {
        return $this->belongsToMany('App\Materials','materials_of_menus','menu_id');
    }

    function OrderDetail()
    {
        return $this->belongsTo('App\Order');
    }



}
