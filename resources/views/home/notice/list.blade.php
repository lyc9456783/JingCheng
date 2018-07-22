@extends('home.common.common')
@section('content')
<style type="text/css">
	.gg{
		width:1240px;
		margin:auto;
		padding:20px;  
		border:1px solid #ccc;  
	}
	.gg tr{
		height:40px;
		line-height:40px;  
		border-bottom:1px dashed #ccc; 
	}
	.gg td{
		width:100px; 
	} 
</style>
<div style="width:1250px;margin:auto;">
    <div class="shopping_mian" style="width: 100%;">
        <div class="ShoppingCart_left" style="padding-left:0px;float:left;line-height:30px;">
            <a href="/">首页</a> &gt; <a href="/home/notice" class="blue">商城公告 &gt;</a>
        </div>
        <form action="/home/notice" method="get" style="float:right">
            <input  type="text" style="width:170px;height:32px;border-radius:10px;" placeholder="请输入标题内容" name="search" >
            <button type="submit" class="layui-btn layui-btn-warm"><i class="layui-icon">&#xe615;</i></button>
        </form>
     	<div style="clear:both"></div>
    </div>
    <font size="15">商城公告</font>
    <div class="gg">
        <table width="1230" align="center">
        	<tr>
        		<td>公告列表</td>
        		<td style="text-align:right;">发布时间</td>
        	</tr>
        	@foreach ($notices as $k=>$v)
        	<tr>
        		<td> <a href="/home/notice/detail/{{$v->id}}"><i class="layui-icon">&#xe602;</i>{{$v->title}}</a>　
                @if((empty($_GET)||$_GET['page']==1)&& empty($_GET['search']))
                     @if($k<3)
                        <img src="/home/images/appnew.png">
                     @endif 
                @endif
                </td>
        		<td style="text-align:right;">{{$v->created_at}}</td>
        	</tr>
        	@endforeach
        </table>
        <div id="page" style="height:30px;margin-top:10px;">{!! $notices->render()!!}</div>    
	</div>
</div>
@endsection