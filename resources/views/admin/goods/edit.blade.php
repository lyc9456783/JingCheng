@extends('admin.common.common')

@section('content') 

<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <div style="height:40px;"></div>
        <hr>
        <form class="layui-form layui-form-pane" action="/admin/goods/update/{{$goods->id}}" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="layui-form-item">
              <label class="layui-form-label">商品类别</label>
                <div class="layui-input-block" style="width:400px">
                  <select lay-verify="required" name="gcid">
                    <option value="">--请选择--</option>
                    @foreach ($data as $k=>$v)
                    <option value="{{$v['id']}}"@if($goods->gcid == $v['id'])selected @endif>{{$v['classname']}}</option>
                    @endforeach    
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block">
                  <input type="text" name="name" value="{{$goods->name}}" lay-verify="required" style="width:400px;" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
              <label class="layui-form-label">商品型号</label>
                <div class="layui-input-block" style="width:400px">
                  <select name="type">
                    <option value="">--请选择--</option>
                    <option value="2G+8G" @if($goods->detailsgoods->type == '2G+8G')selected @endif >2G+8G</option>
                    <option value="3G+16G" @if($goods->detailsgoods->type == '3G+16G')selected @endif >3G+16G</option>
                    <option value="4G+32G" @if($goods->detailsgoods->type == '4G+32G')selected @endif >4G+32G</option>
                    <option value="6G+64G" @if($goods->detailsgoods->type == '6G+64G')selected @endif >6G+64G</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
              <label class="layui-form-label">商品颜色</label>
                <div class="layui-input-block" style="width:400px">
                  <select name="color">
                    <option value="">--请选择--</option>
                    <option value="土豪金" @if($goods->detailsgoods->color == '土豪金')selected @endif >土豪金</option>
                    <option value="皇家绿" @if($goods->detailsgoods->color == '皇家绿')selected @endif >皇家绿</option>
                    <option value="美腿白" @if($goods->detailsgoods->color == '美腿白')selected @endif>美腿白</option>
                    <option value="魔力蓝" @if($goods->detailsgoods->color == '魔力蓝')selected @endif>魔力蓝</option>
                    <option value="帝王粉" @if($goods->detailsgoods->color == '帝王粉')selected @endif>帝王粉</option>
                    <option value="尊贵黑" @if($goods->detailsgoods->color == '尊贵黑')selected @endif >尊贵黑</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品简介</label>
                <div class="layui-input-block">
                  <input type="text" name="intro" value="{{$goods->intro}}" lay-verify="required" style="width:400px;" placeholder="请输入描述" autocomplete="off" maxlength="20" class="layui-input">请输入0-20字描述
                </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">商品标价</label>
                  <div class="layui-input-block">
                    <input type="text" name="price" value="{{$goods->price}}" lay-verify="required"  style="width:400px;" placeholder="输入商品标价" autocomplete="off" class="layui-input">
                  </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">商品现价</label>
                  <div class="layui-input-block">
                    <input type="text" name="discount" value="{{$goods->discount}}" lay-verify="required" style="width:400px;" placeholder="输入商品标价" autocomplete="off" class="layui-input">
                  </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品图片</label>
                <div class="layui-input-inline">
                <input type="file" name="pic" lay-verify="title" autocomplete="off"  class="layui-input">
                </div>
                <img  width="40px" height="40px" src="{{$goods->pic}}">
              </div>
              <div class="layui-form-item layui-form-text">
                  <label style="width:500px" class="layui-form-label">商品参数</label>
                  <div class="layui-input-block">
                    <textarea name="describe" placeholder="请输入内容" style="width:500px" class="layui-textarea">{{$goods->detailsgoods->describe}}</textarea>
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