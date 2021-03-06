<?php

namespace App\Http\Controllers;

use App\Clocking;
use App\Service\ClockingService;
use Illuminate\Http\Request;

class ClockingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $ClockingService;
    function __construct(ClockingService $clockingService)
    {
        return $this->ClockingService = $clockingService;
    }

    public function index()
    {
        $clocking = $this->ClockingService->getAllClocking();
        return response()->json($clocking);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clock_in = $this->ClockingService->clock_in($request->input());
        return response()->json($clock_in);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clocking  $clocking
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $clocking =  $this->ClockingService->getClockingByMonth($user);
        return response()->json($clocking);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clocking  $clocking
     * @return \Illuminate\Http\Response
     */
    public function edit(Clocking $clocking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clocking  $clocking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user_id)
    {

        $clock_out = $this->ClockingService->clock_out($request->input(), $user_id);
        //$clocking = $this->ClockingService->clockingSummary($request->input(), $user_id);
        return response()->json($clock_out);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clocking  $clocking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clocking $clocking)
    {
        //
    }
}
