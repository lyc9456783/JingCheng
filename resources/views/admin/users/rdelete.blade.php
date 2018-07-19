@extends('admin.common.common')

@section('content') 
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
          <div style="text-align: right;">
            <button class="layui-btn" onclick="location='/admin/users/index'">返回列表</button>
          </div>
          <hr>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button></xblock>
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
                            <a title="还原" href="/admin/users/reset/{{ $v['id'] }}" 
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe63d;</i>还原
                            </a>&nbsp
                            <a title="删除" href="/admin/users/delete/{{ $v['id'] }}"  
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>永久删除
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
@endsection  