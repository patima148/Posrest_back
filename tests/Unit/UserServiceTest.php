<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 30/8/2560
 * Time: 12:49
 */

namespace Tests\Unit;
use App\Service\UserService;
use Illuminate\Support\Facades\Facade;
use Tests\TestCase;
use Tests\Unit\MockUserRequest;
use Mockery;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class UserServiceTest extends TestCase
{
    //User $user, Role $role, Branch $branch, Image $image
    private $service;
    private $mockUser;
    private $mockRole;
    private $mockBranch;
    private $mockImage;
    private $mockTask;

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

}
