@extends('home.common.common')

@section('content')
<link href="/home/css/goods.css" rel="stylesheet" type="text/css" />
<link href="/home/css/consultations.css" rel="stylesheet" type="text/css" />
<!-- 商品详情中部导航文件 -->
<script type="text/javascript" src="/home/js/magiczoomplus.js"></script>
<script type="text/javascript" src="/home/js/easydialog.min.js"></script>
<script type="text/javascript" src="/home/js/xiaomi_goods_li.js"></script>

<style type="text/css">
  /*评论区选项卡的样式*/
  #discuss1 ul{
    display: none;
  }
  #discuss1 ul:first-of-type{
    display: block;
    }

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
        background:#ccc;
        size:orange; 
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
        background-color:#ccc;
        border-radius:5px; 
    }
      
    #choose{margin:0;}
    #choose li{overflow:hidden; padding-bottom:20px;}
    #choose .dt{width:72px; text-align:left; float:left; padding:6px 0 0;}
    #choose .dd{overflow:hidden;}
    #choose .dd .item{float:left; margin:2px 8px 2px 0; position:relative;}
    #choose .dd .item a{border:1px solid #ccc; padding:4px 6px; float:left;}
    #choose .dd .item a span{padding:0 3px; line-height:30px;}
    #choose .dd .item a img{width:30px; height:30px;}
    #choose .dd .item b{width:12px; height:12px; background:url(/home/images/gou.png) no-repeat; position:absolute; bottom:1px; right:1px; overflow:hidden; display:none;}
    #choose .dd .item.selected a{border-width:2px; border-color:#e4393c; padding:3px 5px;}
    #choose .dd .item.selected b{display:block;}
    #choose li.GeneralAttrImg .dt{padding-top:10px;}
    #choose li.GeneralAttrImg .dd .item a{padding:1px;}
    #choose li.GeneralAttrImg .dd .item a img{margin:1px;}
    #choose li.GeneralAttrImg .dd .item.selected a{padding:0;}
  

</style>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<!-- <link rel="stylesheet" href="/admins/lib/layui/css/layui.css" media="all"> -->
    
<!-- 导航历史记录 -->
<div class="breadcrumbs">
  <div class="container">
      <a href="{{ url('/') }}">首页</a> <code>&gt;</code>         
    </div>
</div>
<!-- 导航历史记录结束 -->

