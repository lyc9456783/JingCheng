@extends('admin.common.common')


@section('content')


    @if (session('success'))
         <script type="text/javascript">
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg("{{session('success')}}");
            });
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg("{{session('error')}}");
            }); 
        </script>
    @endif

    
    
   
    <form class="layui-form" action="/admin/login/changepass" method="post">
        {{ csrf_field() }}
            <input type="hidden" name="uid" value="{{ session('uid') }}">
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>原密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="pass" required="" lay-verify="pass" autocomplete="off" class="layui-input">
                    </div>
   
                </div>

                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>新密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="password" required="" lay-verify="pass" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>重复密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="foo_confirmation" required="" lay-verify="repass" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button class="layui-btn" lay-filter="add" lay-submit="">
                        修改密码
                    </button>
                </div>
     </form>
</body>
@endsection('content')