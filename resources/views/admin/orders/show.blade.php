<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>京城后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admins/css/font.css">
    <link rel="stylesheet" href="/admins/css/xadmin.css">
    <link rel="stylesheet" href="/admins/css/swiper.min.css">
    <link rel="stylesheet" href="/admins/lib/layui/css/layui.css">
    <script type="text/javascript" src="/admins/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admins/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/admins/js/swiper.jquery.min.js"></script>
    <script src="/admins/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admins/js/xadmin.js"></script>

    <style type="text/css">
    .pagination li{
        width:35px;
        height:25px;
        line-height:25px; 
        border:1px solid #ddd;
        border-radius:5px;
        float:left; 
        margin:3px;  
        text-align:center;    
    }
    .pagination li:hover{
        background:#5B604E; 
    }
    .pagination {
        width:500px; 
        margin:auto;
        padding-left:15%;    
    }
    .pagination span{
            position: relative;
            padding: 5px 14px;
            margin-left:-0.5px; 
            line-height: 1.42857143;
            color: #fff;
            text-decoration: none;
            background-color:#6D5C43;
            border-radius:5px; 
    }
    </style>
</head> 
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form">

                <div class="layui-form-item">
                    <label class="layui-form-label">收件人</label>
                    <div class="layui-input-block">
                        <input type="text" name="recipients" autocomplete="off" value="{{$data -> recipients }}" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-block">
                        <input type="text" name="phone" autocomplete="off" value="{{$data -> phone }}" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商品数量</label>
                    <div class="layui-input-block">
                        <input type="text" name="num" autocomplete="off" value="{{ $data -> num }}" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">订单金额</label>
                    <div class="layui-input-block">
                        <input type="text" name="num" autocomplete="off" value="{{ $data -> total }}" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">收货地址</label>
                    <div class="layui-input-block">
                        <input type="text" name="num" autocomplete="off" value="{{ $data -> address }}" class="layui-input">
                    </div>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
 