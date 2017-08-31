<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 31/8/2560
 * Time: 3:30
 */

namespace Tests\Unit;


use App\Branch;
use App\Service\MenuService;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use App\Service\IngredientService;
use App\Service\ImageService;
use App\Image;
use Illuminate\Database\Eloquent\Collection;
use App\Ingredient;
use Mockery;

class MenuServiceTest extends TestCase
{
    private $service;
    private $mockMenu;
    private $mockBranch;
    private $mockIngredient;
    private $mockImage;

    public function setUp()
    {
        parent::setUp();
        $this->mockIngredient = $this->mock('App\Ingredient');
        $this->mockBranch = $this->mock('App\Branch');
        $this->mockImage = $this->mock('App\Image');
        $this->mockMenu = $this->mock('App\Menu');
        $this->service = new MenuService($this->mockMenu, $this->mockBranch, $this->mockIngredient, $this->mockImage);
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }
    public function test_getAll()
    {
        $this->mockIngredient->shouldReceive('with')->with("Branch","Image")
            ->shouldReceive('getAll')->andReturn(new Collection());
        $actual = $this->service->getAll();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$actual);

        $this->mockIngredient->shouldReceive('with')->with("Branch")
            ->shouldReceive('getAll')->andReturn($this->test_data);
        $actual = $this->service->getAll();
        $this->assertCount(1, $actual);
    }
}
