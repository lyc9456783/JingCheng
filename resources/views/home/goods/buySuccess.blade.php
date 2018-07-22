@extends('home.common.common')

@section('content')
<link rel="stylesheet" href="/home/css/buy-success.css">
<link rel="stylesheet" href="/home/css/base.css">

    <div class="container" style="margin-top:30px;">
        <div class="buy-succ-box clearfix">
            <div class="goods-content" id="J_goodsBox"> 
	            <div class="goods-img"> <img src="//c1.mifile.cn/f/i/17/static/success.png" width="64" height="64"> </div> 
	            <div class="goods-info"> <h3>已成功加入购物车！</h3> <span class="name">{{ $data->name }}  {{$data->detailsgoods->type }} {{$data->detailsgoods->color }}  </span></div>
            </div>

            <div class="actions J_actBox">
               
                <a href="/product/{{$data->id}}" class="btn btn-line-gray J_goBack" data-stat-id="a94b28cf0173e345">返回上一级</a>
                <a href="//static.mi.com/cart/" class="btn btn-primary" data-stat-id="09acb663a7990353" onclick="_msq.push(['trackEvent', '5d44e1854f66a225-09acb663a7990353', '//static.mi.com/cart/', 'pcpid', '']);">去购物车结算</a>
            </div>
        </div>

    
    </div>

@endsection('content')