<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //设置操作的数据表
    public $table = 'js_discounts';

    //与商品分类的一对一关系
    public function discounts()
    {
    	return $this -> hasOne('App\Models\Goods','gid');
    }
   
}
