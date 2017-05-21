<?php
namespace App\Service;

use App\Menus;
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/5/2560
 * Time: 18:33
 */
class MenuService
{
    private $model;

    function __construct(Manus $menus)
    {
        $this->model = $menus;
    }

    function getById($id){
        $menus = $this->model->with([
            'materials_of_menus','menu_has__images'
        ])->where('id',$id)->first;
        return $menus;
    }

    function getByName($name)
    {
        $menus = $this->model->with([
            'materials_of_menus','menu_has__images'
        ])->where('name',$name)->first;
        return $menus;
    }

}