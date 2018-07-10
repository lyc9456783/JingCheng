<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discuss extends Model
{
    public $table = 'jc_discuss';

    public function userdiscuss()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }

    public function gooddiscuss()
    {
    	return $this->belongsTo('App\Models\Goods','gid');
    }
}
