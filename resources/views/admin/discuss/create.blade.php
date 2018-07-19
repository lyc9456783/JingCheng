@extends('admin.common.common')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
            <hr>
            <div><a href="/admin/discuss"><button class="layui-btn layui-btn-success" ><i class="layui-icon">&#xe600;</i>列表</button></a></a><a href="/admin/discuss/create"><button class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</button></a></div>
            <form class="layui-form-item" style="width:500px;text-align: center; margin:auto;" action="/admin/discuss/store" method="post" >
                {{csrf_field()}}
            
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block">
                  <input type="text" name="gid" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">用户名称</label>
                <div class="layui-input-block">
                  <input type="text" name="uid" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">评论内容</label>
                <div class="layui-input-block">
                  <input type="text" name="content" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
              </div>
            </form>
            
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
@endsection