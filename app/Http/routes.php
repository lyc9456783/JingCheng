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
Route::get('/admin/users/destroy','admin\UsersController@destroy');

//设置用户信息恢复还原
Route::get('/admin/users/reset/{id}','admin\UsersController@reset');

//设置永久删除数据
Route::get('/admin/users/delete/{id}','admin\UsersController@delete');

//设置用户修改密码
Route::post('admin/users/passupdate/{id}','admin\UsersController@passupdate');










































































































































































































































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