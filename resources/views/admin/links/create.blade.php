@extends('admin.common.common')

@section('content') 

    <div class="page-content">

    <!-- 显示错误模板信息 -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <xblock><div class="x-left" style="line-height:40px;color:orange">{{ $error }} ×</div></xblock>
                @endforeach
            </ul>
        </div>
    @endif

          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
                <div class="layui-form-pane">
                  <div class="layui-form-item" style="display: inline-block;">
                      <fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
                        <legend>友情链接添加</legend>
                      </fieldset>
                  </div>
                </div> 
            <xblock><button class="layui-btn" onclick="location='/admin/links'">
            <i class="layui-icon"></i>列表显示</button></xblock>
            

            <!-- 表单添加开始 -->
        <div class="page-content">
            <form action="/admin/links/store" method="post">
            {{ csrf_field() }}

                <div class="layui-form-item">
                    <label class="layui-form-label">公司名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="lname" required lay-verify="title" value="{{ old('lname') }}" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div> 

                <div class="layui-form-item">
                    <label class="layui-form-label">网站地址</label>
                    <div class="layui-input-block">
                        <input type="text" name="lurl" required lay-verify="title" value="{{ old('lurl') }}" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div> 

                <div class="layui-form-item">
                    <label class="layui-form-label">网站描述</label>
                    <div class="layui-input-block">
                        <input type="text" name="lsay" required lay-verify="title" value="{{ old('lsay') }}" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div> 

                <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>

                <!-- <div class="layui-form-item">
                    <label class="layui-form-label">单行输入框</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div>  -->



            </form>
            
    </div>

            <!-- 表单添加结束 -->
  
<script type="text/javascript">
    var error=document.getElementsByTagName('xblock');
          for(var i = 0;i <= error.length;i++){
           error[i].onclick = function(){
                // this  本对象
                this.style.display = 'none';
              }    
          } 
    
</script>


@endsection('content')