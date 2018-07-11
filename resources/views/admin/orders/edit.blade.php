@extends('admin.common.common')

@section('content') 

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
 <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="/admin/orders/update/{{ $data -> id }}" method="post">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">商品编号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="gid" required lay-verify=""
                        autocomplete="off" value="{{ $data -> gid }}" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">收货人</label>
                    <div class="layui-input-inline">
                        <input type="text" name="recipients" required autocomplete="off" value="{{ $data -> recipients }}" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商品数量</label>
                    <div class="layui-input-inline">
                      <input type="text" name="num" value="{{ $data ->num }}" required lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-inline">
                      <input type="phone" name="phone" value="{{ $data -> phone }}" required lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">收货地址</label>
                    <div class="layui-input-block">
                      <input type="text" name="address" value="{{ $data -> address }}" required lay-verify="addr" autocomplete="off" class="layui-input">
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