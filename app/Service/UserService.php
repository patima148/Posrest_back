<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 28/7/2560
 * Time: 16:21
 */

namespace App\Service;
use App\Branch;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UserService extends Controller
{
    private $modelUser;
    private $modelRole;
    private $modelBranch;
    private $modelImage;
    function __construct(User $user, Role $role, Branch $branch, Image $image)
    {
        $this->modelUser = $user;
        $this->modelRole = $role;
        $this->modelBranch = $branch;
        $this->modelImage = $image;
    }

    public function getAll()
    {
        $user = User::with("Role","Branch", "Image","Clocking")->get();
        return $user;
    }

    static function getByUserId($id){
        $user = User::with("Role","Branch","Image","Clocking.ClockIn","Clocking.ClockOut")->get()->where('id',$id)->first();
        return $user;
    }

    function store(array $data)
        {
            $result = false;
            $user = new User();
            $user->name = $data['name'];
            if($user==null){
                return $result;
            }
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->phone_number = $data['phone_number'];
            $user->role_id  = $data['role_id'];
            $user->branch_id  = $data['branch_id'];
            $user->image_id = Image::with([])->get(['id'])->pluck("id")->last();
            $user->save();
            $result = true;

            return $result;
    }

    function update(array $data, $id)
    {
        $result = false;
        $user = $this->modelUser->find($id);
        if(isset($data['email'])) {
            $user->email = $data['email'];
            return $data['email'];
        }
        if(isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        if(isset($data['phone_number'])) {
            $user->phone_number = $data['phone_number'];
        }
        if(isset($data['role_id'])) {
            $user->role_id  = $data['role_id'];
        }
        if(isset($data['branch_id'])) {
            $user->branch_id  = $data['branch_id'];
        }
        if(isset($data['image'])) {
            $user->image_id = Image::with([])->get(['id'])->pluck("id")->last();
        }

        return $data;
    }

    public function delete($id)
    {
        User::destroy($id);
        $user = User::with("IngredientType")->get();
        return response()->json($user);
    }
}