<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="Generator" content="" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Keywords" content="{{$common_configs_data->net_keyword}}" />
		<meta name="Description" content="" />
		<title>京城</title>
		<link rel="shortcut icon" href="/home/logo/favicon.ico" />
		<link rel="stylesheet" href="/admins/lib/layui/css/layui.css">
		<link href="/home/css/style.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/category.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/home/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/home/js/jquery.json.js"></script>
		<script type="text/javascript" src="/home/js/common.js"></script>
		<script type="text/javascript" src="/home/js/global.js"></script>
		<script type="text/javascript" src="/home/js/easydialog.min.js"></script>
		<script type="text/javascript" src="/home/js/compare.js"></script>
		<script type="text/javascript" src="/home/js/transport_jquery.js"></script>
		<script type="text/javascript" src="/home/js/utils.js"></script>
		<script type="text/javascript" src="/home/js/jquery.superslide.js"></script>
		<script type="text/javascript" src="/home/js/xiaomi_common.js"></script>
		<script src="/admins/lib/layui/layui.js" charset="utf-8"></script>
		<style type="text/css">
			.pagination li{
		        width:35px;
		        height:25px;
		        line-height:25px; 
		        border:1px solid #ddd;
		        border-radius:5px;
		        float:left; 
		        margin:3px;  
		        text-align:center;    
		    	}
		    .pagination li:hover{
		        background:#5B604E; 
		    	}
		    .pagination {
		        width:500px; 
		        margin:auto;
		        padding-left:15%;    
		    	}
		    .pagination span {
	            position: relative;
	            padding: 5px 14px;
	            margin-left:-0.5px; 
	            line-height: 1.42857143;
	            color: #fff;
	            text-decoration: none;
	            background-color:#6D5C43;
	            border-radius:5px; 
		   	 	}
		   	#mao_mao{
	            width:30px;
	            height:120px;
	            border-radius:15px;  
	            position:fixed;
	            right:15px;
	            bottom:40px;
	            z-index:99999;  
        		}
        	img.c1{
		          position:fixed;
		          border-radius:10px; 
		          top:80%;right:10px;
		        }
		</style>
	</head>
	<body>
		<div class="site-topbar">
			<div class="container">
		    	<div class="topbar-nav">
		        	<a href="javascript:void(0)"  class="snc-link snc-order">手机版</a>
		            <span class="sep">|</span>                        <a href="javascript:;"    class="snc-link snc-order">MIUI</a>
		            <span class="sep">|</span>                        <a href="javascript:;"    class="snc-link snc-order">米聊</a>
		            <span class="sep">|</span>                        <a href="javascript:;"    class="snc-link snc-order">游戏</a>
		            <span class="sep">|</span>                        <a href="javascript:;"    class="snc-link snc-order">多看阅读</a>
		            <span class="sep">|</span>                        <a href="javascript:;"    class="snc-link snc-order">云服务</a>
		            <span class="sep">|</span>                        <a href="javascript:;"    class="snc-link snc-order">移动版商城</a>
		            <span class="sep">|</span>                        <a href="javascript:;"  class="snc-link snc-order">网店帮助分类</a>
		            <span class="sep">|</span>                        <a href="javascript:;"    class="snc-link snc-order">留言板</a>
		            <span class="sep">|</span>                        <a href="javascript:;"  class="snc-link snc-order">会员等级测试</a>
		        </div>
	@if(session('homeflag'))
	 	{{$flag = false}}
	 	{{$n = 0}}
    @foreach ($common_shopcars_data as $k=>$v)
    @if($v['uid'] == session('homeuser')['id']) 
      	<!-- {{$flag = true}} -->
      	<!-- {{++$n}} -->
    @endif
    @endforeach
     
	       <div class="topbar-cart" id="ECS_CARTINFO">
	        <a class="cart-mini " href="/home/goods/shopcar">
	        <i class="layui-icon">&#xe657;</i>  
	          购物车
	          <span class="mini-cart-num J_cartNum" id="hd_cartnum">
	          @if($flag)
	            ({{$n}})
	          @else
	            (0)
	          @endif 
	          </span>
	      </a>
	        @if($flag)
	        <div id="J_miniCartList" class="cart-menu">
	          <ul>
	          @foreach($common_shopcars_data as $v)
	          	@if($v['uid'] == session('homeuser')['id'])
	              <li class="clearfix first">
	                <div class="cart-item">
	                  <a class="thumb"  href="/home/goods/detail/{{$v['gid']}}">
	                      <img width="60" height="60" src="{{$v['gpic']}}">
	                  </a>
	                  <a class="name"  href="/home/goods/detail/{{$v['gid']}}">{{$v['gname']}}</a>
	                  <span class="price" nums="{{$v['gnum']}}" prices="{{$v['gprice']}}">{{$v['gprice']}} x {{$v['gnum']}}</span>
	                  <a class="btn-del delItem" href="javascript:;" onclick="car_del(this,{{$v['gid']}});">
	                      <i class="iconfont"></i>
	                  </a>
	                </div>
	            </li>
	            @endif
	          @endforeach
	          </ul>
	          <div class="count clearfix">
	              <span class="total">
	                  共计<em id="hd_cart_count">{{ count($common_shopcars_data) }}</em>件商品
	                  <strong>合计：<em id="hd_cart_total">0</em><em>元</em></strong>
	              </span>
	              <a class="btn btn-primary" href="/home/goods/shopcar">去购物车结算</a>
	          </div>   
	      </div>
	      @else
	      <div id="J_miniCartList" class="cart-menu">
	            <p class="loading">购物车中还没有商品，赶紧选购吧！</p>
	      </div>
	      @endif        
	    </div>
	@else
	        <div class="topbar-cart" id="ECS_CARTINFO">
	        <a class="cart-mini " href="/home/goods/shopcar">
	        <i class="layui-icon">&#xe657;</i>  
	          购物车
	          <span class="mini-cart-num J_cartNum" id="hd_cartnum">
	          @if(session('goods'))
	            ({{count(session('goods'))}})
	          @else
	            (0)
	          @endif 
	          </span>
	      </a>
	        @if(session('goods'))
	        <div id="J_miniCartList" class="cart-menu">
	          <ul>
	          @foreach(session('goods') as $v)
	              <li class="clearfix first">
	                <div class="cart-item">
	                  <a class="thumb"  href="/home/goods/detail/{{$v['id']}}">
	                      <img width="60" height="60" src="{{$v['info']->pic}}">
	                  </a>
	                  <a class="name"  href="/home/goods/detail/{{$v['id']}}">{{$v['info']->name}}</a>
	                  <span class="price" nums="{{$v['num']}}" prices="{{$v['info']->discount}}">{{$v['info']->discount}} x {{$v['num']}}</span>
	                  <a class="btn-del delItem" href="javascript:;" onclick="car_del(this,{{$v['id']}});">
	                      <i class="iconfont"></i>
	                  </a>
	                </div>
	            </li>
	          @endforeach
	          </ul>
	          <div class="count clearfix">
	              <span class="total">
	                  共计<em id="hd_cart_count">{{ count(session('goods')) }}</em>件商品
	                  <strong>合计：<em id="hd_cart_total">{{session('carzsum')}}</em><em>元</em></strong>
	              </span>
	              <a class="btn btn-primary" href="/home/goods/shopcar">去购物车结算</a>
	          </div>   
	      </div>
	      @else
	      <div id="J_miniCartList" class="cart-menu">
	            <p class="loading">购物车中还没有商品，赶紧选购吧！</p>
	      </div>
	      @endif        
	    </div>
    @endif
	    <script type="text/javascript">
	      //获取总计
	      var tot = 0;
	      $('.cart-item .price').each(function(){
	          var prices = Number($(this).attr('prices'));
	          console.log(prices);
	          var nums = Number($(this).attr('nums'));
	          var sums = Number(prices*nums);
	          tot += sums;
	      });
	        $('#hd_cart_total').html(tot);

	       //移除购物车
	       function car_del(obj,id){
	        var ul = obj.parentNode.parentNode.parentNode;
	        var li = obj.parentNode.parentNode;
	        // obj.parent();
	        // console.log(obj);
	        $.get('/home/goods/delcar',{'id':id},function(data){
	             if(data){
	                ul.removeChild(li);
	                location.reload(true);
	             }
	        });
	      };
	    </script>
		<div class="topbar-info J_userInfo" id="ECS_MEMBERZONE">
              
            @if(!session('homeflag') == true)
              <a class="link" href="/home/login/index" rel="nofollow">登录</a>
              <span class="sep">|</span>
              <a class="link" href="/home/login/create" rel="nofollow">注册</a>
            @else
                  @if(session("homeuser")['grade'] <= 2)
                  <span class="user">
                    <a class="user-name"  href=""><span class="name">{{session("homeuser")['username']}}</span><i class="iconfont"></i></a>
                      <ul class="user-menu" style="display: none;">
                          <li><a  href="/admin">后台管理</a></li>
                          <li><a href="/home/login/logout">退出登录</a></li>
                      </ul>
                  </span>  
                  @else
                  <span class="user">
                  <a class="user-name"  href=""><span class="name">{{session("homeuser")['username']}}</span><i class="iconfont"></i></a>
                    <ul class="user-menu" style="display: none;">
                        <li><a  href="/home/users/index">个人中心</a></li>
                        <li><a  href="/home/collect/index">我的收藏</a></li>
                        <li><a  href="/home/discuss/index">我的评论</a></li>
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
		        	<a href="/" title="京城"><img width="55px" height="55px" src="{{$common_configs_data->logo}}" /></a>
		        </div>
		        <div class="header-nav">
		        	<ul class="nav-list">
		            	<li class="nav-category">
		                	<a class="btn-category-list" href="javascript:;" >全部商品分类</a>
		                	<div class="site-category category-hidden ">
		                    	<ul class="site-category-list clearfix" id="site-category-list">
		                            @foreach ($common_cates_data as $k=>$v)
		                            <li class="category-item ">
		                              <a class="title" href="/home/goods/list/{{$v->id}}?dir={{$v->classname}}">{{$v->classname}}<i class="layui-icon">&#xe602;</i></a>
		                                <div class="children clearfix ">
		                                    <ul class="children-list children-col-3">
		                                      @foreach($v->categoods as $key=>$val)
		                                        <!-- {{$k = $key+1}} -->
		                                        @if($k%6 == 0)
			                                        <li>
			                                              <a href="/home/goods/detail/{{$val->id}}" class="link">
			                                                  <img class="thumb" src="{{$val->pic}}" width="40" height="40">
			                                                  <span>{{$val->name}}</span>
			                                               </a>
			                                         </li>
		                                          </ul>
		                                          <ul class="children-list children-col-3">
		                                            
		                                        @else
		                                         <li style="text-left;">
		                                          <a href="/home/goods/detail/{{$val->id}}" class="link">
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
		                 @foreach ($common_cates_data as $k=>$v)
		                 	@if($k < 5)
			                <li class="nav-item">
			                  <a class="link" href="/home/goods/list/{{$v->id}}?dir={{$v->classname}}"  ><span>{{$v->classname}}</span></a>
			                  <div class='item-children'>
			                      <div class="container">
			                          <ul class="children-list clearfix">
			                              @foreach($v->categoods as $key=>$val)
			                              <li class="first">
			                                  <div class="figure figure-thumb">
			                                  <a href="/home/goods/detail/{{$val->id}}">
			                                    <img src="{{$val->pic}}">
			                                    </a>
			                                  </div>
			                                  <div class="title"><a href="/home/goods/detail/{{$val->id}}">{{$val->name}}</a></div>
			                                  <p class="price">{{$val->discount}}<em>元</em></p>
			                              </li>
			                              @endforeach
			                          </ul>
			                      </div>
			                  </div>
			                </li>
			                @endif
			                @endforeach
		            </ul>
		        </div>
		        <div class="header-search">
		        	<form action="/home/goods/search" method="get" id="searchForm"  class="search-form clearfix">
		            	<label class="hide">站内搜索</label>
		        		<input class="search-text" type="text" name="search" id="keyword" value="" autocomplete="off">
		        		<button type="submit" class="search-btn iconfont"><i class="layui-icon">&#xe615;</i></button>
		                <div class="hot-words" >
		                	<a href="/home/goods/detail/33" >小米8</a>  
			                <a href="/home/goods/detail/42" >蓝牙耳机</a>  
			                <a href="/home/goods/detail/43" >小米手环</a>                  
			            </div>
		           	</form>
		        </div>
		    </div>
			<div id="J_navMenu" class="header-nav-menu" style="display: none;">
		    	<div class="container"></div>
		    </div>
		</div>
		<script type="text/javascript" src="/home/js/xiaomi_category.js"></script>
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


			@section('content')


			        


			@show


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
	        <a href="javascript:void(0)"  title="配送方式" rel="nofollow">配送方式</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="支付方式" rel="nofollow">支付方式</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="购物指南" rel="nofollow">购物指南</a>
	      </dd>
	       
	    </dl>
	        <dl class="col-links">
	      <dt>服务支持</dt>
	            <dd> 
	        <a href="javascript:void(0)"  title="相关下载" rel="nofollow">相关下载</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="自助服务" rel="nofollow">自助服务</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="售后政策" rel="nofollow">售后政策</a>
	      </dd>
	       
	    </dl>
	     
	     
	        <dl class="col-links">
	      <dt>小米之家</dt>
	            <dd> 
	        <a href="javascript:void(0)"  title="预约亲临到店服务" rel="nofollow">预约亲临到店服务</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="服务网点" rel="nofollow">服务网点</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="小米之家" rel="nofollow">小米之家</a>
	      </dd>
	       
	    </dl>
	     
	     
	        <dl class="col-links">
	      <dt>关于小米</dt>
	            <dd> 
	        <a href="javascript:void(0)"  title="联系小米" rel="nofollow">联系小米</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="加入小米" rel="nofollow">加入小米</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="了解小米" rel="nofollow">了解小米</a>
	      </dd>
	       
	    </dl>
	     
	     
	        <dl class="col-links">
	      <dt>关注小米</dt>
	            <dd> 
	        <a href="javascript:void(0)"  title="官方微信" rel="nofollow">官方微信</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="小米部落" rel="nofollow">小米部落</a>
	      </dd>
	            <dd> 
	        <a href="javascript:void(0)"  title="新浪微博" rel="nofollow">新浪微博</a>
	      </dd>
	       
	    </dl>
	            <div class="col-contact">
	                <p class="phone">{{$common_configs_data->net_phone}}</p>
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
	        <div style="float:left;margin:0px 4px;"><img src="{{$common_configs_data->logo}}" width="36px" height="36px"></div>
	        <div class="info-text">
	            <p class="sites">
		            <a  title="京城商城">友情链接</a> |
		            @foreach ($common_links_data as $k=>$v)
		            <a href="{{$v->lurl}}"  title="{{$v->lsay}}">{{$v->lname}}</a> |
		            @endforeach
            	</p>
	            <p>
	                ©<a href='javascript:void(0)'>{{$common_configs_data->net_name}}</a> 北京市昌平区回龙观育荣教育 <a href='javascript:void(0)'>歡迎來电{{$common_configs_data->net_phone}}本網站由 四骑士小组www.lzyc.com 製作。</a>    
	            </p>
	        </div>
	        <div class="info-links">
	            <a href="javascript:;"><img src="/home/picture/cnnicverifyseal.png" alt="可信网站"></a>
	            <a href="javascript:void(0)"><img src="/home/picture/szfwverifyseal.gif" alt="诚信网站"></a>
	            <a href="javascript:void(0)"><img src="/home/picture/save.jpg" alt="网上交易保障中心"></a>
	        </div>
	    </div>
	</div>
	<!-- 快速返回顶部 -->
   <img class="c1" src="/home/images/top_mao.gif" width="28px" height="100px"  id="fixed_img" title="返回顶部">
   <script>
   $('#fixed_img').click(function(){
      $('body,html').animate({
           scrollTop: 0
         }, 1000);
        return false;
   })
   </script>
</body>
</html>


