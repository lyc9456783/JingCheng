@extends('admin.common.common')

@section('content') 
  <style type="text/css">
    select{
    width:200px;
    height:38px;
    border-radius:3px;
    background:rgba(0, 0, 0, 0.2);
    }
    .radiobox
    {
        position: relative;
        padding-left: 9px;
        line-height: 40px; 
    }
    .radiobox:before{
        content: '';
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid #999;
        border-radius: 50%;
        background: #fff;
        position: absolute;
        top: -2px;
        left: 6px;
    }
    input[type=radio]:checked:before{
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #999;
        position: absolute;
        top: 4px;
        left: 12px;
    }
    input[type=radio]{
        margin-right: 6px;
    }    
    }
    .city{
    width:150px;
    height:38px;
    margin-left:3px; 
    border-radius:3px;
    background:rgba(0, 0, 0, 0.2);
    }
  </style>
  
    <div class="page-content">
    <div class="content">
        <div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
        <div style="text-align: right;">
          <button class="layui-btn" onclick="location='/admin/orders/index'">返回列表</button>
        </div>
        <hr>  
        <div class="page-content">
          <div class="content">
              </fieldset>
              <form  action="/admin/orders/store" method="post"  enctype="multipart/form-data">
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
                <label class="layui-form-label">收获地址</label>
                <select id="s_province" class="city" name="s_sf"></select>  
                <select id="s_city" class="city" name="s_sq" ></select>  
                <select id="s_county" class="city" name="s_xj"></select>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">具体街道</label>
                <div class="layui-input-block">
                  <input type="text" name="address" lay-verify="title" autocomplete="off" required placeholder="请输入具体地址" class="layui-input">
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

        	  <div class="layui-form-item layui-form-text">
        	    <label class="layui-form-label">订单状态</label>
        	    <div class="layui-input-block">
        	      <label class="radiobox"><input type="radio" name="status" value="0" title="未发货" checked="">未发货</label>
        	      <label class="radiobox"><input type="radio" name="status" value="1" title="已发货">已发货</label>
        	      <label class="radiobox"><input type="radio" name="status" value="2" title="交易完成">交易完成</label>
        	    </div>
        	  </div>
                <div class="layui-inline" style="margin-left:100px ">
                  <button class="layui-btn" lay-submit="" lay-filter="demo2">确认提交</button>
                  &nbsp
                  <button type="reset" class="layui-btn layui-btn-primary" style="margin-left:50px">重置</button>
                </div>
            </form>
          <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <script class="resources library" src="/admins/js/area.js" type="text/javascript"></script>
        <script type="text/javascript">_init_area();</script>
        <script type="text/javascript">
          var Gid  = document.getElementById ;

          var showArea = function(){

            Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +  

            Gid('s_city').value + " - 县/区" + 

            Gid('s_county').value + "</h3>"
            }
          Gid('s_county').setAttribute('onchange','showArea()');
        </script>

@endsection 