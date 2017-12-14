<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 30/8/2560
 * Time: 22:55
 */

namespace Tests\Unit;


use App\Service\ImageService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use Tests\TestCase;
use Tests\Unit\MockImageRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Mockery;
use Illuminate\Support\Facades\Cache;


class ImageServiceTest extends TestCase
{
    private $service;
    private $mockImage;
    public function setUp()
    {
        parent::setUp();
        $this->mockImage = $this->mock('App\Image');
        $this->service = new ImageService($this->mockImage);
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }


    /*public function test_store()
    {

        $mockImageRequest = new MockImageRequest();

        $this->mockImage->shouldReceive('move')
            ->once()
            ->with(public_path('images'),'/7123658459.jpg');

        $actual = $this->service->store($mockImageRequest);
        $this->assertTrue($actual);
    }*/

    public function test_getAll()
    {
        $actual = $this->service->getAll();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$actual);
    }

    private $data_set = array(['id'=>"1",'file_name'=>"1504069477.jpg"],
        ['id'=>"2",'file_name'=>"1504069477.jpg"],
        ['id'=>"3",'file_name'=>"1504069477.jpg"]);
}
