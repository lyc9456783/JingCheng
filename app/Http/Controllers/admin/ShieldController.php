<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shields;
class ShieldController extends Controller
{
    /**
     * 词条屏蔽 修改页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data =  $shields = Shields::find(1);
        return view('admin.shield.index',['data'=>$data]);
    }


    /**
     * 词条屏蔽控制器修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request -> only(['content','onoff']);
        // dd($data);
        $shields = Shields::find(1);
        
        $shields -> content = $data['content'];
        
         $shields -> onoff = $data['onoff'];
         $res = $shields -> save();
        // 处理返回值
        if($res){
            return redirect('/admin/shield/index') -> with('success','设置成功');
        }else{
            return back() -> with('error','设置出现错误');
        }

    }

   
}
