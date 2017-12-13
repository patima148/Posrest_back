<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 10/12/2560
 * Time: 18:39
 */

namespace app\Service;

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


    function getAllBaristarReport($start,$end)
    {
       /* $brewing = Brewing::with([
            'User',
            'OrderDetail.Menu'
        ])->WhereBetween('updated_at',[$start,$end])
            ->Where('status','=','done')->get();
        return $brewing;*/
        $date = new DateTime($start);
        $week = $date->format("W");
         $brewing = Brewing::with([
             'User',
             'OrderDetail.Menu'
         ])->Where('updated_at',[$week])
             ->Where('status','=','done')->get();

         return $brewing;
    }

    function getAllSellingReport($start,$end)
    {

        $report = OrderDetail::with(
            'Menu.Branch')
            ->WhereBetween('updated_at',[$start,$end])
            ->Where('status','=','done')->get();

        return $report;
    }
}