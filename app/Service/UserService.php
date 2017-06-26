<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/6/2560
 * Time: 18:40
 */

namespace App\Service;

use App\User;
use Illuminate\Database\Eloquent\Builder;
class UserService
{
    function __construct(User $user)
    {
        $this->model = $user;
    }

    function getById($id){
        $user = $this->model->with([

        ])->where('id',$id)->first();
        return $user;
    }

    function getByName($name)
    {
        $user = $this->model->Where('name',$name)->first();
        return $user;
    }
}