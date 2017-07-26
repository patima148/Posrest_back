<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 22/7/2560
 * Time: 0:33
 */

namespace App\Service;
use App\IngredientType;

class IngredientTypeService
{
    private $model;
    function __construct(IngredientType $ingredientType)
    {
        $this->model = $ingredientType;
    }

    public function getById($id)
    {
        $ingredient_Type = $this->model->with([
            "Ingredient"
        ])->Where('id',$id)->first();
        return $ingredient_Type;
    }

    public function getAll()
    {
        $type = IngredientType::with("Ingredient")->get();
        return $type;
    }
}