@extends('admin.common.common')
@extends('admin.common.left')
@section('content')
  <!-- 右侧主体开始 -->
        <div class="page-content">
          	<div class="content">
          	<div style="font-size:40px;width:400px;margin:center;">{{$title}}</div>
            <div style="height:40px;"></div>
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
            <div><a href="/admin/discuss/delete"><button class="layui-btn layui-btn-danger" ><i class="layui-icon">&#xe640;</i>批量删除</button></a><a href="/admin/entrepot/create"><button class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</button></a><span class="x-right" style="line-height:40px">共有数据：{{DB::table('jc_discuss')->count()}} 条</span></div>
            @if(session('success'))
            <div class="alert alert-danger">
                <ul>
                    <xblock>
                        <div class="x-left"style="line-height:40px">{{ session('success') }}</div>
                    </xblock>  
                </ul>
            </div>
            @endif
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
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
                            上下架状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                @foreach($data as $k=>$v)
                    <tr>
                        <td>
                            <input type="checkbox" value="" name="che[]">
                        </td>
                        <td>
                            {{$v->id}}
                        </td>
                        <td>
                        	{{$v->goodentrepots->name}}
                        </td>
                        <td>
                            {{$v->num}}
                        </td>
                        <td>
                        @if ($v->flag == 1)
                            <span class="layui-btn layui-btn-normal layui-btn-mini">
                                已上架
                            </span>
                        @else
                            <span class="layui-btn layui-btn-disabled layui-btn-mini">
                                已下架
                            </span>
                        </td>
                        @endif
                        <td class="td-manage">
                            <a style="text-decoration:none" href="/admin/entrepot/flag/{{$v->id}}" title="上下架">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="修改" href="/admin/entrepot/edit/{{$v->id}}" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="/admin/entrepot/destroy/{{$v->id}}" style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>  
            </table>
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