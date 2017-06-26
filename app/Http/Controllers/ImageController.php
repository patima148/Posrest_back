<?php

namespace App\Http\Controllers;

use App\ImageUser;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Image;
use App\Service\ImageService;
use App\User;
class ImageController extends Controller
{
    private $service;
    function __construct(ImageService $imageService)
    {
        $this->service = $imageService;
    }

    public function index()
    {
        $image = Image::All();
        return $image;
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
        $image = new Image();
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file_name = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('images'), $file_name);


        $image->file_name = $file_name;

        $image->save();



        return response()->json($image);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image=$this->service->getById($id);
        return response()->json($image);
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
