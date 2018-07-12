<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Config extends Model
{
    //指定表名
    public $table = 'jc_configs';
    //指定主键
    public $primaryKey = 'id';
        //软删除
    use SoftDeletes;
}
