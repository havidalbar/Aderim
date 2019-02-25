<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Project;
use App\Transaksi;
use App\Profesi;
use App\User;

class OrderController extends Controller
{

    public function index() {
        if (Session::has('name')) {
            $keranjangs = Order::where(['id_order' => Session::get('id'), 'status' => 'Keranjang'])->get();
            $items = array();
            for($i = 0; $i < count($keranjangs); $i++) {
                $items[$i] = Project::where('id', $keranjangs[$i]->id_project)->first();
            }
            return view('keranjang', ['keranjangs' => $keranjangs, 'items' => $items]);//
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');//
        }

    }

    function getHalamanAdmin() {
        if (Session::get('name') == "admin") {
            $transaksis = Transaksi::where('status', 0)->get();
            return view('halamanadmin', ['transaksis' => $transaksis]);
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');
        }
    }

    function getHalamanAdminPercetakan() {
        if (Session::get('name') == "admin") {
            $profesis = Profesi::where('status', 0)->get();
            $users = array();
            for($i = 0; $i < count($profesis); $i++) {
                $users[$i] = User::where('id', $profesis[$i]->id_profesi)->first();
            }
            return view('halamanadminpercetakan', ['profesis' => $profesis, 'users' => $users]);//
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');//
        }
    }

    function tolakTransaksi(Request $request) {
        $dataTransaksi = Transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = -1;
        $dataTransaksi->save();
        $dataPesanan = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for($i = 0; $i < count($dataPesanan); $i++) {
            $dataPesanan[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataPesanan[$i]->save();
        }
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function terimaTransaksi(Request $request) {
        $dataTransaksi = Transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = 1;
        $dataTransaksi->save();
        $dataPesanan = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for($i = 0; $i < count($dataPesanan); $i++) {
            $dataPesanan[$i]->status = "Pembayaran terkonfirmasi";
            $dataPesanan[$i]->save();
        }
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function tolakProfesi(Request $request) {
        $dataProfesi = Profesi::where('id', $request->input('id'))->first();
        $dataProfesi->delete();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function terimaProfesi(Request $request) {
        $dataProfesi = Profesi::where('id', $request->input('id'))->first();
        $dataProfesi->status = 1;
        $dataProfesi->save();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    public function getHistory() {
        if (Session::has('name')) {
            $keranjangs = Order::where('id_order', Session::get('id'));
            $keranjangs = $keranjangs->where('status', "!=", "Keranjang")->get();
            $items = array();
            for($i = 0; $i < count($keranjangs); $i++) {
                $items[$i] = Project::where('id', $keranjangs[$i]->id_project)->first();
            }
            $profesis = array();
            for($i = 0; $i < count($keranjangs); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            return view('historytransaksi', ['histories' => $keranjangs, 'items' => $items, 'profesis' => $profesis]);//
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');//
        }
    }

    public function delete(Request $request) {
        $data = Order::where('id', $request->input('id'))->delete();
        return $this->index();
    }

    public function transfer($id_transaksi) {
        $dataTransaksi = Transaksi::where('id', $id_transaksi)->first();
        $dataPesanan = Order::where('id_order', Session::get('id'))->where('id_transaksi', $id_transaksi)->get();
        if (Session::has('name')) {
            if($dataPesanan[0]->id_order == Session::get('id')) {
                if($dataPesanan[0]->status == "Menunggu pembayaran") {
                    return view('pembayaran', ['dataTransaksi' => $dataTransaksi, 'dataPesanan' => $dataPesanan]);//
                } else {
                    return redirect("/history-transaksi")->with('alert', 'Transaksi telah disetujui');//
                }
            } else {
                return redirect("/")->with('alert', 'Anda tidak memiliki hak untuk melihat transaksi user lain');//
            }
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');//
        }
    }

    function getTerimaPesanan() {
        if(Session::has('id_profesi')) {
            $dataPesanan = Order::where('status', 'Pembayaran terkonfirmasi')->where('id_profesi', Session::get('id_profesi'))->get();
            $items = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $items[$i] = Project::where('id', $dataPesanan[$i]->id_project)->first();
            }
            $users = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $users[$i] = User::where('id', $dataPesanan[$i]->id_order)->first();
            }
            return view('terimapesanan', ['dataPesanan' => $dataPesanan, 'users' => $users, 'items' => $items]);//
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    function terimaPesanan(Request $request) {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Pesanan sedang diproses";
        $order->save();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function konfirmasiPesanan(Request $request) {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Menunggu konfirmasi user";
        $order->save();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function getKonfirmasiPesanan() {
        if(Session::has('id_profesi')) {
            $dataPesanan = Order::where('status', 'Pesanan sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
            $items = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $items[$i] = Project::where('id', $dataPesanan[$i]->id_project)->first();
            }
            $users = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $users[$i] = User::where('id', $dataPesanan[$i]->id_order)->first();
            }
            return view('konfirmasibarang', ['dataPesanan' => $dataPesanan, 'users' => $users, 'items' => $items]);//
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    function getRiwayatPesanan() {
        if(Session::has('id_profesi')) {
            $dataPesanan = Order::where('status', 'Selesai')->where('id_profesi', Session::get('id_profesi'))->get();
            $items = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $items[$i] = Project::where('id', $dataPesanan[$i]->id_project)->first();
            }
            $users = array();
            for($i=0; $i<count($dataPesanan); $i++) {
                $users[$i] = User::where('id', $dataPesanan[$i]->id_order)->first();
            }
            return view('riwayatpenjualan', ['dataPesanan' => $dataPesanan, 'users' => $users, 'items' => $items]);//
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }

    }

    public function checkout(Request $request) {
        $dataTransaksi = new transaksi;
        $dataTransaksi->jumlah = $request->jumlah;
        $dataTransaksi->kode_unik = rand(100, 999);
        $dataTransaksi->save();
        $keranjangs = Order::where(['id_order' => Session::get('id'), 'status' => 'Keranjang'])->get();
        foreach($keranjangs as $keranjang) {
            $keranjang->status = "Menunggu pembayaran";
            $keranjang->id_transaksi = $dataTransaksi->id;
            $keranjang->save();
        }
        return redirect("/transaksi/$dataTransaksi->id/transfer");
    }
}
