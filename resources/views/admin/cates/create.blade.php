@extends('admin.common.common')
@section('content')
    <!-- 中部开始 -->

    <div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
            <hr>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <xblock>
                          <div class="x-left"   style="line-height:40px">{{$error}}</div>
                      </xblock>
                    @endforeach
                </ul>
            </div>
            @endif
            <script type="text/javascript">
            var error=document.getElementsByTagName('xblock');
                  for(var i = 0;i <= error.length;i++){
                   error[i].onclick = function(){
                        // this  本对象
                        this.style.display = 'none';
                      }    
                  } 
            
            </script>
            <div class="wrapper">
                <!-- 右侧主体开始 -->
                <div class="page-content">
                  <div class="content">
                    <!-- 右侧内容框架，更改从这里开始 -->
                   <form class="layui-form" action="/admin/cates/store" method="post">
                      {{csrf_field()}}
                      <div class="layui-form-item">
                        <label class="layui-form-label">分类名称</label>
                        <div class="layui-input-block">
                          <input type="text" style="width:300px" name="classname" placeholder="请输入分类" autocomplete="off" class="layui-input">
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">所属分类</label>
                        <div class="layui-input-block" style="width:300px">
                          <select name="pid">
                            <option value="0">--请选择--</option>
                            @foreach ($cates as $k=>$v)
                              <option value="{{$v->id}}">{{$v->classname}}</option>
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
        </div>
    </div>
    <!-- 中部结束 -->
@endsection