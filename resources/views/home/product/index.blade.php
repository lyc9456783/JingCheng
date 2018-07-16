@extends('home.common.common')

@section('content')
<link href="/home/css/goods.css" rel="stylesheet" type="text/css" />
<link href="/home/css/consultations.css" rel="stylesheet" type="text/css" />
<!-- 导航历史记录 -->
<div class="breadcrumbs">
	<div class="container">
    	<a href="javascript:viod(0);">首页</a> <code>&gt;</code> 
    	<a href="javascript:viod(0);">购买电视与平板</a> <code>&gt;</code> 
    	<a href="javascript:viod(0);">小米电视2</a> <code>&gt;</code> 小米电视2 40英寸         
    </div>
</div>
<!-- 导航历史记录结束 -->

<!-- 商品详情中部导航文件 -->
<script type="text/javascript" src="/home/js/magiczoomplus.js"></script>
<script type="text/javascript" src="/home/js/easydialog.min.js"></script>
<script type="text/javascript" src="/home/js/xiaomi_goods_li.js"></script>

<!-- 商品详情开始 -->
<div class="goods-detail">
  <div class="goods-detail-info  clearfix J_goodsDetail">
  	<div class="container">
    	<div class="row">
          <div class="span13  J_mi_goodsPic_block goods-detail-left-info">
          
         	<div class="goods-pic-box" id="detail_img">
	          <!-- 商品中间的大图 -->
	          <div class="goods-big-pic"> 
	          	<a href="{{ $goods->pic }}" class="MagicZoomPlus" id="Zoomer" rel="hint-text: ; selectors-effect: false; selectors-class: current; zoom-distance: 60;zoom-width: 400; zoom-height: 400;" > 
	            	<img  alt="{{ $goods->name }}" src="{{ $goods->pic }}"> 
	            </a> 
	          </div>

			  <div class="goods-small-pic" id="item-thumbs">
			  	<a class="prev" href="javascript:void(0);"></a>
			  	<a class="next" href="javascript:void(0);"></a>
			  	<div class="bd">
			    	<ul class="cle" style="position: relative; padding: 0px; margin: 0px; top: 0px;">
			          <!-- 商品小图左边 -->
			          <!--  -->
			          <li class="current"> 
			          	<a href="{{ $goods->pic }}" rel="zoom-id: Zoomer" rev="{{ $goods->pic }}"> 
			            	<img alt="{{ $goods->name }}" src="{{ $goods->pic }}"> 
			            </a>
			          </li>
			          @foreach($goods->goodimages as $gk=>$gv)
			          <li style="height: 60px;"> 
			          	<a href="{{ $goods->pic }}" rel="zoom-id: Zoomer" rev="{{ $goods->pic }}" class="" style="outline: 0px; display: inline-block;"> 
			            	<img alt="{{ $goods->name }}" src="{{ $gv->images }}"> 
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
          <form action="javascript:addToCart(27,1)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
            
            <div class="goods-info-box" id="item-info">
              <dl class="loaded">
              	<dt class="goods-info-head">
                	<dl>
                    	<dt class="goods-name">{{ $goods->name }}</dt>
                        <dd class="goods-phone-type"><p>{ name下的副标题 }</p></dd>
                            <del>专柜价： <em class="cancel">888<em>元</em></em></del>
                        <dd class="goods-info-head-price clearfix">
                            <span>本店价：</span> 
                             <span class="unit"> <b class="nala_price red" id="ECS_SHOPPRICE">{{ $goods->discount }}<em>元</em> </b> </span>  
                       	</dd>
                        <dd>
                            <ul>
                              <li> <span class="lbl">商品货号</span> <em>{{ $goods->id }}</em> </li>
                              <li> <span class="lbl">商品库存</span> <em> 9999</em> </li>
                              <li> <span class="lbl">上架时间：</span> <em>{{ $goods->created_at }}</em> </li>
                              <li> <span>最低起订数量：<em class="ys">1 </em>（请按最低起订数<em class="ys">1 </em>的倍数购买）</span>
                                 <input name="number2" type="hidden" id="number2" value="1" />
                              </li>
                           </ul>
                        </dd>
                        <dd class="goods-info-choose">
                            <div id="choose" class="spec_list_box">
                              <ul>                             
                                 <li>
                                      <div class="dt">尺寸：</div>
                                      <div class="dd">
                                         <div class="item selected">
                                            <b></b>
                                            <a href="#none" title="45">{{ $goods->goodimages->type }}</a>
                                              <input id="spec_value_37" style="display:none;" type="radio" name="spec_10" value="37" checked />
                                        </div>
                                      </div>
                                  </li>

                                    <div class="dt">颜色：</div>
                                    <div class="dd">
                                        <div class="item selected">
                                          <b></b>
                                          <a href="{{ $goods->pic }}" title="黄" rel="zoom-id: Zoomer" rev="{{ $goods->pic }}"><img src="{{ $goods->pic }}" width="30" height="30" /><span>黄</span></a>
                                          <input id="spec_value_38" style="display:none;" type="radio" name="spec_11" value="38" checked />
                                        </div>
                                        <div class="item">
                                          <b></b>
                                          <a href="222222222222" title="黑白" rel="zoom-id: Zoomer" rev="{{ $goods->pic }}"><img src="/home/picture/27_thumb_p_1440636492790.jpg" width="30" height="30" /><span>黑白</span></a>
                                          <input id="spec_value_81" style="display:none;" type="radio" name="spec_11" value="81"  />
                                        </div>     
                                    </div>
                                  </li>                                                                                           
                              </ul>
                            </div>

	                          <style>
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

	                          <script>
	                          $(".spec_list_box .item a").click(function(){
	                              $(this).parents(".dd").find(".item").removeClass("selected");
	                              $(this).parent().addClass("selected");
	                              $(this).parents(".dd").find("input:radio").prop("checked",false);
	                              $(this).parent().find("input:radio").prop("checked",true);
	                              changePrice();
	                          })
	                          </script>

                          <ul class="sku">
                            <li class="skunum_li clearfix">
                              <div class="ghd">数量：</div>
                              <div class="skunum gbd" id="skunum">
                                <span class="minus" title="减少1个数量"></span>
                                <input id="number" name="number" type="text" min="1" value="1" onchange="countNum(0)">
                                <span class="add" title="增加1个数量"></span>&nbsp;件
                              </div>
                            </li>
                          </ul>
                        </dd>
                        
                        <dd class="goods-info-head-cart">
                          <a href="javascript:addToCart(27,1)" class="btn  btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i>加入购物车</a>
                          <a href="javascript:collect(27)" class=" btn btn-gray  goods-collect-btn " id="fav-btn"><i class="iconfont"></i>喜欢</a>
                        </dd>
                        <dd class="goods-info-head-userfaq clearfix">
                            <ul>
                                <li class=""><i class="iconfont"></i> 销量 <b>1</b></li>
                                <li class="J_scrollcomment mid"><i class="iconfont"></i> 评价 <b>6</b></li>
                                <li class="J_scrollcomment"><i class="iconfont"></i> 满意度 <b>83%</b></li>
                            </ul>
                        </dd>
                    </dl>
                </dt>
                
              </dl>
            </div>
          </form>

