<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="Generator" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="" />
        <meta name="Description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>京城</title>
        <link rel="shortcut icon" href="/home/logo/favicon.ico" />
        <link href="/home/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/home/css/index.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/admins/lib/layui/css/layui.css">
        <script src="/admins/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/home/js/common.js"></script>
        <script type="text/javascript" src="/home/js/index.js"></script>
        <script type="text/javascript" src="/home/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="/home/js/jquery.json.js"></script>
        <script type="text/javascript" src="/home/js/transport_jquery.js"></script>
        <script type="text/javascript" src="/home/js/utils.js"></script>
        <script type="text/javascript" src="/home/js/jquery.superslide.js"></script>
        <script type="text/javascript" src="/home/js/xiaomi_common.js"></script>
    </head>
    <body>
        <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("请输入搜索关键词！");
            return false;
        }
    }
    -->
    
    </script>
    <div class="site-topbar">
      <div class="container">
                <div class="topbar-nav">
                          <a href="mobile"  class="snc-link snc-order">手机版</a>
                <span class="sep">|</span>                        <a href="#"  target="_blank"  class="snc-link snc-order">MIUI</a>
                <span class="sep">|</span>                        <a href="#"  target="_blank"  class="snc-link snc-order">米聊</a>
                <span class="sep">|</span>                        <a href="#"  target="_blank"  class="snc-link snc-order">游戏</a>
                <span class="sep">|</span>                        <a href="#"  target="_blank"  class="snc-link snc-order">多看阅读</a>
                <span class="sep">|</span>                        <a href="#"  target="_blank"  class="snc-link snc-order">云服务</a>
                <span class="sep">|</span>                        <a href="/mobile"  target="_blank"  class="snc-link snc-order">移动版商城</a>
                <span class="sep">|</span>                        <a href="#"  class="snc-link snc-order">Select region</a>
                <span class="sep">|</span>                        <a href="article_cat.php?id=3"  class="snc-link snc-order">网店帮助分类</a>
                <span class="sep">|</span>                        <a href="message.php"  target="_blank"  class="snc-link snc-order">留言板</a>
                <span class="sep">|</span>                        <a href="goods.php?id=104"  class="snc-link snc-order">会员等级商品测试</a>
                                    </div>
                    <div class="topbar-cart" id="ECS_CARTINFO">
                <a class="cart-mini " href="flow.php">
      <i class="layui-icon">&#xe657;</i>   
        购物车
        <span class="mini-cart-num J_cartNum" id="hd_cartnum">(0)</span>
    </a>
    <div id="J_miniCartList" class="cart-menu">
          <p class="loading">购物车中还没有商品，赶紧选购吧！</p>
         
    </div>
    <script type="text/javascript">
    function deleteCartGoods(rec_id)
    {
      Ajax.call('delete_cart_goods.php', 'id='+rec_id, deleteCartGoodsResponse, 'POST', 'JSON');
    }

    /**
     * 接收返回的信息
     */
    function deleteCartGoodsResponse(res)
    {
      if (res.error)
      {
        alert(res.err_msg);
      }
      else
      {
        $("#ECS_CARTINFO").html(res.content);
      }
    }
    </script>

    @if (session('success'))
         <script type="text/javascript">
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg("{{session('success')}}");
            });
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg("{{session('error')}}");
            }); 
        </script>
    @endif         
    </div>
            <div class="topbar-info J_userInfo" id="ECS_MEMBERZONE">
              
            @if(!session('homeflag') == true)
              <a class="link" href="/home/login/index" rel="nofollow">登录</a>
              <span class="sep">|</span>
              <a class="link" href="/home/login/create" rel="nofollow">注册</a>
            @else
                  @if(session("homeuser")['grade'] <= 2)
                  <span class="user">
                    <a class="user-name" target="_blank" href=""><span class="name">{{session("homeuser")['username']}}</span><i class="iconfont"></i></a>
                      <ul class="user-menu" style="display: none;">
                          <li><a target="_blank" href="/admin">后台管理</a></li>
                          <li><a href="/home/login/logout">退出登录</a></li>
                      </ul>
                  </span>  
                  @else
                  <span class="user">
                  <a class="user-name" target="_blank" href=""><span class="name">{{session("homeuser")['username']}}</span><i class="iconfont"></i></a>
                    <ul class="user-menu" style="display: none;">
                        <li><a target="_blank" href="/home/users/index">个人中心</a></li>
                        <li><a target="_blank" href="">我的收藏</a></li>
                        <li><a target="_blank" href="">我的评论</a></li>
                        <li><a href="/home/login/logout">退出登录</a></li>
                    </ul>
                </span>
                <span class="sep">|</span>
                <a href="/home/orders/index" class="link">我的订单</a> 
                </div>
                  @endif  
              @endif
            </div>
        </div>
    </div>

    <div class="site-header" style="clear:both;">
      <div class="container">
          <div class="header-logo">
              <a href="index.php" title="diaoyu666"><img src="/home/picture/logo.gif" /></a>
            </div>
            <div class="header-nav">
              <ul class="nav-list">
                  <li class="nav-category">
                      <a class="btn-category-list" href="catalog.php" style="display:none;">全部商品分类</a>
                      <div class="site-category ">
                          <ul class="site-category-list clearfix" id="site-category-list">
                            @foreach ($cates as $k=>$v)
                            <li class="category-item">
                              <a class="title" href="category.php?id=76">{{$v->classname}}<i class="layui-icon">&#xe602;</i></a>
                                <div class="children clearfix">
                                    <ul class="children-list">   
                                  @foreach($v->categoods as $key=>$val)
                                        $k = $key+1;
                                        @if($k%6 == 0)
                                          </ul>
                                          <ul>
                                            <li style="text-left;">
                                              <a href="" class="link">
                                                  <img class="thumb" src="{{$val->pic}}" width="40" height="40">
                                                  <span>{{$val->name}}</span>
                                                </a>
                                            </li>
                                        @else
                                         <li style="text-left;">
                                          <a href="" class="link">
                                              <img class="thumb" src="{{$val->pic}}" width="40" height="40">
                                              <span>{{$val->name}}</span>
                                            </a>
                                        </li>
                                        @endif
                                      @endforeach
                                    </ul>
                              </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @foreach ($cates as $k=>$v)
                <li class="nav-item">
                  <a class="link" href="category.php?id=76"  ><span>{{$v->classname}}</span></a>
                  <div class='item-children'>
                      <div class="container">
                          <ul class="children-list clearfix">
                              @foreach($v->categoods as $key=>$val)
                              <li class="first">
                                  <div class="figure figure-thumb">
                                  <a href="javascript:;">
                                    <img src="{{$val->pic}}">
                                    </a>
                                  </div>
                                  <div class="title"><a href="goods.php?id=27">{{$val->name}}</a></div>
                                  <p class="price">{{$val->discount}}<em>元</em>元</p>
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                </li>
                @endforeach
              </ul>
          </div>
        <div class="header-search">
          <form action="search.php" method="get" id="searchForm" name="searchForm" onSubmit="return checkSearchForm()" class="search-form clearfix">
              <label class="hide">站内搜索</label>
            <input class="search-text" type="text" name="keywords" id="keyword" value="" autocomplete="off">
            <input type="hidden" value="k1" name="dataBi">
            <button type="submit" class="search-btn iconfont"><i class="layui-icon">&#xe615;</i> </button>
              <div class="hot-words" >
                <a href="search.php?keywords=%E5%B0%8F%E7%B1%B3%E6%89%8B%E7%8E%AF" target="_blank">小米手环</a>  
                <a href="search.php?keywords=%E8%80%B3%E6%9C%BA" target="_blank">耳机</a>  
                <a href="search.php?keywords=%E6%8F%92%E7%BA%BF%E6%9D%BF" target="_blank">插线板</a>                 
              </div>
          </form>
        </div>
 
    </div>
	<div id="J_navMenu" class="header-nav-menu" style="display: none;">
    	<div class="container"></div>
    </div>
