<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 29/10/2560
 * Time: 1:25
 */

namespace App\Service;


use App\Menu;
use App\Order;

class OrderService
{
    private $OrderModel;
    function __construct(Order $order)
    {
        $this->OrderModel = $order;
    }

    function store(array $data)
    {
        $result = false;
        $Order = new Order();
        $Order->branch_id = $data['branch_id'];
        $Order->status  = $data['status'];
        $total = 0;

        if(isset($data['menu']))
        {
            $menuId = $data['menu'];
            $numOfmenu = count($menuId);

            /*foreach ($menuId as $value){
                $price = Menu::with(['branch'])
                    ->where('id', $value)
                    ->get('price')->pluck('price');
                $total = $total + $price;
            }*/
            $menu = Menu::with(['branch'])->where('id',$menuId[1])->get();
            return $menu;
        }
        return false;
    }

}