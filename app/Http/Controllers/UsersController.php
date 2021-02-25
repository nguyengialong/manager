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
class UsersController extends Controller
{
    public function creat(){
        return view('admin.user.add');
    }

    public function show($id){

        $users = User::find($id);
        return view('admin.user.detail',compact('users'));

    }

    public function store(StoreUserRequest $request){


        $users = new User();
        $users->name = $request->name;
        $users->email =$request->email;
        $users->phone =$request->phone;
        $users->address =$request->address;
        $users->password = bcrypt($request->password);
        $users->save();
        return redirect()->route('home');


    }

    public function edit($id){

        $users = User::find($id);
        return view('admin.user.edit',compact('users'));

    }


    public function update(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->name;
        $users->email =$request->email;
        $users->phone =$request->phone;
        $users->address =$request->address;
        $users->password = bcrypt($request->password);
        $users->save();

        return redirect()->route('home');



    }

    public function destroy($id){

        $users = User::find($id);

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
