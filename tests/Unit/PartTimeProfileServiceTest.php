<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 14/12/2560
 * Time: 8:12
 */

namespace tests\Unit;


use App\Service\PartTimeProfileService;
use Tests\TestCase;


class PartTimeProfileServiceTest extends TestCase
{
    private $service;
    private $mockParttimeProfile;
    private  $mockBranch;
    public function setUp()
    {
        parent::setUp();
        $this->mockParttimeProfile = $this->mock('App\PartTimeProfile');
        $this->service = new PartTimeProfileService($this->mockParttimeProfile);
    }

    public function mock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    function test_getProfileByUserId()
    {
        $test_data[] = array(
            'UserID' => [
                'id' => 1,
                'name' => 'Peerapat',
                'surname' => 'Chommanee',
                'email' => 'Peerapat@cmu.ac.th',
                'phone_number' => '0882281932',
                'faceId' => '',
                'roleId' => 3,
                'branchId' => 1,
                'imageId' => '4294967295',
                'created_at' => null,
                'updated_at' => null
        ],
        'averageCupPerDay' => 2,
        'averagetimepercup' => 4.25,
        'averagepausetime' => 0.5,
        'correctness' => 10,
        'late' => 0
        );
        $actual = $this->service->getProfileByUserId(1);
        $expected = $this->service->getProfileByUserId(1);
        $this->assertEquals($actual, $expected);
    }
}
