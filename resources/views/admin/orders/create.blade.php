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

        <div class="page-content">
          <div class="content">
              </fieldset>
              <form class="layui-form layui-form-pane" action="/admin/orders/store" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="layui-form-item">
              <div class="layui-inline">
                <label class="layui-form-label">选择用户</label>
                <div class="layui-input-inline">
                  <select name="uid">
                    <option value="">请选择用户</option>
                    
                    <optgroup label="超级管理员">
                    @foreach($users as $k=>$v)
                        @if($v->grade == 1)
                        <option value="{{ $v->id}}">{{ $v-> username }}</option>
                       @endif
                    @endforeach
                    </optgroup>
                     <optgroup label="管理员">
                    @foreach($users as $k=>$v)
                        @if($v->grade == 2)
                        <option value="{{ $v->id}}">{{ $v-> username }}</option>
                       @endif
                    @endforeach
                    </optgroup>
                      <optgroup label="普通会员">
                    @foreach($users as $k=>$v)
                        @if($v->grade == 3)
                        <option value="{{ $v->id}}">{{ $v-> username }}</option>
                       @endif
                    @endforeach
                    </optgroup>

                  </select>
                </div>
              </div>
            </div>

              <div class="layui-form-item">
                <label class="layui-form-label">快递单号</label>
                <div class="layui-input-block">
                  <input type="text" name="ordersnum" lay-verify="title" autocomplete="off" required placeholder="请输入快递单号,请联系快递服务" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">收件人</label>
                <div class="layui-input-block">
                  <input type="text" name="recipients" lay-verify="title" autocomplete="off" required placeholder="收件人名称" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-block">
                  <input type="text" name="phone" lay-verify="title" autocomplete="off" required placeholder="收件人手机号" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">商品ID</label>
                <div class="layui-input-block">
                  <input type="text" name="gid" lay-verify="title" autocomplete="off" required placeholder="收件人商品号码" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">收货地址</label>
                <div class="layui-input-block">
                  <input type="text" name="address" lay-verify="title" autocomplete="off" required placeholder="收件地址" class="layui-input">
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">商品数量</label>
                <div class="layui-input-inline">
                  <input type="number" name="num" lay-verify="num" autocomplete="off" required placeholder="商品数量"  class="layui-input">
                </div>
              </div>
              
              <div class="layui-inline">
                <label class="layui-form-label">订单金额</label>
                <div class="layui-input-inline">
                  <input type="text" name="total" lay-verify="title" autocomplete="off" required placeholder="总金额" class="layui-input">
                </div>
              </div>

        	  <div class="layui-form-item" pane="">
        	    <label class="layui-form-label">订单状态</label>
        	    <div class="layui-input-block">
        	      <input type="radio" name="status" value="0" title="未发货" checked="">
        	      <input type="radio" name="status" value="1" title="已发货">
        	      <input type="radio" name="status" value="2" title="交易完成">
        	    </div>
        	  </div>
                <div class="layui-form-item">
                  <button class="layui-btn" lay-submit="" lay-filter="demo2">确认提交</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
              </form>
          <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
@endsection 