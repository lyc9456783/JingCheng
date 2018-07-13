@extends('admin.common.common')
@section('content')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align:right;">
                  <div class="layui-form-item" style="display:inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="search"  placeholder="请输入公告ID号" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                <a href="/admin/notice/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
                <span class="x-right" style="line-height:40px">共有数据 {{ $count }} 条</span>
            </xblock>
            <table class="layui-table">
                    <tr>
                        <td style="text-align:center">
                            <input type="checkbox" disabled>
                        </td>
                        <td><b>公告ID</b></td>
                        <td><b>发表人</b></td>
                        <td><b>公告标题</b></td>                 
                        <td><b>发表时间</b></td>
                        <td><b>操作</b></td>
                    </tr>
                <tbody>
                @foreach ($data as $k=>$v)
                    <tr>
                        <td  style="text-align:center">
                            <input type="checkbox" value="" name="">
                        </td>
                        <td>{{$v['id']}}</td>
                        <td>{{$v->users['username']}}</td>
                        <td>{{$v['title']}}</td>
                        <td>{{$v['created_at']}}</td>
                        <td class="td-manage">
                            <a title="编辑" href="/admin/notice/edit/{{$v['id']}}">
                                <i class="layui-icon">&#xe642;</i>编辑
                            </a> &nbsp
                            <a title="删除" href="/admin/notice/del/{{$v['id']}}">
                                <i class="layui-icon">&#xe640;</i>删除
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="page">{!! $data -> render()!!}</div>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>

        <script>

        /*用户-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }

        </script>
@endsection