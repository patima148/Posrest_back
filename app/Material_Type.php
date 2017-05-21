<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material_Type extends Model
{
    function Materials()
    {
        return $this->belongsToMany('App\Material_type','material__types');
    }
    //
}
