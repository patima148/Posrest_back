<?php
namespace App\Service;

use App\Ingredient;
use App\Menu;
use App\Branch;
use App\BranchIngredient;
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
    private $modelMenu;
    private $modelBranch;
    private $modelBranchIngredient;

    function __construct(Menu $menu, Branch $branch, BranchIngredient $branchIngredient)
    {
        $this->modelMenu = $menu;
        $this->modelBranch = $branch;
        $this->modelBranchIngredient = $branchIngredient;
    }

    function store(Request $request)
    {
        $input = $request->all();
        $menu = new Menu();
        $menu->name = $request['name'];
        $price = $request['price'];
        $type = $request['type'];
        $grade = $request['grade'];
        $BranchId = $request['BranchId'];



        if($menu->save())
        {
            $menu->Branch()->attach($BranchId, ['price'=>$price], ['type'=>$type], ['grade'=>$grade]);

        }
        $menu = Menu::with("Branch")->get();

        return $menu;
    }

    function getById($id){

        return $this->modelMenu->where('id',$id)->first();
    }

    function getAll()
    {
        $menu = Menu::with("Branch")->get();
        return $menu;
    }

}