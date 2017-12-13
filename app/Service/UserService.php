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
        //$user = User::with("Role","Branch","Image","Clocking.ClockIn","Clocking.ClockOut")->get()->where('id',$id)->first();
        $user = User::with("Role","Branch", "Image","Clocking")->find($id);

//        $user = User::with("Role","Branch", "Image","Clocking")->where('role_id','<=',3)->get();
        return $user;
    }

    function store(array $data)
        {
            $result = false;
            $user = new User();
            $user->name = $data['name'];
            $user->surname = $data['surname'];
            if($user==null){
                return $result;
            }
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->phone_number = $data['phone_number'];
            $user->role_id  = $data['roleId'];
            $user->branch_id  = $data['branchId'];
            $user->face_id = $data['faceId'];
            $user->image_id = $data['imageId'];
            $user->save();
            $result = true;
            return $result;
    }

    function update(array $data, $id)
    {
        $result = false;
        $user = User::with("Role","Branch", "Image","Clocking")->find($id);

        if(isset($data['name']))
        {
            $user->name = $data['name'];

        }
        if(isset($data['email']))
        {
            $user->email = $data['email'];

        }
        if(isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        if(isset($data['phone_number'])) {
            $user->phone_number = $data['phone_number'];
        }
        if(isset($data['roleId'])) {
            $user->role_id  = $data['roleId'];
        }
        if(isset($data['branchId'])) {
            $user->branch_id  = $data['branchId'];
        }
        if(isset($data['imageId'])) {
            $user->image_id = $data['imageId'];
        }
        if(isset($data['faceId'])) {
            $user->face_id = $data['faceId'];
        }
        $user->save();
        return $user;
    }

    public function delete($id)
    {
        User::destroy($id);
        $user = User::with("Branch")->get();
        return response()->json($user);
    }
}