</div>
 
<script type="text/javascript" src="/home/js/xiaomi_index.js"></script><div class="home-hero-container container">
	<div class="home-hero">
    <div class="home-hero-slider">
			
			<div id="J_homeSlider" class="xm-slider" style="overflow:hidden;">
      	<div class="xm-slider-container">
          	<div class="xm-slider-control">
                  @foreach ($slids as $k=>$v)
                  <div class="slide xm-slider-slide">
                      <a target="_blank" href="{{$v['surl']}}">
                          <img src="{{$v['simg']}}"/>
                      </a>
                  </div>
                  @endforeach
            </div>
          </div>
          <a class="xm-slider-previous xm-slider-navigation icon-slides icon-slides-prev prev" href="#" style="display:none;">上一张</a>
      	<a class="xm-slider-next xm-slider-navigation icon-slides icon-slides-next next" href="#" style="display: none;">下一张</a>
          <ul class="xm-slider-pagination">
              @foreach ($slids as $k=>$v)
          	  <li class="xm-slider-pagination-item">
                  <a href="javascript:;" class="active">1</a>
              </li>
              @endforeach
          </ul>
      </div>
    </div>    
        <div class="home-hero-sub row">
            <div  style="border:1px solid blue;width:234px;height:170px;margin-left:12px;float:left">
                公告区域 
            </div>
            <div class="span16" style="float:left;">
  	           <ul class="home-promo-list clearfix">
                  @foreach ($recommend1 as $k=>$v)
                  <li class="first" style="margin-left:9px;">
                    <a href='#' target='_blank'>
                      <img src='{{$v->rimg}}' width='316' height='170' border='0' />
                    </a>
                  </li>
                  @endforeach
               </ul>
            </div>
        </div>
        
    </div>
    <div class="home-star-goods xm-carousel-container">
    	
