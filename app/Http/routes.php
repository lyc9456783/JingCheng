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
//cesgu;;;asd
















































































































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
//删除指定单条
Route::get('/admin/links/destroy/{id}','admin\LinksController@destroy')->where('id','[0-9]+');


//轮播图管理
Route::get('/admin/slids','admin\slidsController@index');
Route::get('/admin/slids/create','admin\slidsController@create');
//保存添加
Route::post('/admin/slids/store','admin\slidsController@store');
//编辑修改
Route::get('/admin/slids/edit/{id}','admin\slidsController@edit');
//保存更新
Route::post('/admin/slids/update/{id}','admin\slidsController@update');
//保存更新
Route::get('/admin/slids/show','admin\slidsController@show');
//删除单条轮播
Route::get('/admin/slids/destroy/{id}','admin\slidsController@destroy');
//轮播图回收站
Route::get('/admin/slids/delshow','admin\slidsController@delshow');
//彻底删除用户
Route::get('/admin/slids/delOk/{id}','admin\slidsController@delOk');
Route::get('/admin/slids/restore/{id}','admin\slidsController@restore');
Route::get('/admin/slids/close/{id}','admin\slidsController@restore');
