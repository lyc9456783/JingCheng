<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Config;


class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $data =  Config::find(1);

        return view('admin.config.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //接收修改数据
      $data = $request -> except('_token');
      //dd($data);

        //保存图像
       if($request -> hasFile('logo')){
            
            // 使用request 创建文件上传对象
            $profile = $request -> file('logo');
            // 获取文件后缀名
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $filename =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            // 保存文件
            $res = $profile -> move('./uploads/logo/'.$dirname,$filename);
            $fileadd = ('/uploads/logo/'.$dirname.'/'.$filename);
            //如果有没文件上传,会被重新赋值保存
            $data['logo'] = $fileadd;
       }

       //存储
       $config = Config::find('1');
       $config -> net_name = $data['net_name'];
       $config -> net_keyword = $data['net_keyword'];
       $config -> copyright= $data['copyright'];
       $config -> onoff= $data['onoff'];
       $config -> logo= $data['logo'];
       $res = $config -> save();
       
        //处理返回值
        if($res){
            return redirect(url('/admin/config')) -> with('success','网站配置成功');
        }else{
            return back() -> with('error','错误!!!');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
