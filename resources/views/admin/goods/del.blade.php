@extends('admin.common.common')
@section('content')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <!-- 右侧内容框架，更改从这里开始 -->
            <div style="height:50px;"></div>
            <hr>
            <table class="layui-table">
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" name="" id="check" value="">
                        </td>
                        <th><b>ID</b></th>
                        <td><b>商品名称</b></td>
                        <td><b>商品原价</b></td>
                        <td><b>商品现价</b></td>
                        <td><b>商品简介</b></td>
                        <td><b>操作</b></td>
                    </tr>
                <tbody>
                    @foreach ($goods as $k=>$v)
                    <tr>
                        <td  style="text-align:center">
                            <input type="checkbox" value="{{$v->id}}" name="">
                        </td>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->price}}</td>
                        <td >{{$v->discount}}</td>
                        <td>{{$v->intro}}</td>
                        <td class="td-manage">
                            <a title="还原" href="/admin/goods/reset/{{$v->id}}" onclick="member_edit('编辑','member-edit.html','4','','510')"
                            class="ml-5" style="text-decoration:none">还原
                                <i class="layui-icon">&#xe642;</i>
                            </a>　&nbsp;　 
                            <a title="永久删除" href="/admin/goods/delete/{{$v->id}}">永久删除
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
         <script>
        //批量删除提交
         function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
         }

        /*用户-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }
        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            });
        }
        </script>
@endsection