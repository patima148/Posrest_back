<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Service\IngredientService;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $service;

    function __construct(IngredientService $ingredientService)
    {
        $this->service = $ingredientService;
    }

    public function index()
    {
        $ingredient = $this->service->getAll();
        return response()->json($ingredient);
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
    public function store(Request $request, $id)
    {
        $ingredient = $this->service->store($request, $id);

        return response()->json($ingredient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = $this->service->getById($id);
        return response()->json($ingredient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $branch_id)
    {
        $ingredient = $this->service->update($request, $id, $branch_id);
        response()->json($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredients = $this->service->delete($id);
        return response()->json($ingredients);
    }
}
