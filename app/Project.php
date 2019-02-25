<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['namagambar', 'namaProject', 'profesi', 'lokasi'];
    protected $table = 'project';
}
