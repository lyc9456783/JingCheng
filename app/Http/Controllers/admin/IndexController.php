<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\GoodImages;
use App\Models\Goods;
use App\Models\Users;


class IndexController extends Controller
{
    /**
     * 后台首页
     */
    public function index()
    {
        $notices = Notice::count();
        $goodImages = GoodImages::whereNull('deleted_at')->count();
        $goods  = Goods::whereNull('deleted_at')->count();
        $users = Users::where('grade','3')->whereNull('deleted_at')->count();
        $admins  = Users::where('grade','<','3')->whereNull('deleted_at')->count();
       
        return view('admin.index.index',[
            'notices'=>$notices,
            'goodImages'=>$goodImages, 
            'goods'=>$goods, 
            'admins'=>$admins, 
            'users'=>$users 
            ]
        );
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
        //
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
