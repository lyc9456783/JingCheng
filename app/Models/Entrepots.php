<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrepots extends Model
{
    public $table = 'jc_entrepots';

    public function goodentrepots()
    {
    	return $this->belongsTo('App\Models\Goods','gid');
    }

 
}
