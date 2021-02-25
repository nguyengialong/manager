<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
})->middleware('auth');

Route::group(['prefix'=>'admins'],function(){
    Auth::routes();
    Route::get('/login','Auth\LoginController@login')->name('login');
    Route::get('/register','Auth\RegisterController@register')->name('register');
    Route::get('/logout','Auth\LoginController@logout')->name('logout');
    Route::post('/postlogin','Auth\LoginController@postlogin')->name('post.login');
    Route::post('/register','Auth\RegisterController@postregister')->name('post.register');
    Route::get('/home','AdminController@home')->name('home')->middleware('auth');

});

Route::group(['prefix'=>'user'],function(){

    Route::get('/add','UsersController@creat')->name('add_user');
    Route::post('/store','UsersController@store')->name('user_store');
    Route::get('/edit/{id}','UsersController@edit')->name('edit_user');
    Route::get('/detail/{id}','UsersController@show')->name('detail_user');
    Route::get('/update/{id}','UsersController@update')->name('update_user');
    Route::get('/delete/{id}','UsersController@destroy')->name('delete_user');
    Route::get('/search','UsersController@search')->name('search');



});