<div class="xm-plain-box J_starGoodsCarousel">
	<div class="box-hd">
    	<h2 class="title">
			小米明星单品
        </h2>
        <div class="more">
        	<div class="xm-controls xm-controls-line-small xm-carousel-controls">
            	<a class="control control-prev iconfont" href="javascript: void(0);"><</a>
				<a class="control control-next iconfont" href="javascript: void(0);">></a>
            </div>
        </div>
    </div>
    <div class="box-bd">
    	<div class="xm-carousel-wrapper J_carouselWrap">
        	<ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList">
            	      @foreach ($recommend2 as $k=>$v)
                    <li class="rainbow-item-1">
                    	<a class="thumb" href="goods.php?id=27" target="_blank">
                        	<img src="{{$v->rimg}}" />
                        </a>
                        <h3 class="title">
                        	<a href="#" target="_blank">{{$v->goodrecommend['name']}}</a>
                        </h3>
                        <p class="desc">{{$v->goodrecommend['intro']}}</p>
                    </li>
                    @endforeach
            </ul>
        </div>
    </div>
</div>
 
 
    </div>
</div>
<div class="page-main home-main">
	<div class="container">
	 
<div class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
	
	<div class="box-hd">
        <h2 class="title">路由器与智能硬件</h2>
        <div class="more J_brickNav">
            <a class="more-link" href="category.php?id=80" style=" display:inline-block;">
                查看全部<i class="layui-icon">&#xe602;</i>
            </a>
            <ul class="tab-list J_brickTabSwitch">
            	<li class="tab-active">热门</li>
                                            	<li>小米手环</li>
                                                            	<li>智能灯泡</li>
                                                            	<li>摄像机</li>
                                                            	<li>智能家庭套装</li>
                                                                                                                                                                                                                                                                                                                                            </ul>
        </div>
    </div>
    
    <div class="box-bd J_brickBd">
    	<div class="row">
        	<div class="span4 span-first">
                <ul class="brick-promo-list clearfix">
                                      <li class="brick-item brick-item-l">
                            <a target="_blank" href="affiche.php?ad_id=16&amp;uri=http%3A%2F%2Fwww.ecshop119.com"> <img src="/home/picture/1439256935405590666.jpg" width="234" height="614"/> </a>                     </li>
                                  </ul>
                
            </div>
            <div class="span16">
            
            	
            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=35">
                              <img src="/home/picture/35_thumb_g_1437081702649.jpg" width="160" height="160" alt="小米空气净化器">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=35">小米空气净化器</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          899<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=40">
                              <img src="/home/picture/40_thumb_g_1437082798686.jpg" width="160" height="160" alt="小米体重秤">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=40">小米体重秤</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          99<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=32">
                              <img src="/home/picture/32_thumb_g_1437075765802.jpg" width="160" height="160" alt="小米路由器 mini">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=32">小米路由器 mini</a>
                      </h3>
                      <p class="desc">主流双频AC智能路由器，性价比之王</p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=33">
                              <img src="/home/picture/33_thumb_g_1437075865379.jpg" width="160" height="160" alt="小蚁智能摄像机 标准">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=33">小蚁智能摄像机 标准</a>
                      </h3>
                      <p class="desc">能看能听能说，手机远程观看</p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=34">
                              <img src="/home/picture/34_thumb_g_1437076036973.jpg" width="160" height="160" alt="小蚁运动相机">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=34">小蚁运动相机</a>
                      </h3>
                      <p class="desc">边玩边录边拍，手机随时分享</p>
                      <p class="price">
                          399<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=104">
                              <img src="/home/picture/104_thumb_g_1450022336692.jpg" width="160" height="160" alt="商品会员等级测试">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=104">商品会员等级测试</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          249<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=67">
                              <img src="/home/picture/67_thumb_g_1440983638116.jpg" width="160" height="160" alt="小米手环">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=67">小米手环</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          69<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=65">
                              <img src="/home/picture/65_thumb_g_1440983430401.jpg" width="160" height="160" alt="全新小米路由器">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=65">全新小米路由器</a>
                      </h3>
                      <p class="desc">顶配企业级性能，最高内置6TB监控级硬盘</p>
                      <p class="price">
                          699<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                                        </ul>
                
                
            	                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=67">
                              <img src="/home/picture/67_thumb_g_1440983638116.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=67">小米手环</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          69<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                  </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=33">
                              <img src="/home/picture/33_thumb_g_1437075865379.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=33">小蚁智能摄像机 标准</a>
                      </h3>
                      <p class="desc">能看能听能说，手机远程观看</p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=42">
                              <img src="/home/picture/42_thumb_g_1437082936092.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=42">小米蓝牙手柄</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          99<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                                                                                                                                                                                                                                                                                                            </div>
        </div>
    </div>
