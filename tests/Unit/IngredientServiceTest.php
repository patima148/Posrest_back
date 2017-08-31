<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 27/7/2560
 * Time: 11:35
 */

namespace Tests\Unit;
use App\Branch;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use App\Service\IngredientService;
use Illuminate\Database\Eloquent\Collection;
use App\Ingredient;
use Tests\Unit\MockIngredientRequest;
use Tests\Unit\MockIngredientRequestFailCase;
use Mockery;


class IngredientServiceTest extends TestCase
{
    private $service;
    private $mockIngredient;
    private $mockBranch;
    private $mock;

    public function setUp()
    {
        parent::setUp();
        $this->mockIngredient = $this->mock('App\Ingredient');
        $this->mockBranch = $this->mock('App\Branch');
        $this->service = new IngredientService($this->mockIngredient, $this->mockBranch);
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    public function test_getAll()
    {
        $this->mockIngredient->shouldReceive('with')->with("Branch")
            ->shouldReceive('getAll')->andReturn(new Collection());
        $actual = $this->service->getAll();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$actual);

        $this->mockIngredient->shouldReceive('with')->with("Branch")
            ->shouldReceive('getAll')->andReturn($this->test_data);
        $actual = $this->service->getAll();
        $this->assertNotEmpty($actual);

        // With out any data
        $test = $this->mockIngredient->shouldReceive('with')->with("Branch")
            ->shouldReceive('getAll')->andReturn($this->test_data[1]);
        $actual = $this->service->getAll();
        $this->assertNotEquals($test,$actual);
    }

    public function test_delete()
    {
        $actual=$this->service->delete(10);
        $this->assertTrue($actual);

        //With incorrect case
        $actual=$this->service->delete(99);
        $this->assertFalse($actual);
    }

    public function test_store()
    {
        $mockIngredient = new MockIngredientRequest();
        $actual=$this->service->store($mockIngredient,1);
        $this->assertTrue($actual);

        //With incorrect case
        $mockIngredient = new MockIngredientRequestFailCase();
        $actual=$this->service->store($mockIngredient,1);
        $this->assertFalse($actual);
    }

    public function test_getById()
    {
        /*$actual = $this->service->getById(3);
        $this->assertArrayHasKey($this->test_data,$actual);*/
    }

    public function test_update()
    {

    }

    private $test_data = array(['id'=>'3','name'=>'Milk','branch_id'=>'2'],[]);
    private $test_data2 = array(['id'=> 2, "name"=> "Milk",]);
}


