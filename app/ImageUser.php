<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUser extends Model
{
    function User()
    {
        return $this->belongsTo('APP\User');
    }

    function Image()
    {
        return $this->belongsTo('APP\Image');
    }
}
