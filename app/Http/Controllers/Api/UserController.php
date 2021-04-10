<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser(){

        $user = User::all();

        return response()->json([
            'status'=> 200,
            'message'=> 'Get User Success',
            'data'=>$user
        ]);
    }


    public function store(Request $request){

        $users = new User();

        $users->name = $request->name;
        $users->email =$request->email;
        $users->phone =$request->phone;
        $users->address =$request->address;
        $users->password = bcrypt($request->password);
        $users->save();

        return response()->json([
            'status'=> 200,
            'message'=> 'Create User Success',
            'data'=>$users
        ]);

    }

    public function update(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->name;
        $users->email =$request->email;
        $users->phone =$request->phone;
        $users->address =$request->address;
        $users->save();

        return response()->json([
            'status'=> 200,
            'message'=> 'Update User Success',
            'data'=>$users
        ]);
    }

    public function show($id){

        $users = User::find($id);

        return response()->json([
            'status'=> 200,
            'message'=> 'Show user success',
            'data'=>$users
        ]);

    }

    public function destroy($id){

        $users = User::find($id);
        $users->delete();

        return response()->json([
            'status'=> 200,
            'message'=> 'Delete user success',
            'data'=>$users
        ]);
    }


}
