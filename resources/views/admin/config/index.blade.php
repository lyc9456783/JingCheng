@extends('admin.common.common')


@section('content')
<!-- 网站配置开始 -->
	<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

            <xblock><button class="layui-btn" onclick="location='/admin/config'">
            <i class="layui-icon"></i>网站配置</button>
			<button class="layui-btn" style="cursor:pointer" onclick="member_show('查看图片','{{ $data['logo'] }}','10000','200','200')">点击查看LOGO</button>
            </xblock>
            
			
            <!-- 网站配置内容部分开始 -->
				<div class="page-content">
         		 <div class="content" >
	         	<form action="/admin/config/store" method="post" enctype="multipart/form-data" class="layui-form"> 
	         		 	{{ csrf_field() }}
		           
					  <div class="layui-form-item">
					    <label class="layui-form-label">网站名称</label>
					    <div class="layui-input-block">
					      <input type="text" name="net_name" value="{{ $data['net_name'] or old('net_name') }}" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
					    </div>
					  </div>

					  <div class="layui-form-item">
					    <label class="layui-form-label">公示电话</label>
					    <div class="layui-input-block">
					      <input type="text" name="net_phone" value="{{ $data['net_phone'] or old('net_phone') }}" lay-verify="title" autocomplete="off" placeholder="官网电话" class="layui-input">
					    </div>
					  </div>

					  <div class="layui-form-item layui-form-text">
					    <label class="layui-form-label">关键字设置</label>
					    <div class="layui-input-block">
					      <textarea placeholder="词句之间用一个空格隔开!" value="{{ $data['net_keyword'] }}" class="layui-textarea keyword" name="net_keyword">{{ $data['net_keyword'] }}</textarea>	
					    </div>
					  </div>

					  <div class="layui-form-item layui-form-text">
					    <label class="layui-form-label">网站版权</label>
					    <div class="layui-input-block">
					      <textarea placeholder=""  value="{{ $data['copyright'] }}" class="layui-textarea" name="copyright">{{ $data['copyright'] }}</textarea>
					    </div>
					  </div>


					  <div class="layui-form-item">
					    <label class="layui-form-label">logo设置</label>
					    <div class="layui-input-block">
					      <input type="file" name="logo" lay-verify="title" autocomplete="off" >
					      <input type="hidden" value="{{ $data['logo'] }}" name="logo">
					    </div>
					  </div>

					  <div class="layui-form-item">
					    <label class="layui-form-label">网站开关</label>
					    <div class="layui-input-block">
					    @if($data['onoff']==1)
					      <input type="radio" name="onoff" value="1" title="开启" checked>
					      <input type="radio" name="onoff" value="0" title="关闭">
					    @else
					      <input type="radio" name="onoff" value="1" title="开启">
					      <input type="radio" name="onoff" value="0" title="关闭" checked>
					     @endif
					  </div>

					  <div class="layui-form-item">
					    <label class="layui-form-label">智能模式</label>
					    <div class="layui-input-block">
					      <input type="radio" name="off" value="1" title="开启" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>男</span></div>
					      <input type="radio" name="off" value="0" title="关闭"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>女</span></div> 
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
<script>
 	/*图片-查看*/
    function member_show(title,url,id,w,h){
        x_admin_show(title,url,w,h);
    }	

    $('.keyword').focus(function(){

    	  })

</script>



<!-- 网站配置结束 -->
@endsection('content')