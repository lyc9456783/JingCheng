<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  //引入软删除

class Notice extends Model
{
    //设置操作的数据表
    public $table = 'jc_notice';

    //引入软删除
    use SoftDeletes;

    //设置属于关系,公告是哪个管理员发出的
    public function users()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }
}
