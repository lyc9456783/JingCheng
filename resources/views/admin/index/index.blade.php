@extends('admin.common.common')

@extends('admin.common.left')


@section('content')    
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                欢迎来到京城商城管理后台！<span class="f-14">v1.0</span>
            </blockquote>
            <fieldset class="layui-elem-field layui-field-title site-title">
              <legend><a name="default">信息统计</a></legend>
            </fieldset>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>统计</th>
                        <th>资讯库</th>
                        <th>图片库</th>
                        <th>产品库</th>
                        <th>用户</th>
                        <th>管理员</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>总数</td>
                        <td>92</td>
                        <td>9</td>
                        <td>0</td>
                        <td>8</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>今日</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>本周</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>本月</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">服务器信息</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="30%">服务器计算机名</th>
                        <td><span id="lbServerName">{{gethostbyname('127.0.0.1')}}</span></td>
                    </tr>
                    <tr>
                        <td>服务器IP地址</td>
                        <td>{{$_SERVER['SERVER_ADDR']}}</td>
                    </tr>
                    <tr>
                        <td>服务器域名</td>
                        <td>www.lzyc.com</td>
                    </tr>
                    <tr>
                        <td>服务器端口 </td>
                        <td>80</td>
                    </tr>
                    <tr>
                        <td>本文件所在文件夹 </td>
                        <td>{{__DIR__}}</td>
                    </tr>
                    <tr>
                        <td>服务器操作系统 </td>
                        <td>{{PHP_OS}}</td>
                    </tr>
                    <tr>
                        <td>系统所在文件夹 </td>
                        <td>{{$_SERVER['DOCUMENT_ROOT']}}</td>
                    </tr>
                    <tr>
                        <td>服务器当前时间 </td>
                        <td>{{date('Y:m:d H:i:s',time())}}</td>
                    </tr>
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
@endsection
