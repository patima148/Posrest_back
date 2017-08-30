<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 30/8/2560
 * Time: 12:49
 */

namespace Tests\Unit;
use App\Service\UserService;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\User;


class UserServiceTest extends TestCase
{
    //User $user, Role $role, Branch $branch, Image $image
    private $service;
    private $mockUser;
    private $mockRole;
    private $mockBranch;
    private $mockImage;
    public function setUp()
    {
        parent::setUp();
        $this->mockUser = $this->mock('App\User');
        $this->mockRole = $this->mock('App\Role');
        $this->mockBranch = $this->mock('App\Branch');
        $this->mockImage = $this->mock('App\Image');
        $this->service = new UserService($this->mockUser, $this->mockRole,
            $this->mockBranch, $this->mockImage);
    }

    public function mock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    public function test_getAll()
    {
        $actual = $this->service->getAll();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$actual);
    }

    public function test_store()
    {
        $request = new Request();
        $actual = new User();
        $request = $this->test_data[0];
        $actual = $this->service->store($request);
        $this->assertTrue($actual);
    }

    private $test_data = array(['name'=>'Jam',
                                'email'=>'Paisan@cmu.ac.th',
                                'password'=>'123456',
                                'phone_number'=>'0833221934','role_id'=>'4',
                                'branch_id'=>'1', /*'file'=>'7123658459.jpg'*/],
                                 []);
}
