<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  //引入软删除
class Orders extends Model
{
	//设置操作的数据表
	public $table = 'jc_orders';

    //引入软删除
    use SoftDeletes;

    //设置属于关系,具体订单属于哪个用户
    public function users()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }

}
