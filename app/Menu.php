<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Ingredient;

class Menu extends Model
{
    //protected $fillable = ["name"];
    function Ingredient()
    {
        return $this->hasMany('App\Ingredient');
    }

    function Branch()
    {
        return $this->belongsTo('App\Branch');
    }
    function BranchMenu()
    {
        return $this->hasMany('App\BranchMenu');
    }
    function Image()
    {
        return $this->belongsTo('App\Image');
    }

    function Order()
    {
        return $this->belongsToMany('App\Order');
    }

//    function BranchIngredient()
//    {
//        return $this->belongsToMany('App\BranchIngredient','menu_id');
//    }


}
