<?php

namespace App\Providers;


use App\User;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.index', function($view){

            $user = User::paginate('4');

            $view->with(['user'=>$user]);

        });
    }
}
