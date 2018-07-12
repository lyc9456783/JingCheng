@extends('admin.common.common')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <hr>
            <!-- 右侧内容框架，更改从这里开始 -->
            <div><a href="/admin/discuss"><button class="layui-btn layui-btn-success" ><i class="layui-icon">&#xe600;</i>列表</button></a></div>

            <form class="layui-form-item" style="width:500px;text-align: center; margin:auto;" action="/admin/discuss/update/{{$data['id']}}" method="post" >
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label for="L_uname" class="layui-form-label">
                        <span class="x-red">*</span>商品名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_uname" name="" required="" lay-verify="gid" value="{{$data->gooddiscuss->name}}"
                        autocomplete="off" class="layui-input" disabled>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>用户名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="" required="" lay-verify="uid" value="{{$data->userdiscuss->userinfo['nickname']}}"
                        autocomplete="off" class="layui-input" disabled>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_content" class="layui-form-label">
                        <span class="x-red">*</span>评论内容
                    </label>
                    <div class="layui-input-block">
                        <textarea type="desc" id="L_content" name="content" required="" class="layui-textarea">{{$data['content']}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        修改
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