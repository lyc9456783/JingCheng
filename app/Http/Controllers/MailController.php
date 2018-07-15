<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
class MailController extends Controller
{
    public function send()
    {

        $flag =Mail::raw('这是一封测试邮件内容', function ($message) { 

        $message ->to('635197121@qq.com')->subject('邮件主题 测试');
        });

        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
        
    }
}
