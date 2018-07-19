@extends('home.common.common')

@section('content') 
<title>个人中心</title>
<meta name="viewport" content="width=1226">
<meta name="description" content="">
<meta name="keywords" content="小米商城">
<link href="/checkbox/right/style.css" rel="stylesheet" type="text/css">
<link href="/checkbox/right/user.css" rel="stylesheet" type="text/css">

</head>
<body>

<div id="wrapper" class="container">    
    <div class="breadcrumbs">
    <div class="container">
    <a href="http://2016.ecshop119.com/">首页</a> <code>&gt;</code> 用户中心    </div>
</div>
 
    <div class="my_nala_main">   
    <div class="slidebar">
    <ul class="slide_item">
        <li class="item">
            <div class="root_node">订单中心</div>
            <ul>
                <li>
                    <a class="" href="http://2016.ecshop119.com/user.php?act=order_list">我的订单</a>
                    <a class="on" href="http://2016.ecshop119.com/user.php?act=address_list">收货地址</a>
                    <a class="" href="http://2016.ecshop119.com/user.php?act=booking_list">缺货登记</a>
                </li>
            </ul>
        </li>
        <li class="item">
            <div class="root_node">会员中心</div>
            <ul>
                <li>
                    <a class="" href="http://2016.ecshop119.com/user.php">我的个人中心</a>
                    <a class="" href="http://2016.ecshop119.com/user.php?act=profile">用户信息</a>
                    <a class="" href="http://2016.ecshop19.com/user.php?act=collection_list">我的收藏</a>
                    <a class="" href="http://2016.ecshop119.com/user.php?act=message_list">我的留言</a>
                    <a class="" href="http://2016.ecshop119.com/user.php?act=affiliate">我的推荐</a>
                    <a class="" href="http://2016.ecshop119.com/user.php?act=comment_list">我的评论</a> 
                </li>
            </ul>
        </li>
        
        <li class="item">
            <div class="root_node">账户中心</div>
            <ul>
                <li>
                    <a class="" href="http://2016.ecshop119.com/user.php?act=bonus">我的红包</a>
                    
                    <a class="" href="http://2016.ecshop119.com/user.php?act=track_packages">跟踪包裹</a>
                     
                    <a class="" href="http://2016.ecshop119.com/user.php?act=account_log">资金管理</a>
             
                </li>
            </ul>
        </li>
    </ul>
    </div>
<div class="my_nala_centre ilizi_centre">
    <div class="ilizi cle">
    <div class="box">
    <div class="box_1">
    <div style="font-size:30px;width:400px;margin:center;">{{$title}}</div>
    <br>
    <!-- <h1 style="text-size:50px;">{{$title}}</h1> -->
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#ffffff">
            <tbody>
                <tr>
                    <th>
                        商品名称
                    </th>
                    <th>
                        用户昵称
                    </th>
                    <th>
                        评论内容  
                    </th>
                    <th>
                        评论时间
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
                @foreach($data as $k=>$v)
                    <tr>
                    <td>
                      {{ $v->gooddiscuss['name'] }}
                    </td>
                    <td>
                        {{ $v->userdiscuss->Userdetails['nickname'] }}
                    </td>
                    <td >
                        {{ $v['content'] }}
                    </td>
                    <td>
                        {{ $v['created_at'] }}
                    </td>         
                    <td class="td-manage">
                        <a title="删除" href="/home/users/discussdelete/{{$v['id']}}" style="text-decoration:none">
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



@endsection  
