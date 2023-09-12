<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;



    protected $redirectTo = '/dashboard';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function userLogin(Request $request)
    {

        // Check if the input is an email or phone number
        $input = $request->input('email');
        $field = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $userFilter = [
            $field => $input,
            'position' => 'user',
        ];

        $singleUser = User::where($userFilter)->count();

        if ($singleUser > 0) {
            $credentials = [
                $field => $input,
                'password' => $request->input('password'),
            ];

         
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $user['access_token'] = $user->createToken('accessToken')->accessToken;
                return $this->respondWithToken($user['access_token']);
            } else {
                return 0; // Login failed
            }
        } else {
            return 0; // User not found
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
             $user = Auth::user();

            // $data['id'] = $user->id;
            // $data['school_id'] = $user->school_id;
            // $data['name'] = $user->name;
            // $data['email '] = $user->email;
            $user['access_token'] = $user->createToken('accessToken')->accessToken;

            //  return sent_response('Login Success', $data);
            return $this->respondWithToken($user['access_token']);
        } else {
            return 0;
        }
    }


    protected function respondWithToken($token)
    {




     $users = auth()->user();
$users['token_type'] ='bearer';
$users['expires_in'] =60;

return response()->json($users);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60,

            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'role' => auth()->user()->role,
            'class' => auth()->user()->class,
            'users' => auth()->user(),
        ]);
    }

}
