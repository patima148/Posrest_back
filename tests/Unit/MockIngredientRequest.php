<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 31/8/2560
 * Time: 3:24
 */

namespace Tests\Unit;
use App\Image;
use App\Service\IngredientService;
use Illuminate\Http\Request;
use Mockery;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MockIngredientRequest extends Request
{
    public $name = "Coco";
    public $price = "12";
    public $type = "Normal";

}