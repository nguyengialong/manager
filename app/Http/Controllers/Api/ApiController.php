<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;




class ApiController extends Controller
{




    public function register(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return response()->json([
            'success' => 200,
            'data' => $user,
            'message' => 'Create user success'
        ]);

    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }





    public function logoutApi(Request $request)
    {
        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'success' => 200,
                'message' => 'User logged out successfully'
            ]);

        } catch (JWTException $exception) {
            return response()->json([
                'success' => 401,
                'message' => 'Sorry, the user cannot be logged out'
            ]);
        }
    }
}