</div><div class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
	
	<div class="box-hd">
        <h2 class="title">耳机音箱与存储卡</h2>
        <div class="more J_brickNav">
            <a class="more-link" href="category.php?id=101" style=" display:inline-block;">
                查看全部<i class="layui-icon">&#xe602;</i>
            </a>
            <ul class="tab-list J_brickTabSwitch">
            	<li class="tab-active">热门</li>
                                            	<li>品牌耳机</li>
                                                            	<li>小米活塞耳机</li>
                                                            	<li>存储卡</li>
                                                            	<li>小米蓝牙耳机</li>
                                                                                                            </ul>
        </div>
    </div>
    
    <div class="box-bd J_brickBd">
    	<div class="row">
        	<div class="span4 span-first">
                <ul class="brick-promo-list clearfix">
                                      <li class="brick-item brick-item-m">
                            <a target="_blank" href="affiche.php?ad_id=19&amp;uri=http%3A%2F%2Fwww.ecshop119.com"> <img src="/home/picture/1439257211458415529.jpg" width="234" height="300"/> </a>                     </li>
                    <li class="brick-item brick-item-m">
                            <a target="_blank" href="affiche.php?ad_id=20&amp;uri=http%3A%2F%2Fwww.ecshop119.com"> <img src="/home/picture/1439257230078103078.jpg" width="234" height="300"/> </a>                     </li>
                                  </ul>
                
            </div>
            <div class="span16">
            
            	
            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=38">
                              <img src="/home/picture/38_thumb_g_1437082667838.jpg" width="160" height="160" alt="小米活塞耳机 炫彩版">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=38">小米活塞耳机 炫彩版</a>
                      </h3>
                      <p class="desc">适合出街的耳机</p>
                      <p class="price">
                          39<em>元</em>                      </p>
                      <p class="rank">7人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 跟女神版超配的。颜值高。</span>
                              <span class="author"> 来自于 匿名用户 的评价 </span>
                          </a>
                      </div>
                                                                                                                                                                                                                                                                                                                                      </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=45">
                              <img src="/home/picture/45_thumb_g_1437092199733.jpg" width="160" height="160" alt="小米活塞耳机标准版">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=45">小米活塞耳机标准版</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          89<em>元</em>                      </p>
                      <p class="rank">3人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> dsad</span>
                              <span class="author"> 来自于 匿名用户 的评价 </span>
                          </a>
                      </div>
                                                                                                                                                      </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=46">
                              <img src="/home/picture/46_thumb_g_1437092278369.jpg" width="160" height="160" alt="小钢炮蓝牙音箱">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=46">小钢炮蓝牙音箱</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=102">
                              <img src="/home/picture/102_thumb_g_1441738765271.jpg" width="160" height="160" alt="QCY 杰克J02蓝牙耳机">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=102">QCY 杰克J02蓝牙耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          97<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=101">
                              <img src="/home/picture/101_thumb_g_1441738730692.jpg" width="160" height="160" alt="中锘基B97S运动蓝牙耳机">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=101">中锘基B97S运动蓝牙耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          119<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=64">
                              <img src="/home/picture/64_thumb_g_1440983246324.jpg" width="160" height="160" alt="魔声Beats Studio HD 2.0耳机">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=64">魔声Beats Studio HD 2.0耳机</a>
                      </h3>
                      <p class="desc">适用于 小米平板, 所有小米手机</p>
                      <p class="price">
                          2699<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=59">
                              <img src="/home/picture/59_thumb_g_1440983020324.jpg" width="160" height="160" alt="小米方盒子蓝牙音箱">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=59">小米方盒子蓝牙音箱</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          99<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=60">
                              <img src="/home/picture/60_thumb_g_1440983103483.jpg" width="160" height="160" alt="先锋APS-BA202蓝牙音箱">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=60">先锋APS-BA202蓝牙音箱</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          229<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                                                                            </ul>
                
                
            	                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=103">
                              <img src="/home/picture/103_thumb_g_1441738795942.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=103">好站长社区铁三角COR150入耳式耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          139<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=102">
                              <img src="/home/picture/102_thumb_g_1441738765271.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=102">QCY 杰克J02蓝牙耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          97<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=101">
                              <img src="/home/picture/101_thumb_g_1441738730692.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=101">中锘基B97S运动蓝牙耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          119<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=100">
                              <img src="/home/picture/100_thumb_g_1441738698084.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=100">铁三角CLR100耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          178<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=99">
                              <img src="/home/picture/99_thumb_g_1441738667754.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=99">捷波朗EASY–CALL蓝牙耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          179<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=98">
                              <img src="/home/picture/98_thumb_g_1441738620606.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=98">铁三角J100耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          79<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=97">
                              <img src="/home/picture/97_thumb_g_1441738581513.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=97">先锋CL31系列入耳式耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          99<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=95">
                              <img src="/home/picture/95_thumb_g_1441738494824.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=95">先锋SE-MJ512折叠式头戴耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          168<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=38">
                              <img src="/home/picture/38_thumb_g_1437082667838.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=38">小米活塞耳机 炫彩版</a>
                      </h3>
                      <p class="desc">适合出街的耳机</p>
                      <p class="price">
                          39<em>元</em>                      </p>
                      <p class="rank">7人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 跟女神版超配的。颜值高。</span>
                              <span class="author"> 来自于 匿名用户 的评价 </span>
                          </a>
                      </div>
                                                                                                                                                                                                                                                                                                                                      </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=45">
                              <img src="/home/picture/45_thumb_g_1437092199733.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=45">小米活塞耳机标准版</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          89<em>元</em>                      </p>
                      <p class="rank">3人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> dsad</span>
                              <span class="author"> 来自于 匿名用户 的评价 </span>
                          </a>
                      </div>
                                                                                                                                                      </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=47">
                              <img src="/home/picture/47_thumb_g_1439331077002.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=47">米兔手机U盘升级版</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          50<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=96">
                              <img src="/home/picture/96_thumb_g_1441738537157.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=96">QCY派Q8蓝牙耳机</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          60<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=83">
                              <img src="/home/picture/83_thumb_g_1441052403875.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=83">小米蓝牙耳机</a>
                      </h3>
                      <p class="desc">6.5克轻巧，蓝牙4.1高清通话音质</p>
                      <p class="price">
                          79<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                                                                            </div>
        </div>
    </div>
