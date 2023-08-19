<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function show($id)
    {
        $user = User::with('userAddresses')->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'position' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->position = $request->position;
        $user->save();

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if($request->position){
            $user->position = $request->position;
        }
        $user->save();

        return response()->json($user, 200);
    }




    public function changePassword(Request $request,$id)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::find($id);

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Invalid old password'], 400);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['message' => 'Password changed successfully'], 200);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function getUsersByPosition(Request $request, $position)
    {

        $type = $request->type;

        if($position=='admin'){
            return 'not accessable position';
        }
        if($position=='users'){
            $users = User::where('position_type', $position)->orderBy('id','desc')->paginate(21);
            return response()->json($users, 200);
        }

        if($type=='all'){
            $users = User::where('position', $position)->orderBy('id','desc')->get();
            return response()->json($users, 200);
        }


        $userType =$request->userType;
        $name =$request->name;
        $search =$request->search;
        $query = User::where('position', $position);

        if ($userType) {
            $query->where('type', $userType);
        }

        if ($name) {
            // $query->where('name', 'LIKE', '%' . $name . '%');
            $query->where('name', 'LIKE', $name . '%');
        }
        if ($search) {
            $query->where(function($subQuery) use ($search) {
                $subQuery->where('name', 'LIKE', '%' . $search . '%')
                         ->orWhere('nameBN', 'LIKE', '%' . $search . '%');
            });
        }

        $users = $query->orderBy('id','desc')->paginate(21);







        return response()->json($users, 200);
    }

    public function registerWriter(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nameBN' => 'required',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->nameBN = $request->nameBN;
        $user->type = $request->type;
        $user->email = Str::random(3).time()."@puthiprokash.com";
        $user->password = Hash::make(Str::random(20).time());
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->position = 'writer';
        $image = $request->image;
        $featured = '';
        $imageCount =  count(explode(';', $image));
        if ($imageCount > 1) {
            $featured =   fileupload($image, "uploaded/user/writer/");
            $user->image = $featured;
        }
        $user->save();
        return response()->json($user, 201);
    }

    public function updateWriter(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'nameBN' => 'required',

        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->nameBN = $request->nameBN;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $image = $request->image;
        $featured = '';
        $imageCount =  count(explode(';', $image));
        if ($imageCount > 1) {
            $featured =   fileupload($image, "uploaded/user/writer/");
            $user->image = $featured;
        }
        $user->save();
        return response()->json($user, 200);
    }


    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nameBN' => 'required',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->nameBN = $request->nameBN;
        $user->type = $request->type;
        // $user->email = Str::random(3).time()."@puthiprokash.com";
        // $user->password = Hash::make(Str::random(20).time());
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->position = $request->position;
        $user->position_type = 'users';
        $image = $request->image;
        $featured = '';
        $imageCount =  count(explode(';', $image));
        if ($imageCount > 1) {
            $featured =   fileupload($image, "uploaded/user/writer/");
            $user->image = $featured;
        }
        $user->save();
        return response()->json($user, 201);
    }

    public function updateUser(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'nameBN' => 'required',

        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->nameBN = $request->nameBN;
        $user->type = $request->type;
        $user->position = $request->position;
        $image = $request->image;
        $user->phone = $request->phone;
        $featured = '';
        $imageCount =  count(explode(';', $image));
        if ($imageCount > 1) {
            $featured =   fileupload($image, "uploaded/user/writer/");
            $user->image = $featured;
        }
        $user->save();
        return response()->json($user, 200);
    }




public function addUserAddress(Request $request, $user_id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'zip' => 'required',
        // Add any other address-related validations you need
    ]);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
    }

    // Find the user by user_id
    $user = User::find($user_id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    $datas = [
        'address' => $request->input('address'),
        'city' => $request->input('city'),
        'state' => $request->input('state'),
        'country' => $request->input('country'),
        'zip' => $request->input('zip'),
        // Add any other address-related fields here
    ];

    if ($user->userAddresses()->exists()) {

        $user->userAddresses()->update($datas);
        return response()->json(['message' => 'User address updated successfully'], 200);
    }


       // Create a new user address
       $userAddress = new UserAddress($datas);

    // Save the user address to the user's addresses
    $user->userAddresses()->save($userAddress);

    return response()->json(['message' => 'User address added successfully', 'address' => $userAddress], 201);
}



}
