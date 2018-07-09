@extends('admin.common.common')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
            <hr>
            <div><a href="/admin/entrepot"><button class="layui-btn layui-btn-success" ><i class="layui-icon">&#xe600;</i>列表</button></a></a><a href="/admin/entrepot/create"><button class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</button></a></div>
            <form class="layui-form" action="/admin/cates/store" method="post">
              {{csrf_field()}}
              <div class="layui-form-item">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block" style="width:300px">
                  <select name="pid">
                    <option value="0">--请选择--</option>
                    @foreach ($data as $k=>$v)
                      <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                  </select>
                </div>
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-block" style="width:300px">
                  <select name="pid">
                    <option value="0">--请选择--</option>
                    @foreach ($data as $k=>$v)
                      <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                  </select>
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
    <!-- 背景切换开始 -->
    <div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="./images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>   
    </div>
    <!-- 背景切换结束 -->
    <script type="text/javascript">
        var error=document.getElementsByTagName('xblock');
            for(var i = 0;i <= error.length;i++){
                error[i].onclick = function(){
                   // this  本对象
                    this.style.display = 'none';
                }    
            }
    </script>
@endsection