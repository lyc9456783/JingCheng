@extends('admin.common.common')

@section('content') 
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/admin/users/index" method="get">
                <div class="layui-form-pane" style="text-align: right;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="search"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button> &nbsp 
                <!-- 用户添加 -->
                <a href="/admin/users/create"><button class="layui-btn" onclick="member_add('添加用户','member-add.html','600','500')"><i class="layui-icon">&#xe608;</i>添加</button></a>
                <!-- 计算数据总数量 -->
                <span class="x-right" style="line-height:40px">共有数据：{{ $count }}&nbsp条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" disabled>
                        </th>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>用户昵称</th>
                        <th>手机号</th>
                        <th>性别</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($data as $k=>$v)
                        <td>
                            <input type="checkbox" value="{{ $v['id'] }}" name="ids">
                        </td>
                        <td>{{ $v['id'] }}</td>
                        <td>{{ $v['username'] }}</td>
                        <td>{{ $v['email'] }}</td>
                        <td>{{$v->Userdetails['nickname']}}</td>
                        <td>{{$v->Userdetails['phone']}}</td>
                        <td>@if($v->Userdetails['sex'] == 0)女@else男@endif</td>
                        @if ( $v['grade'] == 1)
                            <td>超级管理员</td>
                        @elseif ($v['grade'] == 2)
                            <td>普通管理员</td>
                        @else
                            <td>普通用户</td>
                        @endif
                        <td class="td-manage">
                            <a title="编辑" href="/admin/users/edit/{{ $v['id'] }}" onclick="member_edit('编辑','member-edit.html','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>编辑
                            </a>&nbsp
                            <a style="text-decoration:none"  onclick="member_password('修改密码','member-password.html','10001','600','400')"
                            href="/admin/users/pass/{{ $v['id'] }}" title="修改密码">
                                <i class="layui-icon">&#xe631;</i>修改密码
                            </a>&nbsp
                            <a title="删除" href="/admin/users/del/{{ $v['id'] }}" onclick="member_del(this,'1')" 
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>回收
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
            <div id="page">{!! $data -> render()!!}</div>
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <script>
        //批量删除提交
         function delAll () {
            //获取已选中的的选项到数组
            var ids = [];
            $("input[type='checkbox']:checked").each(function(){
               ids.push(this.value);
            });
            var time = null;
        });

            //将被选中的id进行拼接成数组
            ids = ids.join(',');

            //发送ajax到方法中进行删除
            $.get('/admin/users/delall',{'ids':ids},function(msg){
                // console.log(msg);
                if(msg !== 0){
                    layer.msg('删除成功', {icon: 1});
                    $('input:checked').parent().parent().remove();
                    if(time == null ){
                        time = setInterval(function(){
                        location.reload(true);
                        },3000);
                    }   
                }else{
                    layer.msg('删除失败', {icon: 2});
                }
            });
        }
    </script>
    <!-- 中部结束 -->
@endsection  