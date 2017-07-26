<?php
namespace App\Service;

use App\MaterialsOfMenu;
use App\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/5/2560
 * Time: 18:33
 */
class MenuService
{
    private $model;

    function __construct(Menus $menus)
    {
        $this->model = $menus;
    }

    function store(Request $request)
    {

        $m = new Menus;
        $m->name = $request['name'];
        $m->sell_price = $request['sell_price'];
        $m->save();

        $m->MaterialsOfMenu()->sync($request->material_id);
        $m->MaterialsOfMenu()->sync($request->quantity);
        $m->save();

        //$m::with("Materials_Of_Menu");

        return $m;
    }

    function getById($id){

        return $this->model->where('id',$id)->first;
    }

    function getByName($name)
    {
        $menus = $this->model->with([
            'materials_of_menus','menu_has__images'
        ])->where('name',$name)->first;
        return $menus;
    }

}