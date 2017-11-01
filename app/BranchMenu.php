<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchMenu extends Model
{
    function BranchIngredient()
    {
        return $this->belongsTo('App\BranchIngredient','branch_menu_ingredient')->withTimestamps();
    }

    function Menu()
    {
        return $this->belongsTo('App\Menu','branch_menus');
    }
}
