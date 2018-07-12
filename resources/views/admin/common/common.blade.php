<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>京城后台管理</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admins/css/font.css">
	<link rel="stylesheet" href="/admins/css/xadmin.css">
    <link rel="stylesheet" href="/admins/css/swiper.min.css">
    <link rel="stylesheet" href="/admins/lib/layui/css/layui.css">
    <script type="text/javascript" src="/admins/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admins/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/admins/js/swiper.jquery.min.js"></script>
    <script src="/admins/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admins/js/xadmin.js"></script>

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
    .pagination span{
            position: relative;
            padding: 5px 14px;
            margin-left:-0.5px; 
            line-height: 1.42857143;
            color: #fff;
            text-decoration: none;
            background-color:#6D5C43;
            border-radius:5px; 
    }
    </style>
</head> 
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="/admin">京城后台管理 V1.0</a></div>
        <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a href="">个人信息</a></dd>
              <dd><a href="">切换帐号</a></dd>
              <dd><a href="/admins/login.html">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item"><a href="/">商城首页</a></li>
        </ul>
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
          <div id="side-nav">
            <ul id="nav">
                <li class="list" current>
                    <a href="/admin">
                        <i class="iconfont">&#xe761;</i>
                        欢迎页面
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                </li>
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        用户管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/users/index">
                                <i class="iconfont">&#xe6a7;</i>
                                用户列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/users/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加用户
                            </a>
                        </li>
                        <li>
                            <a href="/admin/users/destroy">
                                <i class="iconfont">&#xe6a7;</i>
                                回收站
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe67b;</i> 
                        分类管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/cates">
                                <i class="iconfont">&#xe6a7;</i>
                                分类列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/cates/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加分类
                            </a>
                        </li>
                        <li>
                            <a href="/admin/cates/getdel">
                                <i class="iconfont">&#xe6a7;</i>
                                分类回收站
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe656;</i> 
                        商品管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/goods">
                                <i class="iconfont">&#xe6a7;</i>
                                商品列表
                            </a>
                        </li>
                         <li>
                            <a href="/admin/goods/create">
                                <i class="iconfont">&#xe6a7;</i>
                                商品添加
                            </a>
                        </li>
                        <li>
                            <a href="/admin/goods/destroy">
                                <i class="iconfont">&#xe6a7;</i>
                                商品回收站
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe64a;</i> 
                        商品详图管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/goodimages">
                                <i class="iconfont">&#xe6a7;</i>
                                商品详图列表
                            </a>
                        </li>
                         <li>
                            <a href="/admin/goodimages/create">
                                <i class="iconfont">&#xe6a7;</i>
                                商品详图添加
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe705;</i> 
                        库存管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/entrepot">
                                <i class="iconfont">&#xe6a7;</i>
                                商品库存
                            </a>
                        </li>
                         <li>
                            <a href="/admin/entrepot/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加库存
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe6b2;</i> 
                        订单管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/orders/index">
                                <i class="iconfont">&#xe6a7;</i>
                                订单列表
                            </a>
                        </li>
                         <li>
                            <a href="/admin/orders/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加订单
                            </a>
                        </li>
                        <li>
                            <a href="/admin/orders/destroy">
                                <i class="iconfont">&#xe6a7;</i>
                                订单回收站
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe670;</i> 
                        评论管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/discuss">
                                <i class="iconfont">&#xe6a7;</i>
                                评论列表
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" > 
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        轮播管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/slids/show">
                                <i class="iconfont">&#xe6a7;</i>
                                轮播图效果
                            </a>
                        </li>
                        <li>
                            <a href="/admin/slids">
                                <i class="iconfont">&#xe6a7;</i>
                                轮播列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/slids/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加轮播图
                            </a>
                        </li>
                        <li>
                            <a href="/admin/slids/delshow">
                                <i class="iconfont">&#xe6a7;</i>
                                轮播图回收站
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe62e;</i> 
                        推荐商品管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/recommend">
                                <i class="iconfont">&#xe6a7;</i>
                                推荐商品列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/recommend/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加推荐商品
                            </a>
                        </li>
                    </ul>
                </li>
                    <li class="list" >
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe64c;</i> 
                        友情链接管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admin/links">
                                <i class="iconfont">&#xe6a7;</i>
                                友情链接列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/links/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加友情链接
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                       <i class="layui-icon">&#xe614;</i>
                        系统设置
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admins/banner-list.html">
                                <i class="iconfont">&#xe7ae;</i>
                                网站配置
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
          </div>
        </div>
        <!-- 左侧菜单结束 -->
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

    


    <!-- 背景切换开始 -->
	<div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="/admins/images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admins/images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>   
    </div>
    <!-- 背景切换结束 -->
</body>
</html>