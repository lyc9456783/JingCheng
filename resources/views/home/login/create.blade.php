<!DOCTYPE html>
<html xmlns="">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<style type="text/css">
    span{
      font-size: 14px;
      opacity: 0.7;
      padding-left: 8px;
    }

  </style>
</head>

<title>用户注册</title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="/home/animated_favicon.gif" type="image/gif" />
<link href="/home/css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/admins/lib/layui/css/layui.css">

<script type="text/javascript" src="/home/js/common.js"></script>
<script type="text/javascript" src="/home/js/user.js"></script>
<body>
<script type="text/javascript" src="/home/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/admins/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.json.js"></script>
<script type="text/javascript" src="/home/js/transport_jquery.js"></script>
<script type="text/javascript" src="/home/js/utils.js"></script>
<script type="text/javascript" src="/home/js/jquery.superslide.js"></script>
<script type="text/javascript" src="/home/js/xiaomi_common.js"></script>
<script src="/admins/lib/layui/layui.js" charset="utf-8"></script>

<script>
  $(function(){
  	
  	//加载清空文本框
  	$("input:text,input:password").val("");
  	
  	//提示文字隐藏显示效果
  	//登录界面
  	$(".enter-area .enter-item").focus(function(){
  		if($(this).val().length==0){
  			$(this).siblings(".placeholder").addClass("hide");
  		}
  	}).blur(function(){
  		if($(this).val().length==0){
  			$(this).siblings(".placeholder").removeClass("hide");
  		}
  	}).keyup(function(){
  		if($(this).val().length>0){
  			$(this).siblings(".placeholder").addClass("hide");
  		}else{
  			$(this).siblings(".placeholder").removeClass("hide");
  		}
  	});
  	//注册界面
  	$(".inputbg input").focus(function(){
  		if($(this).val().length>0){
  			$(this).parent().siblings(".t_text").addClass("hide");
  		}
  	}).blur(function(){
  		if($(this).val().length==0){
  			$(this).parent().siblings(".t_text").removeClass("hide");
  		}
  	}).keyup(function(){
  		if($(this).val().length>0){
  			$(this).parent().siblings(".t_text").addClass("hide");
  		}else{
  			$(this).parent().siblings(".t_text").removeClass("hide");
  		}
  	});
  	
  	//其它登录方式
  	$("#other_method").click(function(){
  		if($(".third-area").hasClass("hide")){
  			$(".third-area").removeClass("hide");
  		}else{
  			$(".third-area").addClass("hide");
  		}
  	})
  })
</script> 
  @if (session('success'))
       <script type="text/javascript">
          layui.use('layer', function(){
              var layer = layui.layer;
              layer.msg("{{session('success')}}");
          });
      </script>
  @endif
  @if (session('error'))
      <script type="text/javascript">
          layui.use('layer', function(){
              var layer = layui.layer;
              layer.msg("{{session('error')}}");
          }); 
      </script>
  @endif
 

