<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 4/8/2560
 * Time: 16:59
 */

namespace App\Service;

use App\Branch;
use App\User;
use Illuminate\Http\Request;

class BranchesService
{
    private $model;
    private $modelUser;
    function __construct(Branch $branch)
    {
        $this->model = $branch;
    }

    function store(Request $request)
    {
        $branch = new Branch();
        $branch->name = $request['name'];
        $branch->address = $request['address'];
        $branch->save();
        return $branch;
    }
    public function getById($id)
    {
        $branch = $this->model->with("User")->Where('id',$id)->first();
        return $branch;
    }
    public function getAll()
    {
        $branch = Branch::with("User")->get();
        return $branch;
    }

    public function delete($id)
    {
        Branch::destroy($id);
        $branch = Branch::with("User")->get();
        return response()->json($branch);
    }

    public function findByIngredientId($ingredientId)
    {
        $branch = $this->model->with([
            "Ingredient"
        ])->Where('ingredient_id',$ingredientId)->first();
        return $branch;
    }
}