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

//Umum
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
Route::post('/uploadFoto', 'UploadController@upload');

//Search
Route::get('/get-search', 'ProjectController@getSearch');
Route::get('/get-urut', 'ProjectController@getUrut');
Route::get('/search', 'ProjectController@search');
Route::get('/kategori/{category}', 'ProjectController@category');

//Halaman Profesi
Route::get('/daftar-profesi', 'UserController@getProfesi');
Route::post('/daftarprofesiproses', 'UserController@daftarProfesi');
Route::get('/halaman-profesi/{id}/project', 'ProjectController@getProjectProfesi');
Route::get('/halaman-profesi/{id}/informasi', 'ProjectController@getInformasiProfesi');
Route::get('/halaman-profesi/pesanan', 'OrderController@getTerimaPesanan');
Route::get('/halaman-profesi/progres','OrderController@getPesananProgresProfesi');
Route::get('/halaman-profesi/{id_order}/progres', 'OrderController@getPesananProgresProfesiList');
Route::get('/halaman-profesi/{id_order}/progres/{bulan}', 'OrderController@getPesananProgresProfesiListBulan');
Route::get('/halaman-profesi/{id_order}/tambah-progres', 'OrderController@getPesananProgresProfesiTambah');
Route::get('/halaman-profesi/tambah-project', 'ProjectController@getTambahProjectProfesi');
Route::post('/tambah-projectproses', 'ProjectController@tambahProjectProses');
Route::post('/update-projectproses/{id_project}', 'ProjectController@ubahProjectProses');
Route::post('/uploadFotoProject', 'UploadController@upload');
Route::post('/terima-order', 'OrderController@terimaOrder');
Route::post('/tolak-order', 'OrderController@tolakOrder');
Route::get('/project/{id_project}/ubah', 'ProjectController@getUbahProject');
Route::post('/hapusproyek', 'ProjectController@hapusProject');
Route::post('/konfirmasi-order', 'OrderController@konfirmasiOrderProses');
Route::post('/orderprogresproses/{id_order}', 'OrderController@orderProgresProses');
Route::post('/uploadProgres', 'UploadController@upload');

//Halaman Akun
Route::get('/informasi-akun/profil', 'UserController@informasiAkun');
Route::get('/informasi-akun/riwayat', 'OrderController@getHistoryAkun');
Route::get('/informasi-akun/progres','OrderController@getProgresPesananAkun');
Route::get('/informasi-akun/{id_order}/progres', 'OrderController@getProgresPesananDetail');
Route::get('/informasi-akun/{id_order}/progres/{bulan}', 'OrderController@getProgresPesananDetailBulan');

//Halaman Admin
Route::get('/halaman-admin/profesi', 'OrderController@getHalamanAdminProfesi');
Route::get('/halaman-admin', 'OrderController@getHalamanAdminPembayaran');
Route::post('/tolak-transfer', 'OrderController@tolakTransfer');
Route::post('/terima-transfer', 'OrderController@terimaTransfer');
Route::post('/tolak-profesi', 'OrderController@tolakProfesi');
Route::post('/terima-profesi', 'OrderController@terimaProfesi');

//Alur Transaksi
Route::get('/project/{id}/order', 'OrderController@getPesanProject');
Route::post('/tambah-orderproses', 'OrderController@orderProses');
Route::post('/uploadFotoOrder', 'UploadController@upload');
Route::get('/transaksi/{id_transaksi}/transfer', 'OrderController@getTransferOrder');
Route::get('/order-check/{id_order}', 'OrderController@orderCheck');
Route::post('/hapusorder', 'OrderController@hapusOrder');
Route::post('/transaksiorder', 'OrderController@transaksiOrderproses');
Route::post('/tambah-transaksi', 'OrderController@updateTransaksiOrder');
Route::post('/uploadBukti', 'UploadController@upload');
Route::get('/konfirmasiPembayaran/{id_transaksi}', 'OrderController@getKonfirmasiTransfer');
Route::post('/buktiproses/{id_transaksi}', 'OrderController@inputBuktiProses');
Route::post('/transaksiorderLagi', 'OrderController@transaksiOrderLagiProses');
Route::get('/konfirmasiPembayaranLagi/{id_transaksi}/{id_transaksiLama}', 'OrderController@getKonfirmasiTransferLagi');
Route::post('/buktiprosesLagi/{id_transaksi}', 'OrderController@inputBuktiLagiProses');
Route::post('/bayarLagi', 'OrderController@getBayarLagi');

