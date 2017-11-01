<?php

namespace App\Http\Controllers;

use App\ClockOut;
use App\Service\ClockingService;
use Illuminate\Http\Request;

class ClockOutController extends Controller
{
    private $ClockingService;
    function __construct(ClockingService $clockingService)
    {
        return $this->ClockingService = $clockingService;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clock_out = $this->ClockingService->clock_out($request->input());
        $clocking = $this->ClockingService->clockingSummary($request->input());
        return response()->json($clocking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClockOut  $clockOut
     * @return \Illuminate\Http\Response
     */
    public function show(ClockOut $clockOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClockOut  $clockOut
     * @return \Illuminate\Http\Response
     */
    public function edit(ClockOut $clockOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClockOut  $clockOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClockOut $clockOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClockOut  $clockOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClockOut $clockOut)
    {
        //
    }
}
