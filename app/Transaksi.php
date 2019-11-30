<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['nama', 'norek', 'bank_pengirim', 'bank_tujuan','jumlah','sisaharga','kode_token','gambar_konfirmasi','status','statusLagi'];
}
