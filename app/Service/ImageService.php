<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 20/6/2560
 * Time: 19:01
 */

namespace App\Service;

use App\Image;
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
    public function getById($id)
    {

        $image = $this->model->with([
            "User"
        ])->where('id',$id);
        return $image;
    }
}