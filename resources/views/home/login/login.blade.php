<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />

<title>用户登录</title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/home/css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/admins/lib/layui/css/layui.css">

<script type="text/javascript" src="/home/js/common.js"></script>
<script type="text/javascript" src="/home/js/user.js"></script>
<body>
<script type="text/javascript" src="/home/js/jquery-1.9.1.min.js"></script>
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
 

<div id="main" class="layout">
  <div class="nl-content">
  	<div class="nl-logo-area">
    	<a href="/"><img src="/home/picture/logo.gif" width="55" /></a>
    </div>
    <h1 class="nl-login-title">一个帐号，玩转所有服务！</h1>
    <p class="nl-login-intro"></p>
    <div id="login-box" class="nl-frame-container">
        <div class="ng-form-area show-place">
            <form name="formLogin" action="/home/login/show" method="post" onSubmit="return userLogin()">
              {{ csrf_field() }}
            	<div class="shake-area">
                    <div class="enter-area">
                      <input name="username" type="text"  class="enter-item first-enter-item" placeholder="用户名"/>
                      <i class="placeholder">用户名</i>
                    </div>
                    <div class="enter-area">
                      <input name="password" type="password" class="enter-item last-enter-item" placeholder="密码"/>
                      <i class="placeholder">密码</i>
                    </div>
                </div>
                <div class="enter-area img-code-area">
                      <i class="placeholder">验证码</i>
                        <input type="text" class="enter-item code-enter-item" name="captcha" maxlength="5" placeholder="验证码">
                        <!-- 验证码错误信息提示 -->
                        &nbsp; &nbsp; <img src="{{captcha_src()}}" onclick="rand_code(this)" title="点击更换">
                        <!-- 设置验证码点击切换 -->
                        <script type="text/javascript">
                          function rand_code(obj){
                            obj.src = obj.src+'?a='+Math.random();  
                          }


                        </script>

                        @if (count($errors) > 0)
                         @foreach ($errors->all() as $error)
                         <script type="text/javascript">
                             alert("{{ $error }}");
                         </script>   
                        @endforeach
                        @endif
                </div>
                <input type="submit" name="submit" class="button orange" value="立即登录">
                
                <a class="button" href="/home/login/create">注册账号</a>
            </form>
        </div>
    </div>
  </div>
  <div class="nl-footer">
  	<div class="nl-f-nav">
    	<span>
                    <a href="xm.com" target="_blank" title="XM-商城">xiaomi商城</a>
                            </span>
    </div>
    <p class="nl-f-copyright">©<a href='xm.com'>xiaomi商城</a> 北京市昌平区玉龙文化园 <a href='#'>歡迎來电13811478105本網站由 jingcheng项目小组制作</a></p>
  </div>
</div>

 
 

 
 
 

 
 

 
 

 
 


	
 
 


</body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
var username_empty = "用户名不能为空。";
var username_shorter = "用户名长度不能少于 3 个字符。";
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
