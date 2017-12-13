<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 14/11/2560
 * Time: 21:18
 */

namespace app\Service;
use App\OrderDetail;


class OrderDetailService
{
    private $orderDetailModel;
        function __construct(OrderDetail $orderDetail)
        {
            $this->orderDetailModel = $orderDetail;
        }

        function getAll()
        {
            $orderDetail = OrderDetail::with('order','Menu.BranchMenu')->get();
            return $orderDetail;
        }
}