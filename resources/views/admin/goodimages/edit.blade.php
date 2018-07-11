@extends('admin.common.common')


@section('content') 

<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;" id="title">{{$title}}</div>
        <div style="height:40px;"></div>
        <hr>
         <form class="layui-form" action="/admin/goodimages/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="layui-form-item">
                        <label class="layui-form-label">商品名称</label>
                        <div class="layui-input-block">
                          <input type="text" style="width:300px" name="name" value="{{$data->imagegoods->name}}" readonly autocomplete="off" class="layui-input">
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">商品图片</label>
                        <div class="layui-input-inline">
                          <input type="file" name="images" lay-verify="title" autocomplete="off"  class="layui-input">
                        </div>
                        <img width="60" height="40" src="{{$data->images}}">
                      </div>
                      <div class="layui-form-item">
                        <div class="layui-input-block">
                          <button class="layui-btn" lay-submit lay-filter="formDemo">立即修改</button>
                          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                      </div>
                    </form>
    <!-- 右侧内容框架，更改从这里结束 -->
    </div>
</div>
<!-- 右侧主体结束 -->
<script type="text/javascript">
  $(function(){
    $('#gcid').change(function(){
        var gcid = $(this).val();
      $.get('/admin/goodimages/create',{'gcid':gcid},function(msg){
        var s = '<option>--请选择--</option>';
        // alert(msg.length);
        for(var i = 0;i<msg.length;i++){
          s += "<option value="+msg[i].id+">--"+msg[i].name+"--</option>";
        }
        // 赋值
        $('#gid').html(s);
        },'json');
    })
  })
</script>

@endsection  