<script type="text/javascript">
if (document.getElementById('history_list').innerHTML.replace(/\s/g,'').length<1)
{
    document.getElementById('seemore_items').style.display='none';
}
else
{
    //document.getElementById('seemore_items').style.display='block';
}
function clear_history()
{
Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res)
{
document.getElementById('history_list').innerHTML = '您已清空最近浏览过的商品';
}
</script>          </div>
        </div>
  	</div>
  </div>
  <div class="container" style=" margin-bottom:50px;">

  <!-- 推荐组合 -->
  <div> </div>

  <!-- 推荐组合结束 -->




  <!-- 本也商品详情开始 -->
  <div class="full-screen-border"></div>
  <div class="goods-detail-main">

  	<div class="goods-detail-nav" id="goodsDetail">
    	<div class="container">
          <ul class="detail-list">
            <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a> </li>
            <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a> </li>
            <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">评价晒单(<em>6</em>)</a></li>
            <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">商品咨询</a></li>
          </ul>
        </div>
    </div>
    <div class="product_tabs">
      
      <div class="goods-detail-desc goods_con_item">
        <div class="container">
            <div class="shape-container">
                <p><img width="720" height="598" alt="" src="/home/picture/20150818160807.png" /></p>
               <!--  <p>&nbsp;</p>
                <p><img width="720" height="572" alt="" src="/home/picture/20150818160916.png" /></p>
                <p><img width="1351" height="762" alt="" src="/home/picture/er08150123.png" /></p>
                <p><img width="1138" height="867" alt="" src="/home/picture/ger908150140.png" /></p> -->                           
             </div>
        </div>
      </div>



     <!-- 规格参数开始 -->
      <div class="goods-detail-nav-name-block goods_con_item">
      	<div class="container main-block">
        	<div class="border-line"></div>
            <h2 class="nav-name">规格参数</h2>
        </div>
      </div>
      <div class="goods-detail-param">
          <div class="container">
          	<ul class="param-list">
            	<li class="goods-img"><img src="/home/picture/27_thumb_p_1440636492790.jpg" alt="小米电视2 40英寸" /></li>
                <li class="goods-tech-spec">
                	<ul>
                        <li>产品名称：小米电视2 40英寸</li>
                                                                    </ul>
                </li>
            </ul>
          </div>
      </div>
      <!-- 规格参数结束 -->


      <!-- 评价晒单开始 -->
      <div class="goods-detail-nav-name-block goods_con_item">
      	<div class="container main-block">
        	<div class="border-line"></div>
            <h2 class="nav-name">评价晒单</h2>
        </div>
      </div>

