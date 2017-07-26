<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientType extends Model
{
    public function Ingredient()
    {
        return $this->belongsToMany('App\Ingredient')->withPivot('price')->withTimestamps();
    }
}
