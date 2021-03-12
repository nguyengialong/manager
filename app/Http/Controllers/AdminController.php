<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{


    public function home(){

        return view('admin.index');

    }

}
