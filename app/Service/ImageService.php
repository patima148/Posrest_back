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
    public function store($input)
    {   $image = new Image();
        $file_name = time().'.'.$input->file->getClientOriginalExtension();
        $input->file->move(public_path('images'), $file_name);
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

    public function update($input,$id)
    {
        $image = Image::with("User", "Menu")->where('id',$id)->get()->first();

        $file_name = time().'.'.$input->file->getClientOriginalExtension();
        $input->file->move(public_path('images'), $file_name);


        $image->file_name = $file_name;

        $image->save();

        return $image;
    }

    public function delete($id)
    {
        Image::destroy($id);
        $image = Image::with("User", "Menu")->get();
        return response()->json($image);
    }

}