</div><div class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
	
	<div class="box-hd">
        <h2 class="title">插线板、移动电源与电池</h2>
        <div class="more J_brickNav">
            <a class="more-link" href="category.php?id=94" style=" display:inline-block;">
                查看全部<i class="layui-icon">&#xe602;</i>
            </a>
            <ul class="tab-list J_brickTabSwitch">
            	<li class="tab-active">热门</li>
                                            	<li>电池</li>
                                                            	<li>品牌移动电源</li>
                                                            	<li>充电器</li>
                                                            	<li>小米移动电源</li>
                                                                                                            </ul>
        </div>
    </div>
    
    <div class="box-bd J_brickBd">
    	<div class="row">
        	<div class="span4 span-first">
                <ul class="brick-promo-list clearfix">
                                      <li class="brick-item brick-item-m">
                            <a target="_blank" href="affiche.php?ad_id=17&amp;uri=http%3A%2F%2Fwww.ecshop119.com"> <img src="/home/picture/1439257063359182674.jpg" width="234" height="300"/> </a>                     </li>
                    <li class="brick-item brick-item-m">
                            <a target="_blank" href="affiche.php?ad_id=18&amp;uri=http%3A%2F%2Fwww.ecshop119.com"> <img src="/home/picture/1439257083300448761.jpg" width="234" height="300"/> </a>                     </li>
                                  </ul>
                
            </div>
            <div class="span16">
            
            	
            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=44">
                              <img src="/home/picture/44_thumb_g_1437092148601.jpg" width="160" height="160" alt="小米移动电源5000mAh">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=44">小米移动电源5000mAh</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=75">
                              <img src="/home/picture/75_thumb_g_1440984011595.jpg" width="160" height="160" alt="多彩电源适配器">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=75">多彩电源适配器</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          20<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=71">
                              <img src="/home/picture/71_thumb_g_1440983839269.jpg" width="160" height="160" alt="红米Note电池">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=71">红米Note电池</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=72">
                              <img src="/home/picture/72_thumb_g_1440983887661.jpg" width="160" height="160" alt="红米note 2原装电池">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=72">红米note 2原装电池</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=73">
                              <img src="/home/picture/73_thumb_g_1440983937959.jpg" width="160" height="160" alt="刀锋移动电源">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=73">刀锋移动电源</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          299<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=74">
                              <img src="/home/picture/74_thumb_g_1440983959230.jpg" width="160" height="160" alt="萨摩小狗移动电源">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=74">萨摩小狗移动电源</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          128<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=68">
                              <img src="/home/picture/68_thumb_g_1440983695997.jpg" width="160" height="160" alt="多彩便携USB线20CM">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=68">多彩便携USB线20CM</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          19<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=69">
                              <img src="/home/picture/69_thumb_g_1440983751530.jpg" width="160" height="160" alt="小米千兆网线">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=69">小米千兆网线</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          15<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                
                
            	                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=72">
                              <img src="/home/picture/72_thumb_g_1440983887661.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=72">红米note 2原装电池</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=71">
                              <img src="/home/picture/71_thumb_g_1440983839269.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=71">红米Note电池</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=70">
                              <img src="/home/picture/70_thumb_g_1440983810214.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=70">红米2/2A原装电池</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=75">
                              <img src="/home/picture/75_thumb_g_1440984011595.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=75">多彩电源适配器</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          20<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=74">
                              <img src="/home/picture/74_thumb_g_1440983959230.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=74">萨摩小狗移动电源</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          128<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=73">
                              <img src="/home/picture/73_thumb_g_1440983937959.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=73">刀锋移动电源</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          299<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                  </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=44">
                              <img src="/home/picture/44_thumb_g_1437092148601.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=44">小米移动电源5000mAh</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=31">
                              <img src="/home/picture/31_thumb_g_1437075539254.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=31">小米移动电源10000mAh</a>
                      </h3>
                      <p class="desc">松下/LG高密度进口电芯</p>
                      <p class="price">
                          79<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=41">
                              <img src="/home/picture/41_thumb_g_1437082849514.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=41">小米移动电源16000mAh</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          109<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                                                                            </div>
        </div>
    </div>
