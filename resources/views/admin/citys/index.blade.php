@extends('admin.common.common')


@section('content')
<div class="page-content">
      <!-- 中间层开始 -->
      <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button></xblock>    
      <table class="layui-table">
          <thead>
              <tr>
                  <th><input type="checkbox" name="" value="" name="box[]"></th>
                  <th> ID </th>
                  <th> PID </th>
                  <th> 分类名称 </th>
                  <th> pid父级 </th>
                  <th> path路径 </th>
                  <th> 状态 </th>
          </thead>
          <tbody>
            @foreach($data as $v)
              <tr>
                  <td> <input type="checkbox" value="" name="box[]"></td>
                  <td> {{ $v['id'] }} </td>
                  <td> {{ $v['pid'] }} </td>
                  <td> {{ $v['cname'] }} </td>
                  <td>  pid父级  </td>
                  <td>{{ $v['path'] }}</td>
                  <td>{{ $v['status'] }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
      <div id="page">{!! $data->render()!!}</div>
      <!-- 中间层结束 -->
</div>

@endsection('content')