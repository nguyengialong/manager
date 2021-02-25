<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
class AuthorController extends Controller
{
    public function roleIndex(){
        $role = Role::all();
        return view('admin.user.listRole',compact('role'));
    }

    public function permissionIndex(){
        $permission = Permission::all();
        return view('admin.user.listPermission',compact('permission'));
    }

    public function creatRole(){

        return view('admin.user.addrole');
    }

    public function storeRole(Request $request){

        $roles = new Role();

        $roles->name = $request->name;

        $roles->save();

        return redirect()->route('role');


    }

    public function destroyRole($id){

        $roles = Role::find($id);

        $roles->delete();

        return redirect()->route('role');

    }

    public function creatPermission(){

        return view('admin.user.addpermission');
    }



}
