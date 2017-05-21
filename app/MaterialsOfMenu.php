<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialsOfMenu extends Model
{
    function Menus()
    {
        return $this->belongsTo('App\Menus');
    }
    function Materials()
    {
        return $this->belongsTo('App\Materials');
    }
}
