<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 2/11/2560
 * Time: 4:11
 */

namespace tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use App\Service\ClockingService;
use Illuminate\Database\Eloquent\Collection;
use Mockery;

class ClockingServiceTest extends TestCase
{
    private $service;
    private $mockClocking;

    private $test_data1 = array(['user_id'=>'1', 'branch_id'=>'1','clockIn_time'=>'2017-9-22 14:38:54']);

    public function setUp()
    {
        parent::setUp();
        $this->mockClocking = $this->mock('App\Clocking');
        $this->service = new ClockingService($this->mockClocking);
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    public function test_clockin1()
    {
        //test correct case;
        $test_data = array(['user_id'=>'1', 'branch_id'=>'1','clockIn_time'=>'2017-9-22 14:38:54']);;
        if (isset($test_data['user_id']))
        {
            $actual = $this->service->clock_in($test_data);
            $this->assertTrue($actual);
        }
    }
    public  function test_clockin2()
    {
        //test failed case;
        $test_data = array(['user_id'=>null, 'branch_id'=>'1','clockIn_time'=>'2017-9-22 14:38:54']);
        if (isset($test_data['user_id']))
        {
            $actual = $this->service->clock_in($test_data);
            $this->assertFalse($actual);
        }
    }
    public  function test_clockin3()
    {
        //test failed case;
        $test_data = array(['user_id'=>'1', 'branch_id'=>null,'clockIn_time'=>'2017-9-22 14:38:54']);
        if (isset($test_data['user_id']))
        {
            $actual = $this->service->clock_in($test_data);
            $this->assertFalse($actual);
        }
    }
    public  function test_clockin4()
    {
        //test failed case;
        $test_data = array(['user_id'=>'1', 'branch_id'=>'1','clockIn_time'=>null]);
        if (isset($test_data['user_id']))
        {
            $actual = $this->service->clock_in($test_data);
            $this->assertFalse($actual);
        }
    }

    public function test_getAllClocking()
    {
        $expected = $this->mockClocking->shouldReceive('with')->with("'user','branch'")
            ->shouldReceive('getAllClocking')->andReturn($this->test_data);
        $actual = $this->service->getAllClocking();
        $this->assertEmpty($actual);
        //$this->assertEquals($expected, $actual);

    }

    public function test_getAllClocking2()
    {
        //failed case
        $expected =  $this->mockClocking->shouldReceive('with')->with("'user','branch'")
            ->shouldReceive('getAllClocking')->andReturn($this->test_data2);
        $actual = $this->service->getAllClocking();
        $this->assertNotEmpty($expected);
    }

    public function test_getClock()
    {
        //failed case
        $expected =  $this->mockClocking->shouldReceive('with')->with("'user','branch'")
            ->shouldReceive('getAllClocking')->andReturn($this->test_data2);
        $actual = $this->service->getAllClocking();
        $this->assertNotEmpty($expected);
    }


    private $test_data2 = null;

    private $test_data = array([
        'Clocking' => ['id'=>'1',
            'branch_id'=> 1,
            'user_id'=>2,
            'clockIn_Time'=>'2017-11-02 02:41:15',
            'clockOut_Time'=>'2017-11-02 03:12:49',
            'workingDuration_Min' => '352',
            'totalDuration_Hour' => '5',
            'payRate'=>'30',
            'created_at'=>'2017-11-02 02:41:15',
            'updated_at'=> '2017-11-02 03:12:49'],'User'=>[
            'id'=>'2','name'=>'Q', 'email'=>'7777@gmail.co',
            'phone_number'=>'0882281932','role_id'=>'3',
            'branch_id'=>'1','image_id'=>'2',
            'created_at'=>'2017-11-02 00:13:39',
            'updated_at'=> '2017-11-02 00:13:39'],
            'branch'=>[
                'id'=>'1',
                'name'=>'cmu',
                'address'=>'168/1',
                'created_at'=>Null,
                'updated_at'=> Null
        ]
    ]
    );

}
