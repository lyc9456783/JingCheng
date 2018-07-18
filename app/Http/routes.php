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
/*===========================李玉成路由部分==============================*/
//前台首页路由

Route::get('/','home\IndexController@index');
// DB::listen(function($sql,$bindigs,$time){
// 	dump($sql);
// });


//前台路由
//前台公告列表
Route::get('/home/notice','home\IndexController@noticelist');
//前台公告详情页面
Route::get('/home/notice/detail/{id}','home\IndexController@noticedetail');
//前台商品列表页路由
Route::get('/home/goods/list/{id}','home\GoodsController@index');



//后台主页路由
Route::group(['middleware'=>'login'],function(){
	
});
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


//商品路由列表
Route::get('/admin/goods','admin\GoodsController@index');
//商品添加页面
Route::get('/admin/goods/create','admin\GoodsController@create');
//商品执行添加
Route::post('/admin/goods/store','admin\GoodsController@store');
//商品修改页面
Route::get('/admin/goods/edit/{id}','admin\GoodsController@edit');
//商品执行修改
Route::post('/admin/goods/update/{id}','admin\GoodsController@update');
//商品软删除
Route::get('/admin/goods/del/{id}','admin\GoodsController@del');
//商品回收站页面
Route::get('/admin/goods/destroy','admin\GoodsController@destroy');
//商品还原
Route::get('/admin/goods/reset/{id}','admin\GoodsController@reset');
//商品永久删除
Route::get('/admin/goods/delete/{id}','admin\GoodsController@delete');
//商品价格修改
Route::get('/admin/goods/show/{id}','admin\GoodsController@show');
//商品价格修改
Route::post('/admin/goods/pedit','admin\GoodsController@pedit');
//商品批量软删除
Route::get('/admin/goods/delall','admin\GoodsController@delall');

//商品图片管理
Route::get('/admin/goodimages','admin\GoodImagesController@index');
//商品图片添加页面
Route::get('/admin/goodimages/create','admin\GoodImagesController@create');
//商品图片添加
Route::post('/admin/goodimages/store','admin\GoodImagesController@store');
//商品图片修改页面
Route::get('/admin/goodimages/edit/{id}','admin\GoodImagesController@edit');
//商品图片修改
Route::post('/admin/goodimages/update/{id}','admin\GoodImagesController@update');
//商品图片删除
Route::get('/admin/goodimages/destroy/{id}','admin\GoodImagesController@destroy');
//批量删除商品图片
Route::get('/admin/goodimages/delall','admin\GoodImagesController@delall');
//查看商品大图
Route::get('/admin/goodimages/show/{id}','admin\GoodImagesController@show');





















































/*===========================叶尚君路由部分==============================*/
//后台评论
Route::get('/admin/discuss','admin\DiscussController@index');
//评论添加
Route::get('/admin/discuss/create','admin\DiscussController@create');
Route::post('/admin/discuss/store','admin\DiscussController@store');
//评论修改
Route::get('/admin/discuss/edit/{id}','admin\DiscussController@edit');
Route::post('/admin/discuss/update/{id}','admin\DiscussController@update');
//评论删除
Route::get('/admin/discuss/destroy/{id}','admin\DiscussController@destroy');
//评论批量删除
Route::get('/admin/discuss/delall','admin\DiscussController@delall');

//后台库存
Route::get('/admin/entrepot','admin\EntrepotController@index');
//库存添加
Route::get('/admin/entrepot/create','admin\EntrepotController@create');
Route::post('/admin/entrepot/store','admin\EntrepotController@store');
//执行上下架切换
Route::get('/admin/entrepot/show/{id}','admin\EntrepotController@show');
//库存修改
Route::get('/admin/entrepot/edit/{id}','admin\EntrepotController@edit');
Route::post('/admin/entrepot/update/{id}','admin\EntrepotController@update');
//库存删除
Route::get('/admin/entrepot/destroy/{id}','admin\EntrepotController@destroy');
//库存批量删除	
Route::get('/admin/entrepot/delall','admin\EntrepotController@delall');

