<?php

namespace App\Http\Controllers;

use App\Menus;
use App\Service\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $service;
    function __construct(MenuService $menuService)
    {
        $this->service = $menuService;
    }


    public function index (){
        $Menu = menu::all();
        return $Menu;
    }

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
        $request->all();
        $menu = new Menus();
        $menu->name = $request['name'];
        $menu->sell_price = $request['sell_price'];
        $menu->menu_type_id = $request['menu_type_id'];

        return response()->json($menu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById($id)
    {
        $menu = $this->service->getById($id);

        return response()->json($menu);
    }

    public function showByName($name)
    {
        $menu = $this->service->getById($name);

        return response()->json($menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
