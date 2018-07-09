@extends('admin.common.common')

@extends('admin.common.left')

@section('content')
	<!-- 轮播图添加 -->
   <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="">
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <label class="layui-form-label xbs768">日期范围</label>
                    <div class="layui-input-inline xbs768">
                      <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
                    </div>
                    <div class="layui-input-inline xbs768">
                      <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn" onclick="location='/admin/slids'">
            <i class="layui-icon"></i>列表显示</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            
				<div class="page-content">
				  <div class="content">
            <!-- 轮播图展示 -->


            <!-- 轮播图展示结束 -->


            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>








    </div>
	<!-- 轮播图结束 -->
@endsection('content')