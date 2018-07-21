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

        //和商品设置多对多
        public function shoucang()
        {
            return $this -> belongsToMany('App\Models\Goods','jc_users_goods','uid','gid');
        }

        public function usercollect()
        {
            return $this -> hasMany('App\Models\Collect','uid');
        }

    }
