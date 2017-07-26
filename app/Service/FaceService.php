<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 18/6/2560
 * Time: 17:17
 */

namespace App\Service;


use App\userHasFaces;

class FaceService
{
    private $model;

    function __construct(userHasFaces $userHasFaces)
    {
        $this->model = $userHasFaces;
    }

    function getByUserId($userId){
        $userHasFace = $this->model->with([

        ])->where('user_id',$userId);

        return $userHasFace;
    }
}