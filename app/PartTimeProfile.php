<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartTimeProfile extends Model
{


    function Branch()
    {
        return $this->belongsTo('App\Branch');
    }
    function User()
    {
        return $this->belongsTo('App\User');
    }
}
