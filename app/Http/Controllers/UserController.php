<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserAddress;

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

    public function getUsersByPosition($position)
    {
        if($position=='admin'){
            return 'not accessable position';
        }
        $users = User::where('position', $position)->paginate(21);
        return response()->json($users, 200);
    }

    public function registerWriter(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->position = 'writer';
        $user->save();

        return response()->json($user, 201);
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
       $userAddress = new UserAddress();

    // Save the user address to the user's addresses
    $user->userAddresses()->save($userAddress);

    return response()->json(['message' => 'User address added successfully', 'address' => $userAddress], 201);
}



}
