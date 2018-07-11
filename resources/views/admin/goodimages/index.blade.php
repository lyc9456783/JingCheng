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
                        <select name="search" lay-verify="" lay-search>
                          <option value=""></option>
                        @foreach ($goods as $k=>$v)
                          <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                        </select>  
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                <a href="/admin/goodimages/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
                <span class="x-right" style="line-height:40px">共有数据条</span>
            </xblock>
            <table class="layui-table" style="text-align:center">
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" name="" id="check" value="">
                        </td>
                        <td><b>ID</b></td>
                        <td><b>商品名称</b></td>
                        <td><b>图片展示</b></td>
                        <td><b>查看大图</b></td>
                        <td><b>操作</b></td>
                    </tr>
                    @foreach ($data as $k=>$v)
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" name="ids" id="check" value="{{$v->id}}">
                        </td>
                        <td>{{$v->id}}</td>
                        <td>{{$v->imagegoods->name}}</td>
                        <td><img width="100" height="60" src="{{$v->images}}"></td>
                        <td>    <u style="cursor:pointer" onclick="member_show('查看大图','/admin/goodimages/show/{{$v['id']}}','1000','600','500')">
                                    点击查看大图
                                </u>
                        </td>
                        <td>
                            <a title="编辑" href="/admin/goodimages/edit/{{$v->id}}" onclick="member_edit('编辑','member-edit.html','4','','510')"
                            class="ml-5" style="text-decoration:none">编辑
                                <i class="layui-icon">&#xe642;</i>
                            </a>　 
                            <a title="删除" href="/admin/goodimages/destroy/{{$v->id}}">删除
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </table>
            <div id="page">{!! $data->render()!!}</div>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
         <script>
            /*图片-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }
        //批量删除提交
        function delAll () {
            //获取已选中的的选项到数组
            var time = null;
            var ids = [];
            $("input[type='checkbox']:checked").each(function(){
               ids.push(this.value);
            });
            //将被选中的id进行拼接成数组
            ids = ids.join(',');
            //发送ajax到方法中进行删除
            $.get('/admin/goodimages/delall',{'ids':ids},function(msg){
                // console.log(msg);
                if(msg !== 0){
                    layer.msg('删除成功', {icon: 1});
                    $('input:checked').parent().parent().remove();
                    if(time == null ){
                        time = setInterval(function(){
                        location.reload(true);
                        },3000);
                    } 
                    // location.href = "/admin/goodimages";
                }else{
                    layer.msg('删除失败', {icon: 2});
                }
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