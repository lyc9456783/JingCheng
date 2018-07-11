@extends('admin.common.common')

@section('content') 
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
          <hr>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: right;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                <table class="layui-table">
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" name="" id="check" value="">
                        </td>
                        <td><b>订单ID</b></td>
                        <td><b>商品ID</b></td>
                        <td><b>快递单号</b></td>
                        <td><b>下单用户</b></td>                   
                        <td><b>状态</b></td>
                        <td><b>操作</b></td>
                    </tr>
                <tbody>
                @foreach ($data as $k=>$v)
                    <tr>
                        <td  style="text-align:center">
                            <input type="checkbox" value="" name="">
                        </td>
                        <td>{{$v->id}}</td>
                        <td>{{$v->gid}}</td>
                        <td>{{$v->ordersnum}}</td>
                        <td>{{$v->users->username}}</td>
                        @if($v->status == 0)
                            <td>未发货</td>
                        @elseif($v->status == 1)
                            <td>已发货</td>
                        @else
                            <td>交易完成</td>
                        @endif
                         <td class="td-manage">
                            <a title="还原" href="/admin/orders/reset/{{ $v['id'] }}" onclick="member_edit('还原','member-edit.html','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe63d;</i>
                            </a>&nbsp
                            <a title="删除" href="/admin/orders/delete/{{ $v['id'] }}" onclick="member_del(this,'1')" 
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
@endsection  