//后台商品推荐
Route::get('/admin/recommend','admin\RecommendController@index');
//创建商品推荐
Route::get('/admin/recommend/create','admin\RecommendController@create');
Route::post('/admin/recommend/store','admin\RecommendController@store');
//修改商品状态
Route::get('/admin/recommend/show/{id}','admin\RecommendController@show');
//查看图片
Route::get('/admin/recommend/img/{id}','admin\RecommendController@img');
//修改商品推荐
Route::get('/admin/recommend/edit/{id}','admin\RecommendController@edit');
Route::post('/admin/recommend/update/{id}','admin\RecommendController@update');
//删除商品推荐
Route::get('/admin/recommend/destroy/{id}','admin\RecommendController@destroy');
//批量删除
Route::get('/admin/recommend/delall','admin\RecommendController@delall');



                                                                                                                                      




































































































/*===========================仇喜龙路由部分==============================*/
//设置用户 批量软删除
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
//设置用户 批量软删除
Route::get('/admin/users/delall','admin\UsersController@delall');
//设置用户信息恢复还原
Route::get('/admin/users/reset/{id}','admin\UsersController@reset');
//设置永久删除数据
Route::get('/admin/users/delete/{id}','admin\UsersController@delete');
//设置用户修改密码
Route::post('/admin/users/passupdate/{id}','admin\UsersController@passupdate');


//订单管理路由
//显示订单添加页面
Route::get('/admin/orders/create','admin\OrdersController@create');
//商品订单添加
Route::post('/admin/orders/store','admin\OrdersController@store');
//商品订单列表页
Route::get('/admin/orders/index','admin\OrdersController@index');
//显示用户订单详情
Route::get('/admin/orders/show/{id}','admin\OrdersController@show');
//用户修改信息
Route::get('/admin/orders/edit/{id}','admin\OrdersController@edit');
//订单信息修改
Route::post('/admin/orders/update/{id}','admin\OrdersController@update');
//设置订单删除
Route::get('/admin/orders/del/{id}','admin\OrdersController@del');
//设置订单删除
Route::get('/admin/orders/destroy','admin\OrdersController@destroy');
//设置订单信息恢复还原
Route::get('/admin/orders/reset/{id}','admin\OrdersController@reset');
//设置永久删除数据
Route::get('/admin/orders/delete/{id}','admin\OrdersController@delete');


//商城公告路由开始
//设置商城公告添加路由
Route::get('/admin/notice/create','admin\NoticeController@create');
//设置公告提交路由
Route::post('/admin/notice/store','admin\NoticeController@store');
//设置公告部分进行显示
Route::get('/admin/notice/index','admin\NoticeController@index');
//设置公告修改路由
Route::get('/admin/notice/edit/{id}','admin\NoticeController@edit');
//设置信息修改提交路由
Route::post('/admin/notice/update/{id}','admin\NoticeController@update');
//设置订单删除
Route::get('/admin/notice/del/{id}','admin\NoticeController@del');
//设置订单删除
Route::get('/admin/notice/destroy','admin\NoticeController@destroy');
//设置订单信息恢复还原
Route::get('/admin/notice/reset/{id}','admin\NoticeController@reset');
//设置永久删除数据
Route::get('/admin/notice/delete/{id}','admin\NoticeController@delete');















































































//测试
Route::get('/mail/send','MailController@send');

//路由 李银昌
//登陆 注册  验证用户名和密码
Route::get('/admin/login','admin\LoginController@index');
Route::post('/admin/login/check','admin\LoginController@check');

//后台登陆中间件

Route::group(['middleware'=>'login'],function(){
	//路由存放------------>


// Route::get('/admin','admin\IndexController@index');


});

//友情链接管理
//友情链接列表
Route::get('/admin/links','admin\LinksController@index'); 
 //添加友情链接
Route::get('/admin/links/create','admin\LinksController@create');
//保存
Route::post('/admin/links/store','admin\LinksController@store');
//修改
Route::get('/admin/links/edit/{id}','admin\LinksController@edit');
//更新修改
Route::post('/admin/links/update/{id}','admin\LinksController@update');
//删除单条
Route::get('/admin/links/destroy/{id}','admin\LinksController@destroy');
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


//网站配置管理
//网站配置首页
Route::get('/admin/config','admin\ConfigController@index');
//保存
Route::post('/admin/config/store','admin\ConfigController@store');






/**  前台路由  李银昌
*
*/

//商品详情页
Route::get('/product/{id}','home\ProductController@index');