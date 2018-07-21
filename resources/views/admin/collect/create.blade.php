@extends('admin.common.common')


@section('content') 
<style type="text/css">
  select{
    width:400px;
    height:38px;
    border-radius:3px;
    background:rgba(0, 0, 0, 0.2);    
  }
</style>
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;" id="title">{{$title}}</div>
        <div style="height:40px;"></div>
        <hr>
        <form class=" layui-form-pane" action="/admin/collect/store" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="layui-form-item">
            <label class="layui-form-label">用户名称</label>
              <div class="layui-input-block"  style="width:400px">
                <select lay-verify="required" id="uid"  name="uid">
                  <option value="0">--请选择--</option>
                  @foreach ($users as $k=>$v)
                  <option value="{{ $v['id'] }}">{{ $v->Userdetails['nickname'] }}</option>
                  @endforeach    
                </select>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">商品类别</label>
                <div class="layui-input-block"  style="width:400px">
                  <select lay-verify="required" id="gcid"  name="gcid">
                    <option value="0">--请选择--</option>
                    @foreach ($cates as $k=>$v)
                    <option value="{{$v['id']}}">{{$v['classname']}}</option>
                    @endforeach    
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
              <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block" style="width:400px">
                  <select lay-verify="required" id="gid" name="gid">
                    <option value="">--请选择--</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="demo2">确认提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
      $.get('/admin/collect/create',{'gcid':gcid},function(msg){
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