@extends('admin.common.common')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
            <hr>
            <div>
              <a href="/admin/entrepot"><button class="layui-btn layui-btn-success" ><i class="layui-icon">&#xe63c;</i>列表</button></a>&nbsp
              <a href="/admin/entrepot/create"><button class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</button></a>
            </div>
            <form class="layui-form" action="/admin/entrepot/store" method="post">
              {{csrf_field()}}
              <div class="layui-form-item" id="nav">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block" style="width:300px">
                  <select name="gid" id="gid">
                      <option value="0">--请选择--</option>
                      @foreach ($data as $k=>$v)
                      @if($v ->entrepotsgoods['gid'] !== $v->id)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                      @endif
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">库存数量</label>
                <div class="layui-input-inline">
                  <input type="int" name="num" required lay-verify="required" placeholder="请输入库存数量" autocomplete="off" class="layui-input" value="">
                </div>
              </div>
              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">库存状态</label>
                <div>
                  <label class="radiobox"><input name="rstate" value="1" type="radio">上架</label>
                  <label class="radiobox"><input name="rstate" value="0" type="radio" checked>下架</label>
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="formDemo">立即添加</button>
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