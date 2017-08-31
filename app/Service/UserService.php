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
        $user = User::with("Role","Branch", "Image")->get();
        return $user;
    }

    static function getByUserId($id){
        $user = User::with("Role","Branch","Image")->get()->where('id',$id)->first();
        return $user;
    }

    function store(Request $input)
        {
            $result = false;
            $user = new User();
            $user->name = $input['name'];
            if($user==null){
                return $result;
            }
            $user->email = $input['email'];
            $user->password = bcrypt($input['password']);
            $user->phone_number = $input['phone_number'];
            $user->role_id  = $input['role_id'];
            $user->branch_id  = $input['branch_id'];
            $user->image_id = Image::with([])->get(['id'])->pluck("id")->last();
            $user->save();
            $result = true;

            return $result;
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->phone_number = $request['phone_number'];
        $user->role_id  = $request['role_id'];
        $user->branch_id  = $request['branch_id'];
        //$user->name = $request->name;
        //$user->image_id = Image::get(['id'])->pluck("id")->last();
        $user->update();
        return response()->json($user);
    }

    public function delete($id)
    {
        User::destroy($id);
        $user = User::with("IngredientType")->get();
        return response()->json($user);
    }
}