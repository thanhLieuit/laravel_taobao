<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Nguoidung;
use DB;
class MenberController extends Controller
{
     public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!($token = JWTAuth::attempt($credentials))) {
            return response()->json([
                'status' => 'false',
                'error' => 'Email or password wrong',
            ],401);
        }
        $update_token = Nguoidung::find(Auth::user()->id);
        $update_token->remember_token = $token;
        $update_token->save();

        $member = DB::table('nguoidungs')->where('nguoidungs.id',Auth::user()->id)->first();

        return response()->json([
            'status' => 'true',
            'data' => $member,
            'token' => $token,
        ],200);
    }

}
