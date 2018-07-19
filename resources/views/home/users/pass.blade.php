@extends('home.common.common')

@section('content') 
    <!-- 中部开始 -->
<br><br><br>
<link rel="stylesheet" href="/checkbox/bs/css/bootstrap.min.css">
<script src="/checkbox/bs/css/jquery-3.3.1.min.js"></script>
<script src="/checkbox/bs/css/bootstrap.min.js"></script>
    <div class="container">
        <!-- 右侧主体开始 -->
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <hr>
        <!-- 右侧内容框架，更改从这里开始 -->
        <form  class="form-horizontal has-success has-feedback" action="/home/users/passupdate/{{ $id }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-4">
                    <label for="exampleInputPassword1">原密码</label>
                    <input type="password" class="form-control" name="oldpass" placeholder="输入原密码">
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-4">
                    <label for="exampleInputPassword1">新密码</label>
                    <input type="password" class="form-control" name="newpass" placeholder="输入新密码">
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-4">
                    <input type="password" class="form-control" name="repass" placeholder="重复新密码">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    6-14位字符（支持数字/字母/符号）
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-4" style="text-align:center">
                    <button type="submit" class="btn btn-success">立即修改</button>
                </div>
            </div><br>
        </form>
    </div>
@endsection 