@extends('admin.common.common')


@section('content')

<form action="/admin/citys/create" class="layui-form" method="post">
  {{ csrf_field() }}

  <div class="layui-form-item">
    <label class="layui-form-label">请输入</label>
    <div class="layui-input-block">
      <input type="text" name="cname" required autocomplete="off" placeholder="" class="layui-input">
    </div>
  </div>


  <div class="layui-form-item">
    <label class="layui-form-label">请选择</label>
    <div class="layui-input-block">
      <select name="pic"  required lay-filter="aihao">
        <option value="">--请选择--</option>
        <option value="">1111</option>
      </select>
    </div>


  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>



@endsection('content')