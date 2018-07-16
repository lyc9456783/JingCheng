@extends('admin.common.common')
@section('content')
<!-- 轮播图添加 -->
<div class="page-content">
         	<div class="content">
          	<div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <!-- 右侧内容框架，更改从这里开始 -->
           	<form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: right;">
                  	<div class="layui-form-item" style="display: inline-block;">
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
            	<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="location='/admin/recommend/create'"><i class="layui-icon">&#xe608;</i>添加</button>
            	<span class="x-right" style="line-height:40px">共有数据：{{DB::table('jc_recommends')->count()}} 条</span>
            </xblock>
				<!-- 表格开始 -->
					<table class="layui-table">
		                <thead>
		                    <tr>
		                        <th>
		                            <input type="checkbox" disabled>
		                        </th>
		                        <th>id</th>
		                       	<th>商品名称</th>
		                       	<th>图片展示</th>
		                       	<td>大图展示</td>
		                        <td>当前状态</td>
		                        <td>操作</td>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($data as $k => $v)
		                    <tr>
		                        <td><input type="checkbox" value="{{ $v['id'] }}" name="ids"></td>
		                        <td>{{ $v['id'] }}</td>
		                        <td>{{ $v['name'] }}</td>
		                        <td>
		                        	<img src="{{$v['rimg']}}">
		                        </td>
		                        <td>
		                        	<u style="cursor:pointer" onclick="member_show('查看图片','/admin/recommend/img/{{$v['id']}}','10000','600','500')">
		                                查看大图片
		                            </u>
		                        </td>		                       	
		                       	@if( $v['rstate'] == 0 )
		                      	<td class="td-status"><span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span></td>
		                      	@else
		                       <td class="td-status"><span class="layui-btn layui-btn-normal layui-btn-mini">已启用 </span></td>
		                      	@endif
		                      	
		                      	<td class="td-manage">
		                      	@if( $v['rstate'] == 0 )
		                            <a style="text-decoration:none" href="/admin/recommend/show/{{$v['id']}}" title="是否启用">
		                                <i class="layui-icon">&#xe601;启用</i>
		                            </a>
		                            <a title="修改" href="/admin/recommend/edit/{{$v['id']}}" style="text-decoration:none">
		                                <i class="layui-icon">&#xe642;修改</i>
		                            </a>
		                            <a title="删除" href="/admin/recommend/destroy/{{$v['id']}}" style="text-decoration:none">
		                                <i class="layui-icon">&#xe640;删除</i>
		                            </a>
		                        @else
		                        	<a style="text-decoration:none" href="/admin/recommend/show/{{$v['id']}}" title="是否关闭">
		                                <i class="layui-icon">&#xe601;关闭</i>
		                            </a>
		                            <a title="修改" href="/admin/recommend/edit/{{$v['id']}}" style="text-decoration:none">
		                                <i class="layui-icon">&#xe642;修改</i>
		                            </a>
		                            <a title="删除" href="/admin/recommend/destroy/{{$v['id']}}" style="text-decoration:none">
		                                <i class="layui-icon">&#xe640;删除</i>
		                            </a>
		                        @endif
		                        </td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
				<!-- 表格结束 -->
				<div id="page">{!! $data->render() !!}</div>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
<!-- 轮播图结束 -->



<script>
	
 	/*图片-查看*/
    function member_show(title,url,id,w,h){
        x_admin_show(title,url,w,h);
    }


            /*用户-启用*/
        function member_start(obj,id){
            layer.confirm('确认要启用吗？',function(index){
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!',{icon: 6,time:1000});
            });
        }

        //批量删除提交
        function delAll () {
            //获取已选中的的选项到数组
            var time = null;
            var ids = [];
            $(" tbady input[type='checkbox']:checked").each(function(){
               ids.push(this.value);
            });
            //将被选中的id进行拼接成数组
            ids = ids.join(',');
            //发送ajax到方法中进行删除
            $.get('/admin/recommend/delall',{'ids':ids},function(msg){
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
</script>



@endsection('content')