<!-- 商品详情开始 -->
<div class="goods-detail">

  <!-- 参数,配置,图片,放大镜 -->
  <div class="goods-detail-info  clearfix J_goodsDetail">
    <div class="container">
      <div class="row">

          <!-- 图片,放大镜,切换图 -->
          <div class="span13  J_mi_goodsPic_block goods-detail-left-info">
          
            <div class="goods-pic-box" id="detail_img">
              <!-- 商品中间的大图 -->
              <div class="goods-big-pic"> 
                <a href="{{ $goods['pic'] }}" class="MagicZoomPlus" id="Zoomer" rel="hint-text: ; selectors-effect: false; selectors-class: current; zoom-distance: 60;zoom-width: 400; zoom-height: 400;" > 
                  <img  alt="{{ $goods['name'] }}" src="{{ $goods['pic'] }}"> 
                </a> 
              </div>
              
              <!-- 商品图 右侧小切换图 -->
              <div class="goods-small-pic" id="item-thumbs">
                <a class="prev" href="javascript:void(0);"></a>
                <a class="next" href="javascript:void(0);"></a>
                <div class="bd">
                  <ul class="cle" style="position: relative; padding: 0px; margin: 0px; top: 0px;">
                      <!-- 商品小图左边 -->
                      <!--  -->
                      <li class="current"> 
                        <a href="{{ $goods['pic'] }}" rel="zoom-id: Zoomer" rev="{{ $goods['pic'] }}"> 
                          <img alt="{{ $goods['name'] }}" src="{{ $goods['pic'] }}"> 
                        </a>
                      </li>
                      @foreach($goods->goodimages as $gk=>$gv)
                      <li style="height: 60px;"class="goods_img"> 
                        <a href="{{ $gv->images }}" rel="zoom-id: Zoomer" rev="{{ $gv->images }}"  style="outline: 0px; display: inline-block;"> 
                          <img alt="{{ $goods->name }}"  src="{{ $gv->images }}"> 
                        </a>
                      </li>
                  @endforeach
                    </ul>           
                        </ul>
                </div>
              </div>
           </div>
          </div>

          <div class="span7 goods-info-rightbox">
            <form action="#" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
              {{ csrf_field() }}
              <div class="goods-info-box" id="item-info">
                <dl class="loaded">
                  <dt class="goods-info-head">
                    <dl>
                        <dt class="goods-name" id="goods-name">{{ $goods->name }}</dt>
                          <!-- 售价 -->

                          @if(empty($discounts['discount']))
                          <dd class="goods-phone-type"><p></p></dd>
                                <del>专柜价： <em class="cancel">无</em></del>
                          <dd class="goods-info-head-price clearfix">
                              <span>现售价：</span> 
                               <span class="unit"> <b class="nala_price red" id="ECS_SHOPPRICE">{{ $goods->discount }}<em>元</em> </b> </span>  
                          </dd>
                          @else
                          <dd class="goods-phone-type"><p></p></dd>
                                <del>专柜价： <em class="cancel">{{ $goods->discount }}<em>元</em></em></del>
                          <dd class="goods-info-head-price clearfix">
                              <span>现售价：</span> 
                               <span class="unit"> <b class="nala_price red" id="ECS_SHOPPRICE">{{ $discounts['discount'] }}<em>元</em> </b> </span>  
                         	</dd>
                          @endif
                          <!-- 货号 库存 上架时间 -->
                          <dd>
                              <ul>
                                <li> <span class="lbl" >商品货号</span> <em id="goods-id">{{ $goods->id }}</em> </li>
                                <li> <span class="lbl">商品库存</span> <em id="goods-kc">{{ $goods->entrepotsgoods->num or '暂时缺货' }}</em> </li>
                                <li> <span class="lbl">上架时间：</span> <em>{{ $goods->created_at }}</em> </li>
                             </ul>
                          </dd>
                          <!-- 尺寸 颜色  -->
                          <dd class="goods-info-choose">
                              <div id="choose" class="spec_list_box">
                                <ul>                             
                                   <li>
                                        <div class="dt">尺寸：</div>
                                        <div class="dd">
                                           <div class="item selected">
                                              <b></b>
                                              <a href="#none">{{ $goods->detailsgoods->type or '有货' }}</a>
                                                <input id="spec_value_37" style="display:none;" type="radio" name="spec_10" value="{{ $goods->detailsgoods->type }}" checked />
                                          </div>
                                        </div>
                                    </li>
                                      <div class="dt">颜色：</div>
                                      <div class="dd">
                                          <div class="item selected">
                                            <b></b>
                                            <a href="{{ $goods->pic }}" title="黄" rel="zoom-id: Zoomer" rev="{{ $goods->pic }}"><img src="{{ $goods->pic }}" width="30" height="30" /><span>{{ $goods->detailsgoods->color }}</span></a>
                                            <input id="spec_value_38" style="display:none;" type="radio" name="spec_11" value="38" checked />
                                          </div>   
                                      </div>
                                    </li>                                                                                           
                                </ul>
                                <ul class="sku">
                                  <li class="skunum_li clearfix">
                                    <div class="ghd" ids="{{$goods->id}}">数量：</div>
                                    <div class="skunum gbd" id="skunum">
                                      <span class="minus" title="减少1个数量"></span>
                                      <input id="number" name="number" type="text" min="1" value="1" onchange="countNum(0)">
                                      <span class="add" title="增加1个数量"></span>&nbsp;件
                                    </div>
                                  </li>
                                </ul>
                              </div>

                             
                          </dd>
                          <!-- 加入购物车 -->
                          <dd class="goods-info-head-cart">
                            <input type="hidden" name="gid" value="{{ $goods->id }}">
                            <input type="hidden" name="discount" value="{{ $goods->discount}}">
                            <input type="hidden" name="goods_kc" value="{{$goods->entrepotsgoods['num'] or '0'}}">                            
                            @if(($goods->entrepotsgoods['num'])>0)
                              <a href="javascript:onclick=car_btn();" class="btn  btn-primary goods-add-cart-btn" > 加入购物车</a>
                            @else
                              <a href="javascript:onclick=car_btn();"  class="btn  btn-gray goods-add-cart-btn"> 暂时缺货 </a>
                            @endif
                            <a href="javascript:onclick=collect({{ $goods->id }});" ids="@if(session('homeflag')){{session('homeuser')['id']}}@else 0 @endif" class=" btn btn-gray  goods-collect-btn ">收藏</a>
                          </dd>
                      </dl>
                  </dt> 
                </dl>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
  <!-- 遮盖层 -->
  <div id="overlay" style="margin: 0px; padding: 0px; border: none; width: 100%; height: 100%; background: rgb(51, 51, 51); opacity: 0.6; z-index: 98; position: fixed; top: 0px; left: 0px; display:none;">
  </div>
  <!-- 显示加入购物车div -->
