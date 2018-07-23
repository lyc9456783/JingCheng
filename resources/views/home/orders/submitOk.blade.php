@extends('home.common.common')

@section('content')
<link rel="stylesheet" href="/home/mis/mis_zf/base.css">
<link rel="stylesheet" type="text/css" href="/home/mis/mis_zf/pay-confirm.css">

	<div class="container">
		<!-- 内容开始 -->
		<div class="checkout-box">


			<div class="section section-order">
                <div class="order-info clearfix">
                    <div class="fl">
                        <h2 class="title">订单提交成功！去付款咯～</h2>
                        <p class="order-time" id="J_deliverDesc"></p>
                        <p class="order-time">请在<span class="pay-time-tip">{{ $orders['created_at'] }}</span>内完成支付, 超时后将取消订单</p>
                        <p class="post-info" id="J_postInfo">
                            收货信息：{{ $orders['recipients'] }} {{ $orders['phone'] }} &nbsp;&nbsp;
                            {{ $orders['address'] }}    </p>
                    </div>
                    <!-- 倒计时定时器 -->
                    <script>

                    //获取时间转换格式
                    var old_time = $('.pay-time-tip').text();
                    old_time = old_time.replace(/-/g,',');
                    old_time = old_time.replace(/ /g,',');
                    old_time = old_time.replace(/:/g,',');
                    old_time = old_time.split(",");  
                    // var date = new Date(old_time[0],old_time[1],old_time[2],old_time[3],old_time[4],old_time[5]);
                    //添加到订单的时候的时间戳
                    // var history_time = date.getTime(); 
                    old_time[4] = (parseInt(old_time[4])+1);



         

                   // console.log(timestampToTime(fourthOfJuly););

                    //倒计时时间
                    // var str_str = 10*1000;
                    // // console.log(str_str);
                    // //最大时间戳
                    // var big_time = history_time+str_str;
                    // console.log(str_str+'倒计时');
                    // console.log(history_time+'添加时间');
                    // console.log(big_time+'终止时间');

                    // //当前的时间戳
                    // var now = Date.parse(new Date());
                    // console.log(big_time-now);

                        function run(){
                              const fourthOfJuly = new Date(old_time[0],old_time[1],old_time[2],old_time[3],old_time[4],old_time[5]).getTime();
                              const today = new Date().getTime();
                              // get the difference
                              const diff = fourthOfJuly - today;

                              // math
                              hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                              minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                              seconds = Math.floor((diff % (1000 * 60)) / 1000);

                             if(minutes < 10){
                                minutes = '0'+minutes;
                             }
                             if(seconds < 10){
                                seconds = '0'+seconds;
                             }
                             if(minutes == 00 && seconds == 00 && hours == 00){
                                clearInterval(time);

                                alert('订单交易失败!');
                                location.replace('/home/orders/index');
                             }
                              var str =hours+'小时 '+minutes+'分钟 '+seconds+'秒';
                                //      // 赋值
                              var text_time = $('.pay-time-tip').text(str);
                        }
                        run();   
                        var time = setInterval("run()",1000);


                    </script>

                    <div class="fr">
                        <p class="total">
                            应付总额：<span class="money"><em>{{ $moneys }}</em>元</span>
                        </p>
                        <a href="javascript:void(0);" class="show-detail" id="J_showDetail" onclick="details()">订单详情<i class="iconfont"></i></a>
                    </div>
          	    </div>
            	<i class="iconfont icon-right">√</i>

                <!-- 订单详情页面 -->
                <div class="order-detail" >
                    <ul>
                        <li class="clearfix">
                            <div class="label">订单号：</div>
                            <div >
                                <span class="order-num">{{ $orders['ordersnum'] }} </span>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="label">收货信息：</div>
                            <div>{{ $orders['recipients'] }}&nbsp;&nbsp; {{ $orders['phone'] }} &nbsp;&nbsp;{{ $orders['address'] }}  </div>
                        </li>
                        <li class="clearfix">
                            <div class="label">商品名称：</div>
                            <div style="margin-left:100px;">
                                <ul>
                                    @foreach($orders_all as $k => $v)
                                    <li>{{ $v->ordersgoods['name'] }}&nbsp;&nbsp;
                                        {{ $v->ordersgoods->detailsgoods['color'] }}&nbsp;&nbsp;
                                        {{ $v->ordersgoods->detailsgoods['type'] }}&nbsp;&nbsp;
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="label">配送时间：</div>
                            <div>不限送货时间</div>
                        </li>
                        <li class="clearfix">
                            <div class="label">发票信息：</div>
                            <div> 电子发票 个人</div>
                        </li>
                    </ul>
                </div>
                <!-- 订单详情页面结束 -->

            </div>
		</div>
        <script>
            //订单详情页面  用于切换显示订单详情
            function details(){
                if($('.order-detail').attr('style')){
                   $('.order-detail').removeAttr('style');
                   $('#J_postInfo').removeAttr('style');
                }else{
                   $('.order-detail').attr('style','display:block;');
                   $('#J_postInfo').attr('style','display:none;');
                }      
            }
        </script>

        <!-- 支付方式开始 -->
		<div class="section section-payment">
			<div class="cash-title" id="J_cashTitle">
                选择以下支付方式付款
            </div>
            <div class="payment-box ">
            	<div class="payment-header clearfix">
	                <h3 class="title">支付平台</h3>
	                <span class="desc"></span>
	            </div>
					<!-- 支付方式 -->
					<div class="payment-body">
                        <ul class="clearfix payment-list J_paymentList J_linksign-customize">
                            <li id="J_weixin" data-stat-id="98393f0afea1dcec" onclick="_msq.push(['trackEvent', 'f1542ececd0b6bc5-98393f0afea1dcec', '', 'pcpid', '']);"><img src="/home/mis/mis_zf/weixinpay.png" alt="微信支付" style="margin-left: 0;"></li>
                            <li class="J_bank" data-stat-id="def8a01ce9f6c2ab" onclick="_msq.push(['trackEvent', 'f1542ececd0b6bc5-def8a01ce9f6c2ab', '', 'pcpid', '']);"><input name="payOnlineBank" id="alipay" value="alipay" type="radio"> <img src="/home/mis/mis_zf/payOnline_zfb.png" alt="支付宝" style="margin-left: 0;"></li>
                            <li class="J_bank" data-stat-id="5683a71b06762883" onclick="_msq.push(['trackEvent', 'f1542ececd0b6bc5-5683a71b06762883', '', 'pcpid', '']);"><input name="payOnlineBank" id="unionpay" value="unionpay" type="radio"> <img src="/home/mis/mis_zf/unionpay.png" alt="银联" style="margin-left: 0;"></li>
                            <li class="J_bank" data-stat-id="5df326495fb7ae18" onclick="_msq.push(['trackEvent', 'f1542ececd0b6bc5-5df326495fb7ae18', '', 'pcpid', '']);"><input name="payOnlineBank" id="micash" value="micash" type="radio"> <img src="/home/mis/mis_zf/event-mipay20170427.jpg" alt="小米钱包" style="margin-left: 0;"></li>
                        </ul>
                            

                            <div class="event-desc">
                            <p>小米钱包：绑定新卡支付，享最高立减99元</p><a href="javascript:viod(0)" class="more" target="_blank">了解更多&gt;</a>
                        	</div>
                    </div>
					<!-- 支付方式结束 -->
            </div>
		</div>
        <!-- 支付方式结束 -->


	</div>

@endsection 