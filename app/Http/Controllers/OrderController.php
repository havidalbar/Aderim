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

    function tolakTransaksi(Request $request) {

    }

    function terimaTransaksi(Request $request) {

    }

    public function getHistory() {

    }

    public function delete(Request $request) {

    }

    public function transfer($id_transaksi) {

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
