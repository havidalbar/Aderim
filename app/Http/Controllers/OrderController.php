<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Project;
use App\Transaksi;
use App\Profesi;
use App\User;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function index($id) {
        if (Session::has('name')) {
            $desProject = Project::where('id', $id)->first();
            return view('order', ['desProject' => $desProject]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    function getHalamanAdmin() {
        if (Session::get('name') == "admin") {
            $profesis = Profesi::where('status', null)->get();
            $users = array();
            for($i = 0; $i < count($profesis); $i++) {
                $users[$i] = User::where('id', $profesis[$i]->id_profesi)->first();
            }
            return view('halamanAdminProfesi', ['profesis' => $profesis, 'users' => $users]);//
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');//
        }
        // if (Session::get('name') == "admin") {
        //     $transaksis = Transaksi::where('status', 0)->get();
        //     return view('halamanAdmin', ['transaksis' => $transaksis]);
        // } else {
        //     return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');
        // }
    }

    function getHalamanAdminProfesi() {
        if (Session::get('name') == "admin") {
            $profesis = Profesi::where('status', null)->get();
            $users = array();
            for($i = 0; $i < count($profesis); $i++) {
                $users[$i] = User::where('id', $profesis[$i]->id_profesi)->first();
            }
            return view('halamanAdminProfesi', ['profesis' => $profesis, 'users' => $users]);//
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');//
        }
    }

    function terimaProfesi(Request $request) {
        $dataProfesi = Profesi::where('id', $request->input('id'))->first();
        $dataProfesi->status = 1;
        $dataProfesi->save();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    function tolakProfesi(Request $request) {
        $dataProfesi = Profesi::where('id', $request->input('id'))->first();
        $dataProfesi->delete();
        return redirect()->back()->with('alert', 'Operasi berhasil');
    }

    public function order(Request $request) {
        if($request->fotoorder != null) {
            $data = new Order();
            $data->id_project = $request->id_project;
            $data->id_profesi = $request->id_profesi;
            $data->id_user = $request->id_user;
            $data->url_gambar = $request->fotoorder;
            $data->pesan = $request->pesan;
            $data->save();
            return redirect('/order-check')->with('alert', 'Permintaan anda telah di data, silahkan melanjutkan ke pembayaran');
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }

    public function uploadFotoOrder(Request $request)
    {
        $time = Carbon::now();
        $image = $request->file('file');
        $extension = $image->getClientOriginalExtension();
        $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
        $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
        $upload_success = $image->storeAs($directory, $filename, 'public');
        if ($upload_success) {
            return response()->json($upload_success, 200);
        }
        else {
            return response()->json('error', 400);
        }
    }

    public function transfer($id_transaksi) {
        $dataTransaksi = Transaksi::where('id', $id_transaksi)->first();
        $dataOrder = Order::where('id_user', Session::get('id'))->where('id_transaksi', $id_transaksi)->get();
        if (Session::has('name')) {
            if($dataOrder[0]->id_user == Session::get('id')) {
                if($dataOrder[0]->status == "Menunggu pembayaran") {
                    return view('pembayaran', ['dataTransaksi' => $dataTransaksi, 'dataOrder' => $dataOrder]);
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
    public function delete(Request $request) {
        $data = Order::where('id', $request->input('id'))->delete();
        return $this->index();
    }

    function tolakTransaksi(Request $request) {

    }

    function terimaTransaksi(Request $request) {

    }

    public function getHistory() {

    }


    function getTerimaOrder() {

    }

    function terimaOrder(Request $request) {

    }

    function konfirmasiOrder(Request $request) {

    }

    function getKonfirmasiOrder() {

    }

    function getRiwayatOrder() {


    }

}
