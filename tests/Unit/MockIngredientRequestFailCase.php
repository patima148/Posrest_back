<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 31/8/2560
 * Time: 8:43
 */

namespace Tests\Unit;


use Illuminate\Http\Request;

class MockIngredientRequestFailCase extends Request
{
    public $name = null;
    public $price = null;
    public $type = null;
}