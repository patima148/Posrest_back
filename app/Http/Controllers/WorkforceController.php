<?php

namespace App\Http\Controllers;

use App\Service\WorkforceService;
use App\Workforce;
use Illuminate\Http\Request;

class WorkforceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $workforceSErvice;
    function __construct(WorkforceService $service)
    {
        $this->workforceSErvice = $service;
    }

    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workforce  $workforce
     * @return \Illuminate\Http\Response
     */
    public function show($day, $shift)
    {
        $estimation = $this->workforceSErvice->Estimate($day, $shift);
        return response()->json($estimation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workforce  $workforce
     * @return \Illuminate\Http\Response
     */
    public function edit(Workforce $workforce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workforce  $workforce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workforce $workforce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workforce  $workforce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workforce $workforce)
    {
        //
    }
}
