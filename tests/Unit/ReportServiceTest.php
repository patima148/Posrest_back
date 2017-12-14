<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 14/12/2560
 * Time: 8:55
 */

namespace tests\Unit;


use App\Service\ReportService;
use Tests\TestCase;


class ReportServiceTest extends TestCase
{
    private $service;
    private $mockReport;

    public function setUp()
    {
        parent::setUp();
        $this->mockReport = $this->mock('App\Report');
        $this->service = new ReportService($this->mockReport);
    }

    public function mock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    public function test_getAllBaristarReport()
    {
        $expected =  $this->mockReport->shouldReceive('with')->with('user','orderdetail')
            ->shouldReceive('getAllBaristarReport')->andReturn($this->test_data2);*/
        $actual = $this->service->getAllBaristarReport(1, '2017-12-04', '2017-12-11');
        $this->assertTrue($actual['id'] == 1);
    }



}
