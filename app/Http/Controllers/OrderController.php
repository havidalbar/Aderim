<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Project;
use App\Progres;
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

    public function indexcheck() {
        if (Session::has('name')) {
            $orders = Order::where(['id_user' => Session::get('id'), 'status' => 'order'])->get();
            $items = array();
            for($i = 0; $i < count($orders); $i++) {
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            return view('ordercheck', ['orders' => $orders, 'items' => $items]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }

    }

    function getHalamanAdmin() {
        if (Session::get('name') == "admin") {
            $transaksis = Transaksi::where('status', 0)->get();
            return view('halamanAdmin', ['transaksis' => $transaksis]);
        } else {
            return redirect("/home")->with('alert', 'Anda tidak memiliki akses sebagai admin');
        }
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
        if($request['files'] != null) {
            $data = new Order();
            $data->id_project = $request->id_project;
            $data->id_profesi = $request->id_profesi;
            $data->id_user = $request->id_user;
            $data->url_gambar = implode(" ", $request['files']);
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
                    return view('transfer', ['dataTransaksi' => $dataTransaksi, 'dataOrder' => $dataOrder]);
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
        return $this->indexcheck();
    }


    public function transaksiOrder(Request $request) {
        $dataTransaksi = new Transaksi;
        $dataTransaksi->jumlah = $request->jumlah;
        $dataTransaksi->sisaharga = $request->sisaharga;
        $dataTransaksi->kode_token = rand(100, 999);
        $dataTransaksi->save();
        $orders = Order::where(['id_user' => Session::get('id'), 'status' => 'order'])->get();
        foreach($orders as $order) {
            $order->status = "Menunggu pembayaran";
            $order->id_transaksi = $dataTransaksi->id;
            $order->save();
        }
        return redirect("/transaksi/$dataTransaksi->id/transfer");
    }
    public function uploadBukti(Request $request)
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

    public function showKonfirmasiTransfer($id_transaksi){
        return view('konfirmasitransfer', ['id_transaksi' => $id_transaksi]);
    }

    public function inputBukti(Request $request,$id_transaksi) {
        if($request->gambarbukti != null) {
            if($request->bank != "Default") {
                if($request->bank_penerima != "Default") {
                    $data = Transaksi::where('id', $id_transaksi)->first();
                    $data->nama = $request->namaRek;
                    $data->norek = $request->noRek;
                    $data->bank_pengirim = $request->bank;
                    $data->bank_tujuan = $request->bank_penerima;
                    $data->gambar_konfirmasi = $request->gambarbukti;
                    $data->save();
                    return redirect('/home')->with('alert', 'Permohonan konfirmasi telah dikirim');
                } else {
                    return redirect()->back()->with('alert', 'Masukkan bank tujuan')->withInput();
                }
            } else {
                return redirect()->back()->with('alert', 'Masukkan bank Anda')->withInput();
            }
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }

    public function getHistory() {
        if (Session::has('name')) {
            $orders = Order::where('id_user', Session::get('id'));
            $orders = $orders->where('status', "!=", "order")->get();
            $items = array();
            for($i = 0; $i < count($orders); $i++) {
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            $profesis = array();
            for($i = 0; $i < count($orders); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            return view('historyOrder', ['histories' => $orders, 'items' => $items, 'profesis' => $profesis]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    function terimaTransfer(Request $request) {
        $dataTransaksi = Transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = 1;
        $dataTransaksi->save();
        $dataOrder = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for($i = 0; $i < count($dataOrder); $i++) {
            $dataOrder[$i]->status = "Pembayaran terkonfirmasi";
            $dataOrder[$i]->save();
        }
        return redirect()->back()->with('alert', 'berhasil mensetujui transfer');
    }

    function tolakTransfer(Request $request) {
        $dataTransaksi = Transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = -1;
        $dataTransaksi->save();
        $dataOrder = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for($i = 0; $i < count($dataOrder); $i++) {
            $dataOrder[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder[$i]->save();
        }
        return redirect()->back()->with('alert', 'berhasil menolak transfer');
    }

    function terimaOrder(Request $request) {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Order sedang diproses";
        $order->save();
        return redirect()->back()->with('alert', 'berhasil mensetujui order');
    }

    function tolakOrder(Request $request) {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Order ditolak";
        $order->save();
        return redirect()->back()->with('alert', 'berhasil menolak order');
    }

    function getTerimaOrder() {
        if(Session::has('id_profesi')) {
            $dataOrder = Order::where('id_user', Session::get('id_profesi'))->where('status', 'Pembayaran terkonfirmasi')->get();
            $items = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $items[$i] = Project::where('id', $dataOrder[$i]->id_project)->first();
            }
            $users = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $users[$i] = User::where('id', $dataOrder[$i]->id_user)->first();
            }
            return view('terimaOrder', ['dataOrder' => $dataOrder, 'users' => $users, 'items' => $items]);
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    function getKonfirmasiOrder() {
        if(Session::has('id_profesi')) {
            $dataOrder = Order::where('status', 'Order sedang diproses')->where('id_user', Session::get('id_profesi'))->get();
            $items = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $items[$i] = Project::where('id', $dataOrder[$i]->id_project)->first();
            }
            $users = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $users[$i] = User::where('id', $dataOrder[$i]->id_user)->first();
            }
            return view('konfirmasiOrder', ['dataOrder' => $dataOrder, 'users' => $users, 'items' => $items]);
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    function konfirmasiOrder(Request $request) {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Selesai";
        $order->save();
        return redirect()->back()->with('alert', 'Project telah selesai');
    }

    function getRiwayatOrder() {
        if(Session::has('id_profesi')) {
            $dataOrder = Order::where('status', 'Selesai')->where('id_user', Session::get('id_profesi'))->get();
            $items = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $items[$i] = Project::where('id', $dataOrder[$i]->id_project)->first();
            }
            $users = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $users[$i] = User::where('id', $dataOrder[$i]->id_user)->first();
            }
            return view('riwayatOrder', ['dataOrder' => $dataOrder, 'users' => $users, 'items' => $items]);
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    function getProgresOrder(){
        if (Session::has('name')) {
            $orders = Order::where('id_user', Session::get('id'));
            $orders = $orders->where('status', "!=", "order")->get();
            $items = array();
            for($i = 0; $i < count($orders); $i++) {
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            $profesis = array();
            for($i = 0; $i < count($orders); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            return view('progresOrder', ['orders' => $orders, 'items' => $items, 'profesis' => $profesis]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    function progres($id_order){
        $orderProgres = Progres::where('id_order', $id_order)->get();
        $orders = array();
        for($i = 0; $i < count($orderProgres); $i++) {
        $orders[$i] = Order::where('id', $orderProgres[$i]->id_order)->first();
        }
        $profesis = array();
        for($i = 0; $i < count($orderProgres); $i++) {
        $profesis[$i] = Profesi::where('id', $orderProgres[$i]->id_profesi)->first();
        }
        return view('progresOrderView', ['orderProgres'=>$orderProgres, 'profesis' => $profesis,'orders' =>$orders]);
    }

    function getOrderProgres(){
        if(Session::has('id_profesi')) {
            $dataOrder = Order::where('status', 'Order sedang diproses')->where('id_user', Session::get('id_profesi'))->get();
            $items = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $items[$i] = Project::where('id', $dataOrder[$i]->id_project)->first();
            }
            $users = array();
            for($i=0; $i<count($dataOrder); $i++) {
                $users[$i] = User::where('id', $dataOrder[$i]->id_user)->first();
            }
            return view('orderProgresView', ['dataOrder' => $dataOrder, 'users' => $users, 'items' => $items]);
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    public function showOrderProgres($id_order){
        $dataOrder = Order::where('id', $id_order)->first();
        return view('orderProgresInput', ['id_order' => $id_order,'dataOrder' => $dataOrder]);
    }

    function orderProgres(Request $request,$id_order){
        if($request['files'] != null) {
            $data = new Progres();
            $data->id_order = $id_order;
            $data->id_profesi = $request->id_profesi;
            $data->id_project = $request->id_project;
            $data->status = $request->status;
            $data->id_user = $request->id_user;
            $data->url_gambar = implode(" ", $request['files']);
            $data->pesan = $request->pesan;
            $data->save();
            return redirect()->back()->with('alert', 'Order Progres Telah Diupdate');
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }

    public function uploadProgres(Request $request)
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
}