</div><div class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
	
	<div class="box-hd">
        <h2 class="title">小米生活方式</h2>
        <div class="more J_brickNav">
            <a class="more-link" href="category.php?id=118" style=" display:inline-block;">
                查看全部<i class="layui-icon">&#xe602;</i>
            </a>
            <ul class="tab-list J_brickTabSwitch">
            	<li class="tab-active">热门</li>
                                            	<li>T恤</li>
                                                            	<li>POLO衫</li>
                                                            	<li>生活周边</li>
                                                            	<li>米兔</li>
                                                                                                                                                                            </ul>
        </div>
    </div>
    
    <div class="box-bd J_brickBd">
    	<div class="row">
        	<div class="span4 span-first">
                <ul class="brick-promo-list clearfix">
                                      <li class="brick-item brick-item-m">
                            <a target="_blank" href="affiche.php?ad_id=21&amp;uri=http%3A%2F%2Fwww.ecshop119.com"> <img src="/home/picture/1439257305251304063.jpg" width="234" height="300"/> </a>                     </li>
                    <li class="brick-item brick-item-m">
                            <a target="_blank" href="affiche.php?ad_id=22&amp;uri=http%3A%2F%2Fwww.ecshop119.com"> <img src="/home/picture/1439257325691545396.jpg" width="234" height="300"/> </a>                     </li>
                                  </ul>
                
            </div>
            <div class="span16">
            
            	
            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=94">
                              <img src="/home/picture/94_thumb_g_1441056891849.jpg" width="160" height="160" alt="猫的秘密">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=94">猫的秘密</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          199<em>元</em>                      </p>
                      <p class="rank">1人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 猫儿很可爱，女朋友戴上萌萌哒</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                              </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=43">
                              <img src="/home/picture/43_thumb_g_1437091900155.jpg" width="160" height="160" alt="小蚁蓝牙自拍杆">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=43">小蚁蓝牙自拍杆</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">1人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 超级帅的自拍杆，还可以伸缩，方便携带</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                              </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=39">
                              <img src="/home/picture/39_thumb_g_1437082747983.jpg" width="160" height="160" alt="小米水质TDS检测笔">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=39">小米水质TDS检测笔</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          39<em>元</em>                      </p>
                      <p class="rank">3人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 方便实用</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                                                                                                                      </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=89">
                              <img src="/home/picture/89_thumb_g_1441056597778.jpg" width="160" height="160" alt="纯色开衫卫衣 女款">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=89">纯色开衫卫衣 女款</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=90">
                              <img src="/home/picture/90_thumb_g_1441056659073.jpg" width="160" height="160" alt="企鹅版米兔">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=90">企鹅版米兔</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">1人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 米兔的眼神好呆</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                              </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=91">
                              <img src="/home/picture/91_thumb_g_1441056702928.jpg" width="160" height="160" alt="简约多功能双肩包">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=91">简约多功能双肩包</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          99<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=92">
                              <img src="/home/picture/92_thumb_g_1441056728120.jpg" width="160" height="160" alt="小米鼠标垫">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=92">小米鼠标垫</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          5<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=93">
                              <img src="/home/picture/93_thumb_g_1441056767939.jpg" width="160" height="160" alt="小米百变随身杯">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=93">小米百变随身杯</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          39<em>元</em>                      </p>
                      <p class="rank">1人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 刚买就掉地上了，但是质量很坚固，没有摔坏</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                              </li>
                                                    </ul>
                
                
            	                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=89">
                              <img src="/home/picture/89_thumb_g_1441056597778.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=89">纯色开衫卫衣 女款</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">0人评价</p>
                                        </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                  </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=43">
                              <img src="/home/picture/43_thumb_g_1437091900155.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=43">小蚁蓝牙自拍杆</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          129<em>元</em>                      </p>
                      <p class="rank">1人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 超级帅的自拍杆，还可以伸缩，方便携带</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                              </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=39">
                              <img src="/home/picture/39_thumb_g_1437082747983.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=39">小米水质TDS检测笔</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          39<em>元</em>                      </p>
                      <p class="rank">3人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 方便实用</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                                                                                                                      </li>
                                                                        <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=93">
                              <img src="/home/picture/93_thumb_g_1441056767939.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=93">小米百变随身杯</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          39<em>元</em>                      </p>
                      <p class="rank">1人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 刚买就掉地上了，但是质量很坚固，没有摔坏</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                              </li>
                                                    </ul>
                                                            	<ul class="brick-list clearfix">
                                                      <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="goods.php?id=90">
                              <img src="/home/picture/90_thumb_g_1441056659073.jpg" width="160" height="160" alt="">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="goods.php?id=90">企鹅版米兔</a>
                      </h3>
                      <p class="desc"></p>
                      <p class="price">
                          49<em>元</em>                      </p>
                      <p class="rank">1人评价</p>
                                                                  <div class="review-wrapper">
                          <a href="javascript:void(0)">
                              <span class="review"> 米兔的眼神好呆</span>
                              <span class="author"> 来自于 vip 的评价 </span>
                          </a>
                      </div>
                                                              </li>
                                                    </ul>
                                                                                                                                                                            </div>
        </div>
    </div>
</div>
      <div class="home-star-goods recommend-for-you">
      
