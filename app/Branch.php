<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ["name", "address" ];

    public function User()
    {
        return $this->hasMany('App\User');
    }
    public function Ingredient()
    {
        return $this->belongsToMany('App\Ingredient','branch_ingredient')
            ->withPivot("cost","type","ingredient_id")
            ->withTimestamps();
    }
    function Menu()
    {
        return $this->belongsToMany('App\Menu','branch_id','type','grade','price','ingredient_id')
            ->withTimestamps();
    }
}
