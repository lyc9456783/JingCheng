@extends('admin.common.common')

@extends('admin.common.left')

@section('content') 
<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/admin/links">
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
                      <input type="text" name="search" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button><button class="layui-btn" onclick="location='/admin/links/create'"><i class="layui-icon"></i>添加</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th> ID </th>
                        <th> 公司名称 </th>
                        <th> 网站链接 </th>
                        <th> 描述 </th>
                        <th> 添加时间 </th>
                        <th> 状态 </th>
                        <th> 操作 </th>

                </thead>
                <tbody>
					@foreach($data as $k => $v)
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td> {{ $v->id }} </td>
                        <td> {{ $v->lname }} </td>
                        <td> {{ $v->lurl }} </td>
                        <td> {{ $v->lsay }} </td>
                        <td> {{ $v->created_at }} </td>
						<td> {{ $v->lstate }} </td>
                        <td>
                        	<a title="编辑" href="/admin/links/edit/{{ $v->id }}"  class="ml-5" style="text-decoration:none">
                                <i class="layui-icon"></i>
                            </a>
                            <a title="删除"   href="/admin/links/destroy/{{ $v->id }}"  onclick="return confirm('确定删除吗')" style="text-decoration:none">
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
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<script>

</script>



@endsection('content')