<div class="xm-plain-box">
	<div class="box-hd">
    	<h2 class="title">
			为你推荐
        </h2>
        <div class="more">
        	<div class="xm-controls xm-controls-line-small xm-carousel-controls">
            	<a class="control control-prev iconfont" href="javascript: void(0);"><</a>
				<a class="control control-next iconfont" href="javascript: void(0);">></a>
            </div>
        </div>
    </div>
    <div class="box-bd">
    	<div class="xm-carousel-wrapper J_carouselWrap">
        	<ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList">
            	                	<li>
                    	<a class="thumb" href="goods.php?id=27" target="_blank">
                        	<img src="/home/picture/27_thumb_g_1437074702008.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=27" target="_blank">小米电视2 40英寸</a>
                        </h3>
                        <p class="price">2200<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=38" target="_blank">
                        	<img src="/home/picture/38_thumb_g_1437082667838.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=38" target="_blank">小米活塞耳机 炫彩版</a>
                        </h3>
                        <p class="price">39<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=94" target="_blank">
                        	<img src="/home/picture/94_thumb_g_1441056891849.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=94" target="_blank">猫的秘密</a>
                        </h3>
                        <p class="price">199<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=35" target="_blank">
                        	<img src="/home/picture/35_thumb_g_1437081702649.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=35" target="_blank">小米空气净化器</a>
                        </h3>
                        <p class="price">899<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=43" target="_blank">
                        	<img src="/home/picture/43_thumb_g_1437091900155.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=43" target="_blank">小蚁蓝牙自拍杆</a>
                        </h3>
                        <p class="price">129<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=28" target="_blank">
                        	<img src="/home/picture/28_thumb_g_1437074792369.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=28" target="_blank">小米平板 16G</a>
                        </h3>
                        <p class="price">1299<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=44" target="_blank">
                        	<img src="/home/picture/44_thumb_g_1437092148601.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=44" target="_blank">小米移动电源5000mAh</a>
                        </h3>
                        <p class="price">49<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=29" target="_blank">
                        	<img src="/home/picture/29_thumb_g_1437074933275.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=29" target="_blank">小米盒子增强版 1G</a>
                        </h3>
                        <p class="price">299<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=45" target="_blank">
                        	<img src="/home/picture/45_thumb_g_1437092199733.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=45" target="_blank">小米活塞耳机标准版</a>
                        </h3>
                        <p class="price">89<em>元</em></p>
                    </li>
                                	<li>
                    	<a class="thumb" href="goods.php?id=46" target="_blank">
                        	<img src="/home/picture/46_thumb_g_1437092278369.jpg" />
                        </a>
                        <h3 class="title">
                        	<a href="goods.php?id=46" target="_blank">小钢炮蓝牙音箱</a>
                        </h3>
                        <p class="price">129<em>元</em></p>
                    </li>
                            </ul>
        </div>
    </div>
</div>
 
 
      </div>
      
      <div id="hot-comment" class="home-review-box xm-plain-box J_itemBox J_reviewBox is-visible">
		  <div class="box-hd">
	<h2 class="title">热评产品</h2>
</div>
<div class="box-bd J_brickBd">
	<ul class="review-list clearfix">
    	            	<li class="review-item review-item-first">
        	<div class="figure figure-img"><a href="goods.php?id=45"><img src="/home/picture/45_thumb_g_1437092199733.jpg" width="296" height="220" alt="小米活塞耳机标准版"></a></div>
            <p class="review"><a href="goods.php?id=45">dsad</a></p>
            <p class="author">来自于 匿名用户 的评价</p>
            <div class="info">
            	<h3 class="title"><a href="goods.php?id=45">小米活塞耳机标准版</a></h3>
                <span class="sep">|</span>
                <p class="price">89.00</p>
            </div>
        </li>
                            	<li class="review-item">
        	<div class="figure figure-img"><a href="goods.php?id=45"><img src="/home/picture/45_thumb_g_1437092199733.jpg" width="296" height="220" alt="小米活塞耳机标准版"></a></div>
            <p class="review"><a href="goods.php?id=45">dddd</a></p>
            <p class="author">来自于 匿名用户 的评价</p>
            <div class="info">
            	<h3 class="title"><a href="goods.php?id=45">小米活塞耳机标准版</a></h3>
                <span class="sep">|</span>
                <p class="price">89.00</p>
            </div>
        </li>
                            	<li class="review-item">
        	<div class="figure figure-img"><a href="goods.php?id=93"><img src="/home/picture/93_thumb_g_1441056767939.jpg" width="296" height="220" alt="小米百变随身杯"></a></div>
            <p class="review"><a href="goods.php?id=93">刚买就掉地上了，但是质量很坚固，没有摔坏</a></p>
            <p class="author">来自于 vip 的评价</p>
            <div class="info">
            	<h3 class="title"><a href="goods.php?id=93">小米百变随身杯</a></h3>
                <span class="sep">|</span>
                <p class="price">39.00</p>
            </div>
        </li>
                            	<li class="review-item">
        	<div class="figure figure-img"><a href="goods.php?id=39"><img src="/home/picture/39_thumb_g_1437082747983.jpg" width="296" height="220" alt="小米水质TDS检测笔"></a></div>
            <p class="review"><a href="goods.php?id=39">方便实用</a></p>
            <p class="author">来自于 vip 的评价</p>
            <div class="info">
            	<h3 class="title"><a href="goods.php?id=39">小米水质TDS检测笔</a></h3>
                <span class="sep">|</span>
                <p class="price">39.00</p>
            </div>
        </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </ul>
