<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    public function getAllRoles(){
        $roles = Role::all();
        return response()->json([
            'status'=> 200,
            'message'=> 'Get All Role Success',
            'data'=>$roles
        ]);
    }

    public function storeRole(Request $request){

        $roles = new Role();
        $roles->name = $request->name;
        $roles->save();
        $permission = $request->permissions;
        $roles->givePermissionTo($permission);
        return response()->json([
            'status'=> 200,
            'message'=> 'Add Role Success',
            'data'=>$roles
        ]);
    }

    public function updateRole(Request $request,$id){

        try {

            $roles = Role::findById($id);
            $roles->name = $request->name;
            $permission = $request->permissions;
            $roles->syncPermissions($permission);
            $roles->save();
            return response()->json([
                'status'=> 200,
                'message'=> 'Update Role Success',
                'data'=>$roles
            ]);

        } catch(\Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Sorry, role with id ' . $id . ' cannot be found'
            ]);
        }

    }

    public function destroyRole($id){

            $roles = Role::find($id);
            if(!$roles){
                return response()->json([
                    'status' => 400,
                    'message' => 'Sorry, role with id ' . $id . ' cannot be found'
                ]);
            }else{
                $getPermision= $roles->getAllPermissions();
                $roles->revokePermissionTo($getPermision);
                $roles->delete();
                return response()->json([
                    'status'=> 200,
                    'message'=> 'Delete Role Success',
                    'data'=>$roles
                ]);
            }
    }

    public function getAllPermission(){
        $permissions = Permission::all();
        return response()->json([
            'status'=> 200,
            'message'=> 'Get All Permission Success',
            'data'=>$permissions
        ]);
    }


    public function storePermission(Request $request){

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();
        return response()->json([
            'status'=> 200,
            'message'=> 'Add Permission Success',
            'data'=>$permission
        ]);
    }

    public function updatePermission(Request $request,$id){

        try {
            $permission = Permission::findById($id);
            $permission->name = $request->name;
            $permission->save();
            return response()->json([
                'status'=> 200,
                'message'=> 'Update Permission Success',
                'data'=>$permission
            ]);

        } catch(\Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Sorry, Permission with id ' . $id . ' cannot be found'
            ]);
        }

    }

    public function destroyPermission($id){

        $permission = Permission::find($id);

        if(!$permission){
            return response()->json([
                'status' => 400,
                'message' => 'Sorry, Permission with id ' . $id . ' cannot be found'
            ]);
        }else{

            $permission->delete();
            return response()->json([
                'status'=> 200,
                'message'=> 'Delete Permission Success',
                'data'=>$permission
            ]);
        }

    }








}
