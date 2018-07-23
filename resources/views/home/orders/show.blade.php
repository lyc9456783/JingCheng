
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
         
              
        
      
             
       
          
     
    <h1>订单状态</h1>
         <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
       
            <tbody>
            <tr>
              <td width="20%" align="center" bgcolor="#ffffff">订单编号：</td>
              <td align="center" bgcolor="#ffffff">{{$data['ordersnum']}}</td>           
            </tr>
            <tr>
              <td align="center" bgcolor="#ffffff">订单状态：</td>
                @if($data['status'] == 0)
                    <td align="center" bgcolor="#ffffff">未发货&nbsp;&nbsp;&nbsp;&nbsp;</td>
                @elseif($data['status'] == 1)
                    <td align="center" bgcolor="#ffffff">以发货&nbsp;&nbsp;&nbsp;&nbsp;</td>
                @else
                    <td align="center" bgcolor="#ffffff">交易完成&nbsp;&nbsp;&nbsp;&nbsp;</td>
                @endif
            </tr>
            </tbody>
        
        </table>
        <h1>商品列表</h1>                
         <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
          <tbody>
            <tr>
                <th width="20%" align="center" bgcolor="#ffffff">商品名称</th>
                <th width="20%" align="center" bgcolor="#ffffff">商品标价</th>
                <th width="20%" align="center" bgcolor="#ffffff">折扣现价</th>
                <th width="20%" align="center" bgcolor="#ffffff">购买数量</th>
                <th width="20%" align="center" bgcolor="#ffffff">小计</th>
            </tr>

            <tr>
            @foreach($goods as $k=>$v)
                <td align="center" bgcolor="#ffffff">{{$v->name}}</td>
                <td align="center" bgcolor="#ffffff">{{$v->price}}</td>
                <td align="center" bgcolor="#ffffff">{{$v->discount}}</td>
                <td align="center" bgcolor="#ffffff">{{$data['num']}}</td>
                <td align="center" bgcolor="#ffffff">{{(($v->discount)*($data['num']))}}</td>
            @endforeach
            </tr>
            </tbody>
        </table>

        <h1>费用总计</h1>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tbody>
              <tr>
              @foreach($goods as $k=>$v)
                <td align="center" bgcolor="#ffffff">
                    商品总价: {{(($v->discount)*($data['num']))}} <em>元</em>+ 配送费用: 10.00<em>元</em>                                                                              </td>
              </tr>
              <tr>
                <td align="center" bgcolor="#ffffff">应付款金额: {{(($v->discount)*($data['num'])+10)}}<em>元</em></td>
              </tr>
              @endforeach
            </tbody>
        </table>


        <h1>收货人信息</h1>
        <form action="/home/orders/store/{{$data['id']}}" method="post" name="formAddress" id="formAddress">
        {{ csrf_field() }}
           <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
              <tbody>
                <tr>
                    <td width="15%" align="center" bgcolor="#ffffff">收货人姓名： </td>
                    <td width="35%" align="left" bgcolor="#ffffff">
                        <input name="recipients" type="text" class="inputBg" value="{{$data['recipients']}}" size="40">
                    </td>

                    <td width="15%" align="center" bgcolor="#ffffff">电子邮件地址： </td>
                    <td width="35%" align="left" bgcolor="#ffffff">
                        <input name="email" type="text" class="inputBg" value="" size="40">
                    </td>
                </tr>
                                
                <tr>
                    <td align="center" bgcolor="#ffffff">详细地址： </td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="address" type="text" class="inputBg" value="{{$data['address']}}" size="40">
                    </td>

                    <td align="center" bgcolor="#ffffff">邮政编码：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="zipcode" type="text" class="inputBg" value="" size="40">
                    </td>
                </tr>
                    
                <tr>
                    <td align="center" bgcolor="#ffffff">电话：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="phone" type="text" class="inputBg" value="{{$data['phone']}}" size="40">
                    </td>
                    <td align="center" bgcolor="#ffffff">手机：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="phone" type="text" class="inputBg" value="{{$data['phone']}}" size="40">
                    </td>
                </tr>
                                
                <tr>
                    <td align="center" bgcolor="#ffffff">标志建筑：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="sign_building" class="inputBg" type="text" value="" size="40">
                    </td>
                    <td align="center" bgcolor="#ffffff">最佳送货时间：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="best_time" type="text" class="inputBg" value="" size="40">
                    </td>
                </tr>
                    
                <tr>
                    <td colspan="4" align="center" bgcolor="#ffffff">
                        <input type="hidden" name="act" value="save_order_address">
                        <input type="hidden" name="order_id" value="56">
                        <input type="submit" class="btn btn-primary" value="更新收货人信息">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>


        <h1>支付方式</h1>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tbody>
                @foreach($goods as $k=>$v)
                <tr>
                  <td bgcolor="#ffffff">
                  所选支付方式: 支付宝。应付款金额: <strong>{{(($v->discount)*($data['num'])+10)}}<em>元</em></strong><br>
                  支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br>支付宝收款接口：在线即可开通，<font color="red"><b>零预付，免年费</b></font>，单笔阶梯费率，无流量限制。<br><a href="" target="_blank"><font color="red">立即在线申请</font></a>                  </td>
                </tr>
                @endforeach
                
              </tbody>
        </table>


        <h1>其它信息</h1>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tbody>
                <tr>
                    <td width="15%" align="right" bgcolor="#ffffff">配送方式：</td>
                    <td colspan="3" width="85%" align="left" bgcolor="#ffffff">城际快递</td>
                </tr>
                <tr>
                    <td width="15%" align="right" bgcolor="#ffffff">支付方式：</td>
                    <td colspan="3" align="left" bgcolor="#ffffff">支付宝</td>
                </tr>
                <tr>                                                                                           <tr>
                    <td width="15%" align="right" bgcolor="#ffffff">缺货处理：</td>
                    <td colspan="3" align="left" bgcolor="#ffffff">等待所有商品备齐后再发</td>
                </tr>
            </tbody>
        </table>
          
    
                                                   
      
          
      
               




      </div>
     </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
@endsection 
