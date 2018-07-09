@extends('admin.common.common')
@extends('admin.common.left')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
            <hr>
            <div><a href="/admin/discuss"><button class="layui-btn layui-btn-success" ><i class="layui-icon">&#xe600;</i>列表</button></a></a><a href="/admin/discuss/create"><button class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</button></a></div>
            <form class="layui-form-item" style="width:500px;text-align: center; margin:auto;" action="/admin/discuss/store" method="post" >
                {{csrf_field()}}
            
              <div class="layui-form-item">
                <label class="layui-form-label">选择商品</label>
                <div class="layui-input-block">
                  <select name="city" required lay-verify="required">
                    <option value=""></option>
                    <option value="0">北京</option>
                    <option value="1">上海</option>
                    <option value="2">广州</option>
                    <option value="3">深圳</option>
                    <option value="4">杭州</option>
                  </select>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">用户名称</label>
                <div class="layui-input-block">
                  <input type="text" name="uid" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">评论内容</label>
                <div class="layui-input-block">
                  <input type="text" name="content" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved. 本后台系统由X前端框架提供前端技术支持</div>  
    </div>
    <!-- 底部结束 -->
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