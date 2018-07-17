<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discuss extends Model
{
    public $table = 'jc_discuss';
    public $primaryKey = 'id';
    //评论属于 用户
    public function userdiscuss()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }

    public function gooddiscuss()
    {
    	return $this->belongsTo('App\Models\Goods','gid');
    }

    //评论属于 用户的详情
    public function userdetails()
    {
    	return $this->belongsTo('App\Models\Userdetails','uid');
    }
}
