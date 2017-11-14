<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name','cost','type','branch_id'
    ];


    public function Menu()
    {
        return $this->belongsToMany('App\Menu');
    }

    public function Branch()
    {
        return $this->belongsToMany('App\Branch')->withPivot("cost","type","ingredient_id")
            ->withTimestamps();
    }
}
