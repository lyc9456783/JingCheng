@extends('admin.common.common')

@section('content') 

<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <div style="height:40px;"></div>
        <hr>
        <form class="layui-form layui-form-pane" action="/admin/discounts/update/{{$data->id}}" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block">
                  <input type="text" name="gname" value="{{$data->gname}}" lay-verify="required" style="width:400px;" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
              <label class="layui-form-label">折扣描述</label>
                <div class="layui-input-block" style="width:400px">
                  <select name="describe">
                    <option value="">--请选择--</option>
                    <option value="1" @if($data ->describe == 1)selected @endif >半价优惠</option>
                    <option value="2" @if($data ->describe == 2)selected @endif >立减1000</option>
                    <option value="3" @if($data ->describe == 3)selected @endif >立减500</option>
                    <option value="4" @if($data ->describe == 4)selected @endif >立减300</option>
                    <option value="5" @if($data ->describe == 5)selected @endif >立减200</option>
                    <option value="6" @if($data ->describe == 6)selected @endif >立减100</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">商品原价</label>
                  <div class="layui-input-block">
                    <input type="text" name="price" value="{{$data->price}}" lay-verify="required"  style="width:400px;" placeholder="输入商品标价" autocomplete="off" class="layui-input">
                  </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">商品折扣价</label>
                  <div class="layui-input-block">
                    <input type="text" name="discount" value="{{$data->discount}}" lay-verify="required" style="width:400px;" placeholder="输入商品标价" autocomplete="off" class="layui-input">
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