<div class="goods-detail-comment hasContent z-com-box-head">
   <div id="ECS_COMMENT">
        
    <div class="goods-detail-comment-groom" style="border-width:0 0 1px 0">

      <div class="container">
          <ul class="main-block clearfix">
              <li class="percent">
                  <div class="per-num"><i>83</i>%</div>
                  <div class="per-title">购买后满意</div>
                  <div class="per-amount"><i>6</i>名用户投票</div>
              </li>
              <li>
              	  <ul class="z-point-list" id="min_points">
                    <li>
                      <label>好评：</label>
                      <p> <span style="width: 83%;"></span> </p>
                      <em>83%</em> </li>
                    <li>
                      <label>中评：</label>
                      <p> <span style="width: 17%;"></span> </p>
                      <em>17%</em> </li>
                    <li>
                      <label>差评：</label>
                      <p> <span style="width: 0%;"></span> </p>
                      <em>17%</em> </li>
                  </ul>
              </li>
              <li class="i-want-comment">
              	  <div>对自己购买过的商品进行评价，它将成为大家购买参考依据。</div>
                  <div class="good_com_box"> 
                                      所有用户都可以对该商品 <a href="javascript:void(0);" onClick="commentsFrom()" id="go_com" class="btn btn-primary">我要评价</a> 
                     
                  </div>
              </li>
          </ul>
      </div>

    </div>

<div class="goods-detail-comment-content">
	<div class="container">
    	<div class="row">
        	<div class="span20 goods-detail-comment-list">
            	<div class="comment-order-title">
                	<div class="left-title"><h3 class="comment-name">最有帮助的评价（6） </h3></div>
                	<div class="right-title J_showImg"><i class="iconfont">√</i> 只显示带图评价</div>
                </div>

                <!-- 评论的内容 以及分页 -->
                <ul class="comment-box-list">   	 
                   <li class="item-rainbow-1">
                      <div class="user-image"> <img class="face_img" src="/home/picture/default_45.png"> </div>
                      <div class="user-emoj">
                      	超爱<i class="iconfont"></i>
                      </div>
                      <div class="user-name-info">
                        <span class="user-name">匿名用户</span> 
                      	<span class="user-time">2015-09-08 07:00:30</span>
                        <span class="pro-info"></span>
                      </div>
                        <dl class="user-comment">
                          	<dt class="user-comment-content"><p class="content-detail">{评论的内容}</p></dt>
                            <dd class="user-comment-self-input hide">
                            	<div class="input-block">
                                    <input type="text" placeholder="回复楼主" class="J_commentAnswerInput">
                                    <a href="javascript:void(0);" class="btn  answer-btn J_commentAnswerBtn">回复</a>
                                </div>
                            </dd>
                        </dl>
                    </li> 
                    <li class="pagenav">
                        <form name="selectPageForm" action="/goods.php" method="get">
                            <a href="javascript:;" class="step" style="border:1px solid #eee; color:#ccc;">上一页</a>                  
                            <a href="javascript:;" class="step" style="border:1px solid #eee; color:#ccc;">下一页</a>            
                        </form>
                    </li>
                </ul>
                <!-- 评论块结束 -->
            </div>
        </div>
    </div>
