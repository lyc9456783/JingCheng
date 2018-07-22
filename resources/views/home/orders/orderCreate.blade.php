@extends('home.common.common')

@section('content')
<!-- <script src="/home/mis/base.js"></script> -->

<link rel="stylesheet" href="/home/mis/base.css">
<link rel="stylesheet" type="text/css" href="/home/mis/checkout.css">
<!-- <script type="text/javascript" src="/home/mis/checkout.js"></script> -->
<script type="text/javascript" src="/home/mis/checkout_li.js"></script>
<style>


</style>
<div class="page-main">
	<div class="container">
		<!-- 内容开始 -->
			<div class="checkout-box">


			<!-- 地址选择卡开始 -->
            <div class="section section-address">
                <div class="section-header clearfix">
                    <h3 class="title">收货地址</h3>
                    <div class="more"></div>                
                    <div class="mitv-tips hide" style="margin-left: 0;border: none;" id="J_bigproPostTip"></div>                                   
                </div>

                <div class="section-body clearfix"  id="J_addressList">
                    <!-- 地址选项框 -->
					@foreach($address as $key=>$val )
                        <div class="address-item J_addressItem" uid="{{$val['uid'] }}" addid="{{$val['id'] }}" >
                         <dl>
                            <dt>
                                <span class="tag">{{ $val['postcode'] }}</span>
                                <em class="uname">{{ $val['name'] }}</em>
                            </dt>
                            <dd class="utel">{{ $val['phone'] }} </dd>
                            <dd class="uaddress">{{ $val['address'] }}</dd>
                         </dl>
                         <div class="actions">
                           <a href="/home/orders/siteedit/{{$val['id'] }}" class="modify J_addressModify" data-stat-id="8a158e0ee8f2f343">修改</a>
                         </div> 
                        </div>
					@endforeach
                    <!--                         <div class="address-item J_addressItem " data-address_id="10171211619902550" data-consignee="李银昌" data-tel="156****7775" data-province_id="2" data-province_name="北京" data-city_id="36" data-city_name="北京市" data-district_id="389" data-district_name="昌平区" data-area="389018" data-area_name="沙河镇" data-address="育荣教育园 教学楼" data-tag_name="" data-zipcode="102200" data-editable="Y" data-neededit="N">
                         <dl>
                            <dt>
                                <span class="tag"></span>
                                <em class="uname">李银昌</em>
                            </dt>
                            <dd class="utel">156****7775 </dd>
                            <dd class="uaddress">北京 北京市 昌平区 沙河镇<br>育荣教育园 教学楼</dd>
                         </dl>
                         <div class="actions">
                           <a href="javascript:void(0);" class="modify J_addressModify" data-stat-id="8a158e0ee8f2f343" onclick="_msq.push(['trackEvent', '17a1f380b9d4cd2e-8a158e0ee8f2f343', 'javascript:void0', 'pcpid', '']);">修改</a>
                         </div> 
                        </div> -->
                                       
						<script>
							//地址选项样式
							$('#J_addressList .J_addressItem').click(function(){
								// $(this).toggleClass('selected');
								$('#J_addressList .J_addressItem').removeClass('J_option selected')
								$(this).toggleClass('J_option selected');
							})
						</script>



                    <!-- 地址选项框 新添加 -->
                    <div class="address-item address-item-new" id="J_newAddress">
                      <label> <i class="iconfont"></i>
                        <a href="/home/orders/createsite">添加新地址</a></label> 
                    </div>

                </div>
            </div>
			<!-- 地址选择卡开始 -->

			<!-- 配送方式开始 -->
            <div class="section section-options section-shipment clearfix">
                <div class="section-header">
                    <h3 class="title">配送方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="clearfix J_optionList options ">
                    	<li data-type="shipment" class="J_option selected" data-amount="10" data-value="2">快递配送（运费 包邮）</li>
                    </ul>
                    <div class="service-self-tip" id="J_serviceSelfTip" style="display: none;"></div>
                </div>
            </div>
            <!-- 配送方式结束 -->
			

			<!-- 配送时间开始 -->
            <div class="section section-options section-time clearfix">
                <div class="section-header">
                    <h3 class="title">配送时间</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="J_optionList options options-list clearfix">
                        <!-- besttime start -->
                        <li data-type="time" class="J_option selected" data-value="1">
                            不限送货时间：<span>周一至周日</span></li>
                        <li data-type="time" class="J_option " data-value="2">
                            工作日送货：<span>周一至周五</span> </li>
                        <li data-type="time" class="J_option " data-value="3">
                            双休日、假日送货：<span>周六至周日</span> </li>
                         <!-- besttime end -->
                    </ul>
                </div>
            </div>	
				<script>
				//地址选项样式
					$('.options-list .J_option').click(function(){
						// $(this).toggleClass('selected');
						$('.options-list .J_option').removeClass('selected')
						$(this).toggleClass('selected');
					})
				</script>
			<!-- 配送时间结束 -->


			<!-- 发票 -->
            <div class="section section-options section-invoice clearfix">
                <div class="section-header">
                    <h3 class="title">发票</h3>
                </div>
                <div class="section-body clearfix">
                    <div class="invoice-result">
                        <span id="J_invoiceDesc">电子发票</span>
                        <span id="J_invoiceTitle">个人</span>
                        <span>商品明细</span>
                        <a href="#J_modalInvoiceInfo" data-toggle="modal" id="J_invoiceModify" data-stat-id="571b0b65c5c3ba35" onclick="_msq.push(['trackEvent', '17a1f380b9d4cd2e-571b0b65c5c3ba35', '#J_modalInvoiceInfo', 'pcpid', '']);">修改 &gt;</a>
                    </div>
                </div>
            </div>
			<!-- 发票结束 -->

			<!-- 商品以及优惠券 -->
            <div class="section section-goods">
                <div class="section-header clearfix">
                    <h3 class="title">商品及优惠券</h3>
                    <div class="more">
                    	<a href="https://static.mi.com/cart/" data-stat-id="fa422fee79a3a6e2" onclick="_msq.push(['trackEvent', '17a1f380b9d4cd2e-fa422fee79a3a6e2', '//static.mi.com/cart/', 'pcpid', '']);">返回购物车<i class="iconfont"></i></a>
                    </div>
                </div>
                <div class="section-body">
                    <ul class="goods-list" id="J_goodsList">
                    @foreach($shops as $k => $v )
                      
                        <li class="clearfix">
                            <div class="col col-img">
                                <img src="{{ $v['info']->pic }}" width="30" height="30">
                            </div>
                            <div class="col col-name">
                                <a href="/home/goods/detail/{{ $v['info']->id }}" target="_blank">{{ $v['info']->name }}</a>
                            </div>
                            <div class="col col-price" num="{{ $v['num'] }}">{{ $v['info']->discount }}元 x {{ $v['num'] }}  </div>
                            <div class="col col-status">&nbsp;</div>
                            <div class="col col-total" money="{{ ($v['info']->discount)*($v['num']) }}">{{ ($v['info']->discount)*($v['num']) }}元</div>
                        </li>
                            
                    @endforeach

                    </ul>
                </div>
            </div>
			<!-- 商品以及优惠券结束 -->


			<!-- 结算时的价格结算 -->
            <div class="section section-count clearfix">
                <div class="count-actions">
                    <!-- 优惠券 -->
                    <div class="coupon-trigger" id="J_useCoupon"><i class="iconfont icon-plus"></i>使用优惠券</div>

                </div>

                <div class="money-box" id="J_moneyBox">
                    <ul>
                        <li class="clearfix">
                            <label>商品件数：</label>
                            <span class="val" id="good_total_num">1件</span>
                        </li>
                        <li class="clearfix">
                            <label>商品总价：</label>
                            <span class="val" id="good_total_money1">129元</span>
                        </li>
                        <li class="clearfix">
                            <label>活动优惠：</label>
                            <span class="val">-0元</span>
                        </li>
                        <li class="clearfix">
                            <label>优惠券抵扣：</label>
                            <span class="val"><i id="J_couponVal">-0</i>元</span>
                        </li>
                                                <li class="clearfix">
                            <label>运费：</label>
                            <span class="val"><i data-id="J_postageVal">包邮</i></span>
                        </li>
                        <li class="clearfix total-price">
                            <label>应付总额：</label>
                            <span class="val"><em data-id="J_totalPrice" id="good_total_money2">129</em>元</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- 结算底部的价格统计 -->
            <script>
            // console.log($('#J_goodsList .col-total').eq(0).attr('money'));
            // 用于统计最后结算时候的总件数 和 总金额
             var lang = $('#J_goodsList .col-price').length;
             var num = 0;
             var money = 0;
             for(var i = 0; i < lang; i++ ){
                num += parseFloat($('#J_goodsList .col-price').eq(i).attr('num'));
                money += parseFloat($('#J_goodsList .col-total').eq(i).attr('money'));
             }
             $('#good_total_num').text(num);
             $('#good_total_money1').text(money);
             $('#good_total_money2').text(money);
             // console.log(num);
             // console.log(money);
            // console.log($('#J_goodsList .col-price').eq(1).attr('num'));

            </script>            
			<!-- 结算时的价格结算结束 -->


            <div class="section-bar clearfix">
                <div class="fl">
                    <div class="seleced-address hide" id="J_confirmAddress">
                    </div>
                    <div class="big-pro-tip hide J_confirmBigProTip"></div>
                </div>
                <div class="fr">
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="sitesubmit()">去结算</a>
                </div>
            </div>
        </div>
        <script>
        //去结算
        function sitesubmit(){
        	// var uid = $('#J_addressList .selected').attr('uid');
         //       var addid = $('#J_addressList .selected').attr('addid');
               // alert(uid);alert(addid);

            var cmt = new Object;
			cmt.uid      = $('#J_addressList .selected').attr('uid');//用户的id
            cmt.addid    = $('#J_addressList .selected').attr('addid');//用户的地址id

            //限制条件
            if(cmt.addid == null){
                layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('请选择收货地址！');
                });
                return false;
            }

            console.log(cmt);
                // 传送订单信息,并且扣减库存
				$.ajax({
	                url:'/home/orders/sitesubmit',
	                type:'get',
	                data:cmt,
	                success:function(msg){
	                  if(msg == 0){
                        //返回错误
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg('错误提示');
                        });
                        return false;                       
                      }else{
                        //成功跳转
                        location.replace('/home/orders/submitOk/'+msg);
                      }
	                },
	                async:false,
            	});    	
        }

        </script>

		<!-- 内容结束 -->
	</div>
</div>




@endsection 