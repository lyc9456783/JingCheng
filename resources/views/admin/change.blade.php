<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>京城后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admins/css/font.css">
    <link rel="stylesheet" href="/admins/css/xadmin.css">
    <link rel="stylesheet" href="/admins/css/swiper.min.css">
    <link rel="stylesheet" href="/admins/lib/layui/css/layui.css">
    <script type="text/javascript" src="/admins/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admins/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/admins/js/swiper.jquery.min.js"></script>
    <script src="/admins/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admins/js/xadmin.js"></script>
</head>
<body>
    <div class="login-logo"><h1>找回密码</h1></div>
    <div class="login-box">
        <form class="layui-form layui-form-pane" action="" style="text-align: center;margin-top:40px;">
            <!-- 流程第一步 -->
                <label class="login-title" for="username">请输入注册的邮箱地址、手机号码或登陆用户名：</label>
                <div class="layui-form-item">
                     <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="邮箱/手机号/用户名" class="layui-input">
                </div>

                <div class="layui-input-item">
                  <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="验证内容" class="layui-input">
                </div>           
                
                <div class="form-actions">
                <div class="layui-form-item forgot" style="text-align: center;">
                  <button class="layui-btn" lay-submit="" lay-filter="demo2">下一步</button>        
                  <div class="forgot"><a href="{{ url('admin/login') }}" class="forgot">返回登陆</a></div>  
                </div>
            <!-- 流程第二步 -->
                


            <!-- 流程第三步 -->

        </form>
    </div>
	<div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="./images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>   
    </div>
    <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form();
              //监听提交
              form.on('submit(login)', function(data){
                layer.msg(JSON.stringify(data.field),function(){
                    location.href='index.html'
                });
                return false;
              });
            });
        })
        
    </script>
</body>
</html>