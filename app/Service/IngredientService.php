<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 21/7/2560
 * Time: 23:48
 */

namespace App\Service;
use App\Ingredient;
use App\IngredientType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class IngredientService
{

    private $model;
    private $model2;
    function __construct(Ingredient $ingredient, IngredientType $ingredientType)
    {
        $this->model = $ingredient;
        $this->model2 = $ingredientType;
    }

    public function store(Request $request, $id){
        $ingredient = new Ingredient();
        $ingredient->name = $request['name'];
        $price = $request->price;
        $ingredient->save();

        $ingredient->IngredientType()->attach($id, ['price'=>$price]);

        $ingredients = Ingredient::with("IngredientType")->get();

        return $ingredients;
    }

    public function getById($id)
    {
        $ingredient = $this->model->with([
            "IngredientType"
        ])->where('id',$id)->first();
        return $ingredient;
    }

    public function getAll()
    {
        $ingredients = Ingredient::with("IngredientType")->get();
        return $ingredients;
    }

    public function update(Request $request, $id, $TypeId)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->name = $request['name'];
        $price = $request->price;
        $ingredient->save();

        $ingredient->IngredientType()->updateExistingPivot($TypeId, ['price'=>$price]);

        $ingredient = Ingredient::with("IngredientType")->get();

        return $ingredient;

        /**App\Flight::where('active', 1)
           * ->where('destination', 'San Diego')
           * ->update(['delayed' => 1]);*/
    }


    public function delete($id)
    {
        Ingredient::destroy($id);
        $ingredients = Ingredient::with("IngredientType")->get();
        return response()->json($ingredients);
    }
 }