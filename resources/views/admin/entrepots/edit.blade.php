@extends('admin.common.common')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
            <hr>
            <div><a href="/admin/entrepot"><button class="layui-btn layui-btn-success" ><i class="layui-icon">&#xe600;</i>列表</button></a></a><a href="/admin/entrepot/create"><button class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</button></a></div>
            <form class="layui-form" action="/admin/entrepot/update/{{$data->id}}" method="post">
              {{csrf_field()}}
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block" style="width:300px">
                    <input type="int"  value="{{$data->goodentrepots->name}}" class="layui-input" readonly>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">库存数量</label>
                <div class="layui-input-inline">
                  <input type="int" name="num" value="{{$data->num}}" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">开关</label>
                <div class="layui-input-block">
                  <input type="checkbox" name="flag" lay-skin="switch" lay-text="上架|下架" 
                  @if($data->flag == '1')
                  checked
                  @endif
                  >
                  
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="formDemo">立即修改</button>
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