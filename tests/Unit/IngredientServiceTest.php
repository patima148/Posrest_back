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


    public function test_fake()
    {
        $this->assertEquals(
            'user@example.com',
            'user@example.com'
        );
    }

    public function test_update()
    {

    }

    private $test_data = array(['id'=>'3','name'=>'Milk','branch_id'=>'2'],[]);
    private $test_data2 = array(['id'=> 2, "name"=> "Milk",]);
}


