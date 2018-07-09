@extends('admin.common.common')

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
                      <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
                    </div>
                  </div>
                </div> 
            </form>
             <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button><button class="layui-btn" onclick="location='/admin/slids'"><i class="layui-icon"></i>返回列表</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
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
		                        <td>当前状态</td>
		                        <td>删除时间</td>
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
		                       	@if( $v['state'] == 0 )
		                      	<td>关闭</td>
		                      	@else
		                      	<td>开启</td>
		                      	@endif
		                      	<td>{{ $v['deleted_at'] }}</td>
		                      	<td>
		                       		<a title="还原" href="/admin/slids/restore/{{ $v->id }}"  class="ml-5" style="text-decoration:none">
		                                <i class="layui-icon"></i>
		                            </a>
		                            <a title="删除"   href="/admin/slids/delOk/{{ $v->id }}"  onclick="return confirm('确定要永久删除吗')" style="text-decoration:none">
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

</script>



@endsection('content')