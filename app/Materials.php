<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{

    protected $fillable = ['name','price'];

    function MaterialsOfMenu()
    {
        return $this->belongsToMany('App\Menu','materials_of_menus','material_id');
    }

}
