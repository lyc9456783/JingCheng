<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    public $table = 'jc_collects';
    //收藏属于用户
    public function collectusers()
    {
    	return $this -> belongsTo('App\Models\Users','uid');
    } 
    //收藏属于商品
    public function collectgoods()
    {
    	return $this -> belongsTo('App\Models\Goods','gid');
    }
}
