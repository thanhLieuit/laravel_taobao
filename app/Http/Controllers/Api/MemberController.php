<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;
use App\User;
use JWTAuthException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
 

class MemberController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
 
    }
   
    public function register(Request $request){
        $user = $this->user->create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password)
        ]);
        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user,

        ]);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
              $token = null;
            try {
               if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_email_or_password'], 422);
               }
            } catch (JWTAuthException $e) {
                return response()->json(['failed_to_create_token'], 500);
            }

        
             return response()->json([
                'status' => 200,
                'token' => $token,
            ],200);
       
             
    }

  

    public function user(Request $request)
    {
        $user = JWTAuth::authenticate($request->token);
        return response()->json([
            'user' => $user
        ]);
    }
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

}
