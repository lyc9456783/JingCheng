@extends('admin.common.common')

@section('content') 
<!-- 设置引入编辑器的js文件 -->
<script type="text/javascript" src="/bjq/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/bjq/ueditor.all.js"></script>
  <style type="text/css">
    select{
    width:400px;
    height:40px;
    border-radius:3px;
    background:rgba(0, 0, 0, 0.2);
    }
    input[type=text]{
        content: '';
        display: inline-block;
        width: 400px;
        height: 40px;
        position: absolute;
    }  
  </style>
  
    <div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <div style="text-align: right;">
          <button class="layui-btn" onclick="location='/admin/notice/index'">返回列表</button>
        </div>
        <hr>  

        <form  action="/admin/notice/store" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="layui-form-item">
              <div class="layui-inline">
                <label class="layui-form-label">发表人员</label>
                <div class="layui-input-inline">
                  <select name="uid" lay-verify="required" required>
                    <option value="">请选择</option>
                    <optgroup label="超级管理员">
                    @foreach($users as $k=>$v)
                        @if($v->grade == 1)
                        <option value="{{ $v->id}}">{{ $v-> username }}</option>
                       @endif
                    @endforeach
                    </optgroup>
                     <optgroup label="管理员">
                    @foreach($users as $k=>$v)
                        @if($v->grade == 2)
                        <option value="{{ $v->id}}">{{ $v-> username }}</option>
                       @endif
                    @endforeach
                    </optgroup>
                  </select>
                </div>
              </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">公告标题</label>
                    <div class="layui-input-block">
                      <input  maxlength="16" type="text" name="title" lay-verify="title" autocomplete="off" required placeholder="请输入标题" class="layui-input">
                    </div>
            </div>

             <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">公告内容</label>
                    <div class="layui-input-block">
                         <!-- 加载编辑器的容器 -->
                        <script id="container" name="details" type="text/plain" style="width:500px;height:150px">
                        客官老爷,请在此处输入您想嘚瑟的话......
                        </script>
                         <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container',{toolbars: [
                                ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload','insertimage','emotion','spechars','fontfamily','fontsize','link','justifyleft'
                                ,'justifyright','justifycenter','forecolor','time','date','snapscreen','bold','cleardoc','backcolor','music','background']
                            ]});
                        </script>
                    </div>
            </div>

            <div class="layui-inline" style="margin-left:100px ">
                <button class="layui-btn" lay-submit="" lay-filter="demo2">确认提交</button>
                  &nbsp
                <button type="reset" class="layui-btn layui-btn-primary" style="margin-left:50px">重置</button>
            </div>
        </form>
    </div>

            
        
@endsection 