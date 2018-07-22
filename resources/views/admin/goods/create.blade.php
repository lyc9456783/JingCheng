@extends('admin.common.common')


@section('content') 

<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <div style="height:40px;"></div>
        <hr>
        <form class="layui-form layui-form-pane" action="/admin/goods/store" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="layui-form-item">
              <label class="layui-form-label">商品类别</label>
                <div class="layui-input-block" style="width:400px">
                  <select lay-verify="required" name="gcid">
                    <option value="">--请选择--</option>
                    @foreach ($data as $k=>$v)
                    <option value="{{$v['id']}}">{{$v['classname']}}</option>
                    @endforeach    
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block">
                  <input type="text" name="name" lay-verify="required" style="width:400px;" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
              <label class="layui-form-label">商品型号</label>
                <div class="layui-input-block" style="width:400px">
                  <select name="type">
                    <option value="">--请选择--</option>
                    <option value="2G+8G">2G+8G</option>
                    <option value="2G+8G">3G+16G</option>
                    <option value="4G+16G">4G+32G</option>
                    <option value="6G+64G">6G+64G</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
              <label class="layui-form-label">商品颜色</label>
                <div class="layui-input-block" style="width:400px">
                  <select name="color">
                    <option value="">--请选择--</option>
                    <option value="土豪金">土豪金</option>
                    <option value="珍珠白">珍珠白</option>
                    <option value="荣耀绿">荣耀绿</option>
                    <option value="魔力蓝">魔力蓝</option>
                    <option value="梦幻粉">梦幻粉</option>
                    <option value="尊贵黑">尊贵黑</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品简介</label>
                <div class="layui-input-block">
                  <input type="text" name="intro" lay-verify="required" style="width:400px;" placeholder="请输入描述" autocomplete="off" maxlength="20" class="layui-input">请输入0-20字描述
                </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">商品标价</label>
                  <div class="layui-input-block">
                    <input type="text" name="price" lay-verify="required"  style="width:400px;" placeholder="输入商品标价" autocomplete="off" class="layui-input">
                  </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">商品现价</label>
                  <div class="layui-input-block">
                    <input type="text" name="discount" lay-verify="required" style="width:400px;" placeholder="输入商品标价" autocomplete="off" class="layui-input">
                  </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品图片</label>
                <div class="layui-input-inline">
                <input type="file" name="pic" lay-verify="title" autocomplete="off"  class="layui-input">
                </div>
              </div>
              <div class="layui-form-item layui-form-text">
                  <label style="width:500px" class="layui-form-label">商品参数</label>
                  <div class="layui-input-block">
                    <textarea name="describe" placeholder="请输入内容" style="width:500px" class="layui-textarea"></textarea>
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