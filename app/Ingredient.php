<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function IngredientType()
    {
        return $this->belongsToMany('App\IngredientType')->withPivot('price')->withTimestamps();
    }
}


