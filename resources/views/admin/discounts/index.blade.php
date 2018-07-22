@extends('admin.common.common')
@section('content')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>

            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/admin/goods" method="get">
                <div class="layui-form-pane" style="text-align:right;">
                  <div class="layui-form-item" style="display:inline-block;">
                    
                    <div class="layui-input-inline">
                      <input type="text" name="search"  placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            
            <hr>
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                <a href="/admin/discounts/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
                <span class="x-right" style="line-height:40px">共有数据 &nbsp;{{$count}} &nbsp;条</span>
            </xblock>
            <table class="layui-table">
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" disabled id="check">
                        </td>
                        <td><b>ID</b></td>
                        <td><b>商品名称</b></td>
                        <td><b>商品原价</b></td>
                        <td><b>商品折后价</b></td>
                        <td><b>折扣描述</b></td>
                        <td><b>操作</b></td>
                    </tr>
                <tbody>
                    @foreach($data as $k=>$v)
                       <tr>
                            <td style="text-align:center">
                                <input type="checkbox" name="ids" id="check" value="">
                            </td>
                            <td>{{$v->id}}</td>
                            <td>{{$v->gname}}</td>
                            <td>{{$v->price}}</td>
                            <td>{{$v->discount}}</td>
                            @if($v->describe == 1)
                                <td>半价优惠</td>
                            @elseif($v->describe == 2)
                                 <td>立减1000</td>
                            @elseif($v->describe == 3)
                                <td>立减500</td>
                            @elseif($v->describe == 4)
                                <td>立减300</td>
                            @elseif($v->describe == 5)
                                <td>立减200</td>
                            @else($v->describe == 6)
                                <td>立减100</td>
                            @endif
                            <td class="td-manage">
                                <a title="编辑" href="/admin/discounts/edit/{{$v->id}}" class="ml-5">
                                    <i class="layui-icon">&#xe642;</i>编辑 
                                </a> 
                                <a title="删除" href="/admin/discounts/destroy/{{$v->id}}" class="ml-5">
                                    <i class="layui-icon">&#xe640;</i>删除   
                                </a>
                            </td>
                       </tr> 
                    @endforeach
                </tbody>
            </table>
           <div id="page">{!! $data->render()!!}</div>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
        </div>
         <script>
          function delAll () {
            //获取已选中的的选项到数组
            var time = null;
            var ids = [];
            $("tbody input[type='checkbox']:checked").each(function(){
               ids.push(this.value);
            });
            //将被选中的id进行拼接成数组
            ids = ids.join(',');
            //发送ajax到方法中进行删除
            $.get('/admin/discounts/delall',{'ids':ids},function(msg){
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