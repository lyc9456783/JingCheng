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

//测试




























//后台评论
Route::get('/admin/discuss','admin\DiscussController@index');
Route::get('/admin/discuss/create','admin\DiscussController@create');
Route::post('/admin/discuss/store','admin\DiscussController@store');
Route::get('/admin/discuss/edit/{id}','admin\DiscussController@edit');
Route::post('/admin/discuss/update/{id}','admin\DiscussController@update');
Route::get('/admin/discuss/destroy/{id}','admin\DiscussController@destroy');
Route::get('/admin/discuss/delete','admin\DiscussController@delete');
//后台库存
Route::get('/admin/entrepot','admin\EntrepotController@index');
Route::get('/admin/entrepot/create','admin\EntrepotController@create');
//cesgu;;;




