<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Auth;

class AuthorController extends Controller
{
    public function roleIndex(){
        $role = Role::all();
        return view('admin.user.listRole',compact('role'));
    }


    public function creatRole(){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $permission = Permission::all();

        return view('admin.user.addrole', compact('permission'));
    }

    public function editRole($id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $roles = Role::find($id);
        $permissionOfRole= $roles->getAllPermissions();
        $permission = Permission::all();
        return view('admin.user.editrole',compact('roles','permissionOfRole','permission'));
    }

    public function updateRole(Request $request,$id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }


        $roles = Role::findById($id);
        $roles->name = $request->name;
        $permission = $request->input('permission');
        $roles->syncPermissions($permission);
        $roles->save();


        return redirect()->route('role');
    }


    public function storeRole(Request $request){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }


        $roles = new Role();
        $roles->name = $request->name;
        $roles->save();
        $permission = $request->input('permissions');
        $roles->givePermissionTo($permission);

//        $getRole = Role::findById($roles->id);
//
//        foreach ($request->except('_token','name') as $value)
//        {
//
//            foreach ($value as $key){
//
//                $getPermission = Permission::findById($key);
//                $getRole->givePermissionTo($getPermission);
//            }
//
//        }

        return redirect()->route('role');


    }

    public function destroyRole($id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $roles = Role::find($id);
        $getPermision= $roles->getAllPermissions();

        foreach ($getPermision as $value){

           $roles->revokePermissionTo($value->name);
        }

        $roles->delete();

        return redirect()->route('role');

    }

    public function creatPermission(){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        return view('admin.user.addpermission');
    }

    public function permissionIndex(){

        $permission = Permission::paginate(4);
        return view('admin.user.listPermission',compact('permission'));

    }

    public function editPermission($id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $permission = Permission::find($id);

        return view('admin.user.editpermission',compact('permission'));
    }

    public function updatePermission(Request $request,$id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }


        $permission = Permission::findById($id);

        $permission->name = $request->name;

        $permission->save();

        return redirect()->route('permission');
    }


    public function storePermission(Request $request){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }


        $permission = new Permission();

        $permission->name = $request->name;

        $permission->save();

        return redirect()->route('permission');


    }

    public function destroyPermission($id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $permission = Permission::find($id);

        $permission->delete();

        return redirect()->route('permission');

    }



}
