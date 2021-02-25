@extends('admin.common.common')

@section('content')
<!-- 轮播图添加 -->
<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/admin/slids/delshow">
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
             <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button><button class="layui-btn" onclick="location='/admin/slids'"><i class="layui-icon"></i>返回列表</button></xblock>
				<!-- 表格开始 -->
					<table class="layui-table">
		                <thead>
		                    <tr>
		                        <th>
                                <input type="checkbox" name="" value="box[]" id="check">
                            </th>
		                        <th>id</th>
		                       	<th>图片</th>
		                       	<th>跳转路径</th>
		                        <th>当前状态</th>
		                        <th>删除时间</th>
		                        <th>操作</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($data as $k => $v)
		                    <tr>
		                        <td><input type="checkbox" value="{{ $v['id'] }}" name="box[]"></td>
		                        <td>{{ $v['id'] }}</td>
		                        <td>
		                        	<u style="cursor:pointer" onclick="member_show('查看图片','{{ $v['simg'] }}','10000','1000','800')">
		                                查看图片
		                            </u>
		                        </td>
		                       	<td>{{ $v['surl'] }}</td>
		                       	@if( $v['state'] == 0 )
		                      	<td>关闭</td>
		                      	@else
		                      	<td>开启</td>
		                      	@endif
		                      	<td>{{ $v['deleted_at'] }}</td>
		                      	<td>
                                <a title="还原" href="/admin/slids/restore/{{ $v->id }}"  class="ml-5 " style="text-decoration:none" onclick="return confirm('确定恢复吗?')">
                                   <i class="layui-icon">&#xe63d;</i>  还原
                                </a>
                                <a title="彻底删除"   href="/admin/slids/delOk/{{ $v->id }}"  onclick="return confirm('确定要永久删除吗')" style="text-decoration:none">
                                    <i class="layui-icon"></i>  删除
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
          $.post('/admin/slids/deldelshow',{'ids':ids.join(',')},function(msg){
              if(msg == 1){
                  layer.msg('删除成功', {icon: 1});
                  $('tbody input:checked').parent().parent().remove();

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