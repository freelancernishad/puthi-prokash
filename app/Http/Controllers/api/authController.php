<?php
namespace App\Http\Controllers\api;
use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Notification;

use App\Notifications\EmailVerification;


class authController extends Controller
{

    public function sendEmailVerification(Request $request)
    {

        $otp = rand(1000, 9999);
        $user = User::where(['email'=>$request->email])->first();

        if(!$user->email_verified_at){
            if(!$user){
                $user = User::create(['email' => $request->email,'password'=>'','email_verification'=>$otp]);
            }
            $user->notify(new EmailVerification($otp));
            return response()->json(['message' => 'Email verification OTP sent.'], 200);
        }else{
            return response()->json(['message' => 'Email Already Registered.'], 422);
        }





    }


     public function verifyEmail(Request $request)
    {
        $otp = $request->otp;
        $email = $request->email;
        $user = User::where(['email'=>$email,'email_verification'=> $otp])->first();
        if (!$user) {
            return response()->json(['message' => 'Invalid or expired OTP'], 422);
        }
        $user->update(['email_verified_at' => now(),'email_verification'=>null]);
        return response()->json(['message' => 'Email verified successfully.']);
    }







    public function login(Request $r)
    {



        $validator = Validator::make($r->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return sent_error('validation error', $validator->errors(), 422);
        }

        $credentials = $r->only('school_id','email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $data['id'] = $user->id;
            $data['school_id'] = $user->school_id;
            $data['name'] = $user->name;
            $data['email '] = $user->email;
            $data['access_token'] = $user->createToken('accessToken')->accessToken;
            //  return sent_response('Login Success', $data);
            return $this->respondWithToken($data['access_token']);
        } else {
            return sent_error('Unauthorised', '', 401);
        }




    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60,

            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'position' => auth()->user()->position,
            'class' => auth()->user()->class,
            'users' => auth()->user(),
        ]);
    }


    public function register(Request $r)
    {
        $data = [
            'name'=>$r->name,
            'email'=>$r->email,
            'password'=>hash::make($r->password),
            'position'=>'user',
        ];


        $validator = Validator::make($r->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return sent_error('validation error', $validator->errors(), 422);
        }
        try {
         return     $user =   User::create($data);
            //  $accessToken = $user->createToken('accessToken')->accessToken;
            // $user['access_token'] = $accessToken;

            // return $this->respondWithToken($accessToken);




        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
        // return $r->all();
    }



    public function Edit(Request $r, $id)
    {
        $user = User::findOrFail($id);
        $data = [];
        $inputData = $r->all();
        foreach ($inputData as $key => $value) {
            if ($key == '_token' || $key == 'submit') {
            } else if ($key == 'password') {
                $data[$key] = hash::make($value);
            } else {
                $data[$key] = $value;
            }
        }
        $validator = Validator::make($r->all(), [

            'name' => 'required|min:4',

        ]);
        if ($validator->fails()) {
            return sent_error('validation error', $validator->errors(), 422);
        }
        try {
            $user->update($data);
            $output = [];
            $inputData = $r->all();
            foreach ($inputData as $key => $value) {
                if ($key == 'id') {
                } else if ($key == 'password') {
                    $output[$key] = hash::make($value);
                } else {
                    $output['id'] = $id;
                    $output[$key] = $value;
                }
            }
            $output = [
                'user' => $output,
            ];
            return sent_response('User Update Success', $output);
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
        // return $r->all();
    }
    public function delete(Request $r, $id)
    {
        $user = User::findOrFail($id);
        try {
            $user->delete();
            return sent_response('User Delete Success');
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
    }
    public function restore(Request $r, $id)
    {
        // $user = User::findOrFail($id);
        try {
            User::withTrashed()->find($id)->restore();
            return sent_response('User Restore Success');
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
    }
    public function restoreAll(Request $r)
    {
        // $user = User::findOrFail($id);
        try {
            User::onlyTrashed()->restore();
            return sent_response('All User Restore Success');
        } catch (Exception $e) {
            return sent_error($e->getMessage(), $e->getCode());
        }
    }
    public function deleted(Request $r)
    {
        return  $trashed = User::onlyTrashed()->get();
    }
    public function logout(Request $r)
    {
        auth()->user()->token()->revoke();
        $data = [];
        return sent_response('Logout Success', $data);
    }
    public function show(Request $r, $id)
    {
        $data =   User::find($id);
        if ($data) {
            return sent_response('Success', $data);
        } else {
            return sent_error('Data Not Found!');
        }
    }
    public function showByUnion(Request $r, $union)
    {
        //    $data =   User::find('unioun',$union);
        $data =   User::where('unioun', $union)->get();
        if ($data) {
            return sent_response('Success', $data);
        } else {
            return sent_error('Data Not Found!');
        }
    }
    public function index(Request $r)
    {
        $data =   User::all();
        if ($data) {
            return sent_response('Success', $data);
        } else {
            return sent_error('Data Not Found!');
        }
    }

    public function roleAssign(Request $request)
    {


            if($request->type=='Update'){
                $roles = Role::find($request->roleName);
                $roles->update(['permission'=>$request->permission]);
                return  'Role update successfully completed';
            }else{

                $roles = Role::where('roleName',$request->roleName)->count();;
if($roles>0){
    return  'Role Already Exists!';
}
                Role::create(['roleName'=>$request->roleName,'permission'=>$request->permission]);
                return  'Role created successfully completed';
            }
    }

    public function getRoles(Request $request)
    {

           return Role::find($request->id);

    }



}
