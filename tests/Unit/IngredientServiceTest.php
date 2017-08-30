<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 27/7/2560
 * Time: 11:35
 */

namespace Tests\Unit;
use App\Branch;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use App\Service\IngredientService;
use Illuminate\Database\Eloquent\Collection;
use App\Ingredient;


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
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    public function test_getAll()
    {
        $this->mockIngredient->shouldReceive('with')->with("User")
            ->shouldReceive('getAll')->andReturn(new Collection());
        $actual = $this->service->getAll();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$actual);
/*
        $this->mockIngredient->shouldReceive('getAll')->andReturn(null);
        $actual = $this->service->getAll();
        $this->assertNotNull($actual);*/
    }


    public function test_getById()
    {
        /*$test = $this->mockIngredient->shouldReceive('with', 'getById')
            ->with('Branch',$this->service->getById(1))->andReturn([
            'id'=> '1',
            'name' => "Apple",
            'branch'=> [
                'name' => "Maya mall" ]
        ]);*/
        $test = $this->mockIngredient->shouldReceive('with')->with('Branch')->andReturn($this->mockIngredient)
            ->shouldReceive('getById')->with('1')->andReturn($this->test_data[1]);
        ;
        $actual = $this->service->getById(1);
        $this->assertEquals($test,$actual);
    }

    public function test_delete()
    {
        $actual=$this->service->delete(1);
        $this->assertTrue($actual);
    }
    private $test_data = array(['id'=>'1','name'=>'Milk','branch_id'=>'1'],[]);
    private $test_data2 = array(['id'=> 2, "name"=> "Milk",]);
}


