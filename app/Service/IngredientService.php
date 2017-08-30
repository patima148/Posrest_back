<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 21/7/2560
 * Time: 23:48
 */

namespace App\Service;
use App\Ingredient;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class IngredientService
{

    private $modelIngredient;
    private $modelBranch;
    function __construct(Ingredient $ingredient, Branch $branch)
    {
        $this->modelIngredient = $ingredient;
        $this->modelBranch = $branch;
    }

    public function find($id)
    {
        if(!is_numeric($id)) {
            return null;
        }
        return $this->modelIngredient->find($id);
    }

    public function store(Request $request, $id ){
        $ingredient = new Ingredient();
        $ingredient->name = $request['name'];
        $price = $request['price'];
        $type = $request['type'];
        if($ingredient->save())
        {

            $ingredient->Branch()->attach($id, ['price'=>$price], ['type'=>$type]);
        }
        $ingredients = Ingredient::with("Branch")->get();

        return $ingredients;
    }

    public function getById($id)
    {
        $ingredient = $this->modelIngredient->with([
            "Branch"
        ])->where('id',$id)->first();
       /* $ingredient = $this->modelIngredient->find($id);
        $branch = $this->modelBranch->find($id);
        $ingredient['branch']= $branch;*/
        return $ingredient;
    }

    public function getAll()
    {
        $ingredients = Ingredient::with("Branch")->get();
        return $ingredients;
    }

    public function update(Request $request, $id, $branch_id)
    {
        $ingredient = Ingredient::with("Branch")->get()->where('id',$id)->first();

        $ingredient->name = $request->name;
        $price = $request['price'];
        $type = $request['type'];
        if($ingredient->save())
        {
            $ingredient->Branch()->attach($branch_id, ['price'=>$price], ['type'=>$type]);
        }
        $ingredients = Ingredient::with("Branch")->get();

        return $ingredient;
    }


    public function delete($id)
    {
        $result = false;
        if (Ingredient::destroy($id))
        {
            $result = true;
        }
        return $result;
    }
 }