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

    <div class="my_nala_centre ilizi_centre">
    <div class="ilizi cle">
        <div class="box">
     <div class="box_1">
      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
    <h1>修改密码</h1>
     <form name="formPassword" action="/home/pass/update/{{ $id }}" method="post" onsubmit="return editPassword()">
     {{ csrf_field() }}
     <table width="90%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tbody><tr>
          <td width="28%" align="right" bgcolor="#FFFFFF">原密码：</td>
          <td width="76%" align="left" bgcolor="#FFFFFF"><input name="old_password" type="password" size="25" class="inputBg"><span style="color:#FF0000"> *</span></td>
        </tr>
        <tr>
          <td width="28%" align="right" bgcolor="#FFFFFF">新密码：</td>
          <td align="left" bgcolor="#FFFFFF"><input name="new_password" type="password" size="25" class="inputBg"><span style="color:#FF0000"> *</span></td>
        </tr>
        <tr>
          <td width="28%" align="right" bgcolor="#FFFFFF">确认密码：</td>
          <td align="left" bgcolor="#FFFFFF"><input name="comfirm_password" type="password" size="25" class="inputBg"><span style="color:#FF0000"> *</span></td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="act" type="hidden" value="act_edit_password">
            <input name="submit" type="submit" class="btn btn-primary" style="border:none;" value="确认修改">
          </td>
        </tr>
      </tbody></table>
    </form>
          
        
    

      </div>
     </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>

    @endsection  
