<?php

namespace App\Http\Controllers;

use App\Service\BrewingService;
use Illuminate\Http\Request;

class BrewingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $brewingService;
    function __construct(BrewingService $brewingService)
    {
        $this->brewingService = $brewingService;
    }

    public function index()
    {
        $brewing = $this->brewingService->getAll();
        return response()->json($brewing);
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
        $brewing = $this->brewingService->store($request->input());
        return response()->json($brewing);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brewing  $brewing
     * @return \Illuminate\Http\Response
     */
    public function show(Brewing $brewing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brewing  $brewing
     * @return \Illuminate\Http\Response
     */
    public function edit(Brewing $brewing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brewing  $brewing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brewing = $this->brewingService->update($request->input(), $id);
        return response()->json($brewing);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brewing  $brewing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brewing $brewing)
    {
        //
    }
}