</div>
  


<div class="z-com-box-head">

<div class="z-com-list" id="ECS_COMMENT"> 
  
  
  <div id="compage">
   
  </div>
</div>
<script type="Text/Javascript" language="JavaScript">
        <!--
        
        function selectPage(sel)
        {
          sel.form.submit();
        }
        
        //-->
        </script> 

<!-- 点击评价弹框 -->
<div id="commentsFrom">
  <form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
    <ul class="form addr-form" id="addr-form">
    <span style="position:absolute; right:10px; top:5px; font-size:24px; cursor:pointer;" onClick="easyDialog.close();">×</span>
      <li>
        <label>用户名</label>
        匿名用户      </li>
         <li>
        <label>E-mail</label>
       <input type="text" name="email" id="email"  maxlength="100" value="" class="txt"/>
      </li>
         <li>
        <label>评价等级</label>
       	  <input name="comment_rank" type="radio" value="1" id="comment_rank1" />
          <img src="/home/picture/stars1.gif" />
          <input name="comment_rank" type="radio" value="2" id="comment_rank2" />
          <img src="/home/picture/stars2.gif" />
          <input name="comment_rank" type="radio" value="3" id="comment_rank3" />
          <img src="/home/picture/stars3.gif" />
          <input name="comment_rank" type="radio" value="4" id="comment_rank4" />
          <img src="/home/picture/stars4.gif" />
          <input name="comment_rank" type="radio" value="5" checked="checked" id="comment_rank5" />
          <img src="/home/picture/stars5.gif" />
      </li>
            <li>
        <label>评论内容</label>
       <textarea name="content" class="txt" style="height:80px; width:300px;"></textarea>
      </li>
         <li> 
     <label>验证码</label>

              <input type="text" class="txt" name="captcha" maxlength="6">
              <img src="/home/picture/captcha.php" alt="captcha" id="captcha" onClick="this.src='captcha.php?'+Math.random()" width="100" height="34" style="height:34px;" > </li>
              
              
 
      <li>
      	<input type="hidden" name="cmt_type" value="0" />
        <input type="hidden" name="id" value="27" />
        <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
       <input name="" type="submit"  value="提交评论" class="btn" style="border:none; height:40px; cursor:pointer; width:150px; font-size:16px;">
      </li>
    </ul>
  </form>
</div>
<!-- 评论弹框结束 -->

 

<script type="text/javascript">
//<![CDATA[
var cmt_empty_username = "请输入您的用户名称";
var cmt_empty_email = "请输入您的电子邮件地址";
var cmt_error_email = "电子邮件地址格式不正确";
var cmt_empty_content = "您没有输入评论的内容";
var captcha_not_null = "验证码不能为空!";
var cmt_invalid_comments = "无效的评论内容!";

/**
 * 提交评论信息
*/
function submitComment(frm)
{
  var cmt = new Object;

  //cmt.username        = frm.elements['username'].value;
  cmt.email           = frm.elements['email'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = 0;

  for (i = 0; i < frm.elements['comment_rank'].length; i++)
  {
    if (frm.elements['comment_rank'][i].checked)
    {
       cmt.rank = frm.elements['comment_rank'][i].value;
     }
  }

//  if (cmt.username.length == 0)
//  {
//     alert(cmt_empty_username);
//     return false;
//  }

  if (cmt.email.length > 0)
  {
     if (!(Utils.isEmail(cmt.email)))
     {
        alert(cmt_error_email);
        return false;
      }
   }
   else
   {
        alert(cmt_empty_email);
        return false;
   }

   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }

   Ajax.call('comment.php', 'cmt=' + $.toJSON(cmt), commentResponse, 'POST', 'JSON');
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
  
	function commentsFrom(){
		easyDialog.open({
			  container : 'commentsFrom'
		});	
	}
</script></div>
	  </div>
        
      
    </div>
  </div>
</div>



<!-- 商品闲情结束 -->



@endsection