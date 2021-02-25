@extends('admin.common.common')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          	<div class="content">
          	<div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <!-- <hr> -->
			<!-- <h1 style="text-size:50px;">{{$title}}</h1> -->
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: right;">
                  	<div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="search"  placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <hr>
            <div>
                <a href="/admin/entrepot/create"><button class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</button></a>
                <span class="x-right" style="line-height:40px">共有数据：{{DB::table('jc_entrepots')->count()}} 条</span></div>

            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="" disabled>
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            商品名称
                        </th>
                        <th>
                           	库存数量	
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                @foreach($data as $k=>$v)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $v['id'] }}" name="ids">
                        </td>
                        <td>
                            {{$v['id']}}
                        </td>
                        <td>
                        	{{$v['name']}}
                        </td>
                        <td>
                            {{$v['num']}}
                        </td>
                        <td class="td-manage">
                            <a title="修改" href="/admin/entrepot/edit/{{$v['id']}}" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;修改</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
            </table>
            <!-- 分页 -->
            <div id="page">{!! $data->render() !!}</div>
        </div>
        <!-- 右侧主体结束 -->
    </div>


<script type="text/javascript">
    function delAll () {
    //获取已选中的的选项到数组
    var time = null;
    var ids = [];
    $("tbody input[type='checkbox']:checked").each(function(){
       ids.push(this.value);
    });
    //将被选中的id进行拼接成数组
    ids = ids.join(',');
    //发送ajax到方法中进行删除
    $.get('/admin/entrepot/delall',{'ids':ids},function(msg){
        // console.log(msg);
        if(msg !== 0){
            layer.msg('删除成功', {icon: 1});
            $('input:checked').parent().parent().remove();
            if(time == null ){
                time = setInterval(function(){
                location.reload(true);
                },3000);
            } 
            // location.href = "/admin/goodimages";
        }else{
            layer.msg('删除失败', {icon: 2});
        }
    });
    }
</script>
@endsection