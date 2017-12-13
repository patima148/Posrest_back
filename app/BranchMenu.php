<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchMenu extends Model
{
    function BranchIngredient()
    {
        return $this->belongsTo('App\BranchIngredient','ingredient_id');
    }

    function Menu()
    {
        return $this->belongsTo('App\Menu','branch_menus');
    }

//    function Ingredient()
//    {
//        return $this->belongsTo('App\Ingredient','ingredient_id');
//    }
}
