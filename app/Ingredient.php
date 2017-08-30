<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name','price','type','branch_id'
    ];


    public function Menu()
    {
        return $this->belongsToMany('App\Menu');
    }

    public function Branch()
    {
        return $this->belongsToMany('App\Branch')->withPivot("price","type")
            ->withTimestamps();
    }
}
