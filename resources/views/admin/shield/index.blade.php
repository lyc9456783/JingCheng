@extends('admin.common.common')


@section('content')
<!-- 网站配置开始 -->
	<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

            <xblock><button class="layui-btn" onclick="location='/admin/shield/index'" title="设置成功后指定词汇将不在页面显示,并以***的方式展示">
            <i class="layui-icon"></i>屏蔽非法词汇</button>
            </xblock>
            
			
            <!-- 网站配置内容部分开始 -->
				<div class="page-content">
         		 <div class="content" >
	         	<form action="/admin/shield/store" method="post" class="layui-form"> 
	         		 	{{ csrf_field() }}

					  <div class="layui-form-item layui-form-text">
					    <label class="layui-form-label">过滤违禁字</label>
					    <div class="layui-input-block">
					      <textarea placeholder=""  value="" class="layui-textarea" name="content" rows="10" value="{{ $data['content'] }}">{{ $data['content'] }}</textarea>
					    </div>
					  </div>		           


					  <div class="layui-form-item">
					    <label class="layui-form-label">功能开关</label>
					    <div class="layui-input-block">
					      <input type="radio" name="onoff" value="1" title="开启"  @if( $data['onoff'] == 1 ) checked @endif><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>男</span></div>
					      <input type="radio" name="onoff" value="0" title="关闭"  @if( $data['onoff'] == 0 ) checked @endif><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>女</span></div> 
					  </div>
					
	
					  <div class="layui-form-item">
					    <div class="layui-input-block">
					      <button class="layui-btn" lay-submit="" lay-filter="demo1">确定</button>
					      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
					    </div>
					  </div>

		 		</form>

		          </div>
		        </div>

  			<!-- 网站配置内容部分结束 -->


<!-- 网站配置结束 -->
@endsection('content')