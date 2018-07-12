@extends('admin.common.common')


@section('content')
  <xblock>
    <button class="layui-btn layui-btn-normal" onclick="location='/admin'"><i class="layui-icon"></i>返回后台首页</button>
    <button class="layui-btn" onclick="location='/admin/slids'"><i class="layui-icon"></i>返回</button>
    <button class="layui-btn" onclick="location='/admin/slids/create'"><i class="layui-icon"></i>添加</button>
  </xblock>
  
  <!-- 轮播图预览区 -->
  <div class="layui-carousel" id="test1">
    <div carousel-item>
    @foreach($data as $v)
      <div><img src="{{ url($v['simg']) }}" alt="" width="100%" height="500px"></div>
    @endforeach
    </div>
  </div>
  <!-- 轮播图预览器结束 -->
  <!-- 后台操作栏开始 -->
<!--   <div class="construct">
    <button class="layui-btn layui-btn-radius layui-btn-warm">全屏预览</button>
  </div> -->

  <!-- 后台操作栏结束 -->


 
<script src="/static/build/layui.js"></script>
<script>
  layui.use('carousel', function(){
    var carousel = layui.carousel;
    //建造实例
    carousel.render({
      elem: '#test1'
      ,width: '100%' 
      ,height: '400px'
      ,arrow: 'always' 
     // ,full: 'true' 
      //,anim: 'updown'
      //interval:3000
    });
  });

  // 全屏预览
  $('.construct button').eq(0).click(function(){

  });

</script>
@endsection('content')