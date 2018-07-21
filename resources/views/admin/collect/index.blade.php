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
                        <select name="search" lay-verify="" lay-search>
                            <option value=""></option>
                            @foreach($collect as $k => $v)
                            <option value="{{$v['uid']}}">{{$v->collectusers->Userdetails['nickname']}}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock>
                <a href="/admin/collect/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
                <span class="x-right" style="line-height:40px"> 共有数据{{ $data->count() }}条 </span>
            </xblock>
            <table class="layui-table" style="text-align:center">
                    <tr style="text-align:center">
                        <td>
                            <input type="checkbox" disabled id="check" value="">
                        </td>
                        <td>ID</td>
                        <td>用户名称</td>
                        <td>收藏商品</td>
                        <td>操作</td>
                    </tr>
                    @foreach($data as $k => $v)
                    <tr>
                        <td><input type="checkbox" value="{{ $v['id'] }}" name="ids"></td>
                        </td>
                        <td>{{ $v['id'] }}</td>
                        @if($v->collectusers->Userdetails['nickname'] == '')
                        <td>{{ $v->collectusers['username'] }}</td>
                        @else(!$v->collectusers->Userdetails['nickname'] == '')
                        <td>{{ $v->collectusers->Userdetails['nickname'] }}</td>
                        @endif
                        <td>{{ $v->collectgoods['name'] }}</td>
                        <td>
                            <a title="删除" href="/admin/collect/destroy/{{$v['id']}}">删除
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

            </table>
            <div id="page">{!! $data->render()!!}</div>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
         <script>
            /*图片-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }

        </script>
@endsection