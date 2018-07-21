
<!-- saved from url=(0046)https://order.mi.com/portal?r=18721.1531878091 -->
@extends('home.common.common')
@section('content') 
<link href="/checkbox/consignee/style.css" rel="stylesheet" type="text/css">
<link href="/checkbox/consignee/cart.css" rel="stylesheet" type="text/css"> 

<div class="container">
    <form action="/home/consignee/store" method="post" name="theForm" id="theForm">
      {{ csrf_field() }}
      <div class="checkout-box">
      <h2 class="aui_title" style="cursor: move;">{{ $title }}</h2>
      <ul class="box-main clearfix" id="addr-form">
      <li class="section-options clearfix"> 
      <label class="section-header"><em>*</em>配送区域:</label>
      <div class="section-body section-address">
        <div class="dropdown">
          <label class="iconfont"></label>
          <select class="input-select" id="s_province" class="city" name="s_sf">
          </select>
        </div>
        <div class="dropdown">
          <label class="iconfont"></label>
          <select class="input-select" id="s_city" class="city" name="s_sq"></select>
        </div>
        <div class="dropdown">
          <label class="iconfont"></label>
          <select class="input-select" id="s_county" class="city" name="s_xj"></select>
        </div>
        </li>
        <li class="section-options clearfix">
          <label class="section-header"><em>*</em>收货人姓名</label>
          <div class="section-body">
            <input name="name" type="text" class="input-text" id="consignee_0" value="">
          </div>
        </li>
        <li class="section-options clearfix">
          <label class="section-header"><em>*</em>收货人邮箱</label>
          <div class="section-body">
            <input name="email" type="email" class="input-text" id="mobile_0" value="">
          </div>
        </li>
        <li class="section-options clearfix">
          <label class="section-header"><em>*</em>收货人手机</label>
          <div class="section-body">
            <input name="phone" type="text" class="input-text" id="mobile_0" value="">
          </div>
        </li>
        <li class="section-options clearfix">
          <label class="section-header"><em>*</em>详细地址</label>
          <div class="section-body">
            <input name="address" type="text" class="input-text" id="address_0" value="">
          </div>
        </li>
        <li class="section-options clearfix">
          <label class="section-header"><em>*</em>邮政编码</label>
          <div class="section-body">
            <input name="postcode" type="text" class="input-text" id="zipcode_0" value="">
          </div>
        </li>
        <li class="section-options clearfix">
          <label class="section-header">地址标签</label>
          <div class="section-body">
            <input name="label" type="text" class="input-text" id="mobile_0" value="">
          </div>
        </li>
      </ul> 
      <div class="form-confirm clearfix">
        <input type="submit" name="Submit" onclick="checkEmail(document.getElementById('email').value);" class="btn btn-primary" value="配送至这个地址">
      </div>
      </div>    
    </form>
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
</script>
@endsection