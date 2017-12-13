<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 2/11/2560
 * Time: 5:11
 */

namespace tests\Unit;


use App\Order;
use App\Service\OrderService;
use Tests\TestCase;
use Mockery;

class OrderServiceTest extends TestCase
{
    private $service;
    private $mockOrder;


    public function setUp()
    {
        parent::setUp();
        $this->mockOrder = $this->mock('App\Order');
        $this->service = new OrderService($this->mockOrder);
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    public function test_store()
    {
        $test_data = array(['branch_id'=>'1','status'=>'Order'
    ,'menu' => array('1','2'),'table'=>'1']);
        if (isset($test_data['branch_id']))
        {
            $expected = $this->service->store($test_data);
            $this->assertTrue($expected);
        }

    }
}
