<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 21/5/2560
 * Time: 17:52
 */

namespace app\Service;

use App\Order;

class OrderService
{
    private $model;

    function __construct(Order $order)
    {
        $this->model = $order;
    }
}