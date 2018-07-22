<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="Generator" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="{{$common_configs_data->net_keyword}}" />
    <meta name="Description" content="" />
    <title>购物车</title>
    <link rel="shortcut icon" href="/home/logo/favicon.ico" />
    <link rel="stylesheet" href="/home/lib/layui/css/layui.css">
    <link href="/home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/cart.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/home/js/common.js"></script>
    <script type="text/javascript" src="/home/js/shopping_flow.js"></script>
    <script type="text/javascript" src="/home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/home/js/jquery.json.js"></script>
    <script type="text/javascript" src="/home/js/transport_jquery.js"></script>
    <script type="text/javascript" src="/home/js/utils.js"></script>
    <script type="text/javascript" src="/home/js/jquery.superslide.js"></script>
    <script type="text/javascript" src="/home/js/xiaomi_common.js"></script>
    <script type="text/javascript" src="/home/js/xiaomi_flow.js"></script> 
    <script type="text/javascript" src="/home/js/showdiv.js"></script>
    <script src="/home/lib/layui/layui.js" charset="utf-8"></script> 
  </head>
  <body>
  <div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a href="/" class="logo">
              <img src="{{$common_configs_data->logo}}" />
            </a>
        </div>
        <div class="header-title">
          <h2>我的购物车</h2>
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
                        <li><a target="_blank" href="/home/collect/index">我的收藏</a></li>
                        <li><a target="_blank" href="/home/discuss/index">我的评论</a></li>
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
    </div>
  </div>
 @if(session('goods')) 
  <div class="page-main" id="cart-box">
    	<div class="container">
        <div class="page-main" id="cart-box">
      <div class="container">
                <div class="cart-goods-list">
                <div class="list-head clearfix"> 
                    <div class="col col-check">
                        &nbsp; 
                    </div>
                    <div class="col col-img" id="itemsnum-top">图片</div> 
                    <div class="col col-name">商品名称</div>
                    <div class="col col-price" >单价</div>
                    <div class="col col-num">数量</div>
                    <div class="col col-total">小计</div> 
                    <div class="col col-action">操作</div>
                </div>
                <div class="list-body"> 
                @foreach ($shops as $val) 
                  <div class="item-box">
                    <div class="item-table">
                      <div class="item-row clearfix"> 
                        <div class="col col-check"> 
                          <input type="checkbox" name="check[]"  checked class="car_check"  />
                        </div>           
                        <div class="col col-img"> 
                          <a href="/home/goods/detail/{{$val['id']}}" target="_blank"> <img alt="{{$val['info']->name}}" src="{{$val['info']->pic}}"></a>
                        </div>
                        <div class="col col-name"> 
                            <h3 class="name">
                              <a href="/home/goods/detail/{{$val['id']}}" target="_blank">{{$val['info']->name}}</a>
                            </h3>
                            <span>最低起订数量：<em class="ys">1</em>
                            （请按最低起订数<em class="ys">1</em>的倍数购买）
                            </span>
                            <p class="desc">
                              <span>{{$val['color']}}</span> 
                            </p>
                        </div> 
                        <div class="col col-price">
                            <span>{{$val['info']->discount}}</span><em>元</em>                  
                        </div>
                        <div class="col col-num"> 
                            <div class="change-goods-num clearfix">
                              <a href="javascript:void(0)" class="minus" money="{{$val['info']->discount}}"  style="background:#bbb" title="减少1个数量";>
                                <i class="iconfont">-</i>
                              </a> 
                              <input type="text" class="good_num" ids="{{$val['id']}}"  value="{{$val['num']}}">
                              <a href="javascript:void(0)" class="add" money="{{$val['info']->discount}}" style="background:#bbb" title="增加1个数量">
                                <i class="iconfont">+</i>
                              </a> 
                            </div>
                        </div>
                        <div class="col col-total">
                            <span id="money{{$val['id']}}">{{$val['xsum']}}</span><em>元</em>
                        </div>
                        <div class="col col-action"> 
                            <a class="del" ids="{{$val['id']}}" href="javascript:if (confirm('您确实要把该商品移出购物车吗？'));">
                            <i class="iconfont"></i></a> 
                        </div>
                    </div>
                  </div>
                </div> 
                @endforeach
                <p class="clear-cart">
                  <a id="delallcar" href="/home/goods/delallcar">清空购物车</a>
                </p> 
                <div class="cart-bar clearfix">
                  <div class="section-left">
                    <a class="back-shopping btn btn-gray" href="/">继续购物</a>
                  </div>
                  <span class="total-price">
                    <span class="total-num"></span>
                    &nbsp;&nbsp;&nbsp;合计：<b><span id="tot">{{$zsum}}</span><em>元</em></b>
                  </span>
                  <a href="#" class="btn btn-pay btn-primary">去结算</a>
                </div>
        </div>
      </div>
    </div>
          <script type="text/javascript">
            var zsum = 0;
            //获取商品的小计
           $('.good_num').each(function(){

            var id = $(this).attr('ids');

            var good_num = Number($(this).val());

            var good_price = Number($(this).next().attr('money'));
             var xsum = Number(good_price*good_num);
            $('#money'+id).html(xsum);
            zsum += xsum;
           });
           $('#tot').html(zsum);
            //获取所有多选框
            $('.car_check').click(function(){
                var zsum = 0;
                if($(this).attr('checked')){
                  $(this).attr('checked',false);
                }else{
                  $(this).attr('checked',true);
                }
                $("input:checked").each(function(){
                  var obj = $(this).parent().parent().find('.good_num');
                  var id = obj.attr('ids');
                  var good_num = obj.val(); 
                  var good_price = Number(obj.next().attr('money'));
                  var xsum = Number(good_price*good_num);
                  // console.log(xsum);
                  zsum += xsum;
              })
                $('#tot').html(zsum);
            });


           

                    //增加减少商品数量
                    $('.minus').click(function(){
                        //起别名
                        var obj = $(this);
                        var num = obj.next().val();
                        //获取商品id
                        var id = obj.next().attr('ids');
                        // 判断数量小于1时 报提示
                        if(num<=1){
                          layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg('选购的商品至少1件!');
                          });
                          obj.next().val(1);
                          return '';
                        }
                        $.get('/home/goods/minuscar',{'id':id},function(data){
                             if(data){
                                //当点击时 数量减一
                              obj.next().val(--num);
                              //当点击时小计与合计都发生变化
                              var price = Number(obj.attr('money'));
                              // alert(price*num);
                              $('#money'+id).html(price*num);
                              var tot = Number($('#tot').html());
                              //合计的计算
                               var checks = obj.parent().parent().parent().find('.car_check');
                              if(checks.attr('checked')){
                                $('#tot').html(tot-price);
                              }
                              
                             }
                        });
                      });

                      //增加商品数量
                       //增加减少商品数量
                    $('.add').click(function(){
                        //起别名
                        var obj = $(this);
                        //获取商品id
                        var id = obj.prev().attr('ids');
                        // alert(id);
                        $.get('/home/goods/addcar',{'id':id},function(data){
                             if(data){
                                //当点击时 数量减一
                              var num = obj.prev().val();
                              obj.prev().val(++num);
                              //计算小计
                              var price = Number(obj.attr('money'));
                              // alert(price*num);
                              $('#money'+id).html(price*num);
                               var tot = Number($('#tot').html());
                              //合计的计算
                              //判断是否是选中的input 是总价增加 不是总价格不增加
                              var checks = obj.parent().parent().parent().find('.car_check');
                              if(checks.attr('checked')){
                                $('#tot').html(tot+price);
                              }
                             }
                        });
                      });
                      //移除购物车
                       $('.del').click(function(){
                        //起别名
                        var obj = $(this);
                        //获取商品id
                        var id = obj.attr('ids');
                        // alert(id);
                        $.get('/home/goods/delcar',{'id':id},function(data){
                             if(data){
                                obj.parent().parent().parent().parent().remove();
                                location.reload(true);
                             }
                        });
                      });

                </script>
    @else      
  	    <div class="cart-empty" style="background:url('/home/images/cart-empty.png')no-repeat 124px 0">
      	<h2>您的购物车还是空的!</h2>
          <a href="/" class="btn btn-primary">马上去购物</a>
        </div>
    @endif
    </div>
    <script type="text/javascript">
   
    </script>


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
              <div style="float:left;margin:0px 4px;">
                <img src="{{$common_configs_data->logo}}" width="36px" height="36px">
              </div>
              <div class="info-text">
                  <p class="sites">
                    <a target="_blank" title="京城商城">友情链接</a> |
                    @foreach ($common_links_data as $k=>$v)
                    <a href="{{$v->lurl}}" target="_blank" title="{{$v->lsay}}">{{$v->lname}}</a> |
                    @endforeach
                  </p>
                  <p>
                      ©<a href='javascript:;'>{{$common_configs_data->net_name}}</a> 北京市昌平区回龙观育荣教育 <a href='#'>歡迎來电{{$common_configs_data->net_phone}}本網站由 四骑士小组www.lzyc.com 製作。</a>    
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