<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
}
