<?php
namespace App\Service;

use App\BranchMenu;
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
                $menu = new Menu();
                if (isset($input['name']))
                {
                    $menu->name = $input['name'];
                }

                if (isset($input['BranchId']))
                {
                    $menu->branch_id = $input['BranchId'];
                }

                    $menu->image_id = Image::with([])->get(['id'])->pluck('id')->last();

                $menu->save();

                if (isset($input['ingredients']))
                {
                    foreach ($input['ingredients'] as $ingredient)
                    {
                        $branch_menu = new BranchMenu();
                        $branch_menu->menu_id = Menu::with([])->get(['id'])->pluck("id")->last();
                        $branch_menu->ingredient_id = $ingredient;
                        if (isset($input['price']))
                        {
                            $branch_menu->price = $input['price'];
                        }
                        if (isset($input['type']))
                        {
                            $branch_menu->type = $input['type'];
                        }
                        if (isset($input['grade']))
                        {
                            $branch_menu->grade = $input['grade'];
                        }
                        $branch_menu->save();
                    }
                    return true;
                }
        return false;
    }
    function update(array $input,$id)
    {
        $menu = Menu::find($id);

        if (isset($input['name']))
        {
            $menu->name = $input['name'];
        }

        if (isset($input['BranchId']))
        {
            $menu->branch_id = $input['BranchId'];
        }

        //$menu->image_id = Image::with([])->get(['id'])->pluck('id')->last();

        $menu->save();

        if (isset($input['ingredients']))
        {
            foreach ($input['ingredients'] as $ingredient)
            {
                $branch_menu = new BranchMenu();
                $branch_menu->menu_id = Menu::with([])->get(['id'])->pluck("id")->last();
                $branch_menu->ingredient_id = $ingredient;
                if (isset($input['price']))
                {
                    $branch_menu->price = $input['price'];
                }
                if (isset($input['type']))
                {
                    $branch_menu->type = $input['type'];
                }
                if (isset($input['grade']))
                {
                    $branch_menu->grade = $input['grade'];
                }
                $branch_menu->save();
            }
            return true;
        }
        return false;
    }

    function getById($id){

        return $this->modelMenu->where('id',$id)->first();
    }

    function getAll()
    {
        $menu = $this->modelMenu->with("BranchMenu")->get();
        return $menu;
    }

}