@extends('admin.common.common')
@section('content')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align:right;">
                  <div class="layui-form-item" style="display:inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="search"  placeholder="请输入订单号" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                <a href="/admin/orders/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
                <span class="x-right" style="line-height:40px">共有数据 {{ $count }} 条</span>
            </xblock>
            <table class="layui-table">
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" disabled>
                        </td>
                        <td><b>订单ID</b></td>
                        <td><b>商品ID</b></td>
                        <td><b>快递单号</b></td>
                        <td><b>下单用户</b></td>                   
                        <td><b>状态</b></td>
                        <td><b>详情信息</b></td>
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
                        <td>{{$v->users['username']}}</td>
                        @if($v->status == 0)
                            <td>未发货</td>
                        @elseif($v->status == 1)
                            <td>已发货</td>
                        @else
                            <td>交易完成</td>
                        @endif
                        <td> <a title="查看" href="javascript:;" onclick="member_show('详细信息','/admin/orders/show/{{$v->id}}','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe63c;</i>查看
                            </a>
                        </td>
                        <td class="td-manage">
                            <a title="编辑" href="/admin/orders/edit/{{$v->id}}">
                                <i class="layui-icon">&#xe642;</i>编辑
                            </a> &nbsp
                            @if($v->status == 0)
                            <a title="发货" href="/admin/orders/fh/{{$v->id}}">
                                <i class="layui-icon">&#xe609;</i>发货
                            </a> &nbsp
                            @elseif($v->status == 1)
                                <a title="已发货" href="javascript:;">
                                <i class="layui-icon">&#xe609;</i>已发货
                            </a> &nbsp
                            @else
                                <a title="交易完成" href="javascript:;">
                                <i class="layui-icon">&#xe609;</i>交易完成
                            </a> &nbsp
                            @endif
                            <a title="删除" href="/admin/orders/del/{{$v->id}}">
                                <i class="layui-icon">&#xe640;</i>删除
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="page">{!! $data -> render()!!}</div>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>

        <script>

        /*用户-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }

        </script>
@endsection