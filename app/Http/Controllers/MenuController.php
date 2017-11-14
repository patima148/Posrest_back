<?php

namespace App\Http\Controllers;

use App\Menu;

use App\Service\MenuService;
use App\Service\ImageService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $service;
    private $imageService;
    function __construct(MenuService $menuService, ImageService $imageService)
    {
        $this->service = $menuService;
        $this->imageService = $imageService;
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
        $this->imageService->store($request);
        $menu = $this->service->store($request->input());
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