</div>
 
      </div>
      
    </div>
</div>
<div id="J_modalVideo" class="modal modal-video fade modal-hide">
	<div class="modal-hd">
    	<h3 class="title"></h3>
        <a class="close"><i class="iconfont"></i></a>
    </div>
    <div class="modal-bd">
    	<iframe width="880" height="536" src="/home/" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

    <div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                <li>
                    <a rel="nofollow" href="javascript:void(0)">
                        <i class="layui-icon">&#xe631;</i>1小时快修服务
                    </a>
                </li>
                <li>
                    <a rel="nofollow" href="javascript:void(0)">
                        <i class="layui-icon">&#xe609;</i>7天无理由退货
                    </a>
                </li>
                <li>
                    <a rel="nofollow" href="javascript:void(0)">
                        <i class="layui-icon">&#xe715;</i>15天免费换货
                    </a>
                </li>
                <li>
                    <a rel="nofollow" href="javascript:void(0)">
                        <i class="layui-icon">&#xe650;</i>满150元包邮
                    </a>
                </li>
                <li>
                    <a rel="nofollow" href="javascript:void(0)">
                        <i class="layui-icon">&#xe7ae;</i>520余家售后网点
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-links clearfix">
            <div class="blank"></div>
     
        <dl class="col-links">
      <dt>帮助中心</dt>
            <dd> 
        <a href="article.php?id=9" target="_blank" title="配送方式" rel="nofollow">配送方式</a>
      </dd>
            <dd> 
        <a href="article.php?id=10" target="_blank" title="支付方式" rel="nofollow">支付方式</a>
      </dd>
            <dd> 
        <a href="article.php?id=11" target="_blank" title="购物指南" rel="nofollow">购物指南</a>
      </dd>
       
    </dl>
     
     
        <dl class="col-links">
      <dt>服务支持</dt>
            <dd> 
        <a href="article.php?id=21" target="_blank" title="相关下载" rel="nofollow">相关下载</a>
      </dd>
            <dd> 
        <a href="article.php?id=22" target="_blank" title="自助服务" rel="nofollow">自助服务</a>
      </dd>
            <dd> 
        <a href="article.php?id=23" target="_blank" title="售后政策" rel="nofollow">售后政策</a>
      </dd>
       
    </dl>
     
     
        <dl class="col-links">
      <dt>小米之家</dt>
            <dd> 
        <a href="article.php?id=12" target="_blank" title="预约亲临到店服务" rel="nofollow">预约亲临到店服务</a>
      </dd>
            <dd> 
        <a href="article.php?id=13" target="_blank" title="服务网点" rel="nofollow">服务网点</a>
      </dd>
            <dd> 
        <a href="article.php?id=14" target="_blank" title="小米之家" rel="nofollow">小米之家</a>
      </dd>
       
    </dl>
     
     
        <dl class="col-links">
      <dt>关于小米</dt>
            <dd> 
        <a href="article.php?id=24" target="_blank" title="联系小米" rel="nofollow">联系小米</a>
      </dd>
            <dd> 
        <a href="article.php?id=25" target="_blank" title="加入小米" rel="nofollow">加入小米</a>
      </dd>
            <dd> 
        <a href="article.php?id=26" target="_blank" title="了解小米" rel="nofollow">了解小米</a>
      </dd>
       
    </dl>
     
     
        <dl class="col-links">
      <dt>关注小米</dt>
            <dd> 
        <a href="article.php?id=15" target="_blank" title="官方微信" rel="nofollow">官方微信</a>
      </dd>
            <dd> 
        <a href="article.php?id=16" target="_blank" title="小米部落" rel="nofollow">小米部落</a>
      </dd>
            <dd> 
        <a href="article.php?id=17" target="_blank" title="新浪微博" rel="nofollow">新浪微博</a>
      </dd>
       
    </dl>
     
     
     
     
 
            <div class="col-contact">
                <p class="phone">15105955077</p>
                <p>周一至周日 8:00-18:00<br>（仅收市话费）</p>
                <a rel="nofollow" class="btn btn-line-primary btn-small">
                    <i class="layui-icon">&#xe6fc;</i>24小时在线客服
                </a>
            </div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <div class="logo ir">京城商城</div>
        <div class="info-text">
            <p class="sites">
              <a href="http://www.ecshop119.com" target="_blank" title="京城商城">四骑士小组</a>
            </p>
            <p>
                ©<a href='javascript:;'>京城仿小米商城</a> 北京市昌平区回龙观育荣教育 <a href='#'>歡迎來电183-055-198-18本網站由 四骑士小组www.lzyc.com 製作。</a>    
            </p>
        </div>
        <div class="info-links">
            <a href="#"><img src="/home/picture/cnnicverifyseal.png" alt="可信网站"></a>
            <a href="#"><img src="/home/picture/szfwverifyseal.gif" alt="诚信网站"></a>
            <a href="#"><img src="/home/picture/save.jpg" alt="网上交易保障中心"></a>
        </div>
    </div>
</div>
 
</body>
</html>


