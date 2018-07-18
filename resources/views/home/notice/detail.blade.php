@extends('home.common.common')
@section('content')

	<div class="layui-container">
	<div class="ShoppingCart_left" style="padding-left:0px;float:left;line-height:30px;">
            <a href="/">首页</a> &gt; <a href="/home/notice" class="blue">商城公告 &gt;</a>
            <a href="#" class="blue">公告详情 &gt;</a>
    </div>
    <div style="height:60px;"></div>
	<div style="width:800px;margin:auto;font-size:40px;text-align:center;color:black">{{$detail->title}}</div>
		<div class="layui-row">
		    <div class="layui-col-md2 layui-col-md-offset10" style="text-align:right;">
		      发布作者：{{$detail->users['username']}}
		    </div>
		</div>
		<hr>
		<div class="layui-row" style="border:1px solid #ccc;height:400px;padding:15px;">
			{!! $detail->details !!}
		</div>
		<div class="layui-row">
			<div class="layui-col-md3 layui-col-md-offset9" style="text-align:right;">发布时间:{{$detail->created_at}}</div>
		</div>
	</div>  
@endsection