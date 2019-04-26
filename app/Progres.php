<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'progres';
    protected $fillable = [
      'status', 'url_gambar' ,'pesan'];
    function order(){
		return $this->belongsTo('App\Order','id_order');
  }
  function user(){
		return $this->belongsTo('App\User','id_user');
	}
}
