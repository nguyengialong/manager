<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Http\Requests\StoreUserRequest;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Auth;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function creat(){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        return view('admin.user.add');
    }

    public function index(){

        return view('admin.index');
    }

    public function show($id){

        $users = User::find($id);
        $role = $users->getRoleNames();
        return view('admin.user.detail',compact('users','role'));

    }

    public function store(StoreUserRequest $request){
        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $users = new User();
        $users->name = $request->name;
        $users->email =$request->email;
        $users->phone =$request->phone;
        $users->address =$request->address;
        $users->password = bcrypt($request->password);
        $users->save();
        $this->createRoleformUser($users->id,$request->role);
        return redirect()->route('home');


    }
    public function createRoleformUser($id,$role){
        $user = User::find($id);
        $user->assignRole($role);
    }

    public function edit($id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $users = User::find($id);
        $role = $users->getRoleNames();
        return view('admin.user.edit',compact('users','role'));

    }


    public function update(Request $request, $id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $users = User::find($id);
        $users->name = $request->name;
        $users->email =$request->email;
        $users->phone =$request->phone;
        $users->address =$request->address;
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $users->assignRole($request->input('role'));
        $users->save();
        return redirect()->route('home');
    }




    public function destroy($id){

        if(!Auth()->user()->hasRole('admins'))
        {
            return abort(403, 'Unauthorized action.');
        }

        $users = User::find($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $users->delete();

        return redirect()->route('home');

    }

    public  function  search(Request $request){
        $search = User::where('name','like','%'.$request->key.'%')->paginate(5);
        return view('admin.user.search',compact('search'));
    }

    public function  ViewImport(){
        return view('admin.user.importForm');
    }

    public function importFile(Request  $request){
        Excel::import(new UsersImport, request()->file('file'));
        return back();
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }



}
