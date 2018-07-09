<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/















































































//设置引入后台用户列表的模板
Route::get('/admin/users/index','admin\UsersController@index');

//设置引入后台用户添加的模板
Route::get('/admin/users/create','admin\UsersController@create');

//设置用户添加到数据库
Route::post('/admin/users/store','admin\UsersController@store');

//设置用户修改
Route::get('/admin/users/edit/{id}','admin\UsersController@edit');

//设置用户修改
Route::get('/admin/users/pass/{id}','admin\UsersController@pass');

//设置用户修改
Route::post('/admin/users/update/{id}','admin\UsersController@update');

//设置用户删除
Route::get('/admin/users/del/{id}','admin\UsersController@del');

//设置用户删除
Route::get('/admin/users/destroy/{id}','admin\UsersController@destroy');

//设置用户信息恢复还原
Route::get('/admin/users/reset/{id}','admin\UsersController@reset');

//设置永久删除数据
Route::get('/admin/users/delete/{id}','admin\UsersController@delete');

//设置用户修改密码
Route::post('admin/users/passupdate/{id}','admin\UsersController@passupdate');




































































