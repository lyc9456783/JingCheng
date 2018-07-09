@extends('admin.common.common')

@extends('admin.common.left')

@section('content')
<!-- 轮播图添加 -->
<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="">
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <label class="layui-form-label xbs768">日期范围</label>
                    <div class="layui-input-inline xbs768">
                      <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
                    </div>
                    <div class="layui-input-inline xbs768">
                      <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="search" placeholder="路径关键字" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button><button class="layui-btn" onclick="location='/admin/slids/create'"><i class="layui-icon"></i>添加</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
				<!-- 表格开始 -->
					<table class="layui-table">
		                <thead>
		                    <tr>
		                        <th>
		                            <input type="checkbox" name="" value="">
		                        </th>
		                        <th>id</th>
		                       	<th>图片</th>
		                       	<td>跳转路径</td>
		                       	<td>添加时间</td>
		                        <td>当前状态</td>
		                        
		                        <td>操作</td>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($data as $k => $v)
		                    <tr>
		                        <td><input type="checkbox" value="1" name=""></td>
		                        <td>{{ $v['id'] }}</td>
		                        <td>
		                        	<u style="cursor:pointer" onclick="member_show('查看图片','{{ $v['simg'] }}','10000','1000','800')">
		                                查看图片
		                            </u>
		                        </td>
		                        <td>{{ $v['surl'] }}</td>
		                        <td>{{ $v['created_at'] }}</td>
		                       	
		                       	@if( $v['state'] == 0 )
		                      	<td class="td-status"><span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span></td>
		                      	@else
		                       <td class="td-status"><span class="layui-btn layui-btn-normal layui-btn-mini">已启用 </span></td>
		                      	@endif
		                      	
		                      	<td class="td-manage">
		                      		@if( $v['state'] == 0 )
		                      		<a style="text-decoration:none" onclick="member_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon"></i></a>
									@else
									<a style="text-decoration:none" onclick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="layui-icon"></i> </a>
									@endif
		                       		<a title="编辑" href="/admin/slids/edit/{{ $v->id }}"  class="ml-5" style="text-decoration:none">
		                                <i class="layui-icon"></i>
		                            </a>
		                            <a title="删除"   href="/admin/slids/destroy/{{ $v->id }}"  onclick="return confirm('确定删除吗')" style="text-decoration:none">
		                                <i class="layui-icon"></i>
		                            </a>

		                            
		                        </td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
					<div id="page">{!! $data->render()!!}</div>
				<!-- 表格结束 -->

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


                /*用户-停用*/
        function member_stop(obj,id){
            layer.confirm('确认要停用吗？',function(index){
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="/admin/slids/close" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
                $(obj).remove();
                layer.msg('已停用!',{icon: 5,time:1000});
            });
        }
</script>



@endsection('content')