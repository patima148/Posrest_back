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

    function store(array $input)
    {
        //$input = $input->all();
        $menu = new Menu();
        $menu->name = $input['name'];
        $price = $input['price'];
        $type = $input['type'];
        $grade = $input['grade'];
        $BranchId = $input['BranchId'];
        $menu->image_id = Image::with([])->get(['id'])->pluck("id")->last();
        $ingredients = array($input['Ingredient']);
        if($menu->save())
        {
            $menu->Branch()->attach($BranchId, ['price'=>$price], ['type'=>$type], ['grade'=>$grade]);
            if(isset($input['ingredient']))
            {
                $ingredients = $input['ingredient'];
                foreach ($ingredients as $ingredient_id)
                {
                    $ingredient = Ingredient::with([])->get(['id'])->where('id',$ingredient_id)->pluck("id");
                }
            }

        }
        $menu = $this->modelMenu->with("BranchMenu", "Image")->get();

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