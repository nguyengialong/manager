<?php

namespace App\Http\Controllers;

use App\Social;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{
    public function redirectToFacebookOrGoogle($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleFacebookCallback($providers){

        try{
            $socialUser = Socialite::driver($providers)->user();
        }catch (\Exception $e){
            return redirect()->route('login')->with(['message'=>'Đăng nhập không thành công']);
        }
        $socialProvider= Social::where('provider_id',$socialUser->getId())->first();

        if(!$socialProvider){
            $user = User::where('email',$socialUser->getEmail())->first();
            if($user){
                $user = User::where('email',$socialUser->getEmail())->delete();
                return redirect()->route('login')->with(['message'=>'Email đã được sử dụng']);
            }else{
                $user = new  User();
                $user->name = $socialUser->getName();
                $user->email = $socialUser->getEmail();
                $user->password = bcrypt(12345678);
                $user->save();
                $user->assignRole('user');
            }
            $social =  new Social();
            $social->email = $socialUser->getEmail();
            $social->provider_id = $socialUser->getId();
            $social->provider = $providers;
            $social->save();
        }else{
            $user = User::where('email',$socialUser->getEmail())->first();
        }
        Auth()->login($user);
        return redirect()->route('home')->with(['message'=>'Đăng nhập thành công']);
    }
}
