@extends('home.common.common')

@section('content')
<link href="/home/css/style.css" rel="stylesheet" type="text/css">
<link href="/home/css/user.css" rel="stylesheet" type="text/css">
<div id="wrapper" class="container">    
<div class="breadcrumbs">
    <div class="container">
        <a href="/">首页</a> <code>&gt;</code>用户中心
    </div>
</div>        
<div class="slidebar">
    <ul class="slide_item">
        <li class="item">
            <div class="root_node">订单中心</div>
            <ul>
                <li>
                    <a class="" href="/home/orders/index">我的订单</a>
                    <a class="" href="/home/address/index">收货地址</a>
                </li>
            </ul>
        </li>
        <li class="item">
            <div class="root_node">会员中心</div>
            <ul>
                <li>
                    <a class="" href="/home/users/index">我的个人中心</a>
                    <a class="" href="/home/pass/index">修改密码</a>
                    <a class="" href="/home/users/edit">用户信息</a>
                    <a class="" href="/home/collect/index">我的收藏</a>
                    <a class="" href="/home/discuss/index">我的评论</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
			
    <div class="my_nala_centre ilizi_centre">
    <div class="ilizi cle">
      	<div class="box">
     <div class="box_1">
      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
         
              
        
      
        <h1>我的订单</h1>
       <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
          <tbody>
          <tr align="center">
            <td bgcolor="#ffffff">订单号</td>
            <td bgcolor="#ffffff">下单时间</td>
            <td bgcolor="#ffffff">订单总金额</td>
            <td bgcolor="#ffffff">订单状态</td>
            <td bgcolor="#ffffff">操作</td>
          </tr>
          @foreach($orders as $k=>$v)
          <tr>
            <td align="center" bgcolor="#ffffff"><a href="/home/orders/show/{{$v->id}}" class="f6">{{$v->ordersnum}}</a></td>
            <td align="center" bgcolor="#ffffff">{{$v->created_at}}</td>
            <td align="center" bgcolor="#ffffff">{{$v->total}}元</td>
            @if($v->status == 0)
                <td align="center" bgcolor="#ffffff">未发货</td>
            @elseif($v->status == 1)
                <td align="center" bgcolor="#ffffff">以发货</td>
            @else
                <td align="center" bgcolor="#ffffff">交易完成</td>
            @endif
            <td align="center" bgcolor="#ffffff">
                <font class="f6">
                    <a href="/home/orders/update/{{$v->id}}" onclick="if (!confirm(&#39;您确认要删除该订单吗？确认后此订单将被删除&#39;)) return false;">删除订单</a>
                </font>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
       
<form name="selectPageForm" action="" method="get">
<div class="clearfix">
    <div id="pager" class="pagebar">
        <span class="f_l f6" style="margin-right:10px;">总计 <b>{{$count}}</b> 个记录</span>    
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


      </div>
     </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
@endsection 