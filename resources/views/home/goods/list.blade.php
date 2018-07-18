@extends('home.common.common')
@section('content')
	<div class="container">
    	<a href="/">首页</a> <code>&gt;</code> <a href="/home/goods/list/{{$id}}">{{$dir}}</a></div>
	</div>
	<div class="container">
		<div class="filter-box">
	    	   <div class="filter-list-wrap">
	        	<dl class="filter-list clearfix filter-list-row-2">
	            	<dt>颜色：</dt>
	                    <dd class="active">全部</dd>
	                   	<dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&color=土豪金">土豪金</a></dd>
	                   	<dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&color=珍珠白">珍珠白</a></dd>
	                   	<dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&color=荣耀绿">荣耀绿</a></dd>
	                   	<dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&color=梦幻粉">梦幻粉</a></dd>
	                   	<dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&color=魔力蓝">魔力蓝</a></dd>
	                   	<dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&color=尊贵黑">尊贵黑</a></dd>
	            </dl>
	            <a  href="javascript:;" class="more J_filterToggle">更多<i class="layui-icon">&#xe61a;</i></a>
		      </div>
		      <div class="filter-list-wrap">
	        	<dl class="filter-list clearfix filter-list-row-2">
	            	<dt>型号：</dt>
	                    <dd class="active">全部</dd>
                        <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&type=2G%2b8G">2G+8G</a></dd>
                        <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&type=3G%2b16G">3G+16G</a></dd>
                        <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&type=4G%2b32G">4G+32G</a></dd>
                        <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&type=6G%2b64G">6G+64G</a></dd>
                       	
	            </dl>
	            <a  href="javascript:;" class="more J_filterToggle">更多<i class="layui-icon">&#xe61a;</i></a>
	        </div>

	        <div class="filter-list-wrap">
	        	<dl class="filter-list clearfix filter-list-row-2">
	            	<dt>价格：</dt>
                        <dd class="active">全部</dd>
                            <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&price=0-500">0&nbsp;-&nbsp;500</a></dd>
                            <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&price=500-1500">500&nbsp;-&nbsp;1500</a></dd>
                            <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&price=2000-3000">1500&nbsp;-&nbsp;3000</a></dd>
                            <dd><a href="/home/goods/list/{{$id}}?dir={{$dir}}&price=3000-5000">3000&nbsp;-&nbsp;5000</a></dd>
            	</dl>
	             <a  href="javascript:;" class="more J_filterToggle">更多<i class="layui-icon">&#xe61a;</i></a>
	        </div>
	     </div>
	</div>
	 <div class="content">
		<div class="container">
		
	    	
	        <div class="order-list-box clearfix">
	        <form method="GET" name="listform">
	        <ul class="order-list">
	           <li class=""><a title="价格从低到高" href="/home/goods/list/{{$id}}?dir={{$dir}}&sort=1"  rel="nofollow"><span class="">价格</span></a></li>
	           <li class=""><a title="上架时间" href="/home/goods/list/{{$id}}?dir={{$dir}}&sort=2" rel="nofollow"><span class="">上架时间</span></a></li>
	          <input type="hidden" name="category" value="76" />
	          <input type="hidden" name="display" value="grid" id="display" />
	          <input type="hidden" name="brand" value="0" />
	          <input type="hidden" name="price_min" value="0" />
	          <input type="hidden" name="price_max" value="0" />
	          <input type="hidden" name="filter_attr" value="0" />
	          <input type="hidden" name="page" value="1" />
	          <input type="hidden" name="sort" value="sales_volume" />
	          <input type="hidden" name="order" value="DESC" />
	          </ul>
	        </form>
	      </div>
        <form name="compareForm" action="compare.php" method="post" onSubmit="return compareGoods(this);">
        <div class="goods-list-box">
    	<div class="goods-list clearfix">
    		@foreach ($goods as $k=>$v)
            <div class="goods-item">
	    	 <div class="figure figure-img">
	           <a href="goods.php?id=29"><img src="{{$v->pic}}" alt="{{$v->name}}" class="goodsimg" /></a>
	         </div>
	           <p class="desc">{{$v->intro}}</p>
	          <h2 class="title"><a href="goods.php?id=29" title="{{$v->name}}">{{$v->name}}</a></h2>
	           <p class="price">
	                        本店价<font class="shop_s">{{$v->discount}}<em>元</em></font>
	                                    <del>专柜价<font class="market_s">{{$v->price}}<em>元</em></font></del>
	           </p>
	            <div class="actions clearfix">
	                <a href="javascript:;" class="btn-like J_likeGoods"><i class="layui-icon">&#xe600;</i><span>收藏</span></a> 
	           </div>
	           <div class="flags">
	           			
				    <div class="flag flag-saleoff">8.4折促销</div>
	                      
	          </div>
	        </div>
			@endforeach
	        </div>
	    </div>
	</form>
	          
	<script type="Text/Javascript" language="JavaScript">
	<!--
	function selectPage(sel)
	{
	  sel.form.submit();
	}
	//-->
	</script>     
	<form name="selectPageForm" action="/category.php" method="get">
	<div class="clearfix">
	  	 <div id="page">{!! $goods->render()!!}</div>   
	</div>
	</form>
	<script type="Text/Javascript" language="JavaScript">
	<!--
	function selectPage(sel)
	{
	  sel.form.submit();
	}
	//-->
	</script>
	    </div>
	    
	    <div id="J_renovateWrap" class="xm-recommend-container container xm-carousel-container">
	        <h2 class="xm-recommend-title"><span>为你推荐</span></h2>
	        <div class="xm-recommend">
	            <div class="xm-carousel-wrapper">

	                <ul class="xm-carousel-col-5-list xm-carousel-list clearfix">
	                	@foreach ($recommend as $k=>$v)
	                	<li class="J_xm-recommend-list">
	                        <dl>
	                            <dt><a href="goods.php?id=27" target="_blank"><img src="{{$v->rimg}}" /></a></dt>
	                            <dd class="xm-recommend-name"><a href="goods.php?id=27" target="_blank" title="{{$v->goodrecommend->intro}}">{{$v->goodrecommend->name}}</a></dd>
	                            <dd class="xm-recommend-price">{{$v->goodrecommend->discount}}<em>元</em></dd>
	                            <dd class="xm-recommend-tips"> </dd>
	                        </dl>
	                    </li>
	                    @endforeach
	                </ul>
	            </div>
	            <div class="xm-pagers-wrapper">
	                <ul class="xm-pagers">
	                	<li class="pager"><span class="dot">1</span></li>  
	                   	<li class="pager"><span class="dot">6</span></li>                       
	                </ul>
	            </div>
	        </div>
	    </div>
	 
	 
	</div>
	<div class="add_ok" id="cart_show">
	    <div class="tip">
	        <i class="iconfont"> </i>商品已成功加入购物车
	    </div>
	    <div class="go">
	        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
	        <a href="flow.php" class="btn">去结算</a>
	    </div>
	</div>

@endsection