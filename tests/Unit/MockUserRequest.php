<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 30/8/2560
 * Time: 22:08
 */

namespace Tests\Unit;

use Illuminate\Http\Request;

class MockUserRequest extends Request
{
    public $name = "Jam";
    public $email = "Paisan@cmu.ac.th";
    public $password = "123456";
    public $phone_number = "0833221934";
    public $role_id = "4";
    public $branch_id = "1";
    public $image_id = "13";
}