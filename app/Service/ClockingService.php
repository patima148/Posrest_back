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
        $clocking->save();

        return $clocking;
    }


    function clock_out(array $data)
    {
        if(isset($data['user_id']))
        {

            if(isset($data['branch_id']))
            {
                $clocking = Clocking::with('user','branch')
                    ->where('user_id',$data['user_id'])
                    ->where('branch_id', $data['branch_id'])
                    ->where('clockOut_time',null)->get()->last();
                $clocking->clockOut_time = Carbon::now();
                $clocking->save();
                return $clocking;
            }
        }
        return $data;
    }

    function clockingSummary(array $data)
    {
        $clocking = $clocking = Clocking::with('user','branch')
            ->where('user_id',$data['user_id'])
            ->where('branch_id', $data['branch_id'])
            ->where('clockOut_time',null)->get()->last();
        if(isset($data['user_id'])&&$data['branch_id'])
        $from = ClockIn::with([])->where('user_id',$data['user_id'])->pluck('clockIn_time')->last();
        $to = ClockOut::with([])->where('user_id',$data['user_id'])->pluck('clockOut_time')->last();
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-9-22 14:38:54');
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-9-22 20:30:54');
        $clocking->totalDuration_hour = $to->diffInHours($from);
        $clocking->workingDuration_Min = $to->diffInMinutes($from);
        $clocking->payRate = $data['payRate'];
        $clocking->save();
        return $clocking;
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
        $clocking = Clocking::with('user','branch','clockin','clockout')->where('id','!=','id')->get();
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