<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/5/2560
 * Time: 23:17
 */

namespace App\Service;


use App\Brewing;

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

    function getAll(){
        $brewing = $this->model->with([
            'User',
            'OrderDetail.Menu'
        ])->get();
        return $brewing;
    }

    function store(array $data)
    {
        $brewing = new Brewing();
        $brewing->orderDetail_id = $data['orderDetailId'];
        $brewing->user_id = $data['userId'];
        $brewing->status = "brewing";
        $brewing->brewingDuration = 0.00;
        $brewing->stoppingDuration = 0.00;
        if($brewing->save())
        {
            return Brewing::with('User.Branch')->get();
        }
        return false;
    }

    function update(array $data, $id)
    {
        $brewing = Brewing::with('User.Branch')->find($id);

        if (isset($data['status'])){
            $brewing->status = $data['status'];
        }
        if(isset($data['brewingDuration']))
        {
            $brewing->brewingDuration = $data['brewingDuration'];
        }
        if(isset($data['stoppingDuration']))
        {
            $brewing->stoppingDuration = $data['stoppingDuration'];
        }
        $brewing->save();
        return $brewing;
    }
}