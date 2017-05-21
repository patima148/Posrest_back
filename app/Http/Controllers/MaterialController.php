<?php

namespace App\Http\Controllers;

use App\Materials;
use App\Service\MaterialsService;
use App\User;
use Faker\Provider\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    private $service;
    function __construct(MaterialsService $materialsService)
    {
        $this->service=$materialsService;
    }

    //
    public function index() {
        /*$posts = Post::all();
        return View::make('posts.index')->with('posts',$posts);*/
        $Material = Materials::all();
        return $Material;
    }

    public function showById($id)
    {
        $m = $this->service->getById($id);
        return response()->json($m);
    }

    public function create(){

    }


    public function store(Request $request){
        $request->all();

        $materials = new Materials;
        $materials->name = $request['name'];
        $materials->price = $request['price'];
        $materials->type = $request['type'];
        $materials->save();

       return response()->json($materials);
    }

    public function update(Request $request, $id)
    {
        $request->all();
        $materials = Materials::find($id);

        $materials->name = $request['name'];
        $materials->price = $request['price'];
        $materials->type = $request['type'];
        $materials->save();

        return response()->json($materials);
    }
}
