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
    return view('daftar');
});

Route::get('/login', function () {
    return view('masuk');
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

Route::get('/get-urut', 'ProjectController@getUrut');

Route::post('/daftarprofesiproses', 'UserController@daftarProfesi');

Route::get('/profesi/{id}', 'ProjectController@projectProfesi');

Route::get('/profesi/{id}/info', 'ProjectController@informasiProfesi');

Route::get('/penjualan', 'OrderController@getRiwayatPesanan');

Route::get('/search', 'ProjectController@search');

Route::get('/informasi-akun/profil', 'UserController@informasi');

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

Route::post('/tambah-transaksi', 'OrderController@updateTransaksiOrder');

Route::post('/transaksiorderLagi', 'OrderController@transaksiorderLagi');

Route::post('/uploadBukti', 'OrderController@uploadBukti');

Route::get('/konfirmasiPembayaran/{id_transaksi}', 'OrderController@showKonfirmasiTransfer');

Route::get('/konfirmasiPembayaranLagi/{id_transaksi}/{id_transaksiLama}', 'OrderController@showKonfirmasiTransferLagi');

Route::post('/buktiproses/{id_transaksi}', 'OrderController@inputBukti');

Route::post('/buktiprosesLagi/{id_transaksi}', 'OrderController@inputBuktiLagi');

Route::get('/informasi-akun/riwayat', 'OrderController@getHistory');

Route::get('/order/terima-order', 'OrderController@getTerimaOrder');

Route::get('/order/konfirmasi-order', 'OrderController@getKonfirmasiOrder');

Route::get('/order', 'OrderController@getRiwayatOrder');

Route::post('/konfirmasi-order', 'OrderController@konfirmasiOrder');

Route::post('/terima-order', 'OrderController@terimaOrder');

Route::post('/tolak-order', 'OrderController@tolakOrder');

Route::get('/informasi-akun/progres','OrderController@getProgresOrder');

Route::get('/progresorder/{id_order}', 'OrderController@progres');

Route::get('/order-progres','OrderController@getOrderProgres');

Route::get('/order-progres/{id_order}', 'OrderController@showOrderProgresView');

Route::get('/order-progres/{id_order}/tambah', 'OrderController@showOrderProgresAdd');

Route::post('/orderprogresproses/{id_order}', 'OrderController@orderProgres');

Route::post('/uploadProgres', 'OrderController@uploadProgres');

Route::post('/bayarLagi', 'OrderController@getBayarLagi');

//coba
Route::get('/coba', function () {
    return view('layouts.coba');
});
Route::get('/cobahome', function () {
    return view('cobahome1');
});
Route::get('/cobamasuk', function () {
    return view('cobamasuk');
});
Route::get('/cobadaftar', function () {
    return view('cobadaftar');
});
Route::get('/cobadaftarProfesi', function () {
    return view('cobadaftarProfesi');
});
Route::get('/cobainformasiAkun', function () {
    return view('cobainformasiAkun');
});
Route::get('/cobahalamanAdminProfesi', function () {
    return view('halamanAdmin/halamanAdminProfesi');
});
Route::get('/cobapencarian', function () {
    return view('cobapencarian');
});
Route::get('/cobaprofilprofesi', function () {
    return view('halamanProfesi/profilProfesi');
});
Route::get('/cobakumpulanproyek', function () {
    return view('halamanProfesi/kumpulanProyek');
});
Route::get('/cobapesananproyek', function () {
    return view('halamanProfesi/pesananProyek');
});
Route::get('/cobaprogrespesanan', function () {
    return view('halamanProfesi/progresPesanan');
});
Route::get('/tambahproyek', function () {
    return view('halamanProfesi/tambahProyek');
});
Route::get('/pesanProyek', function () {
    return view('pesanProyek');
});
Route::get('/cobainstruksipembayaran', function () {
    return view('cobainstruksiPembayaran');
});
Route::get('/periksaPesanan', function () {
    return view('periksaPesanan');
});
Route::get('/pilihMetodePembayaran', function () {
    return view('pilihMetodePembayaran');
});
Route::get('/test123', function () {
    return view('test123');
});
Route::get('/lihatProgresProyek', function () {
    return view('halamanProfesi/lihatProgresProyek');
});
Route::get('/lihatProgresProyekAkun', function () {
    return view('informasiAkun/lihatProgresProyek');
});
Route::get('/tambahProgres', function () {
    return view('halamanProfesi/tambahProgres');
});
Route::get('/ubahProyek', function () {
    return view('halamanProfesi/ubahProyek');
});
Route::get('/pembayaranSelanjutnya', function () {
    return view('pembayaranSelanjutnya');
});