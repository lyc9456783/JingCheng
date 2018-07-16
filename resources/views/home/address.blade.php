@extends('admin.common.common')

@section('content') 

<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <hr>
        </fieldset>
        <form class="layui-form layui-form-pane" action="/home/addressupdate/{{$data[0]['uid']}}" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-block">
              <input type="text" name="name" lay-verify="required" placeholder="用于登录 请输入用户名" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">手机</label>
            <div class="layui-input-block">
              <input type="text" name="phone" lay-verify="required" placeholder="用于登录 请输入用户名" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">地址</label>
            <div class="layui-input-block">
              <input type="text" name="address" lay-verify="required" placeholder="用于登录 请输入用户名" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">邮编</label>
            <div class="layui-input-block">
              <input type="text" name="postcode" lay-verify="required" placeholder="用于登录 请输入用户名" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">地址标签</label>
            <div class="layui-input-block">
              <input type="text" name="label" lay-verify="required" placeholder="用于登录 请输入用户名" autocomplete="off" class="layui-input">
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