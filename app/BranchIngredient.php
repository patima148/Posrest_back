<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchIngredient extends Model
{
    function BranchMenu()
    {
        return $this->belongsTo('App\BranchMenu','branch_menu_ingredient');
    }

    function Ingredient()
    {
        return $this->belongsTo('App\Ingredient','branch_ingredient');
    }
}
