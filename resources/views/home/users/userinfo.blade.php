@extends('home.common.common')

@section('content')
<link href="/home/css/style.css" rel="stylesheet" type="text/css">
<link href="/home/css/user.css" rel="stylesheet" type="text/css">
<div id="wrapper" class="container">    
<div class="breadcrumbs">
    <div class="container">
        <a href="/">首页</a> <code>&gt;</code> 用户中心    </div>
</div>
 
    <div class="my_nala_main">
        
<div class="slidebar">
    <ul class="slide_item">

        <li class="item">
            <div class="root_node">订单中心</div>
            <ul>
                <li>
                    <a class="" href="/home/orders/index">我的订单</a>
                    
                    <a class="" href="/home/address/index">收货地址</a>
                     
                    <a class="" href="">缺货登记</a>
                     
                </li>
               
            </ul>
        </li>
        
        <li class="item">
            <div class="root_node">会员中心</div>
            <ul>
                <li>
                    <a class="" target="_self" href="/home/users/index">我的个人中心</a>
                    
                    <a class="" href="/home/users/edit">用户信息</a>
                    
                    <a class="" href="">我的收藏</a>

                    <a class="" href="">我的留言</a>
                      
                    <a class="" href="">我的推荐</a>
                       
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
            <div class="userCenterBox boxCenterList clearfix" style="_height:1%; font-size:14px;">
                 
                                  
                    <div class="portal-main clearfix">
                        
                        <div class="user-card">
                            <h2 class="username">{{$data['username']}}</h2>
                            <p class="tip">欢迎您回到 京城商城</p>
                            <a class="link" href="/home/users/edit">修改个人资料&gt;</a>
                            @if(!empty($users['face']))
                            <label for="xg">
                                <img id="face" title="点击修改" class="avatar" src="{{$users['face']}}">
                            </label>
                            @else
                            <label for="xg">
                                <img id="face" title="点击修改" class="avatar" src="/uploads/hpic/mr/CHZEvbLFV707vZ1ONYuT.jpg">
                            </label>
                            @endif
                            <button type="button" class="layui_btn" id="xg" style="display:none;"></button>
                        </div>
                        {{ csrf_field() }}
                          <script type="text/javascript">
                            layui.use('upload',function(){
                              var upload = layui.upload;
                              //执行修改
                              var uploadInst = upload.render({
                                elem:'#xg'
                                ,url:'/home/users/uploads/{{$data['id']}}'
                                ,data:{'_token':$('input[type=hidden]').val()}
                                ,field:'face'
                                ,done:function(res){
                                  //上传回调
                                  if(res.code == 0){
                                    layer.msg(res.msg);
                                    $('#face').attr('src',res.data.src);
                                  }else{
                                    layer.msg(res.msg);
                                  }
                                }
                              });
                            });


                            </script>
                        <div class="user-actions">
                            <ul class="action-list">
                                <li> 您的上一次查看时间：{{date('Y-m-d H:i:s',time())}}</li>
                                <li class="rank">您的等级: 初级用户 <span>(,您还差 10000 积分达到 vip )</span></li>
                                @if(empty($yx['yanzheng']))
                                    <li class="validat">您还没有通过邮件认证 <a href="/home/users/store/{{$data['id']}}" style="color:#f70;">点此发送认证邮件</a></li> 
                                @else
                                    <li class="validat" style="color:#f70;">邮箱已绑定成功</li> 
                                @endif
                            </ul>
                        </div>
                        
                     </div>
                     
                     
                                  
             
                          
             
                          
            
                        
            
                        
            
                        
                        
                                    
                        
            
            </div>
            </div>
            </div>
            </div>
        
        </div>
    </div>
</div>
@endsection  


 
     