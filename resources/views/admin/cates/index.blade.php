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
                      <input type="text" name="search"  placeholder="请输入分类名称" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                <a href="/admin/cates/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
                <span class="x-right" style="line-height:40px">共有数据88 条</span>
            </xblock>
            <table class="layui-table">
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" name="" id="check" value="">
                        </td>
                        <td><b>ID</b></td>
                        <td><b>父级ID</b></td>
                        <td><b>分类名称</b></td>
                        <td><b>路径</b></td>
                        <td><b>状态</b></td>
                        <td><b>操作</b></td>
                    </tr>
                <tbody>
                @foreach ($cates as $k=>$v)
                    <tr>
                        <td  style="text-align:center">
                            <input type="checkbox" value="{{$v->id}}" name="">
                        </td>
                        <td>{{$v->id}}</td>
                        <td>{{$v->pid}}</td>
                        <td>{{$v->classname}}</td>
                        <td >{{$v->path}}</td>
                        <td>{{$v->status ==1 ? '开启' : '禁用'}}</td>
                        <td class="td-manage">
                            <a title="编辑" href="/admin/cates/edit/{{$v->id}}" onclick="member_edit('编辑','member-edit.html','4','','510')"
                            class="ml-5" style="text-decoration:none">编辑
                                <i class="layui-icon">&#xe642;</i>
                            </a>　&nbsp;　 
                            <a title="删除" href="/admin/cates/destroy/{{$v->id}}">删除
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="page">{!! $cates->render()!!}</div>
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