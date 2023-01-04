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

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/login', function() {
    return view('auth.login');
});
Route::get('/register', function() {
    return view('auth.register');
});
Route::post('/register', 'Auth\RegisterController@create')->name('register.post');
Route::post('/login', 'Auth\LoginController@authenticate')->name('login.post');
Route::get('/partner', 'PartnerController@index')->name('partner.index');
Route::get('/user-list', 'UserController@index')->name('users.index');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/save', 'UserController@post')->name('user.save');
Route::get('/user/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/{id}', 'UserController@update')->name('user.update');
Route::delete('/user-delete', 'UserController@remove')->name('user.remove');
