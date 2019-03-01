<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\pesanan;
use App\produk;
use App\transaksi;
use App\percetakan;
use App\pengguna;

class CartController extends Controller
{
    //
    public function index() {
        if (Session::has('name')) {
            $keranjangs = pesanan::where(['id_pemesan' => Session::get('id'), 'status' => 'Keranjang'])->get();
            $barangs = array();
            for($i = 0; $i < count($keranjangs); $i++) {
                $barangs[$i] = produk::where('id', $keranjangs[$i]->id_produk)->first();
            }
            return view('keranjang', ['keranjangs' => $keranjangs, 'barangs' => $barangs]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }

    }

    function getHalamanAdmin() {
        if (Session::get('username') == "admin") {
            $transaksis = transaksi::where('status', 0)->get();
            return view('halamanadmin', ['transaksis' => $transaksis]);
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');
        }
    }

    function getHalamanAdminPercetakan() {
        if (Session::get('username') == "admin") {
            $percetakans = percetakan::where('status', 0)->get();
            $penggunas = array();
            for($i = 0; $i < count($percetakans); $i++) {
                $penggunas[$i] = pengguna::where('id', $percetakans[$i]->id_pemilik)->first();
            }
            return view('halamanadminpercetakan', ['percetakans' => $percetakans, 'penggunas' => $penggunas]);
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');
        }
    }

    function tolakTransaksi(Request $request) {
        $dataTransaksi = transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = -1;
        $dataTransaksi->save();
        $dataPesanan = pesanan::where('id_transaksi', $dataTransaksi->id)->get();
        for($i = 0; $i < count($dataPesanan); $i++) {
            $dataPesanan[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataPesanan[$i]->save();
        }
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function terimaTransaksi(Request $request) {
        $dataTransaksi = transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = 1;
        $dataTransaksi->save();
        $dataPesanan = pesanan::where('id_transaksi', $dataTransaksi->id)->get();
        for($i = 0; $i < count($dataPesanan); $i++) {
            $dataPesanan[$i]->status = "Pembayaran terkonfirmasi";
            $dataPesanan[$i]->save();
        }
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function tolakPercetakan(Request $request) {
        $dataToko = percetakan::where('id', $request->input('id'))->first();
        $dataToko->delete();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function terimaPercetakan(Request $request) {
        $dataToko = percetakan::where('id', $request->input('id'))->first();
        $dataToko->status = 1;
        $dataToko->save();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    public function getHistory() {
        if (Session::has('name')) {
            $keranjangs = pesanan::where('id_pemesan', Session::get('id'));
            $keranjangs = $keranjangs->where('status', "!=", "Keranjang")->get();
            $barangs = array();
            for($i = 0; $i < count($keranjangs); $i++) {
                $barangs[$i] = produk::where('id', $keranjangs[$i]->id_produk)->first();
            }
            $percetakans = array();
            for($i = 0; $i < count($keranjangs); $i++) {
                $percetakans[$i] = percetakan::where('id', $barangs[$i]->id_percetakan)->first();
            }
            return view('historytransaksi', ['histories' => $keranjangs, 'barangs' => $barangs, 'percetakans' => $percetakans]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function delete(Request $request) {
        $data = pesanan::where('id', $request->input('id'))->delete();
        return $this->index();
    }

    public function transfer($id_transaksi) {
        $dataTransaksi = transaksi::where('id', $id_transaksi)->first();
        $dataPesanan = pesanan::where('id_pemesan', Session::get('id'))->where('id_transaksi', $id_transaksi)->get();
        if (Session::has('name')) {
            if($dataPesanan[0]->id_pemesan == Session::get('id')) {
                if($dataPesanan[0]->status == "Menunggu pembayaran") {
                    return view('pembayaran', ['dataTransaksi' => $dataTransaksi, 'dataPesanan' => $dataPesanan]);
                } else {
                    return redirect("/history-transaksi")->with('alert', 'Transaksi telah disetujui');
                }
            } else {
                return redirect("/")->with('alert', 'Anda tidak memiliki hak untuk melihat transaksi user lain');
            }
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    function getTerimaPesanan() {
        if(Session::has('id_percetakan')) {
            // $dataPesanan = pesanan::where('id_percetakan', Session::get('id_percetakan'))->where('status', 'Pembayaran terkonfirmasi')->get();
            $dataPesanan = pesanan::where('status', 'Pembayaran terkonfirmasi')->where('id_percetakan', Session::get('id_percetakan'))->get();
            $barangs = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $barangs[$i] = produk::where('id', $dataPesanan[$i]->id_produk)->first();
            }
            $penggunas = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $penggunas[$i] = pengguna::where('id', $dataPesanan[$i]->id_pemesan)->first();
            }
            return view('terimapesanan', ['dataPesanan' => $dataPesanan, 'penggunas' => $penggunas, 'barangs' => $barangs]);
        } else {
            return redirect()->back()->with('alert', 'Anda belum memiliki toko');
        }
    }

    function terimaPesanan(Request $request) {
        $pesanan = pesanan::where('id', $request->input('id'))->first();
        $pesanan->status = "Pesanan sedang diproses";
        $pesanan->save();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function konfirmasiPesanan(Request $request) {
        $pesanan = pesanan::where('id', $request->input('id'))->first();
        $pesanan->status = "Menunggu konfirmasi user";
        $pesanan->save();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function getKonfirmasiPesanan() {
        if(Session::has('id_percetakan')) {
            $dataPesanan = pesanan::where('status', 'Pesanan sedang diproses')->where('id_percetakan', Session::get('id_percetakan'))->get();
            $barangs = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $barangs[$i] = produk::where('id', $dataPesanan[$i]->id_produk)->first();
            }
            $penggunas = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $penggunas[$i] = pengguna::where('id', $dataPesanan[$i]->id_pemesan)->first();
            }
            return view('konfirmasibarang', ['dataPesanan' => $dataPesanan, 'penggunas' => $penggunas, 'barangs' => $barangs]);
        } else {
            return redirect()->back()->with('alert', 'Anda belum memiliki toko');
        }
    }

    function getRiwayatPesanan() {
        if(Session::has('id_percetakan')) {
            $dataPesanan = pesanan::where('status', 'Selesai')->where('id_percetakan', Session::get('id_percetakan'))->get();
            $barangs = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $barangs[$i] = produk::where('id', $dataPesanan[$i]->id_produk)->first();
            }
            $penggunas = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $penggunas[$i] = pengguna::where('id', $dataPesanan[$i]->id_pemesan)->first();
            }
            return view('riwayatpenjualan', ['dataPesanan' => $dataPesanan, 'penggunas' => $penggunas, 'barangs' => $barangs]);
        } else {
            return redirect()->back()->with('alert', 'Anda belum memiliki toko');
        }

    }

    public function checkout(Request $request) {
        $dataTransaksi = new transaksi;
        $dataTransaksi->jumlah = $request->jumlah;
        $dataTransaksi->kode_unik = rand(100, 999);
        $dataTransaksi->save();
        $keranjangs = pesanan::where(['id_pemesan' => Session::get('id'), 'status' => 'Keranjang'])->get();
        foreach($keranjangs as $keranjang) {
            $keranjang->status = "Menunggu pembayaran";
            $keranjang->id_transaksi = $dataTransaksi->id;
            $keranjang->save();
        }
        return redirect("/transaksi/$dataTransaksi->id/transfer");
    }
}
