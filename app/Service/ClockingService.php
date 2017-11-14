<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 22/9/2560
 * Time: 10:34
 */

namespace App\Service;


use App\Clocking;
use App\ClockIn;
use App\ClockOut;
use App\User;
use Carbon\Carbon;
use NotificationChannels\OneSignal\OneSignalMessage;

class ClockingService
{
    private $model;
    function __construct(Clocking $clocking)
    {
        return $this->model = $clocking;
    }

    function clock_in(array $data)
    {
        $clocking = new Clocking();
        $clocking->user_id = $data['user_id'];
        $clocking->branch_id = $data['branch_id'];
        $clocking->clockIn_time = Carbon::now();
        if ($clocking->save())
        {
         return true;
        }

        return false;
    }


    function clock_out(array $data, $user_id)
    {
        $row =  Clocking::with([])
            ->where('user_id',$user_id)
            ->where('clockOut_time',null)->pluck('id');
        $clocking = Clocking::find($row);

        $clocking->clockOut_Time = Carbon::now();
        $clocking->save();
        $to = $clocking->clockOut_Time;
        $from = Clocking::with([])->where('id',$row)->value('clockIn_time');
        $refrom = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $from);
        $reto = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $to);
        $clocking->totalDuration_hour = $reto->diffInHours($refrom);
        $clocking->workingDuration_Min = $reto->diffInMinutes($refrom);
        $clocking->payRate = $data['payRate'];

        return  $clocking->workingDuration_Min;
    }

    function clockingSummary(array $data, $user_id)
    {

    }


    function setPaymentRate($id, $newRate)
    {
        $result = false;
        $clocking = Clocking::with(["user","clockin","clockout"])
            ->where('id',$id)->get()->first();
        if (isset($newRate))
        {
            $clocking->payRate = $newRate;
            if($clocking->save())
            {
                $result = true;
                return $result;
            }
        }
        return $result;
    }


    function getAllClocking()
    {
        $clocking = Clocking::with('user','branch')->where('id','!=','id')->get();
        return $clocking;
    }

    function getClockingByMonth($month)
    {
        //$clocking = Clocking::with('user','branch','clockin','clockout')->where('user_id',$userId)->get();
        $clocking = Clocking::with('user','branch','clockin','clockout')->whereMonth('created_at',$month)->get();
        return $clocking;
    }

    function getClockingByUser($user)
    {
        $clocking = Clocking::with('user','branch','clockin','clockout')->where('user-id',$user)->get();
        return $clocking;
    }

    function getClockingCurrentdate()
    {
        $clocking = Clocking::with('user','branch','clockin','clockout')->where('created_at',Carbon::now())->get();
        return $clocking;
    }






/*
$clocking = Clocking::with([])->get()->where('user_id',$UserId)->where('status',"clock-in")->last();
$clocking->status = "clock-out";
$clocking->save();
$clockInDate = Clocking::with([])->where('user_id',$UserId)->pluck('created_at')->last();
$clockOutDate = Clocking::with([])->where('user_id',$UserId)->pluck('updated_at')->last();
$from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-9-22 14:38:54');
$to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-9-22 20:30:54');
$diff_in_Hour = $to->diffInHours($from);
$diff_in_minute = $to->diffInMinutes($from);
$diff_in_minute = ($diff_in_minute%60);
$clocking->workingDuration = $diff_in_minute;
$clocking->save();
return $diff_in_Hour;
*/
}