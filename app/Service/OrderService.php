<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 29/10/2560
 * Time: 1:25
 */

namespace App\Service;


use App\Menu;
use App\BranchMenu;
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
            $menu = [];
            $totalprice = (float)0.00;
            foreach ($menuId as $value){
                $price = BranchMenu::with([])
                    ->where('menu_id', $value)
                    ->where('branch_id',  $Order->branch_id)
                    ->value('price');

                $totalprice += $price;
            }
            $Order->price = $totalprice;
            $Order->table = $data['table'];
            $Order->NumberOfMenu = $numOfmenu;
            if($Order->save())
            {
                return true;
            }
            //$menu = Menu::with(['branch'])->where('id',$menuId[1])->get();

        }
        return false;
    }

    function update(array $data, $id)
    {
        $result = false;
        $Order = Order::find($id);
        $Order->branch_id = $data['branch_id'];
        if (isset($data['status']))
        {
            $Order->status  = $data['status'];
        }

        $total = 0;

        if(isset($data['menu']))
        {
            $menuId = $data['menu'];
            $numOfmenu = count($menuId);
            $menu = [];
            $totalprice = (float)0.00;
            foreach ($menuId as $value){
                $price = BranchMenu::with([])
                    ->where('menu_id', $value)
                    ->where('branch_id',  $Order->branch_id)
                    ->value('price');

                $totalprice += $price;
            }
            $Order->price = $totalprice;
            $Order->table = $data['table'];
            $Order->NumberOfMenu = $numOfmenu;
            if($Order->save())
            {
                return true;
            }
            //$menu = Menu::with(['branch'])->where('id',$menuId[1])->get();

        }
        return false;
    }

}