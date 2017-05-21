<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/5/2560
 * Time: 23:17
 */

namespace App\Service;


class BrewingService
{
    private $model;

    function __construct(Brewing $brewing)
    {
        $this->model = $brewing;
    }

    function getById($id){
        $brewing = $this->model->with([

        ])->Where('id',$id)->first();
        return $brewing;
    }
}