<?php

namespace App\Http\Controllers;

use App\ClockIn;
use App\Service\ClockingService;
use Illuminate\Http\Request;

class ClockInController extends Controller
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
        $clock_in = $this->ClockingService->clock_in($request->input());
        return response()->json($clock_in);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClockIn  $clockIn
     * @return \Illuminate\Http\Response
     */
    public function show(ClockIn $clockIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClockIn  $clockIn
     * @return \Illuminate\Http\Response
     */
    public function edit(ClockIn $clockIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClockIn  $clockIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClockIn $clockIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClockIn  $clockIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClockIn $clockIn)
    {
        //
    }
}
