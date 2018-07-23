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
                    <a class="" href="/home/address/create">新增地址</a>
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

<div class="span16">
    <div class="my_nala_centre ilizi_centre">
    <div class="ilizi cle">
    <div class="box">
    <div class="box_1">
    <div style="font-size:20px;width:400px;margin:center;">{{$title}}</div>
      <!-- <h1 style="text-size:50px;">{{$title}}</h1> -->
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"><tbody>
            <tr align="center">
                <td bgcolor="#ffffff">商品名称</td>
                <td bgcolor="#ffffff">价格</td>
                <td bgcolor="#ffffff">操作</td>
            </tr>
            @foreach($data as $k=>$v)
            <tr>
                <td align="center" bgcolor="#ffffff">{{ $v->collectgoods['name'] }}</td>
                <td align="center" bgcolor="#ffffff">{{ $v->collectgoods['price'] }}</td>
                <td class="td-manage" align="center" bgcolor="#ffffff">
                    <a title="删除" href="/home/collect/delete/{{ $v['id'] }}" style="text-decoration:none">
                        <i class="layui-icon">&#xe640;删除</i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>       
    <!-- 右侧内容框架，更改从这里结束 -->
    </div>
    </div>
    </div>
    </div>
</div>
</div>

<script class="resources library" src="/admins/js/area.js" type="text/javascript"></script>
<script type="text/javascript">_init_area();</script>
<script type="text/javascript">
    var Gid  = document.getElementById ;

    var showArea = function(){

      Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +  

      Gid('s_city').value + " - 县/区" + 

      Gid('s_county').value + "</h3>"
      }
    Gid('s_county').setAttribute('onchange','showArea()');
</script>

@endsection 