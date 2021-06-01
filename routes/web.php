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
//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
////use Auth;
Route::get('/', function () {
    return view('admin.index');
})->middleware('auth');

//Route::get('/', function () {
//        $user = Auth::user();
////        $user->assignRole('user');
////
//        $role =  Role::findById(6);
//        $permission = Permission::findById(3);
//        $role->givePermissionTo($permission);
//////    $role = Role::create(['name' => 'user']);
////    $permission = Permission::create(['name' => 'delete role']);
//});

Route::group(['prefix' => 'admins'], function () {
    Auth::routes();
    Route::get('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/register', 'Auth\RegisterController@register')->name('register');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/postlogin', 'Auth\LoginController@postlogin')->name('post.login');
    Route::post('/register', 'Auth\RegisterController@postregister')->name('post.register');
    Route::get('/home', 'AdminController@home')->name('home')->middleware('checkLogin');
    Route::get('/language/{locale}', 'LanguageController@changeLanguage')->name('language');
    Route::get('/login/{provider}', 'SocialController@redirectToFacebookOrGoogle')->name('facebook_login');
    Route::get('/login/{provider}/callback',
        'SocialController@handleFacebookCallback')->name('facebook_login_callback');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

    Route::get('/add', 'UsersController@creat')->name('add_user');
    Route::post('/store', 'UsersController@store')->name('user_store');
    Route::get('/edit/{id}', 'UsersController@edit')->name('edit_user');
    Route::get('/detail/{id}', 'UsersController@show')->name('detail_user');
    Route::post('/update/{id}', 'UsersController@update')->name('update_user');
    Route::get('/delete/{id}', 'UsersController@destroy')->name('delete_user');
    Route::get('/fetch_data', 'UsersController@fetch_data')->name('fetch_data');
    Route::get('/search', 'UsersController@search')->name('search');
    Route::get('/importForm', 'UsersController@ViewImport')->name('importForm');
    Route::post('/importFile', 'UsersController@importFile')->name('importFile');
    Route::get('/export', 'UsersController@export')->name('export');

    Route::get('/role', 'AuthorController@roleIndex')->name('role');
    Route::get('/addrole', 'AuthorController@creatRole')->name('creatRole');
    Route::get('/editrole/{id}', 'AuthorController@editRole')->name('editRole');
    Route::post('/storeRole', 'AuthorController@storeRole')->name('storeRole');
    Route::post('/updateRole/{id}', 'AuthorController@updateRole')->name('updateRole');
    Route::get('/deleteRole/{id}', 'AuthorController@destroyRole')->name('destroyRole');


    Route::get('/permission', 'AuthorController@permissionIndex')->name('permission');
    Route::get('/addPermission', 'AuthorController@creatPermission')->name('createPermission');
    Route::post('/storePermission', 'AuthorController@storePermission')->name('storePermission');
    Route::get('/editPermission/{id}', 'AuthorController@editPermission')->name('editPermission');
    Route::post('/updatePermission/{id}', 'AuthorController@updatePermission')->name('updatePermission');
    Route::get('/deletePermission/{id}', 'AuthorController@destroyPermission')->name('destroyPermission');

    Route::get('/importExcelForm', 'UsersController@importExcelForm')->name('importExcel');
    Route::post('/importExcelData', 'UsersController@ImportExcelData')->name('importExcelData');
});

Route::group(['prefix' => 'blog', 'middleware' => 'auth'], function () {
    Route::get('/home', 'BlogController@index')->name('blog_home');
    Route::get('/food', 'BlogController@food')->name('food');
    Route::get('/contact', 'BlogController@contact')->name('contact');
    Route::get('/life', 'BlogController@life')->name('life');
    Route::get('/about', 'BlogController@about')->name('about');
    Route::get('/detail/{id}', 'BlogController@detail')->name('detail');
});

Route::group(['prefix' => 'categories', 'middleware' => 'auth'], function () {
    Route::get('/add', 'CategoryController@create')->name('create_category');
    Route::get('/list', 'CategoryController@index')->name('list_category');
    Route::post('/store', 'CategoryController@store')->name('store_category');
    Route::post('/update/{id}', 'CategoryController@update')->name('update_category');
    Route::get('/delete/{id}', 'CategoryController@destroy')->name('destroy_category');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('edit_category');
});

Route::group(['prefix' => 'post', 'middleware' => 'auth'], function () {
    Route::get('/list', 'PostController@index')->name('list_posts');
    Route::get('/add', 'PostController@create')->name('add_post');
    Route::post('/store', 'PostController@store')->name('store_post');
    Route::get('/edit/{id}', 'PostController@edit')->name('edit_post');
    Route::post('/update/{id}', 'PostController@update')->name('update_post');
    Route::get('/delete/{id}', 'PostController@destroy')->name('delete_post');
});

Route::group(['prefix' => 'comment', 'middleware' => 'auth'], function () {
    Route::get('/list', 'CommentController@list')->name('list_comments');
    Route::get('/delete/{id}', 'CommentController@destroy')->name('destroy_comments');
    Route::post('/add/{id}', 'CommentController@store')->name('store_comments');
});



