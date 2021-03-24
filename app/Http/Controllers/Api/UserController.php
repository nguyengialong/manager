<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
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
        $newRole = $this->createRoleformUser($users->id,$request->role);

        return response()->json([
            'status'=> 200,
            'message'=> 'Create User Success',
            'data'=> $newRole
        ]);

    }

    public function createRoleformUser($id,$role){

        $user = User::find($id);
        $role =  $user->assignRole($role);
        return $role;
    }


    public function update(Request $request, $id){

        try {

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

        } catch(\Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Sorry, user with id ' . $id . ' cannot be found'
            ]);
        }

    }

    public function show($id){

        if(!(Auth()->user()->hasRole('admin') || Auth()->user()->can('add user')))
        {
            return response()->json([
                'status' =>403,
                'message' => 'Unauthorized action'
            ]);
        }

        try {

            $users = User::find($id);
            return response()->json([
                'status'=> 200,
                'message'=> 'Show user success',
                'data'=>$users
            ]);

        } catch(\Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Sorry, user with id ' . $id . ' cannot be found'
            ]);
        }

    }

    public function destroy($id){
        try {

            $users = User::find($id);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $users->delete();

            return response()->json([
                'status'=> 200,
                'message'=> 'Delete user success',
                'data'=>$users
            ]);

        } catch(\Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Sorry, user with id ' . $id . ' cannot be found'
            ]);
        }

    }


}
