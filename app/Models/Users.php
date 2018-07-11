<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  //引入软删除

    class Users extends Model
    {
        //设置查找的表名
        public $table = 'jc_users';

        //引入软删除
        use SoftDeletes;

        //设置一对一关系
        public function Userdetails()
        {
        	return $this->hasOne('App\Models\Userdetails','uid');

        }
    }
