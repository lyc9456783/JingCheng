@extends('admin.common.common')
@section('content')
  <!-- 右侧主体开始 -->
  <style type="text/css">
    select{
    width:400px;
    height:38px;
    border-radius:3px;
    background:rgba(0, 0, 0, 0.2);   
    }
    .radiobox
    {
        position: relative;
        padding-left: 8px;
    }
    .radiobox:before{
        content: '';
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid #999;
        border-radius: 50%;
        background: #fff;
        position: absolute;
        top: -2px;
        left: 6px;
    }
    input[type=radio]:checked:before{
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #999;
        position: absolute;
        top: 4px;
        left: 12px;
    }
    input[type=radio]{
        margin-right: 6px;
    } 
      
  </style>
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
            <hr>
            <form  action="/admin/discounts/store" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block" style="width:300px">
                  <select name="gicd" id="gcid">
                      <option value="0">--请选择--</option>
                      @foreach ($data as $k=>$v)
                      <option value="{{$v->id}}">{{$v->classname}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block" style="width:300px">
                  <select id="gid" name="gid">
                      <option value="">--请选择--</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
              <label class="layui-form-label">折扣选择</label>
                <div class="layui-input-block" style="width:400px">
                  <select name="describe">
                    <option value="">--请选择--</option>
                    <option value="1">半价优惠</option>
                    <option value="2">减1000</option>
                    <option value="3">减500</option>
                    <option value="4">减300</option>
                    <option value="5">减200</option>
                    <option value="6">减100</option>
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
<script type="text/javascript">
        $(function(){
          $('#gcid').change(function(){
              var gcid = $(this).val();
              // alert()
            $.get('/admin/recommend/create',{'gcid':gcid},function(msg){
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
 
<!-- 右侧主体结束 -->

@endsection  