<?php

namespace App\Http\Controllers;

use App\PartTimeProfile;
use App\Service\BranchesService;
use App\Service\PartTimeProfileService;
use App\Service\UserService;
use Illuminate\Http\Request;

class PartTimeProfileController extends Controller
{
    private $PartTimeProfileService;
    private $branchesService;
    function __construct(PartTimeProfileService $PartTimeProfileService, BranchesService $branchesService)
    {
        $this->PartTimeProfileService = $PartTimeProfileService;
        $this->BranchesService = $branchesService;
    }

    public function index()
    {
        $profile = $this->PartTimeProfileService->getProfile();
        return response()->json($profile);
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
        $profiling = $this->PartTimeProfileService->store($request->input());
        return response()->json($profiling);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PartTimeProfile  $partTimeProfile
     * @return \Illuminate\Http\Response
     */
    public function show(PartTimeProfile $partTimeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PartTimeProfile  $partTimeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(PartTimeProfile $partTimeProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PartTimeProfile  $partTimeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartTimeProfile $partTimeProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PartTimeProfile  $partTimeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartTimeProfile $partTimeProfile)
    {
        //
    }
}
