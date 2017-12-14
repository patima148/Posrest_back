<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 10/12/2560
 * Time: 18:39
 */

namespace app\Service;

use App\BranchMenu;
use App\Menu;
use DateTime;
use App\Brewing;
use App\OrderDetail;
use App\Report;
use Carbon\Carbon;

class ReportService
{
    private $reportModel;
    function __construct(Report $report)
    {
        $this->reportModel = $report;
    }


    function getAllBaristarReport($userId, $start,$end)
    {
         $array = [];
         $total = Brewing::with([
             'User',
             'OrderDetail.Menu'
         ])->Where('user_id',$userId)
             ->WhereBetween('updated_at',[$start,$end])
             ->Where('status','=','done')->get();
         return $total;
    }

    function getAllSellingReport($start,$end)
    {
        $report = OrderDetail::with(
            'Menu.BranchMenu')
            ->WhereBetween('updated_at',[$start,$end])
            ->Where('status','=','done')->get();
        return $report;
    }

    function getAllBaristarReport1($day,$shift)
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
                    ->get();
                $array[] = array(
                    'dayname' => $my,
                    'numberOfCup' => $numberOfCup,
                    'Shift' => 1
                );
            } elseif ($my == "$day" && $shift==2)
            {
                $numberOfCup = OrderDetail::with([])
                    ->whereBetween('updated_at', ["{$date2} 14:00:00", "{$date2} 19:00:00"])
                    ->get();
                $array[] = array(
                    'dayname' => $my,
                    'numberOfCup' => $numberOfCup,
                    'date' => $date2
                );
            }
            elseif ($my == "$day" && $shift==3)
            {
                $numberOfCup = OrderDetail::with([])
                    ->whereBetween('updated_at', ["{$date2} 19:00:00", "{$date2} 23:59:59"])
                    ->get();
                $array[] = array(
                    'dayname' => $my,
                    'numberOfCup' => $numberOfCup,
                    'Shift' => $date2
                );
            }

        }
        return $array;
    }

}