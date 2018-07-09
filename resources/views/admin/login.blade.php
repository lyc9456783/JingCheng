@extends('admin.common.common')


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
                  <input type="text" name="username" lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input" style="height:32px;">
                </div>
            </div>

            <label class="login-title" for="password">密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont"></i></label>
                <div class="layui-input-inline login-inline">
                  <input type="text" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input" style="height:32px;">
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-warning pull-right" lay-submit="" lay-filter="login" type="submit">登录</button> 
                <div class="forgot"><a href="#" class="forgot">忘记帐号或者密码</a></div>     
            </div>
        </form>
        <!-- 后台登录结束 -->
        <!-- ajax登陆验证 -->
        <script>
        // $(function  () {
        //     layui.use('form', function(){
        //       var form = layui.form();
        //       //监听提交
        //       form.on('submit(login)', function(data){
        //         layer.msg(JSON.stringify(data.field),function(){
        //             location.href="{{ url('admin/user') }}"
        //         });
        //         return false;
        //       });
        //     });
        // })   
    </script>


    </div>


