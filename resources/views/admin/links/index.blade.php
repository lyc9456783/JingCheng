@extends('admin.common.common')

@section('content') 
<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/admin/links">
                <div class="layui-form-pane" >
                  <div class="layui-form-item" style="display: inline-block;">

                    <div class="layui-input-inline">
                      <input type="text" name="search" placeholder="请输入公司名称关键字" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button><button class="layui-btn" onclick="location='/admin/links/create'"><i class="layui-icon"></i>添加</button></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="" name="box[]">
                        </th>
                        <th> ID </th>
                        <th> 链接名称 </th>
                        <th style="width:200px;"> 网站链接 </th>
                        <th> 描述 </th>
                        <th> 添加时间 </th>
                        <th> 状态 </th>
                        <th> 操作 </th>

                </thead>
                <tbody>
					@foreach($data as $k => $v)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $v->id }}" name="box[]" >
                        </td>
                        <td> {{ $v->id }} </td>
                        <td> {{ $v->lname }} </td>
                        <td > <a href="{{ $v->lurl }}" target="_blank">{{ $v->lurl }} </a></td>
                        <td> {{ $v->lsay }} </td>
                        <td> {{ $v->created_at }} </td>
						    @if( $v['lstate'] == 0 )
                            <td class="td-status"><span class="layui-btn layui-btn-disabled layui-btn-mini">未展示</span></td>
                            @else
                            <td class="td-status"><span class="layui-btn layui-btn-normal layui-btn-mini">已启用 </span></td>
                            @endif 
                        <td class="td-manage" >
                            @if( $v['lstate'] == 0 )
                            <a style="text-decoration:none" onclick="member_start(this,{{ $v->id }})" href="javascript:;" title="启用"><i class="layui-icon"></i></a>
                            @else
                            <a style="text-decoration:none" onclick="member_stop(this,'{{ $v->id }}')" href="javascript:;" title="停用"><i class="layui-icon"></i> </a>
                            @endif

                        	<a title="编辑" href="/admin/links/edit/{{ $v->id }}"  class="ml-5" style="text-decoration:none">
                                <i class="layui-icon"></i>
                            </a>
                            <a title="删除"   href="/admin/links/destroy/{{ $v->id }}"  onclick="return confirm('正在执行删除操作,请确认已经关闭前台展示')" style="text-decoration:none">
                                <i class="layui-icon"></i>
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
<script>
    

        /*用户-启用*/
    function member_start(obj,id){

        layer.confirm('确认要启用吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
            //点击确认后发送ajax
            $.ajax({
                url:'/admin/links/open/'+id,
                type:'get',
                data:'state=1',
                success:function(msg){
                  if(msg ==0){
                       return false;
                    }
                },
                 async:false
            });
            //ajax 结束  
             $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
             $(obj).remove();
             layer.msg('已启用!',{icon: 6,time:1000});              
        });
    }


            /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
            //点击确认后发送ajax
            $.ajax({
                url:'/admin/links/close/'+id,
                type:'get',
                data:'state=0',
                success:function(msg){
                    if(msg ==0){
                       return false;
                    }
                },
                async:false
            });
            //ajax 结束  
            $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
            $(obj).remove();
            layer.msg('未展示!',{icon: 5,time:1000});
        });
    }

    //点击全选
    $('thead input[type="checkbox"]').click(function(){
        $('input').attr('checked',true);
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
          $.post('/admin/links/destroys',{'ids':ids.join(',')},function(msg){
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