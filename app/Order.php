<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey='id';
    protected $fillable = [
      'status','statusLagi', 'url_gambar' ,'pesan','address'];
    function profesi(){
		return $this->belongsTo('App\Profesi','id_profesi');
    }
    function user(){
		return $this->belongsTo('App\User','id_user');
  }
  function progres(){
		return $this->hasMany('App\Progres','id_order');
	}
}
