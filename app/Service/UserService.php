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
        $user = $this->model->with([

        ])->where('user_id',$id);
        return $user;
    }

    function getByName($name)
    {
        $user = $this->model->with([

        ])->where('name',$name)->first;
        return $user;
    }

}