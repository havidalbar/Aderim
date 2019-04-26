<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    function profesi(){
		return $this->belongsTo('App\Profesi','id_profesi');
    }
    function user(){
		return $this->belongsTo('App\User','id_user');
	}
}
