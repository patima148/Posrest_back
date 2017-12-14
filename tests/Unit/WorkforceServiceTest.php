<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 14/12/2560
 * Time: 7:37
 */

namespace tests\Unit;


use App\Service\WorkforceService;
use Tests\TestCase;

class WorkforceServiceTest extends TestCase
{
    private $service;
    private $mockWorkforce;

    public function setUp()
    {
        parent::setUp();
        $this->mockBranch = $this->mock('App\Workforce');
        $this->service = new WorkforceService($this->mockWorkforce);
    }

    public function mock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    private $test_data = array(
        'dayname' => "Thu",
        "numberOfCup" => 5,
        "Shift" => "1"
    );
    public function test_estimation()
    {
        $actual = $this->service->estimation("Thu", 1);
        
    }
}
