<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['namagambar', 'namaProject', 'deskripsi', 'spesifikasi','daerah','category','estimasi'];
    function profesi(){
		return $this->belongsTo('App\Profesi','id_profesi');
	}
}
