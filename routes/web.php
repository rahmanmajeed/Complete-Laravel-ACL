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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/manage-user','AppController@userList')->name('user.list');
Route::get('/manage-role','AppController@roleList')->name('role.list');
Route::get('/manage-permission','AppController@permissionList')->name('permission.list');

Route::get('/update-user/{id}','AppController@userEdit')->name('user.edit');
Route::get('/update-role/{id}','AppController@roleEdit')->name('role.edit');
Route::get('/update-permission/{id}','AppController@permissionEdit')->name('permission.edit');

Route::match(['PUT','PATCH'],'/update-user/{id}','AppController@userUpdate')->name('user.update');