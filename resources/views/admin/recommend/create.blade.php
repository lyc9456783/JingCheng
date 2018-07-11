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
            <div><a href="/admin/recommend"><button class="layui-btn layui-btn-success" ><i class="layui-icon">&#xe600;</i>列表</button></a></a><a href="/admin/recommend/create"><button class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</button></a></div>
            <form  action="/admin/recommend/store" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block" style="width:300px">
                  <select name="gicd" id="gcid">
                      <option value="0">--请选择--</option>
                      @foreach ($cates as $k=>$v)
                      <option value="{{$v->id}}">{{$v->classname}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block" style="width:300px">
                  <select id="gid" name="gid">
                      <option value=""></option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item layui-form-text">
                  <label class="layui-form-label">推荐图片</label>
                  <div class="layui-input-inline">
                       <input type="file" name="rimg[]" lay-verify="title" autocomplete="off"  class="layui-input" multiple >
                  </div>
              </div>
              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">推荐状态</label>
                <div>
                  <label class="radiobox"><input name="rstate" value="1" type="radio">显示</label>
                  <label class="radiobox"><input name="rstate" value="0" type="radio" checked>隐藏</label>
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="formDemo">立即添加</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
              </div>
            </form>
            
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
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


@endsection