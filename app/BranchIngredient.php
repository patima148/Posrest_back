<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchIngredient extends Model
{
    function BranchMenu()
    {
        return $this->belongsToMany('App\BranchMenu','ingredient_id');
    }

    function Ingredient()
    {
        return $this->belongsTo('App\Ingredient','branch_ingredient');
    }
}
