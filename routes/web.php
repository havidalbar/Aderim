<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ProjectController@index');
Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', 'ProjectController@index');

Route::post('/loginproses', 'UserController@login');

Route::post('/registerproses', 'UserController@registerproses');

Route::get('/logoutproses', 'UserController@logout');

Route::get('/daftar-profesi', 'UserController@getProfesi');

Route::get('/tambah-project', 'ProjectController@tambahProject');

Route::post('/tambah-projectproses', 'ProjectController@uploadProject');

Route::get('/project/{id}', 'ProjectController@project');

Route::get('/get-search', 'ProjectController@getSearch');

Route::post('/daftarprofesiproses', 'UserController@daftarProfesi');

Route::get('/profesi/{id}', 'ProjectController@projectProfesi');

Route::get('/profesi/{id}/info', 'ProjectController@informasiProfesi');

Route::get('/penjualan', 'OrderController@getRiwayatPesanan');

Route::get('/search', 'ProjectController@search');

Route::get('/get-search', 'ProjectController@getSearch');

Route::get('/informasi-akun', 'UserController@informasi');

Route::get('/halaman-admin/profesi', 'OrderController@getHalamanAdminProfesi');

Route::get('/kategori/{category}', 'ProjectController@category');

Route::get('/halaman-admin', 'OrderController@getHalamanAdmin');

Route::post('/tolak-transaksi', 'CartController@tolakTransaksi');

Route::post('/terima-transaksi', 'CartController@terimaTransaksi');

Route::post('/tolak-profesi', 'OrderController@tolakProfesi');

Route::post('/terima-profesi', 'OrderController@terimaProfesi');

Route::post('/uploadFoto', 'UserController@uploadFoto');



