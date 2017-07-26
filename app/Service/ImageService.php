<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 26/6/2560
 * Time: 16:58
 */

namespace App\Service;
use App\Image;

use Illuminate\Http\Request;

class ImageService
{
    private $model;
    function __construct(Image $image)
    {
        $this->model = $image;
    }

    /**
     * @return Image
     */
    public function store(Request $request)
    {
        $image = new Image();

        $file_name = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('images'), $file_name);


        $image->file_name = $file_name;

        $image->save();

        return $image;
    }

    public function getAll(){
        $image = Image::all();
        return $image;
    }

    public function getById($id)
    {

        $image = $this->model->with([
            "User"
        ])->where('id',$id);
        return $image;
    }


}