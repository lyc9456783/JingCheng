@extends('admin.common.common')


@section('content') 


 <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="/admin/users/update/{{ $data -> id }}" method="post">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                       用户名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" required lay-verify="username"
                        autocomplete="off" value="{{ $data -> username }}" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                       邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="email" required lay-verify="email"
                        autocomplete="off" value="{{ $data -> email }}" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户昵称</label>
                    <div class="layui-input-block">
                      <input type="text" name="nickname" value="{{ $data ->Userdetails->nickname }}" lay-verify="required" placeholder="请输入昵称" autocomplete="off" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-block">
                      <input type="phone" name="phone" value="{{ $data ->Userdetails->phone }}" lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-item">
                    <label class="layui-form-label">身份证号</label>
                    <div class="layui-input-block">
                      <input type="id_card" name="id_card" value="{{ $data ->Userdetails->id_card }}" lay-verify="required" placeholder="请输入身份证号" autocomplete="off" class="layui-input">
                    </div>
                  </div>
                   <div class="layui-form-item">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                      <input type="radio" name="sex" value="1" title="男" checked="">
                      <input type="radio" name="sex" value="0" title="女">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">家庭住址</label>
                    <div class="layui-input-block">
                      <input type="text" name="addr" value="{{ $data ->Userdetails->addr }}" lay-verify="addr" autocomplete="off" placeholder="请输入家庭住址" class="layui-input">
                    </div>
                  </div>
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit>
                        确认修改
                    </button>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->

@endsection  