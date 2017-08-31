<?php
namespace App\Service;

use App\Image;
use App\Ingredient;
use App\Menu;
use App\Branch;
use App\BranchIngredient;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
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
    private $modelImage;
    private $modelIngredient;
    function __construct(Menu $menu, Branch $branch, Ingredient $ingredient, Image $image)
    {
        $this->modelMenu = $menu;
        $this->modelBranch = $branch;
        $this->modelIngredient = $ingredient;
        $this->modelImage = $image;
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
        $menu->image_id = $this->modelImage->get(['id'])->pluck("id")->last();


        if($menu->save())
        {
            $menu->Branch()->attach($BranchId, ['price'=>$price], ['type'=>$type], ['grade'=>$grade]);

        }
        $menu = $this->modelMenu->with("Branch", "Image")->get();

        return $menu;
    }

    function getById($id){

        return $this->modelMenu->where('id',$id)->first();
    }

    function getAll()
    {
        $menu = $this->modelMenu->with("Branch","Image")->get();
        return $menu;
    }

}