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
//首页路由
Route::get('/',function(){
	return view('welcome');
});
//后台主页路由
Route::get('/admin','admin\IndexController@index');






























































































































































































































































































































































































//路由 李银昌
//登陆 注册
Route::get('/admin/login','admin\LoginController@index');
Route::post('/admin/login/check','admin\LoginController@check');


//后台登陆中间件
Route::group(['middleware'=>'login'],function(){
});



//友情链接列表
Route::get('/admin/links','admin\LinksController@index'); 
 //添加友情链接
Route::get('/admin/links/create','admin\LinksController@create');
//保存
Route::post('/admin/links/store','admin\LinksController@store');
//修改
Route::get('/admin/links/edit/{id}','admin\LinksController@edit')->where('id','[0-9]+');
//更新修改
Route::post('/admin/links/update/{id}','admin\LinksController@update')->where('id','[0-9]+');
//删除单条
Route::get('/admin/links/destroy/{id}','admin\LinksController@destroy')->where('id','[0-9]+');
//批量删除
Route::post('/admin/links/destroys','admin\LinksController@destroys');
//批量删除回收站
Route::post('/admin/links/del_delshow','admin\LinksController@del_delshow');
//友情链接回收站
Route::get('/admin/links/delshow','admin\LinksController@delshow');
//友情链接回收站删除
Route::get('/admin/links/delOk/{id}','admin\LinksController@delOk');
//回收站用户还原
Route::get('/admin/links/restore/{id}','admin\LinksController@restore');
//批量删除到回收站

//ajax 传值开启关闭
Route::get('/admin/links/open/{id}','admin\LinksController@open');
Route::get('/admin/links/close/{id}','admin\LinksController@close');


//轮播图管理
//轮播图列表
Route::get('/admin/slids','admin\SlidsController@index');
//轮播图添加
Route::get('/admin/slids/create','admin\SlidsController@create');
//保存添加
Route::post('/admin/slids/store','admin\SlidsController@store');
//编辑修改
Route::get('/admin/slids/edit/{id}','admin\SlidsController@edit');
//保存更新
Route::post('/admin/slids/update/{id}','admin\SlidsController@update');
//轮播图展示
Route::get('/admin/slids/show','admin\SlidsController@show');
//删除单条轮播
Route::get('/admin/slids/destroy/{id}','admin\SlidsController@destroy');
//批量删除
Route::post('/admin/slids/destroys','admin\SlidsController@destroys');
//批量删除回收站
Route::post('/admin/slids/deldelshow','admin\SlidsController@deldelshow');
//轮播图回收站列表
Route::get('/admin/slids/delshow','admin\SlidsController@delshow');
//彻底删除用户
Route::get('/admin/slids/delOk/{id}','admin\SlidsController@delOk');
//回收站用户还原
Route::get('/admin/slids/restore/{id}','admin\SlidsController@restore');
//ajax 传值开启关闭
Route::get('/admin/slids/open/{id}','admin\SlidsController@open');
Route::get('/admin/slids/close/{id}','admin\SlidsController@close');


//网站配置
//网站配置首页
Route::get('/admin/config','admin\ConfigController@index');
//保存
Route::post('/admin/config/store','admin\ConfigController@store');



//Route::get('/admin/abc','admin\ConfigController@abc');
//练习
Route::get('/admin/citys','admin\CitysController@index');
Route::get('/admin/citys/create','admin\CitysController@create');
Route::post('/admin/citys/store','admin\CitysController@store');