<div class="add_ok" id="cart_show" style="margin: -106px 0px 0px -243px;z-index: 99; position: fixed; top: 50%; left: 50%; display: none;">
    <div class="tip">
        <i class="iconfont" style="background:url(/home/images/addok.png) no-repeat center 10px"></i>商品已成功加入购物车
    </div>
    <div class="go">
        <a href="javascript:location.reload(true)" class="back">&lt;&lt;继续购物</a>
        <a href="/home/goods/shopcar" class="btn">去结算</a>
    </div>
</div>
  <!-- 本也商品详情开始 -->
  <div class="full-screen-border"></div>
  <div class="goods-detail-main">
  
  <!-- 详情导航栏 -->
    <div class="goods-detail-nav" id="goodsDetail">
      <div class="container">
          <ul class="detail-list">
            <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a> </li>
            <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a> </li>
            <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">评价晒单(<em>{{ round($discuss_count) }}</em>)</a></li>
            <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">其他</a></li>
          </ul>
        </div>
    </div>

    <!-- 跟随页面滚动的 头部导航 -->
    <div class="goods-sub-bar" id="goodsDetail" style="z-index: 999999; top: -80px;">
      <div class="container">
          <ul class="detail-list">
            <li class="on"> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a> </li>
            <li class=""> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a> </li>
            <li class=""><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">评价晒单(<em>{{ round($discuss_count) }}</em>)</a></li>
            <li class=""><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">其他</a></li>
          </ul>
          <dl class="goods-sub-bar-info clearfix">
          <dt><img src="{{ $goods->pic }}" alt="{{ $goods['name'] }}"></dt>
            <dd>
              <strong>{{ $goods['name'] }}</strong>
                <p><em>{{ $goods->detailsgoods['type'] or '有货' }}  @if($goods->entrepotsgoods['num'] >0) 现货购买@else 暂时缺货 @endif</em></p>
            </dd>
        </dl>
        @if(($goods->entrepotsgoods['num'])>0)
          <a href="javascript:onclick=car_btn();" class="btn  btn-primary goods-add-cart-btn" > 加入购物车</a>
        @else
          <a href="javascript:onclick=car_btn();"  class="btn  btn-gray goods-add-cart-btn"> 暂时缺货 </a>
        @endif
        </div>
    </div>
    <!-- 详情导航栏结束 -->
    <div class="product_tabs">
      <!-- 库存是否为空 -->
  <script>
  // 定义函数作为显示弹框
    function carshows(){
      $('#cart_show').css('display','block');
      $('#overlay').css('display','block');
    }

    function car_btn(){ 
  
    //初始化laiyui
      var  gid =  $('#goods-id').text();
      // console.log(gid);
      var gkc = $('#goods-kc').text();
      if(gkc == '暂时缺货'){
          layui.use('layer', function(){
          var layer = layui.layer;
          layer.msg('暂时缺货');
          });
        return false;
      }else{
        //获取商品id
        var id = $('.ghd').attr('ids');
        //获取商品数量
        var num = $('#number').val();
        // alert(num);
        $.get('/home/goods/shopadd',{'id':id,'num':num},function(data){
              if(data==1){
                carshows();
              }
        });
        
      }
    }


    //增加减少商品数量
    $("#skunum").on('click', 'span', function(e) {
      if ($(this).hasClass("add")) {
        countNum(1);
      } else {
        countNum(-1);
      }
    return false;
    });
    function countNum(i) {
    var $count_box = $("#skunum");
    var $input = $count_box.find('input');
    var num = $input.val();
      if (!$.isNumeric(num)) {
         layui.use('layer', function(){
          var layer = layui.layer;
          layer.msg('请您输入正确的购买数量!');
          });
          $input.val('1');
          return;
    }
      num = parseInt(num) + i;
      switch (true) {
      case num == 0:
        $input.val('1');
        layui.use('layer', function(){
          var layer = layui.layer;
          layer.msg('您至少得购买1件商品！');
          });
          break;
          default:
          $input.val(num);
          break;
    }
  }

  //收藏的ajax
  //商品收藏
  function collect(id)
  {
    var uid = $('a[ids]').attr('ids');
    if(uid == 0){
      layui.use('layer', function(){
             var layer = layui.layer;
             layer.msg("请先登录再收藏");
             });
      
    }else{
      $.get('/home/collect/addcollect',{'gid':id,'uid':uid},function(data){
        if(data == 1){
          layui.use('layer', function(){
               var layer = layui.layer;
               layer.msg("收藏成功");
             });  
        }else if(data == 0){
          layui.use('layer', function(){
               var layer = layui.layer;
               layer.msg("已收藏,请至收藏夹查看");
             });
        }else{
          layui.use('layer', function(){
               var layer = layui.layer;
               layer.msg("收藏失败,请重试");
             });
        }
      });
    } 
  }

  </script>
      
      
      <!-- 详情描述 -->
      <div class="goods-detail-desc goods_con_item">
        <div class="container">
            <div class="shape-container">
                @foreach($goods->goodimages as $gk=>$gv)
                <p><img  style="margin-top:50px;" alt="" src="{{ $gv->images }}" /></p>
                @endforeach                       
             </div>
        </div>
      </div>
      <!-- 详情描述结束 -->



    <!-- 规格参数开始  -->
      <div class="goods-detail-nav-name-block goods_con_item">
        <div class="container main-block">
          <div class="border-line"></div>
            <h2 class="nav-name">规格参数</h2>
        </div>
      </div>


      <!-- 参数内容 -->
      <div class="goods-detail-param">
          <div class="container">
            <ul class="param-list">
              <li class="goods-img"><img src="{{ $goods->pic }}" alt="{{ $goods->name }}" /></li>
                <li class="goods-tech-spec">
                  <ul>
                        <li>  {{   $goods->detailsgoods->describe }}</li>
                    </ul>
                </li>
            </ul>
          </div>
      </div>
    <!-- 规格参数结束 -->



    <!-- 评价晒单头部标题 -->
      <div class="goods-detail-nav-name-block goods_con_item">
        <div class="container main-block">
          <div class="border-line"></div>
            <h2 class="nav-name">评价晒单</h2>
        </div>
      </div>


      <!-- 评价晒单开始 -->
      <div class="goods-detail-comment hasContent z-com-box-head">
         <div id="ECS_COMMENT">
              
          <div class="goods-detail-comment-groom" style="border-width:0 0 1px 0">

            <div class="container">
                <ul class="main-block clearfix">
                    <li class="percent">
                        <div class="per-num"><i>{{ round($discuss_count_good/$discuss_count*100)}}</i>%</div>
                        <div class="per-title">购买后满意</div>
                        <div class="per-amount"><i>{{ round($discuss_count) }}</i>名用户投票</div>
                    </li>
                    <li>
                        <ul class="z-point-list" id="min_points">
                          <li>
                            <label>好评：</label>
                            <p> <span style="width: {{ round($discuss_count_good/$discuss_count*100)}}%;"></span> </p>
                            <em>{{ round($discuss_count_good/$discuss_count*100)}}%</em> </li>
                          <li>
                            <label>中评：</label>
                            <p> <span style="width: {{ round($discuss_count_between/$discuss_count*100)}}%;"></span> </p>
                            <em>{{ round($discuss_count_between/$discuss_count*100)}}%</em> </li>
                          <li>
                            <label>差评：</label>
                            <p> <span style="width: {{ round($discuss_count_bad/$discuss_count*100)}}%;"></span> </p>
                            <em>{{ round($discuss_count_bad/$discuss_count*100)}}%</em> </li>
                        </ul>
                    </li>
                    <li class="i-want-comment">
                        <div>对自己购买过的商品进行评价，它将成为大家购买参考依据。</div>
                        <div class="good_com_box"> 
                         所有用户都可以对该商品 
                         <a href="javascript:void(0);" onClick="commentsFrom()" id="go_com" class="btn btn-primary">我要评价</a>    
                        </div>
                    </li>

                </ul>
            </div>
      </div>
      <!-- 评价晒单结束 -->


   <!-- 评论 -->
      <div class="goods-detail-comment-content">
        <div class="container">

            
            <div class="row" id="discuss">
            @if(round($discuss_count)==0)  
            <div class="comment-order-title"><h3 class="nav-name">当前商品的评论为空</h3></div>
            @endif
                <div class="span20 goods-detail-comment-list" @if(round($discuss_count)==0)  style="display:none;"@endif>
                      <div class="comment-order-title" id="dis_title">
                         <!-- 评价搜索表单 -->
                        <form action="/home/goods/detail/{{ $goods->id }}" id="form_search">
                          <label><input type="radio" name="search" value="">全部评价（{{ round($discuss_count)}}）</label>
                          <label><input type="radio" name="search" value="3" >好评({{ $discuss_count_good }})</label>
                          <label><input type="radio" name="search" value="2">中评({{ $discuss_count_between }})</label>
                          <label><input type="radio" name="search" value="1" class="search">差评({{ $discuss_count_bad }})</label>
                          <button id="search" class="btn btn-danger">查看</button>
                        </form>
                      </div>

                      <script>
                      
                        for(var i =0; i< $('#form_search input').length;i++){
                          $('#form_search input').eq(i).click(function(){
                          this.attr('checked',true);
                          })
                        }
                      </script>


                      <!-- 评论列表 -->
                      <ul class="comment-box-list" id="discuss1">
                        @foreach($discuss as $gk=>$gv) 
                         <li class="item-rainbow-1">
                            <div class="user-image"> <img class="face_img" src="{{ $gv->userdiscuss->Userdetails['face'] }}"> </div>
                            <div class="user-emoj">
                            @if( ($gv->rank) ==3 )
                              <img src="/home/picture/333.gif" alt="">
                              @elseif(($gv->rank) ==2 )
                              <img src="/home/picture/222.gif" alt="">
                              @else
                              <img src="/home/picture/111.gif" alt="">
                              @endif
                            </div>
                            <div class="user-name-info">
                              <span class="user-name">{{ $gv->userdiscuss['username'] or '匿名用户' }}</span> 
                              <span class="user-time">{{ $gv->created_at }}</span>
                              <span class="pro-info"></span>
                            </div>
                              <dl class="user-comment">
                                  <dt class="user-comment-content"><p class="content-detail">{{ $gv->content }}</p></dt>
                                  <!-- <dd style="margin-left:20px;">
                                    <span><img src="{{ $gv->userdiscuss->Userdetails['face'] }}" width="40px" height="40px" alt=""></span>
                                    <span><p>11111111111111</p></span>
                                  </dd> -->
                                  <dd class="user-comment-self-input hide">
                                  <!-- 回复 -->
                                    <div class="input-block">
                                          <input type="text" placeholder="回复楼主" class="J_commentAnswerInput">
                                          <a href="javascript:void(0);" class="btn  answer-btn J_commentAnswerBtn">回复</a>

                                    </div>
                                    <!-- 回复列表 -->

                                  </dd>
                              </dl>
                          </li> 
                       @endforeach  
                      </ul>
              
                      <!-- 评论块结束 -->
                  </div>
            </div>

            <!-- 分页 -->
            <div id="page" class="center" style="margin-left:40%;"> {!! $discuss->render() !!}</div>
        </div> 
      </div>




