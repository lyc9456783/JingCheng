@extends('admin.common.common')

@section('content') 

<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <div style="text-align: right;">
          <button class="layui-btn" onclick="location='/admin/users/index'">返回列表</button>
        </div>
        <hr>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <xblock>
                          <div class="x-left"   style="line-height:40px">{{$error}}</div>
                      </xblock>
                    @endforeach
                </ul>
            </div>
            @endif
            <script type="text/javascript">
            var error=document.getElementsByTagName('xblock');
                  for(var i = 0;i <= error.length;i++){
                   error[i].onclick = function(){
                        // this  本对象
                        this.style.display = 'none';
                      }    
                  } 
            
            </script>
        </fieldset>
        <form class="layui-form layui-form-pane" action="/admin/users/store" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
              <input type="text" name="username" lay-verify="required" placeholder="用于登录 请输入6-17位用户名,以字母开头" value="{{ old('username') }}" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">用户昵称</label>
            <div class="layui-input-block">
              <input type="nickname" name="nickname" placeholder="请输入昵称" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-block">
              <input type="phone" name="phone" lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-item">
            <label class="layui-form-label">身份证号</label>
            <div class="layui-input-block">
              <input type="id_card" name="id_card" lay-verify="required" placeholder="请输入身份证号" autocomplete="off" class="layui-input">
            </div>
          </div>
           <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
              <input type="email" name="email" lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
              <input type="radio" name="sex" value="1" title="男" checked>
              <input type="radio" name="sex" value="0" title="女">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">头像上传</label>
            <div class="layui-input-inline">
              <input type="file" name="face" lay-verify="title" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">家庭住址</label>
            <div class="layui-input-block">
              <input type="text" name="addr" lay-verify="addr" autocomplete="off" placeholder="请输入家庭住址" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
              <input type="password" name="password" lay-verify="required" placeholder="用于登录 请输入6-17位密码" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">权限选择</label>
            <div class="layui-input-inline">
              <select name="grade">
                <option value=""></option>
                <option value="1">超级管理员</option>
                <option value="2">管理员</option>
                <option value="3">普通用户</option>
              </select>
            </div>
          </div>
          <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo2">确认提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </form>
    <!-- 右侧内容框架，更改从这里结束 -->
    </div>
</div>
<!-- 右侧主体结束 -->

@endsection  