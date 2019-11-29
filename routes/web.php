<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('user')->group(function(){
     Route::get('/test','UserController@test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::prefix('admin')->group(function(){
//
//    Route::get('home', 'AdminController@showDashboad')->name('admin.home');
//
//    Route::get('login', 'AdminController@showLoginForm')->name('admin.login');
//
//    Route::post('login', 'Auth\LoginAdminController@login')->name('admin.login');
//});

Route::group([
    'prefix' => 'admin',
//    'middleware' => 'auth'
], function () {

    Route::get('home', 'AdminController@showDashboad')->name('admin.home');

    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

    Route::post('login', 'Auth\AdminLoginController@login');

});