<div class="z-com-box-head">

<div class="z-com-list" id="ECS_COMMENT"> 
  <div id="compage"> 
  </div>
</div>


<!-- 点击评价弹框 -->
<div id="commentsFrom">
  <form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
  {{ csrf_field() }}
    <ul class="form addr-form" id="addr-form">
    <span style="position:absolute; right:10px; top:5px; font-size:24px; cursor:pointer;" onClick="easyDialogclose()">×</span>
        <li>
          <label>用户名</label>
          @if(session('homeflag')) {{ session('homeuser.username') }}
          @else   匿名用户
          @endif
        </li>
        <li>
          <label>评价等级</label>
           <label> <input name="comment_rank" type="radio" value="1" id="comment_rank1" />
            差评<img src="/home/picture/stars1.gif" /></label>
           <label> <input name="comment_rank" type="radio" value="2" id="comment_rank2" />
            中评<img src="/home/picture/stars2.gif" /></label>
            <label><input name="comment_rank" type="radio" value="3" id="comment_rank3" checked />
            好评<img src="/home/picture/stars3.gif" /></label>
      </li>
        <li>
          <label>评论内容</label>
          <textarea name="content" class="txt" style="height:80px; width:300px;"></textarea><span></span>
      </li>
      <li> 
             
              <label>验证码</label>
              <input class="tt-text" name="captcha">
              <img src="{{captcha_src()}}" onclick="rand_yzm(this)" title="点击更换" id="captcha">
              <script>
                 function rand_yzm(obj){
                    obj.src = obj.src+'?a='+Math.random();  
                 }
              </script>


       </li>
      <li>
          <input type="hidden" name="uid" value="{{ session('homeuser.id') }}" />
          <input type="hidden" name="gid" value="{{ $goods->id }}" />
          <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
         <input name="" type="submit"  value="提交评论" class="btn" style="border:none; height:40px; cursor:pointer; width:150px; font-size:16px;">
      </li>

    </ul>
  </form>
