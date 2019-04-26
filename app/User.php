<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey='id';
    protected $fillable = [
        'username','name', 'email' ,'foto','email','nohp','address'];
    function profesi(){
		return $this->hasOne('App\Profesi');
    }
    function order(){
		return $this->hasMany('App\Order','id_user');
    }
    function progres(){
		return $this->hasMany('App\Progres','id_user');
	}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
