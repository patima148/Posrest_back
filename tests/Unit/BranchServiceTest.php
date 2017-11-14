<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 30/8/2560
 * Time: 9:14
 */

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use App\Service\BranchesService;
use Illuminate\Database\Eloquent\Collection;


class BranchServiceTest extends TestCase
{
    private $service;
    private $mockBranch;

    public function setUp()
    {
        parent::setUp();
        $this->mockBranch = $this->mock('App\Branch');
        $this->service = new BranchesService($this->mockBranch);
    }

    public function mock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }
    public function test_bracnh()
    {
        $this->assertEquals(
            'user@example.com',
            'user@example.com'
        );
    }
    private $test_data = array(
        [
            "id"=>1,
            "name"=>"CMU",
            "address"=>"168/1",
            "created_at"=> "2017-08-30 05:27:17",
            "updated_at"=>"2017-08-30 05:27:17"

        ],
        [
            "id"=>2,
            "name"=>"NIMMAN",
            "address"=>"168/1"
        ]);
}