</div>
<!-- 评论弹框结束 -->









<!-- 商品咨询锚点 -->
<div id="ECS_QUESTION" class="goods-detail-nav-name-block goods_con_item">
</div>









 
      <!-- 商品评论弹框js验证 -->
      <script type="text/javascript">
        // 表单提交事件
        // var spans = $('#commentForm span');

        // console.log(span);
        // $('#commentForm').submit(function(){



        // })
        var cmt_empty_username = "请输入您的用户名称";
        var cmt_empty_content = "您没有输入评论的内容";
        var captcha_not_null = "验证码不能为空!";
        var captcha_not_num = "验证码错误!";
        var cmt_invalid_comments = "无效的评论内容!";


        /**
         * 提交评论信息
        */
        function submitComment(frm)
        {
          var cmt = new Object;
          cmt.content         = frm.elements['content'].value;
          cmt.uid            = frm.elements['uid'].value;
          cmt.gid              = frm.elements['gid'].value;
          cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
          cmt.rank            = 0;

          for (i = 0; i < frm.elements['comment_rank'].length; i++)
          {
            if (frm.elements['comment_rank'][i].checked)
            {
               cmt.rank = frm.elements['comment_rank'][i].value;
             }
          }


           if (cmt.content.length == 0)
           {
              layui.use('layer', function(){
              var layer = layui.layer;
              layer.msg(cmt_empty_content);
              });
              return false;
           }

           if (cmt.captcha.length == 0 )
           {
              layui.use('layer', function(){
              var layer = layui.layer;
              layer.msg(captcha_not_null);
              });
              return false;
           }
          if (cmt.captcha.length != 4 )
           {
              layui.use('layer', function(){
              var layer = layui.layer;
              layer.msg(captcha_not_num);
              });
              return false;
           }

            //发布评论
              var time = null;
              $.ajax({
                        url:'/home/discuss/store',
                        type:'get',
                        data:cmt,
                        success:function(msg){
                           if(msg == 1){
                    // alert('发表成功');
                      //关闭编辑窗口
                      layui.use('layer', function(){
                      var layer = layui.layer;
                      layer.msg('评论发布成功');
                      });
                      
                      easyDialog.close({
                          container : 'commentsFrom'
                      });

                    if(time == null ){
                                  time = setInterval(function(){
                                  location.reload(true);
                                   },500);
                              } 

                           }   
                        },
                        async:false,
                    });
           return false;
        }

        /**
         * 处理提交评论的反馈信息
        */
        function commentResponse(result)
        {
          if (result.message)
          {
            alert(result.message);
          document.getElementById("captcha").src='captcha.php?'+Math.random();
          }

          if (result.error == 0)
          {
            var layer = document.getElementById('ECS_COMMENT');

            if (layer)
            {
              layer.innerHTML = result.content;
            }
          easyDialog.close();
          window.location.reload();
          }
        }
          //开启窗口表单
        function commentsFrom(){
          easyDialog.open({
              container : 'commentsFrom'
          }); 
        }

        //关闭窗口按钮
        function easyDialogclose(){
          easyDialog.close();
        }
      </script>

      </div>
    </div>
        
      
    </div>
  </div>
</div>



<!-- 商品详情结束 -->
@endsection