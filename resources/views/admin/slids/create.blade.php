@extends('admin.common.common')

@section('content')
	<!-- 轮播图添加 -->
   <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
				<legend>轮播图添加</legend>
			</fieldset>
            <xblock><button class="layui-btn" onclick="location='/admin/slids'">
            <i class="layui-icon"></i>列表显示</button></xblock>
            
				<div class="page-content">
				          <div class="content">
				            <!-- 右侧内容框架，更改从这里开始 -->
				           <form class="layui-form" action="/admin/slids/store" method="post"  enctype="multipart/form-data">
				           {{ csrf_field() }}
							  <div class="layui-form-item">
							    <label class="layui-form-label">跳转路径</label>
							    <div class="layui-input-block">
							      <input type="text" name="surl"  required value="{{ old('surl') }}" lay-verify="title" autocomplete="off" placeholder="商品详情链接" class="layui-input">
							    </div>
							  </div>
							  
								<div class="layui-form-item">
								    <label class="layui-form-label">是否展示</label>
								    <div class="layui-input-block">
								      <input type="radio" name="state" value="0" title="不展示"  checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>男</span></div>
								      <input type="radio" name="state" value="1" title="展示"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>女</span></div>
								    </div>
								</div>

							 
							  <div class="layui-form-item layui-form-text">
							    <label class="layui-form-label">文件上传</label>
							    <div class="layui-input-block">
							      	 <input type="file" name="simg" lay-verify="title" autocomplete="off"  class="layui-input">
							    </div>
							  </div>



							  <div class="layui-form-item">
							    <div class="layui-input-block">
							      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
							      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
							    </div>
							  </div>
						  </form>




            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>








    </div>
	<!-- 轮播图结束 -->
@endsection('content')