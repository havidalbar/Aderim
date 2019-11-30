<?php

namespace App\Http\Controllers;

use App\Order;
use App\Profesi;
use App\Transaksi;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getHalamanAdminPembayaran()
    {
        if (Session::get('username') == "admin") {
            $profesis = Profesi::where('status', null)->get();
            $transaksis = Transaksi::where('status', 0)->get();
            $users = array();
            for ($i = 0; $i < count($profesis); $i++) {
                $users[$i] = User::where('id', $profesis[$i]->id_user)->first();
            }
            return view('halamanAdmin.halamanAdminTransfer', ['transaksis' => $transaksis, 'profesis' => $profesis, 'users' => $users]);
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');
        }
    }

    public function getHalamanAdminProfesi()
    {
        if (Session::get('username') == "admin") {
            $profesis = Profesi::where('status', null)->get();
            $transaksis = Transaksi::where('status', 0)->get();
            $users = array();
            for ($i = 0; $i < count($profesis); $i++) {
                $users[$i] = User::where('id', $profesis[$i]->id_user)->first();
            }
            return view('halamanAdmin.halamanAdminProfesi', ['profesis' => $profesis, 'users' => $users, 'transaksis' => $transaksis]);
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');
        }
    }

    public function terimaProfesi(Request $request)
    {
        $dataProfesi = Profesi::where('id', $request->input('id'))->first();
        $dataProfesi->status = 1;
        $dataProfesi->save();
        return redirect()->back()->with('alert-success', 'Berhasil menerima profesi');
    }

    public function tolakProfesi(Request $request)
    {
        $dataProfesi = Profesi::where('id', $request->input('id'))->first();
        $dataProfesi->delete();
        return redirect()->back()->with('alert', 'Berhasil menolak profesi');
    }


    public function terimaTransfer(Request $request)
    {
        $dataTransaksi = Transaksi::where('id', $request->input('id'))->first();
        if ($dataTransaksi->status == 0) {
            $dataTransaksi->status = 1;
            $dataTransaksi->save();
        } else {
            $dataTransaksi->statusLagi += 1;
            $dataTransaksi->save();
        }
        $id_project=null;
        $dataOrder = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for ($i = 0; $i < count($dataOrder); $i++) {
            $id_project = $dataOrder[$i]->id_project;
            if ($dataOrder[$i]->status == "Menunggu pembayaran") {
                $dataOrder[$i]->status = "Pembayaran terkonfirmasi";
                $dataOrder[$i]->save();
            }
        }
        $dataOrder2 = Order::where('id_transaksi2', $dataTransaksi->id)->get();
        $dataOrder3 = Order::where('id_transaksi3', $dataTransaksi->id)->get();
        $dataOrder4 = Order::where('id_transaksi4', $dataTransaksi->id)->get();
        for ($i = 0; $i < count($dataOrder2); $i++) {
            $id_project = $dataOrder2[$i]->id_project;
            if ($dataOrder2[$i]->id_transaksi != 0) {
                if ($dataOrder2[$i]->status == "Menunggu pembayaran" || $dataOrder2[$i]->status == "Pembayaran tidak terkonfirmasi") {
                    $dataOrder2[$i]->status = "Order sedang diproses";
                    $dataOrder2[$i]->save();
                }
            }
        }
        for ($i = 0; $i < count($dataOrder3); $i++) {
            $id_project = $dataOrder3[$i]->id_project;
            if ($dataOrder3[$i]->id_transaksi != 0 && $dataOrder3[$i]->id_transaksi2 != 0) {
                if ($dataOrder3[$i]->status == "Menunggu pembayaran" || $dataOrder3[$i]->status == "Pembayaran tidak terkonfirmasi") {
                    $dataOrder3[$i]->status = "Order sedang diproses";
                    $dataOrder3[$i]->save();
                }
            }
        }
        for ($i = 0; $i < count($dataOrder4); $i++) {
            $id_project = $dataOrder4[$i]->id_project;
            if ($dataOrder4[$i]->id_transaksi != 0 && $dataOrder4[$i]->id_transaksi2 != 0 && $dataOrder4[$i]->id_transaksi3 != 0) {
                if ($dataOrder4[$i]->status == "Menunggu pembayaran" || $dataOrder4[$i]->status == "Pembayaran tidak terkonfirmasi") {
                    $dataOrder4[$i]->status = "Order sedang diproses";
                    $dataOrder4[$i]->save();
                }
            }
        }
        $project = Project::where('id',$id_project)->first();
        $admin = User::where('username','admin')->first();
        $credit = (($project->estimasi)*0.25)+$admin->credit;
        $admin1 = User::where('username','admin')->update(['credit'=>$credit]);
        return redirect()->back()->with('alert-success', 'Berhasil menyetujui transfer');
    }

    public function tolakTransfer(Request $request)
    {
        $dataTransaksi = Transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = -1;
        $dataTransaksi->save();
        $dataOrder = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for ($i = 0; $i < count($dataOrder); $i++) {
            $dataOrder[$i]->status = "Dibatalkan";
            $dataOrder[$i]->save();
        }
        $dataOrder2 = Order::where('id_transaksi2', $dataTransaksi->id)->get();
        $dataOrder21 = Order::where('id_transaksi2', $request->input('id'))->update(['id_transaksi2' => null]);
        for ($i = 0; $i < count($dataOrder2); $i++) {

            $dataOrder2[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder2[$i]->save();
        }
        $dataOrder3 = Order::where('id_transaksi3', $dataTransaksi->id)->get();
        $dataOrder31 = Order::where('id_transaksi3', $request->input('id'))->update(['id_transaksi3' => null]);
        for ($i = 0; $i < count($dataOrder3); $i++) {

            $dataOrder3[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder3[$i]->save();
        }
        $dataOrder4 = Order::where('id_transaksi4', $dataTransaksi->id)->get();
        $dataOrder41 = Order::where('id_transaksi4', $request->input('id'))->update(['id_transaksi4' => null]);
        for ($i = 0; $i < count($dataOrder4); $i++) {
            $dataOrder4[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder4[$i]->save();
        }
        return redirect()->back()->with('alert', 'Berhasil menolak transfer');
    }

}
