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
         
                          <script type="text/javascript">
                      var bonus_sn_empty = "请输入您要添加的红包号码！";
                      var bonus_sn_error = "您输入的红包号码格式不正确！";
                      var email_empty = "请输入您的电子邮件地址！";
                      var email_error = "您输入的电子邮件地址格式不正确！";
                      var old_password_empty = "请输入您的原密码！";
                      var new_password_empty = "请输入您的新密码！";
                      var confirm_password_empty = "请输入您的确认密码！";
                      var both_password_error = "您现两次输入的密码不一致！";
                      var msg_blank = "不能为空";
                      var no_select_question = "- 您没有完成密码提示问题的操作";
                  </script>
      <h1>个人资料</h1>
     <form name="formEdit" action="/home/users/update/{{$users['id']}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tbody>
                <tr>
                  <td width="28%" align="right" bgcolor="#FFFFFF">用户昵称： </td>
                  <td width="72%" align="left" bgcolor="#FFFFFF"><input name="nickname" type="text" value="{{$details['nickname']}}" size="25" class="inputBg"></td>
                </tr>
                <tr>
                  <td width="28%" align="right" bgcolor="#FFFFFF">手机号： </td>
                  <td width="72%" align="left" bgcolor="#FFFFFF"><input name="phone" type="text" value="{{$details['phone']}}" size="25" class="inputBg"><span style="color:#FF0000"> *</span> &nbsp; <span class="err_tip">{{ $errors->first('phone') }}</span> </td>
                  
                </tr>
                <tr>
                  <td width="28%" align="right" bgcolor="#FFFFFF">身份证号： </td>
                  <td width="72%" align="left" bgcolor="#FFFFFF"><input name="id_card" type="text" value="{{$details['id_card']}}" size="25" class="inputBg"></td>
                </tr>
                <tr>
                  <td width="28%" align="right" bgcolor="#FFFFFF">家庭住址： </td>
                  <td width="72%" align="left" bgcolor="#FFFFFF"><input name="addr" type="text" value="{{$details['addr']}}" size="25" class="inputBg"></td>
                </tr>
                <tr>
                  <td width="28%" align="right" bgcolor="#FFFFFF">性　别： </td>
                  <td width="72%" align="left" bgcolor="#FFFFFF">
                  @if($details['sex'] == 1)
                    <input type="radio" name="sex" value="1" checked="checked">
                    男&nbsp;&nbsp;
                    <input type="radio" name="sex" value="0">
                    女&nbsp;&nbsp;
                  @else
                    <input type="radio" name="sex" value="1">
                    男&nbsp;&nbsp;
                    <input type="radio" name="sex" value="0" checked="checked">
                    女&nbsp;&nbsp; 
                  @endif
                  </td>
                </tr>
                <tr>
                  <td width="28%" align="right" bgcolor="#FFFFFF">电子邮件地址： </td>
                  <td width="72%" align="left" bgcolor="#FFFFFF"><input name="email" type="text" value="{{$users['email']}}" size="25" class="inputBg"><span style="color:#FF0000"> *</span></td>
                </tr>
		            <tr>
                  <td colspan="2" align="center" bgcolor="#FFFFFF">
                    <input name="act" type="hidden" value="act_edit_profile">
                    <input name="submit" type="submit" value="确认修改" class="btn btn-primary" style="border:none;">
                  </td>
                </tr>
              </tbody>
       </table>
    </form>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>
</div>

    @endsection  
