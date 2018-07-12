@extends('admin.common.common')

@section('content') 
<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
            <legend>友情链接修改</legend>
          </fieldset>
            <xblock><button class="layui-btn" onclick="location='/admin/links'">
            <i class="layui-icon"></i>列表显示</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            

            <!-- 表单添加开始 -->
        <div class="page-content">
            <form action="/admin/links/update/{{ $data->id }}" method="post">
            {{ csrf_field() }}

                <div class="layui-form-item">
                    <label class="layui-form-label">公司名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="lname" required value="{{ $data->lname }}" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div> 

                <div class="layui-form-item">
                    <label class="layui-form-label">网站地址</label>
                    <div class="layui-input-block">
                        <input type="text" name="lurl" requiredrequired  value="{{ $data->lurl }}" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div> 

                <div class="layui-form-item">
                    <label class="layui-form-label">网站描述</label>
                    <div class="layui-input-block">
                        <input type="text" name="lsay" required value="{{ $data->lsay }}" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div> 

                <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>

                <!-- <div class="layui-form-item">
                    <label class="layui-form-label">单行输入框</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div>  -->

            </form>
            
        </div>

            <!-- 表单添加结束 -->
  


@endsection('content')