<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/blogs', 'Admin\Post@getBlogs');

Route::get('/admin/login', function () {
    return view('admin/login');
});

Route::post('/admin/login_submit', 'Admin_auth@login_submit');

Route::view('/admin/logout', function(){
    session()->forget('BLOG_USER_ID');
    return redirect('/admin/login');  
});

Route::group(['middleware'=>['admin_auth']], function(){

    Route::get('/admin/post/list', 'Admin\Post@list');
    Route::post('/admin/post/submit','Admin\Post@submit');
    
    Route::get('/admin/post/edit', function () {
        return view('admin/post/edit');
    });
    
    Route::get('/admin/post/add', function () {
        return view('admin/post/add');
    });

    Route::get('/admin/post/delete/{id}', 'Admin\Post@delete');
    Route::get('/admin/post/edit/{id}', 'Admin\Post@edit');
    Route::post('/admin/post/update/{id}','admin\Post@update');

});



