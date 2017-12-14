<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 14/12/2560
 * Time: 3:53
 */

namespace app\Service;


use App\OrderDetail;
use App\Workforce;
use DateTime;
class WorkforceService
{
    private $workforce;

    function __construct(Workforce $workforce)
    {
        $this->workforce = $workforce;
    }

    function Estimate($day, $shift)
    {
        $orderIds = OrderDetail::with([])->pluck('id');
        $array = [];
        $count = 0;
        $dayname = "Tue";
        $numberOfCup = 0;
        foreach($orderIds as $orderId)
        {
            $date = new DateTime();
            $date = OrderDetail::with([])->where('id',$orderId)->value('updated_at');
            $my = $date->format('D');
            $date2 = $date->format('Y:m:d');
            if($my == "$day" && $shift==1)
            {
                $numberOfCup = OrderDetail::with([])
                    ->whereBetween('updated_at', ["{$date2} 00:00:00", "{$date2} 20:00:00"])
                    ->count();

            } elseif ($my == "$day" && $shift==2)
            {
                $numberOfCup = OrderDetail::with([])
                    ->whereBetween('updated_at', ["{$date2} 14:00:00", "{$date2} 19:00:00"])
                    ->count();
            }
            elseif ($my == "$day" && $shift==3)
            {
                $numberOfCup = OrderDetail::with([])
                    ->whereBetween('updated_at', ["{$date2} 19:00:00", "{$date2} 23:59:59"])
                    ->count();
            }
        }
        $array[] = array(
            'dayname' => $day,
            'numberOfCup' => $numberOfCup,
            'Shift' => $shift
        );
        return $array;
    }
}