@extends('admin.common.common')

@extends('admin.common.left')


@section('content') 
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-left: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                </thead>
               <tbody>
                    <tr>
                    @foreach($data as $k=>$v)
                        <td>
                            <input type="checkbox" value="" name="">
                        </td>
                        <td>{{ $v['id'] }}</td>
                        <td>{{ $v['username'] }}</td>
                        <td>{{ $v['email'] }}</td>
                        @if ( $v['grade'] === 1)
                            <td>超级管理员</td>
                        @elseif ($v['grade'] === 2)
                            <td>普通管理员</td>
                        @else
                            <td>普通用户</td>
                        @endif
                        <td class="td-manage">
                            <a title="还原" href="/admin/users/reset/{{ $v['id'] }}" onclick="member_edit('还原','member-edit.html','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="/admin/users/delete/{{ $v['id'] }}" onclick="member_del(this,'1')" 
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
@endsection  