<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 30/8/2560
 * Time: 23:00
 */

namespace Tests\Unit;


use App\Image;
use Illuminate\Http\Request;
use Mockery;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class MockImageRequest extends Request
{
    public $file;
    public function set() {
        $this->file = Mockery::mock(UploadedFile::class, [
            'getClientOriginalName'      => '7123658459',
            'getClientOriginalExtension' => 'jpg'
        ]);
        return $this->file;
    }
}