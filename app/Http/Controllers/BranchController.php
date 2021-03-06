<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use App\Service\BranchesService;

class BranchController extends Controller
{

    private $service;
    function __construct(BranchesService $branchService)
    {
        $this->service = $branchService;
    }

    public function index()
    {
        $branch = $this->service->getAll();
        return response()->json($branch);
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
        $branch = $this->service->store($request->input());
        return response()->json($branch);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = $this->service->getById($id);
        return response()->json($branch);
    }

    public function showBranchWithIngredient($id)
    {
        $branch = $this->service->getBranchWithIngredientById($id);
        return response()->json($branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = $this->service->update($request->get('name'),$request->get('address'),$id);
        return response()->json($branch);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {

    }
}
