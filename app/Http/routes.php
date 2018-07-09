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

Route::get('/', function () {
    return view('welcome');
});

//后台首页
Route::get('/admin','admin\IndexController@index');

//分类路由列表
Route::get('/admin/cates','admin\CatesController@index');
//分类添加
Route::get('/admin/cates/create','admin\CatesController@create');
//分类执行添加
Route::post('/admin/cates/store','admin\CatesController@store');
//分类修改页面
Route::get('/admin/cates/edit/{id}','admin\CatesController@edit');
//执行修改
Route::post('/admin/cates/update/{id}','admin\CatesController@update');
//分类删除页面
Route::get('/admin/cates/destroy/{id}','admin\CatesController@destroy');
//分类回收站
Route::get('/admin/cates/getdel','admin\CatesController@getdel');
//分类还原
Route::get('/admin/cates/reset/{id}','admin\CatesController@reset');
//分类永久删除
Route::get('/admin/cates/delete/{id}','admin\CatesController@delete');