<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/12/2560
 * Time: 3:24
 */

namespace app\Service;

use App\Brewing;
use App\OrderDetail;
use App\PartTimeProfile;
use App\User;
use App\Branch;
use Carbon\Carbon;

class PartTimeProfileService
{
    private $modelUser;
    private $modelBranch;
    private $modelPartTimeProfile;
    function __construct(PartTimeProfile $partTimeProfile)
    {
        $this->modelPartTimeProfile = $partTimeProfile;
    }

    function store(array $data)
    {
        $result = false;
        $profile = new PartTimeProfile();
        $profile->branch_id = $data['branchId'];
        $profile->user_id = $data['userId'];

        $countCup = Brewing::with([])->where('user_id',$data['userId'])->count();
        $sumBrewingTime = Brewing::with([])->where('user_id',$data['userId'])->sum('brewingDuration');
        $averageTimeACup = $sumBrewingTime/$countCup;
        $profile->average_time_per_cup = $averageTimeACup;

        $sumStoppingTime = Brewing::with([])->where('user_id',$data['userId'])->sum('stoppingDuration');
        $averagePause = $countCup/$sumStoppingTime;
        $profile->average_pause = $averagePause;

        $countDay = Brewing::with([])->Where('user_id',$data['userId'])->groupBy('updated_at')->count();
        $averageCupADay = $countCup/$countDay;

        $profile->average_cup_per_day = $averageCupADay;

        $correctness = 0.00;
        $profile->correctness = $correctness;

        $late = 0.00;
        $profile->late = $late;

        /*if($profile->save())
        {
            $result = true;
        }*/
        return $sumBrewingTime;
    }

    function getProfile()
    {
        $myArray = [];
        $myArray2 = [];
        $userIds = User::with([])->where('branch_id',1)->select('id')->pluck('id');;
        $sumBrewingTime = "Notloop";
        foreach ($userIds as $userId)
        {
            $countCup = Brewing::with([])->where('user_id',$userId)->count();
            $sumBrewingTime = Brewing::with([])->where('user_id',$userId)->sum('brewingDuration');
            $averageTimeACup = 0;

            $sumPauseTime = Brewing::with([])->where('user_id',$userId)->sum('stoppingDuration');
            $averagePauseTime = 0;

            $sumrefund = Brewing::with([])->where('user_id',$userId)->where('status', 'done')->count();
            $correctness = 0;

            $myUser = User::with([])->where('id', $userId)->get();
            if($countCup!=0)
            {
                $averageTimeACup = $sumBrewingTime/$countCup;
                $averagePauseTime = $sumPauseTime/$countCup;
                $correctness = ($sumrefund/$countCup)*10;
                $myArray[] = array(
                    'User ID' => $myUser,
                    'average time per cup' => $averageTimeACup,
                    'average pause time' => $averagePauseTime,
                    'correctness' => $correctness,
                    'late' => 0
                );
            } elseif ($countCup==0)
            {
                $myArray[] = array(
                    'User ID' => $myUser,
                    'average time per cup' => 0,
                    'average pause time' => 0,
                    'correctness' => 0,
                    'late' => 0
                );
            }
        }
        return  $myArray;
    }

    function getProfileByUserId($userId)
    {
        $myArray = [];
        $myArray2 = [];
        $sumBrewingTime = "Notloop";
            $countCup = Brewing::with([])->where('user_id',$userId)->count();
            $countPerDay = Brewing::with([])->where('user_id',$userId)->groupBy('created_at')->count();
            $sumBrewingTime = Brewing::with([])->where('user_id',$userId)->sum('brewingDuration');
            $averageTimeACup = 0;

            $sumPauseTime = Brewing::with([])->where('user_id',$userId)->sum('stoppingDuration');
            $averagePauseTime = 0;

            $sumrefund = Brewing::with([])->where('user_id',$userId)->where('status', 'done')->count();
            $correctness = 0;

            $myUser = User::with([])->where('id', $userId)->get();
            if($countCup!=0)
            {
                $averageTimeACup = $sumBrewingTime/$countCup;
                $averagePauseTime = $sumPauseTime/$countCup;
                $correctness = ($sumrefund/$countCup)*10;
                $averageCupPerDay = $countCup/$countPerDay;
                $myArray[] = array(
                    'User ID' => $myUser,
                    'averageCupPerDay' => $countPerDay,
                    'average time per cup' => $averageTimeACup,
                    'average pause time' => $averagePauseTime,
                    'correctness' => $correctness,
                    'late' => 0
                );
            } elseif ($countCup==0)
            {
                $myArray[] = array(
                    'User ID' => $myUser,
                    'averageCupPerDay' => 0,
                    'average time per cup' => 0,
                    'average pause time' => 0,
                    'correctness' => 0,
                    'late' => 0
                );
            }
        return  $myArray;
    }

}