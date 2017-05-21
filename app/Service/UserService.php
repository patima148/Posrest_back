<?php

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/5/2560
 * Time: 18:33
 */
class UserService
{
    private $model;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    function getById($id){
        $menus = $this->model->with([

        ])->where('id',$id)->first;
        return $menus;
    }

    function getByName($name)
    {
        $menus = $this->model->with([

        ])->where('name',$name)->first;
        return $menus;
    }
}