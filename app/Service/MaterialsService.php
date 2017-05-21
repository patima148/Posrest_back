<?php

namespace App\Service;

use App\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/5/2560
 * Time: 18:31
 */
class MaterialsService
{
    private $model;


    protected $fillable = ['name','price','material_type_id'];

    function __construct(Materials $materials)
    {
        $this->model = $materials;
    }

    function store($request){
        /*$input = $request->all();

        $materials = new Materials;
        $materials->name = $request['name'];
        $materials->price = $request['price'];
        $materials->type = $request['type'];
        $materials->save();*/
    }


    function getById($id){
        $materials = $this->model->with([

        ])->Where('id',$id)->first();
        return $materials;
    }

    function getByName($name){
        $materials = $this->model->with([

        ])->where('name',$name);

        return $materials;
    }
}