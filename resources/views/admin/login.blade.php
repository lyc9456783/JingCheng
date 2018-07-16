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

    <style type="text/css">
    .pagination li{
        width:35px;
        height:25px;
        line-height:25px; 
        border:1px solid #ddd;
        border-radius:5px;
        float:left; 
        margin:3px;  
        text-align:center;    
    }
    .pagination li:hover{
        background:#5B604E; 
    }
    .pagination {
        width:500px; 
        margin:auto;
        padding-left:15%;    
    }
    .pagination span{
            position: relative;
            padding: 5px 14px;
            margin-left:-0.5px; 
            line-height: 1.42857143;
            color: #fff;
            text-decoration: none;
            background-color:#6D5C43;
            border-radius:5px; 
    }
    </style>
</head> 
<div class="login-logo"><h1>后台登陆  X-ADMIN V1.1</h1></div>


    <div class="login-box">

        <!-- 后台首页登录界面 -->
        <form class="layui-form layui-form-pane" action="{{ url('admin/login/check') }}" method="post">
              {{ csrf_field() }}
            <h3>登录你的帐号</h3>
            <label class="login-title" for="username">帐号</label>
            <div class="layui-form-item" >
                <label class="layui-form-label login-form"><i class="iconfont"></i></label>
                <div class="layui-input-inline login-inline">
                  <input type="text" name="username" lay-verify="required"  value="{{ old('username') }}" placeholder="请输入你的帐号" autocomplete="off" class="layui-input" >
                </div>
            </div>

            <label class="login-title" for="password">密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont"></i></label>
                <div class="layui-input-inline login-inline">
                  <input type="password" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input" >
                </div>

            </div>

            <div class="login-title" style="text-align: center;">
                <button class="btn btn-warning pull-right" lay-submit="" lay-filter="login" type="submit">登录</button> 
                <!-- <div class="forgot"><a href="{{ url('admin/login/change') }}" class="forgot">忘记帐号或者密码</a></div>   -->

            </div>
        </form>
        <!-- 后台登录结束 -->

        <!-- ajax验证用户名 -->
        <script>
           $('form').submit(function(){
                // $.ajax({
                //     url:'/admin/links/close/'+id,
                //     type:'get',
                //     data:'state=0',
                //     success:function(msg){
                //         if(msg ==0){
                //            return false;
                //         }
                //     },
                //     async:false
                // });
           })
        </script>


    </div>