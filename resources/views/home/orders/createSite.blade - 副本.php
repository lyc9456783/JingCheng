
<!-- saved from url=(0046)https://order.mi.com/portal?r=18721.1531878091 -->
@extends('home.common.common')
@section('content') 

<link href="/home/css/style.css" rel="stylesheet" type="text/css">
<link href="/home/css/user.css" rel="stylesheet" type="text/css">
<div id="wrapper" class="container">    

 
 <div class="my_nala_main">
   


<div class="span16">
    <!-- 右侧主体结束 -->
    <div class="my_nala_centre ilizi_centre">
    <div class="ilizi cle">
    <div class="box">
    <div class="box_1">
        <div class="text-info" style="font-size:20px;width:400px;margin:center;"></div>
        <center>
        <form action="/home/orders/siteupdate/{{ $address['id'] }}" method="post" name="theForm">
            {{ csrf_field() }}
            <table width="70%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"><tbody>
            <tr ><td style="margin:right;"><a href="/home/orders/ordercreate">关闭</a></td></tr>
                <tr>
                    <td align="center" bgcolor="#ffffff">配送区域：</td>
                    <td colspan="3" align="left" bgcolor="#ffffff">
                    <select class="form-control" id="s_province" class="city" name="s_sf" style="width:100px;"></select>
                    <select class="form-control" id="s_city" class="city" name="s_sq" style="width:100px;"></select>
                    <select class="form-control" id="s_county" class="city" name="s_xj" style="width:100px;"></select>(必填)
                    </td>
                </tr>
                <div class="row">
                <tr>
                    <td align="center" bgcolor="#ffffff">收货人姓名：</td>
                    <td align="left" bgcolor="#ffffff"><input name="name" type="text" class="inputBg" id="consignee" placeholder="收货人姓名" value="{{ $address['name'] }}">(必填) 
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#ffffff">详细地址：</td>
                    <td align="left" bgcolor="#ffffff"><input name="address" type="text" class="inputBg" id="address_2" placeholder="详细地址" value="{{ $address['address'] }}">(必填)
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#ffffff">收货人手机：</td>
                    <td align="left" bgcolor="#ffffff"><input name="phone" type="text" class="inputBg" id="mobile_2" placeholder="11位手机号" value="{{ $address['phone'] }}">(必填)
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#ffffff">邮政编码：</td>
                    <td align="left" bgcolor="#ffffff"><input name="postcode" type="text" class="inputBg" id="mobile_2" placeholder="邮政编码" value="{{ $address['postcode'] }}">(必填)
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#ffffff">地址标签：</td>
                    <td align="left" bgcolor="#ffffff"><input name="label" type="text" class="inputBg" id="mobile_2" placeholder="如 家,公司" value="{{ $address['label'] }}"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" bgcolor="#FFFFFF">
                    <input name="act" type="hidden" value="act_edit_profile">
                    <input name="submit" type="submit" value="新增地址" class="btn btn-primary" style="border:none;">
                    </td>
                </tr>
            </tbody></table>
        </form>
        </center>
    </div>
    </div>
    </div>
</div>

<hr>  
    <div class="my_nala_centre ilizi_centre">
    <div class="ilizi cle">
    <div class="box">
    <div class="box_1">
    <div style="font-size:20px;width:400px;margin:center;"></div>
  
    
    <!-- 右侧内容框架，更改从这里结束 -->
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