<div class="register_wrap">
    <div class="bugfix_ie6 dis_none">
        <div class="n-logo-area clearfix">
            <a href="/" class="fl-l"><img src="/home/picture/logo.gif" width="55" /></a>
        </div>
    </div>
    <div id="main">
      <div class="n-frame device-frame reg_frame">
      
        <div class="title-item dis_bot35 t_c">
          <h4 class="title-big">注册小米帐号</h4>
        </div>
        <div class="regbox" id="register_box">
          <form action="/home/login/store" method="post" name="formUser" onsubmit="return register();">
          {{ csrf_field() }}
            <div class="phone_step1">
                <div class="inputbg"> 
                  <label class="labelbox">
                      <input type="text" name="username" id="username" onblur="" onkeyup="" placeholder="用户名">
                  </label>
                  <span class="t_text">用户名</span>
                  <span class="error_icon" id="usersspan"></span>
                </div>
                <div class="err_tip" id="username_notice"> <em></em> </div>
              	
                <div class="inputbg"> 
                  <label class="labelbox">
                      <input name="email" type="text" id="email" onblur="" onkeyup="" placeholder="email">
                  </label>
                  <span class="t_text">email</span>
                  <span class="error_icon"></span> 
                </div>
                <div class="err_tip" id="email_notice"><em></em> </div>
              	
                <div class="inputbg">
                  <label class="labelbox">
                  <input type="password" name="password" id="password1" onblur="" onkeyup=""  placeholder="密码">
                  </label>
                  <span class="t_text">密码</span>
                  <span class="error_icon"></span> 
                </div>
                <div class="err_tip" id="password_notice"> <em></em> </div>
              	
                <div class="inputbg"> 
                  <label class="labelbox">
                    <input name="confirm_password" type="password" id="conform_password" onblur="" onkeyup="" placeholder="确认密码">
                  </label>
                  <span class="t_text">确认密码</span>
                  <span class="error_icon"></span>
                </div>
                <div class="err_tip" id="conform_password_notice"> <em></em> </div>
                
                 
                
                <div class="inputbg inputcode dis_box clearfix"> 
                  <label class="labelbox label-code">
                      <input type="text" class="code" name="captcha" maxlength="6" placeholder="验证码">
                      
                  </label>
                  <span class="t_text">验证码</span>
                  <span class="error_icon"></span> 
                  <img src="{{captcha_src()}}" onclick="rand_code(this)" title="点击更换">
                  <script type="text/javascript">
                    function rand_code(obj){
                      obj.src = obj.src+'?a='+Math.random();  
                    }


                  </script>
                </div>
                @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <div class="err_tip">{{ $error }}</div> 
                        @endforeach
                        @endif
                
                <div class="law">
                  <label>
                    <input name="agreement" type="checkbox" value="1" checked="checked"  tabindex="5" class="remember-me"/>
                    我已看过并接受《<a href="article.php?cat_id=-1" style="color:blue" target="_blank">用户协议</a>》</label>
                </div>
                <div class="err_tip"> <em></em> </div>
                <div class="fixed_bot mar_phone_dis1">
                  <input name="act" type="hidden" value="act_register" >
                  <input type="hidden" name="back_act" value="" /> 
                  <input name="Submit" type="submit" value="同意协议并注册" class="btn332 btn_reg_1 submit-step">
                </div>
                <div class="trig">已有账号? <a href="/home/login/index" class="trigger-box">点击登录</a> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <div class="n-footer">
      <div class="nl-f-nav">
      <span>
                    <a href="xm.com" target="_blank" title="XM-商城">xiaomi商城</a>
                            </span>
      </div>
    <p class="nl-f-copyright">©<a href='xm.com'>xiaomi商城</a> 北京市昌平区玉龙文化园 <a href='#'>歡迎來电13811478105本網站由 jingcheng项目小组制作</a></p>
  </div>
</div>
  <script type="text/javascript">
  $(function(){
    var span = document.getElementById('usersspan');
    //获取用户注册的用
    $('#username').blur(function(){
      var username = $(this).val();
       //发送ajax进行验证
    $.get('/home/login/create',{'username':username},function(msg){
          //判断msg的返回结果,是否有值,有值说明用户名已存在
          // console.log(msg);
          if(msg == 1){
            span.innerHTML = '<font color="#FF0033">用户名已存在</font>';
          }else{
             span.innerHTML = '<font color="#00CC00">用户名可用</font>';
          }
      },'json');
    });

   
  });
  </script>
   
 
 

 
 

 
 

 
 


	
 
 


</body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
var username_empty = "用户名不能为空。";
var username_shorter = "用户名长度不能少于 6 个字符。";
var username_invalid = "用户名只能是由字母数字以及下划线组成。";
var password_empty = "登录密码不能为空。";
var password_shorter = "登录密码不能少于 6 个字符。";
var confirm_password_invalid = "两次输入密码不一致";
var email_empty = "Email 为空";
var email_invalid = "Email 不是合法的地址";
var agreement = "您没有接受协议";
var msn_invalid = "msn地址不是一个有效的邮件地址";
var qq_invalid = "QQ号码不是一个有效的号码";
var home_phone_invalid = "家庭电话不是一个有效号码";
var office_phone_invalid = "办公电话不是一个有效号码";
var mobile_phone_invalid = "手机号码不是一个有效号码";
var msg_un_blank = "用户名不能为空";
var msg_un_length = "用户名最长不得超过7个汉字";
var msg_un_format = "用户名含有非法字符";
var msg_un_registered = "用户名已经存在,请重新输入";
var msg_can_rg = "可以注册";
var msg_email_blank = "邮件地址不能为空";
var msg_email_registered = "邮箱已存在,请重新输入";
var msg_email_format = "邮件地址不合法";
var msg_blank = "不能为空";
var no_select_question = "您没有完成密码提示问题的操作";
var passwd_balnk = "- 密码中不能包含空格";
var username_exist = "用户名 %s 已经存在";
</script>
</html>
