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

Route::post('/tambah-projectproses', 'ProjectController@addProject');

Route::post('/uploadFotoProject', 'ProjectController@uploadFotoProject');

Route::get('/project/{id}', 'ProjectController@project');

Route::get('/get-search', 'ProjectController@getSearch');

Route::post('/daftarprofesiproses', 'UserController@daftarProfesi');

Route::get('/profesi/{id}', 'ProjectController@projectProfesi');

Route::get('/profesi/{id}/info', 'ProjectController@informasiProfesi');

Route::get('/penjualan', 'OrderController@getRiwayatPesanan');

Route::get('/search', 'ProjectController@search');

Route::get('/informasi-akun', 'UserController@informasi');

Route::get('/halaman-admin/profesi', 'OrderController@getHalamanAdminProfesi');

Route::get('/kategori/{category}', 'ProjectController@category');

Route::get('/halaman-admin', 'OrderController@getHalamanAdmin');

Route::post('/tolak-transfer', 'OrderController@tolakTransfer');

Route::post('/terima-transfer', 'OrderController@terimaTransfer');

Route::post('/tolak-profesi', 'OrderController@tolakProfesi');

Route::post('/terima-profesi', 'OrderController@terimaProfesi');

Route::post('/uploadFoto', 'UserController@uploadFoto');

Route::get('/project/{id}/order', 'OrderController@index');

Route::post('/tambah-orderproses', 'OrderController@order');

Route::post('/uploadFotoOrder', 'OrderController@uploadFotoOrder');

Route::get('/transaksi/{id_transaksi}/transfer', 'OrderController@transfer');

Route::get('/order-check', 'OrderController@indexcheck');

Route::post('/hapusorder', 'OrderController@delete');

Route::post('/transaksiorder', 'OrderController@transaksiorder');

Route::post('/uploadBukti', 'OrderController@uploadBukti');

Route::get('/konfirmasiPembayaran/{id_transaksi}', 'OrderController@showKonfirmasiTransfer');

Route::post('/buktiproses/{id_transaksi}', 'OrderController@inputBukti');

Route::get('/riwayat-order', 'OrderController@getHistory');

Route::get('/order/terima-order', 'OrderController@getTerimaOrder');

Route::get('/order/konfirmasi-order', 'OrderController@getKonfirmasiOrder');

Route::get('/order', 'OrderController@getRiwayatOrder');

Route::post('/konfirmasi-order', 'OrderController@konfirmasiOrder');

Route::post('/terima-order', 'OrderController@terimaOrder');

Route::post('/tolak-order', 'OrderController@tolakOrder');

Route::get('/progres-order','OrderController@getProgresOrder');

Route::get('/progresorder/{id_order}', 'OrderController@progres');

Route::get('/order-progres','OrderController@getOrderProgres');

Route::get('/order-progres/{id_order}', 'OrderController@showOrderProgres');

Route::post('/orderprogresproses/{id_order}', 'OrderController@orderProgres');

Route::post('/uploadProgres', 'OrderController@uploadProgres');
