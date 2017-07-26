<?php

namespace App\Http\Controllers;

use App\MaterialsOfMenu;
use App\Menus;

use App\Service\MaterialOfMenuService;
use App\Service\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $service;
    private $serviceMatOfMenu;
    function __construct(MenuService $menuService, MaterialOfMenuService $materialOfMenuService)
    {
        $this->service = $menuService;
        $this->serviceMatOfMenu = $materialOfMenuService;
    }


    public function index (){
        $Menu = Menus::all();
        return $Menu;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
      $m = $this->service->store($request);
      $matofmenu = $this->serviceMatOfMenu->storeMatOfMenu($request);

       return response()->json([$m,$matofmenu]);
    }

    public function show($id)
    {
        $menu = $this->service->getById($id);

        return response()->json($menu);
    }

    public function showByName($name)
    {
        $menu = $this->service->getById($name);

        return response()->json($menu);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
