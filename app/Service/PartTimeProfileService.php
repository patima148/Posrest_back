<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/12/2560
 * Time: 3:24
 */

namespace app\Service;

use App\Brewing;
use App\PartTimeProfile;
use App\User;
use App\Branch;
use Carbon\Carbon;

class PartTimeProfileService
{
    private $modelUser;
    private $modelBranch;
    function __construct(User $user, Branch $branch)
    {
        $this->modelUser = $user;
        $this->modelBranch = $branch;
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
            $sumBrewingTime = Brewing::with([])->where('user_id',$userId)->get();
//            $averageTimeACup = $sumBrewingTime/$countCup;

            $myArray[] = array(
                'User ID' => $userId,
//                'average time per cup' => $averageTimeACup,
            );
            $myArray2[] = array(
               $userId
            );
            return  $sumBrewingTime;
        }
        return  $userIds;
    }

    function getProfileByUserId()
    {
        $myArray = [];
        $userIds = User::with([])->where('branch_id',1)->select('id')->get();;
        $sumBrewingTime = "Notloop";
        foreach ($userIds as $userId)
        {
            $countCup = Brewing::with([])->where('user_id',$userId)->count();
            $sumBrewingTime = Brewing::with([])->where('user_id',$userId)->get();
//            $averageTimeACup = $sumBrewingTime/$countCup;

            $myArray[] = array(
                $userId
            );
        }
        return  $sumBrewingTime;
    }

}