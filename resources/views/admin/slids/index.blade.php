@extends('admin.common.common')


@section('content')
<!-- 轮播图添加 -->
<div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/admin/slids">
                <div class="layui-form-pane" >
                  <div class="layui-form-item" style="display: inline-block;">

                    <div class="layui-input-inline">
                      <input type="text" name="search" placeholder="路径关键词" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="location='/admin/slids/create'"><i class="layui-icon"></i>添加</button>
            <button class="layui-btn" onclick="location='/admin/slids/show'"><i class="layui-icon"></i>轮播图预览</button></xblock>
				<!-- 表格开始 -->
					<table class="layui-table">
		                <thead>
		                    <tr>
		                        <th>
		                            <input type="checkbox" name="" value="box[]" id="check">
		                        </th>
		                        <th>id</th>
		                       	<th style="text-align: center;width:100px;">图片</th>
                            <th>查看</th>
		                       	<td>跳转路径</td>
		                       	<td>添加时间</td>
		                        <td>当前状态</td>
		                        
		                        <td>操作</td>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($data as $k => $v)
		                    <tr>
		                        <td><input type="checkbox" value="{{ $v['id'] }}" name="box[]"></td>
		                        <td>{{ $v['id'] }}</td>
                            <td><img src="{{ $v['simg'] }}" alt="" width="100px" height="40px" ></td>
		                        <td>
		                        	   <u style="cursor:pointer" onclick="member_show('查看图片','{{ $v['simg'] }}','1000','800','500')">
		                                查看原图
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
		                      		<a style="text-decoration:none" onclick="member_start(this,{{ $v['id'] }})" href="javascript:;" title="启用"><i class="layui-icon"></i></a>
									@else
									<a style="text-decoration:none" onclick="member_stop(this,{{ $v['id'] }})" href="javascript:;" title="停用"><i class="layui-icon"></i> </a>
									@endif
		                       		<a title="编辑" href="/admin/slids/edit/{{ $v->id }}"  class="ml-5" style="text-decoration:none">
		                                <i class="layui-icon"></i>
		                            </a>
		                            <a title="删除"   href="/admin/slids/destroy/{{ $v->id }}"  onclick="return confirm('正在执行删除操作,请确认已经关闭前台展示功能')" style="text-decoration:none">
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


    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
            //点击确认后发送ajax

            $.ajax({
                url:'/admin/slids/close/'+id,
                type:'get',
                data:'state=0',
                success:function(msg){
                   if(msg ==0){
                           return false;
                    }      
                },
                async:false,
            });
            //ajax 结束 
            $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
            $(obj).remove();
            layer.msg('已停用!',{icon: 5,time:1000});                  
        });
    }

    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
            //点击确认后发送ajax
            $.ajax({
                url:'/admin/slids/open/'+id,
                type:'get',
                data:'state=1',
                success:function(msg){
                  if(msg ==0){
                       return false;
                   }
                },
                async:false,
            });
            //ajax 结束 
            $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
            $(obj).remove();
            layer.msg('已启用!',{icon: 6,time:1000});  
        });
    }


    //批量删除全选反选
    $(function(){

        $("#check").change(function(){

            var check = $(this).is(":checked");

            if(check == true){
                $('input').attr('checked',true);
            }else{
                $('input').attr('checked',false);
            }
        })

    })

    var time = null;
    //批量删除提交
    function delAll () {
      layer.confirm('确认要删除吗？',function(index){
           //获取已选中的的选项到数组
           var ids = [];
            $("tbody input[type='checkbox']:checked").each(function(){
                ids.push(this.value);
                });

            //post 验证
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

            //ajax 
          $.post('/admin/slids/destroys',{'ids':ids.join(',')},function(msg){
              if(msg == 1){
                  layer.msg('删除成功', {icon: 1});
                  $('input:checked').parent().parent().remove();

                    if(time == null ){
                        time = setInterval(function(){
                        location.reload(true);
                        },2000);
                    } 
              }else{
                  layer.msg('删除失败', {icon: 2});
              }
          });
      });
    }

</script>



@endsection('content')