<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\home\ConsgineeRequest;
class ConsigneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = session('homeuser');
        if($data){
            return view('home.consignee.consignee',['title'=>'收货人信息']);
        }else{
            return redirect('/home/login/index')->with('success','需要登录');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|regex:/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/',
        //     'phone' => 'required|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
        //     'postcode' => 'required|regex:/^[\d]{6}$/',

        // ],[
        //     'name.required' => '收货人姓名必填',
        //     'email.required' => '收货人邮箱必填',
        //     'email.regex' => '请输入正确邮箱',
        //     'phone.required' => '手机号必填',
        //     'phone.regex' => '请输入11位手机号码',
        //     'postcode.required' => '邮政编码必填',
        //     'postcode.regex' => '邮政编码必须为6位数字'

        // ]);

        $req = $request -> all();
        dump($req);

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
