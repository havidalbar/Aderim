<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    protected $table = 'profesi';
    protected $primaryKey='id';
    protected $fillable = [
      'nama_profesi','foto', 'alamat' ,'nohp','job_title','url_image'];
    function user(){
		return $this->belongsTo('App\User');
    }
    function project(){
		return $this->hasMany('App\Project','id_profesi');
	}
    function order(){
		return $this->hasMany('App\Order','id_profesi');
    }
}
