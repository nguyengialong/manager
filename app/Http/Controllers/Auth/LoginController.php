<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){

        return view('admin.login.login');

    }

    public function postlogin(LoginRequest $request){

        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::attempt(['email' => $email,'password' => $password]))
        {

            return redirect()->route('home');

        }else{

            return redirect()->back()->with(['message' => 'Mật khẩu hoặc tên đăng nhập không hợp lệ']);
        }

    }



    public function logout(){


        Auth::logout();

        return redirect()->route('login');

    }

}
