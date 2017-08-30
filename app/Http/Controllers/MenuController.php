<?php

namespace App\Http\Controllers;

use App\Menu;

use App\Service\BranchesService;
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
        $Menu = $this->service->getAll();
        return $Menu;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $menu = $this->service->store($request);
        return response()->json($menu);
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
