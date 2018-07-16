@extends('admin.common.common')

@section('content') 
<!-- 设置引入编辑器的js文件 -->
<script type="text/javascript" src="/bjq/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/bjq/ueditor.all.js"></script>
 <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
          <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="text-align: right;">
                <button class="layui-btn" onclick="location='/admin/notice/index'">返回列表</button>
            </div> 
            <hr>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="/admin/notice/update/{{ $data -> id }}" method="post">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label class="layui-form-label">公告标题</label>
                    <div class="layui-input-inline">
                      <input type="text" name="title" value="{{ $data ->title }}" required lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                
                <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">公告内容</label>
                    <div class="layui-input-block">

                         <!-- 加载编辑器的容器 -->
                        <script id="container" name="details" type="text/plain" style="width:500px;height:150px">{!! $data -> details !!}</script>
                        
                         <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container',{toolbars: [
                                ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload','insertimage','emotion','spechars','fontfamily','fontsize','link','justifyleft'
                                ,'justifyright','justifycenter','forecolor','time','date','snapscreen','bold','cleardoc','backcolor','music','background']
                            ]});
                        </script>
                    </div>
                </div>

                <label for="L_sign" class="layui-form-label"></label>
                    
                <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit>
                        确认修改
                </button>
                
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->

@endsection  