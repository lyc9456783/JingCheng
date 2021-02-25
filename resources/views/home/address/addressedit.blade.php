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
  <!-- 右侧主体结束 -->
  <div class="my_nala_centre ilizi_centre">
  <div class="ilizi cle">
  <div class="box">
  <div class="box_1">
    <div class="text-info" style="font-size:20px;width:400px;margin:center;">{{$title}}</div>
    <form action="/home/address/update/{{$id}}" method="post" name="theForm"onsubmit="return checkConsignee(this)">
      {{ csrf_field() }}
      <table width="60%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tbody>
          <tr>
            <td align="center" bgcolor="#ffffff">收货人姓名：</td>
            <td align="left" bgcolor="#ffffff"><input name="name" type="text" class="inputBg" id="consignee" placeholder="收货人姓名" value="{{$data['name']}}">(必填)
            </td>
          </tr>
          <tr>
            <td align="center" bgcolor="#ffffff">详细地址：</td>
            <td align="left" bgcolor="#ffffff"><textarea name="address" type="text" class="inputBg" id="address_2" placeholder="详细地址">{{ $data['address'] }}</textarea>(必填)
            </td>
          </tr>
          <tr>
            <td align="center" bgcolor="#ffffff">收货人手机：</td>
            <td align="left" bgcolor="#ffffff"><input name="phone" type="text" class="inputBg" id="mobile_2" placeholder="11位手机号" value="{{ $data['phone'] }}">(必填)
            </td>
          </tr>
          <tr>
            <td align="center" bgcolor="#ffffff">邮政编码：</td>
            <td align="left" bgcolor="#ffffff"><input name="postcode" type="text" class="inputBg" id="mobile_2" placeholder="邮政编码" value="{{ $data['postcode'] }}">(必填)
            </td>
          </tr>
          <tr>
            <td align="center" bgcolor="#ffffff">地址标签：</td>
            <td align="left" bgcolor="#ffffff"><input name="label" type="text" class="inputBg" id="mobile_2" placeholder="如 家,公司" value="{{ $data['label'] }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#FFFFFF">
              <input name="act" type="hidden" value="act_edit_profile">
              <input name="submit" type="submit" value="修改地址" class="btn btn-primary" style="border:none;">
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
<!-- 右侧主体结束 -->
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