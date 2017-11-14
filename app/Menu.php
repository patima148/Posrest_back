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
        return $this->belongsToMany('App\Branch','branch_menus')
            ->withPivot("type","grade","price")
            ->withTimestamps();
    }
   /* function BranchMenu()
    {
        return $this->belongsTo('App\BranchMenu','branch_menu_ingredient');
    }*/
    function Image()
    {
        return $this->belongsTo('App\Image');
    }

    function Order()
    {
        return $this->belongsToMany('App\Order');
    }

}
