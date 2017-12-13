<?php

namespace App\Http\Controllers;

use App\Report;
use App\Service\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $reportService;
    function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index($key)
    {
        if($key == "selling"){
            $report = $this->reportService->getAllSellingReport();
            return response()->json($report);
        }
        if($key == "barista"){
            $report = $this->reportService->getAllBaristarReport();
            return response()->json($report);
        }
        return response()->json("Fail");
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($key,$start,$end)
    {
        if($key == "selling"){
            $report = $this->reportService->getAllSellingReport($start,$end);
            return response()->json($report);
        }
        if($key == "barista"){
            $report = $this->reportService->getAllBaristarReport($start,$end);
            return response()->json($report);
        }
        return response()->json("Fail");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
