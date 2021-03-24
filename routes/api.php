<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/registerApi','Api\ApiController@register');
Route::post('/loginApi','Api\ApiController@login');

Route::group(['middleware' => 'auth.jwt'], function(){

    Route::get('/logoutApi','Api\ApiController@logoutApi');

    Route::group(['prefix'=>'user'],function(){
        Route::get('/list','Api\UserController@getUser');
        Route::get('/show/{id}','Api\UserController@show');
        Route::post('/store','Api\UserController@store');
        Route::post('/update/{id}','Api\UserController@update');
        Route::get('/delete/{id}','Api\UserController@destroy');
    });

    Route::group(['prefix'=>'role'],function(){
        Route::get('/list','Api\RolePermissionController@getAllRoles');
        Route::post('/store','Api\RolePermissionController@storeRole');
        Route::post('/update/{id}','Api\RolePermissionController@updateRole');
        Route::get('/delete/{id}','Api\RolePermissionController@destroyRole');
    });

    Route::group(['prefix'=>'permission'],function(){
        Route::get('/list','Api\RolePermissionController@getAllPermission');
        Route::post('/store','Api\RolePermissionController@storePermission');
        Route::post('/update/{id}','Api\RolePermissionController@updatePermission');
        Route::get('/delete/{id}','Api\RolePermissionController@destroyPermission');
    });

});




