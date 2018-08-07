@extends('home.common.common')
@section('content')
<style type="text/css">
	#gg img{
		width:95%; 
	}
</style>
	<div class="layui-container">
	<div class="ShoppingCart_left" style="padding-left:0px;float:left;line-height:30px;">
            <a href="/">首页</a> &gt; <a href="/home/notice" class="blue">商城资讯 &gt;</a>
            <a href="#" class="blue">资讯详情 </a>
    </div>
    <div style="height:60px;"></div>
	<div style="width:800px;margin:auto;font-size:40px;text-align:center;color:black">{{$detail->title}}</div>
		<div class="layui-row">
		    <div class="layui-col-md2 layui-col-md-offset10" style="text-align:right;">
		      发布作者：{{$detail->users['username']}}
		    </div>
		</div>
		<hr>
		<div class="layui-row" id="gg" style="border:1px solid #ccc;overflow:scroll;height:800px;padding:15px;">
			<div style="width:90%;margin:auto;margin-top:20px;padding:5px;">
				{!! $detail->details !!}
			</div>
			
		</div>
		<div class="layui-row">
			<div class="layui-col-md3 layui-col-md-offset9" style="text-align:right;">发布时间:{{$detail->created_at}}</div>
		</div>
	</div>  
@endsection