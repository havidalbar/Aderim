<?php

namespace App\Http\Controllers;

use App\Order;
use App\Profesi;
use App\Progres;
use App\Project;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index($id)
    {
        if (Session::has('username')) {
            $desProject = Project::where('id', $id)->first();
            $profesi = Profesi::where('id', $desProject->id_profesi)->first();
            return view('pesanProyek', ['desProject' => $desProject, 'profesi' => $profesi]);
        } else {
            return redirect()->back()->with('alert', 'Kamu harus login dulu');
        }
    }

    public function indexcheck()
    {
        if (Session::has('username')) {
            $orders = Order::where(['id_user' => Session::get('id'), 'status' => 'order'])->first();
            // $items = array();
            // for ($i = 0; $i < count($orders); $i++) {
            // }
            $items = Project::where('id', $orders->id_project)->first();
            $profesi = Profesi::where('id', $orders->id_profesi)->first();
            return view('periksaPesanan', ['orders' => $orders, 'items' => $items, 'profesi' => $profesi]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getHalamanAdmin()
    {
        if (Session::get('username') == "admin") {
            $profesis = Profesi::where('status', null)->get();
            $transaksis = Transaksi::where('status', 0)->get();
            $users = array();
            for ($i = 0; $i < count($profesis); $i++) {
                $users[$i] = User::where('id', $profesis[$i]->id_profesi)->first();
            }
            return view('halamanAdmin.halamanAdminTransfer', ['transaksis' => $transaksis,'profesis' => $profesis, 'users' => $users]);
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
                $users[$i] = User::where('id', $profesis[$i]->id_profesi)->first();
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
        return redirect()->back()->with('alert', 'Berhasil menerima profesi');
    }

    public function tolakProfesi(Request $request)
    {
        $dataProfesi = Profesi::where('id', $request->input('id'))->first();
        $dataProfesi->delete();
        return redirect()->back()->with('alert', 'Berhasil menolak profesi');
    }

    public function order(Request $request)
    {
        if ($request['files'] != null) {
            $data = new Order();
            $data->id_project = $request->id_project;
            $data->id_profesi = $request->id_profesi;
            $data->id_user = $request->id_user;
            $data->url_gambar = implode(" ", $request['files']);
            $data->pesan = $request->pesan;
            $data->address = $request->alamat;
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
        $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;
        $upload_success = $image->storeAs($directory, $filename, 'public');
        if ($upload_success) {
            return response()->json($upload_success, 200);
        } else {
            return response()->json('error', 400);
        }
    }

    public function transfer($id_transaksi)
    {
        $dataTransaksi = Transaksi::where('id', $id_transaksi)->first();
        $dataOrder = Order::where('id_user', Session::get('id'))->where('id_transaksi', $id_transaksi)->first();
        if (Session::has('username')) {
            if ($dataOrder->id_user == Session::get('id')) {
                if ($dataOrder->status == "Menunggu pembayaran") {
                    return view('pilihMetodePembayaran', ['dataTransaksi' => $dataTransaksi, 'dataOrder' => $dataOrder]);
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

    public function delete(Request $request)
    {
        $data = Order::where('id', $request->input('id'))->update(['status' => 'Dibatalkan']);
        return redirect('/')->with('alert', 'Pesanan Telah Dibatalkan');
    }

    public function transaksiOrder(Request $request)
    {
        $dataTransaksi = new Transaksi;
        $dataTransaksi->jumlah = $request->jumlah;
        $dataTransaksi->sisaharga = $request->sisaharga;
        $dataTransaksi->kode_token = rand(100, 999);
        $dataTransaksi->save();
        $orders = Order::where(['id_user' => Session::get('id'), 'status' => 'order'])->get();
        foreach ($orders as $order) {
            $order->status = "Menunggu pembayaran";
            $order->id_transaksi = $dataTransaksi->id;
            $order->save();
        }
        return redirect("/transaksi/$dataTransaksi->id/transfer");
    }

    public function updateTransaksiOrder(Request $request)
    {
        $dataTransaksi2 = Transaksi::where('id',$request->id_transaksi)->update(['nama' => $request->namaRek, 
        'norek' => $request->noRek, 'bank_pengirim' => $request->bank_pengirim, 'bank_tujuan' => $request->bank_pengirim]);
        $dataTransaksi = Transaksi::where('id',$request->id_transaksi)->first();
        return redirect('/konfirmasiPembayaran/'.$dataTransaksi->id);
    }

    public function uploadBukti(Request $request)
    {
        $time = Carbon::now();
        $image = $request->file('file');
        $extension = $image->getClientOriginalExtension();
        $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
        $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;
        $upload_success = $image->storeAs($directory, $filename, 'public');
        if ($upload_success) {
            return response()->json($upload_success, 200);
        } else {
            return response()->json('error', 400);
        }
    }

    public function showKonfirmasiTransfer($id_transaksi)
    {
        $dataTransaksi = Transaksi::where('id',$id_transaksi)->first();
        return view('instruksipembayaran', ['dataTransaksi' => $dataTransaksi]);
    }

    public function showKonfirmasiTransferLagi($id_transaksi, $id_transaksiLama)
    {
        $orders = Order::where('id_user', Session::get('id'))->where('id_transaksi', $id_transaksiLama)->first();
        $dataTransaksi = Transaksi::where('id',$id_transaksi)->first();
        return view('instruksipembayaranselanjutnya', ['id_transaksi' => $id_transaksi, 'orders' => $orders, 'id_transaksiLama' => $id_transaksiLama,'dataTransaksi' => $dataTransaksi]);
    }

    public function inputBukti(Request $request, $id_transaksi)
    {
        if ($request->gambarbukti != null) {
                    $data = Transaksi::where('id', $id_transaksi)->first();
                    $data->gambar_konfirmasi = $request->gambarbukti;
                    $data->save();
                    return redirect('/home')->with('alert', 'Permohonan konfirmasi telah dikirim');
                }
        else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }

    public function inputBuktiLagi(Request $request, $id_transaksi)
    {
        if ($request->gambarbukti != null) {
                    $data = Transaksi::where('id', $id_transaksi)->first();
                    $data->gambar_konfirmasi = $request->gambarbukti;
                    $data->save();
                    if ($request->id_transaksi2 != 0) {
                        $dataOrder = Order::where('id', $request->id_order)->update(['id_transaksi2' => $id_transaksi, 'status' => 'Menunggu pembayaran']);
                    } else if ($request->id_transaksi3 != 0) {
                        $dataOrder = Order::where('id', $request->id_order)->update(['id_transaksi3' => $id_transaksi, 'status' => 'Menunggu pembayaran']);
                    } else if ($request->id_transaksi4 != 0) {
                        $dataOrder = Order::where('id', $request->id_order)->update(['id_transaksi4' => $id_transaksi, 'status' => 'Menunggu pembayaran']);
                    }
                    return redirect('/home')->with('alert', 'Permohonan konfirmasi telah dikirim');
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }

    public function getHistory()
    {
        if (Session::has('username')) {
            //informasi akun
            if (Session::has('username')) {
                $infos = User::where('username', Session::get('username'))->first();
            } else {
                $infos = User::where('email', Session::get('email'))->first();
            }

            //progres order
            $orders = Order::where('id_user', Session::get('id'));
            $orders = $orders->where('status', "!=", "order")->get();
            $items = array();
            $orderProgres = array();
            for ($i = 0; $i < count($orders); $i++) {
                $orderProgres = Progres::where('id_order', $orders[$i]->id)->first();
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            $profesis = array();
            for ($i = 0; $i < count($orders); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            // $orders = Order::where('id_user', Session::get('id'));
            // $orders = $orders->where('status', "!=", "order")->get();
            // $orders2 = Order::where('id_user', Session::get('id'));
            // $orders2 = $orders2->where('status',"==","Order sedang diproses")->get();
            // $orders3 = Order::where('id_user', Session::get('id'));
            // $orders3 = $orders3->where('status',"==","Selesai")->get();
            // $orders4 = Order::where('id_user', Session::get('id'));
            // $orders4 = $orders4->where('status',"==","Dibatalkan")->get();
            //proses
            // $items2 = array();
            // for ($i = 0; $i < count($orders2); $i++) {
            //     $items2[$i] = Project::where('id', $orders2[$i]->id_project)->first();
            // }
            // $profesis2 = array();
            // for ($i = 0; $i < count($orders2); $i++) {
            //     $profesis2[$i] = Profesi::where('id', $items2[$i]->id_profesi)->first();
            // }
            // //selesai
            // $items3 = array();
            // for ($i = 0; $i < count($orders3); $i++) {
            //     $items3[$i] = Project::where('id', $orders3[$i]->id_project)->first();
            // }
            // $profesis3 = array();
            // for ($i = 0; $i < count($orders3); $i++) {
            //     $profesis3[$i] = Profesi::where('id', $items3[$i]->id_profesi)->first();
            // }
            // //dibatalkan
            // $items4 = array();
            // for ($i = 0; $i < count($orders4); $i++) {
            //     $items4[$i] = Project::where('id', $orders4[$i]->id_project)->first();
            // }
            // $profesis4 = array();
            // for ($i = 0; $i < count($orders4); $i++) {
            //     $profesis4[$i] = Profesi::where('id', $items4[$i]->id_profesi)->first();
            // }
            return view('informasiAkun.informasiAkunRiwayat', ['histories' => $orders, 'items' => $items,'profesis' => $profesis,
            'infos' => $infos,'orderProgres' => $orderProgres]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
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
        $dataOrder = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for ($i = 0; $i < count($dataOrder); $i++) {
            if ($dataOrder[$i]->status == "Menunggu pembayaran") {
                $dataOrder[$i]->status = "Pembayaran terkonfirmasi";
                $dataOrder[$i]->save();
            }
        }
        $dataOrder2 = Order::where('id_transaksi2', $dataTransaksi->id)->get();
        $dataOrder3 = Order::where('id_transaksi3', $dataTransaksi->id)->get();
        $dataOrder4 = Order::where('id_transaksi4', $dataTransaksi->id)->get();
        for ($i = 0; $i < count($dataOrder2); $i++) {
            if ($dataOrder2[$i]->id_transaksi != 0) {
                if ($dataOrder2[$i]->status == "Menunggu pembayaran" || $dataOrder2[$i]->status == "Pembayaran tidak terkonfirmasi") {
                    $dataOrder2[$i]->status = "Order sedang diproses";
                    $dataOrder2[$i]->save();
                }
            }
        }
        for ($i = 0; $i < count($dataOrder3); $i++) {
            if ($dataOrder3[$i]->id_transaksi != 0 && $dataOrder3[$i]->id_transaksi2 != 0) {
                if ($dataOrder3[$i]->status == "Menunggu pembayaran" || $dataOrder3[$i]->status == "Pembayaran tidak terkonfirmasi") {
                    $dataOrder3[$i]->status = "Order sedang diproses";
                    $dataOrder3[$i]->save();
                }
            }
        }
        for ($i = 0; $i < count($dataOrder4); $i++) {
            if ($dataOrder4[$i]->id_transaksi != 0 && $dataOrder4[$i]->id_transaksi2 != 0 && $dataOrder4[$i]->id_transaksi3 != 0) {
                if ($dataOrder4[$i]->status == "Menunggu pembayaran" || $dataOrder4[$i]->status == "Pembayaran tidak terkonfirmasi") {
                    $dataOrder4[$i]->status = "Order sedang diproses";
                    $dataOrder4[$i]->save();
                }
            }
        }

        return redirect()->back()->with('alert', 'berhasil mensetujui transfer');
    }

    public function tolakTransfer(Request $request)
    {
        $dataTransaksi = Transaksi::where('id', $request->input('id'))->first();
        $dataTransaksi->status = -1;
        $dataTransaksi->save();
        $dataOrder = Order::where('id_transaksi', $dataTransaksi->id)->get();
        for ($i = 0; $i < count($dataOrder); $i++) {
            // $dataOrder[$i]->update(['id_transaksi' => null]);
            $dataOrder[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder[$i]->save();
        }
        $dataOrder2 = Order::where('id_transaksi2', $dataTransaksi->id)->get();
        $dataOrder21 = Order::where('id_transaksi2', $request->input('id'))->update(['id_transaksi2' => null]);
        for ($i = 0; $i < count($dataOrder2); $i++) {
            // $dataOrder2[$i]->update(['id_transaksi2' => null]);

            $dataOrder2[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder2[$i]->save();
        }
        $dataOrder3 = Order::where('id_transaksi3', $dataTransaksi->id)->get();
        $dataOrder31 = Order::where('id_transaksi3', $request->input('id'))->update(['id_transaksi3' => null]);
        for ($i = 0; $i < count($dataOrder3); $i++) {
            // $dataOrder3[$i]->update(['id_transaksi3' => null]);

            $dataOrder3[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder3[$i]->save();
        }
        $dataOrder4 = Order::where('id_transaksi4', $dataTransaksi->id)->get();
        $dataOrder41 = Order::where('id_transaksi4', $request->input('id'))->update(['id_transaksi4' => null]);
        for ($i = 0; $i < count($dataOrder4); $i++) {
            // $dataOrder4[$i]->update(['id_transaksi4' => null]);
            $dataOrder4[$i]->status = "Pembayaran tidak terkonfirmasi";
            $dataOrder4[$i]->save();
        }
        return redirect()->back()->with('alert', 'berhasil menolak transfer');
    }

    public function terimaOrder(Request $request)
    {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Order sedang diproses";
        $order->save();
        return redirect()->back()->with('alert', 'berhasil mensetujui order');
    }

    public function tolakOrder(Request $request)
    {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Order ditolak";
        $order->save();
        return redirect()->back()->with('alert', 'berhasil menolak order');
    }

    public function getTerimaOrder()
    {
        if (Session::has('id_profesi')) {
            //infromasi profesi
            $profesi = Profesi::where('id', Session::get('id_profesi'))->first();
            if ($profesi->status != null) {
                //kumpulan proyek
                $items = Project::where('id_profesi', Session::get('id_profesi'))->get();

                //terima order
                $dataOrder2 = Order::where('id_profesi', Session::get('id_profesi'))->where('status', 'Pembayaran terkonfirmasi')->get();
                $items2 = array();
                for ($i = 0; $i < count($dataOrder2); $i++) {
                    $items2[$i] = Project::where('id', $dataOrder2[$i]->id_project)->first();
                }
                $users2 = array();
                for ($i = 0; $i < count($dataOrder2); $i++) {
                    $users2[$i] = User::where('id', $dataOrder2[$i]->id_user)->first();
                }

                //konfirmasi order
                $dataOrder3 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
                $items3 = array();
                for ($i = 0; $i < count($dataOrder3); $i++) {
                    $items3[$i] = Project::where('id', $dataOrder3[$i]->id_project)->first();
                }
                $users3 = array();
                for ($i = 0; $i < count($dataOrder3); $i++) {
                    $users3[$i] = User::where('id', $dataOrder3[$i]->id_user)->first();
                }

                //riwayat order selesai
                $dataOrder4 = Order::where('status', 'Selesai')->where('id_profesi', Session::get('id_profesi'))->get();
                $items4 = array();
                for ($i = 0; $i < count($dataOrder4); $i++) {
                    $items4[$i] = Project::where('id', $dataOrder4[$i]->id_project)->first();
                }
                $users4 = array();
                for ($i = 0; $i < count($dataOrder4); $i++) {
                    $users4[$i] = User::where('id', $dataOrder4[$i]->id_user)->first();
                }

                //progres order
                $dataOrder5 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
                $items5 = array();
                for ($i = 0; $i < count($dataOrder5); $i++) {
                    $items5[$i] = Project::where('id', $dataOrder5[$i]->id_project)->first();
                }
                $users5 = array();
                for ($i = 0; $i < count($dataOrder5); $i++) {
                    $users5[$i] = User::where('id', $dataOrder5[$i]->id_user)->first();
                }
                return view('halamanProfesi.pesananProyek', ['items' => $items, 'profesi' => $profesi,
                'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
                'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
                'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4,
                'dataOrder5' => $dataOrder5, 'users5' => $users5, 'items5' => $items5]);
            } else {
                return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
            }
        }else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

//     public function getKonfirmasiOrder()
//     {
//         if (Session::has('id_profesi')) {
//             //infromasi profesi
//             $profesi = Profesi::where('id', Session::get('id_profesi'))->first();
//             if ($profesi->status != null) {
//             //kumpulan proyek
//             $items = Project::where('id_profesi', Session::get('id_profesi'))->get();

//             //terima order
//             $dataOrder2 = Order::where('id_profesi', Session::get('id_profesi'))->where('status', 'Pembayaran terkonfirmasi')->get();
//             $items2 = array();
//             for ($i = 0; $i < count($dataOrder2); $i++) {
//             $items2[$i] = Project::where('id', $dataOrder2[$i]->id_project)->first();
//             }
//             $users2 = array();
//             for ($i = 0; $i < count($dataOrder2); $i++) {
//                 $users2[$i] = User::where('id', $dataOrder2[$i]->id_user)->first();
//             }

//             //konfirmasi order
//             $dataOrder3 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
//             $items3 = array();
//             for ($i = 0; $i < count($dataOrder3); $i++) {
//                 $items3[$i] = Project::where('id', $dataOrder3[$i]->id_project)->first();
//             }
//             $users3 = array();
//             for ($i = 0; $i < count($dataOrder3); $i++) {
//                 $users3[$i] = User::where('id', $dataOrder3[$i]->id_user)->first();
//             }

//             //riwayat order selesai
//             $dataOrder4 = Order::where('status', 'Selesai')->where('id_profesi', Session::get('id_profesi'))->get();
//             $items4 = array();
//             for ($i = 0; $i < count($dataOrder4); $i++) {
//                 $items4[$i] = Project::where('id', $dataOrder4[$i]->id_project)->first();
//             }
//             $users4 = array();
//             for ($i = 0; $i < count($dataOrder4); $i++) {
//                 $users4[$i] = User::where('id', $dataOrder4[$i]->id_user)->first();
//             }

//             //progres order
//             $dataOrder5 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
//             $items5 = array();
//             for ($i = 0; $i < count($dataOrder5); $i++) {
//                 $items5[$i] = Project::where('id', $dataOrder5[$i]->id_project)->first();
//             }
//             $users5 = array();
//             for ($i = 0; $i < count($dataOrder5); $i++) {
//                 $users5[$i] = User::where('id', $dataOrder5[$i]->id_user)->first();
//             }
//             return view('halamanProfesi.orderanProyek', ['items' => $items, 'profesi' => $profesi,
//             'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
//             'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
//             'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4,
//             'dataOrder5' => $dataOrder5, 'users5' => $users5, 'items5' => $items5]);
//         } else {
//             return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
//         }
//     }else {
//         return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
//     }
// }

    public function konfirmasiOrder(Request $request)
    {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Selesai";
        $order->save();
        return redirect()->back()->with('alert', 'Project telah selesai');
    }

//     public function getRiwayatOrder()
//     {
//         if (Session::has('id_profesi')) {
//             //infromasi profesi
//             $profesi = Profesi::where('id', Session::get('id_profesi'))->first();
//             if ($profesi->status != null) {
//             //kumpulan proyek
//             $items = Project::where('id_profesi', Session::get('id_profesi'))->get();

//             //terima order
//             $dataOrder2 = Order::where('id_profesi', Session::get('id_profesi'))->where('status', 'Pembayaran terkonfirmasi')->get();
//             $items2 = array();
//             for ($i = 0; $i < count($dataOrder2); $i++) {
//             $items2[$i] = Project::where('id', $dataOrder2[$i]->id_project)->first();
//             }
//             $users2 = array();
//             for ($i = 0; $i < count($dataOrder2); $i++) {
//                 $users2[$i] = User::where('id', $dataOrder2[$i]->id_user)->first();
//             }

//             //konfirmasi order
//             $dataOrder3 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
//             $items3 = array();
//             for ($i = 0; $i < count($dataOrder3); $i++) {
//                 $items3[$i] = Project::where('id', $dataOrder3[$i]->id_project)->first();
//             }
//             $users3 = array();
//             for ($i = 0; $i < count($dataOrder3); $i++) {
//                 $users3[$i] = User::where('id', $dataOrder3[$i]->id_user)->first();
//             }

//             //riwayat order selesai
//             $dataOrder4 = Order::where('status', 'Selesai')->where('id_profesi', Session::get('id_profesi'))->get();
//             $items4 = array();
//             for ($i = 0; $i < count($dataOrder4); $i++) {
//                 $items4[$i] = Project::where('id', $dataOrder4[$i]->id_project)->first();
//             }
//             $users4 = array();
//             for ($i = 0; $i < count($dataOrder4); $i++) {
//                 $users4[$i] = User::where('id', $dataOrder4[$i]->id_user)->first();
//             }

//             //progres order
//             $dataOrder5 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
//             $items5 = array();
//             for ($i = 0; $i < count($dataOrder5); $i++) {
//                 $items5[$i] = Project::where('id', $dataOrder5[$i]->id_project)->first();
//             }
//             $users5 = array();
//             for ($i = 0; $i < count($dataOrder5); $i++) {
//                 $users5[$i] = User::where('id', $dataOrder5[$i]->id_user)->first();
//             }
//             return view('halamanProfesi.orderanProyek', ['items' => $items, 'profesi' => $profesi,
//             'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
//             'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
//             'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4,
//             'dataOrder5' => $dataOrder5, 'users5' => $users5, 'items5' => $items5]);
//         } else {
//             return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
//         }
//     }else {
//         return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
//     }
// }

    public function getProgresOrder()
    {
        if (Session::has('username')) {
            //informasi akun
            if (Session::has('username')) {
                $infos = User::where('username', Session::get('username'))->first();
            } else {
                $infos = User::where('email', Session::get('email'))->first();
            }

            //progres order
            $orders = Order::where('id_user', Session::get('id'));
            $orders = $orders->where('status', "!=", "order")->get();
            $items = array();
            $orderProgres = array();
            for ($i = 0; $i < count($orders); $i++) {
                $orderProgres = Progres::where('id_order', $orders[$i]->id)->first();
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            $profesis = array();
            for ($i = 0; $i < count($orders); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            // $orders = Order::where('id_user', Session::get('id'));
            // $orders = $orders->where('status', "!=", "order")->get();
            // $orders2 = Order::where('id_user', Session::get('id'));
            // $orders2 = $orders2->where('status',"==","Order sedang diproses")->get();
            // $orders3 = Order::where('id_user', Session::get('id'));
            // $orders3 = $orders3->where('status',"==","Selesai")->get();
            // $orders4 = Order::where('id_user', Session::get('id'));
            // $orders4 = $orders4->where('status',"==","Dibatalkan")->get();
            //proses
            // $items2 = array();
            // for ($i = 0; $i < count($orders2); $i++) {
            //     $items2[$i] = Project::where('id', $orders2[$i]->id_project)->first();
            // }
            // $profesis2 = array();
            // for ($i = 0; $i < count($orders2); $i++) {
            //     $profesis2[$i] = Profesi::where('id', $items2[$i]->id_profesi)->first();
            // }
            // //selesai
            // $items3 = array();
            // for ($i = 0; $i < count($orders3); $i++) {
            //     $items3[$i] = Project::where('id', $orders3[$i]->id_project)->first();
            // }
            // $profesis3 = array();
            // for ($i = 0; $i < count($orders3); $i++) {
            //     $profesis3[$i] = Profesi::where('id', $items3[$i]->id_profesi)->first();
            // }
            
            // //dibatalkan
            // $items4 = array();
            // for ($i = 0; $i < count($orders4); $i++) {
            //     $items4[$i] = Project::where('id', $orders4[$i]->id_project)->first();
            // }
            // $profesis4 = array();
            // for ($i = 0; $i < count($orders4); $i++) {
            //     $profesis4[$i] = Profesi::where('id', $items4[$i]->id_profesi)->first();
            // }
            return view('informasiAkun.informasiAkunProgres', ['histories' => $orders, 'items' => $items,'profesis' => $profesis,
            'infos' => $infos,'orderProgres' => $orderProgres]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function progres($id_order)
    {

        $dataOrder = Order::where('id', $id_order)->where('status', "!=", "order")->first();
        $user = User::where('id', $dataOrder->id_user)->first();
        $orderProgres = Progres::where('id_order', $dataOrder->id)->first();
        $items = Project::where('id', $dataOrder->id_project)->first();
        $profesi = Profesi::where('id', $items->id_profesi)->first();
        $user2 = User::where('id', $profesi->id_user)->first();
        if(count($orderProgres)>0){
        return view('informasiAkun.lihatProgresProyek', ['dataOrder' => $dataOrder, 'user' => $user, 'user2' => $user2, 'orderProgres' => $orderProgres, 'items' => $items, 'profesi' => $profesi]);
        }else{
            return redirect()->back()->with('alert','Belum ada progres dari project ini');
        }
    }

    public function getOrderProgres()
    {
        if (Session::has('id_profesi')) {
            //infromasi profesi
            $profesi = Profesi::where('id', Session::get('id_profesi'))->first();
            if ($profesi->status != null) {
            //kumpulan proyek
            $items = Project::where('id_profesi', Session::get('id_profesi'))->get();

            //terima order
            $dataOrder2 = Order::where('id_profesi', Session::get('id_profesi'))->where('status', 'Pembayaran terkonfirmasi')->get();
            $items2 = array();
            for ($i = 0; $i < count($dataOrder2); $i++) {
            $items2[$i] = Project::where('id', $dataOrder2[$i]->id_project)->first();
            }
            $users2 = array();
            for ($i = 0; $i < count($dataOrder2); $i++) {
                $users2[$i] = User::where('id', $dataOrder2[$i]->id_user)->first();
            }

            //konfirmasi order
            $dataOrder3 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
            $items3 = array();
            for ($i = 0; $i < count($dataOrder3); $i++) {
                $items3[$i] = Project::where('id', $dataOrder3[$i]->id_project)->first();
            }
            $users3 = array();
            for ($i = 0; $i < count($dataOrder3); $i++) {
                $users3[$i] = User::where('id', $dataOrder3[$i]->id_user)->first();
            }

            //riwayat order selesai
            $dataOrder4 = Order::where('status', 'Selesai')->where('id_profesi', Session::get('id_profesi'))->get();
            $items4 = array();
            for ($i = 0; $i < count($dataOrder4); $i++) {
                $items4[$i] = Project::where('id', $dataOrder4[$i]->id_project)->first();
            }
            $users4 = array();
            for ($i = 0; $i < count($dataOrder4); $i++) {
                $users4[$i] = User::where('id', $dataOrder4[$i]->id_user)->first();
            }

            //progres order
            $dataOrder5 = Order::where('status', 'Order sedang diproses')->where('id_profesi', Session::get('id_profesi'))->get();
            $items5 = array();
            for ($i = 0; $i < count($dataOrder5); $i++) {
                $items5[$i] = Project::where('id', $dataOrder5[$i]->id_project)->first();
            }
            $users5 = array();
            for ($i = 0; $i < count($dataOrder5); $i++) {
                $users5[$i] = User::where('id', $dataOrder5[$i]->id_user)->first();
            }
            return view('halamanProfesi.progresPesanan', ['items' => $items, 'profesi' => $profesi,
            'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
            'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
            'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4,
            'dataOrder5' => $dataOrder5, 'users5' => $users5, 'items5' => $items5]);
        } else {
            return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
        }
    }else {
        return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
    }
}

    public function showOrderProgresView($id_order)
    {
        $dataOrder = Order::where('id', $id_order)->where('status', "!=", "order")->first();
        $user = User::where('id', $dataOrder->id_user)->first();
        $orderProgres = Progres::where('id_order', $dataOrder->id)->first();
        $items = Project::where('id', $dataOrder->id_project)->first();
        $profesi = Profesi::where('id', $items->id_profesi)->first();
        if(count($orderProgres)>0){
        return view('halamanProfesi.lihatProgresProyek', ['dataOrder' => $dataOrder, 'user' => $user, 'orderProgres' => $orderProgres, 'items' => $items, 'profesi' => $profesi]);
        }else{
        return redirect('/order-progres/'.$id_order.'/tambah')->with('alert','Progres order masih belum ada silahkan menambah terlebih dahulu');
        }
    }

    public function showOrderProgresAdd($id_order)
    {
        $dataOrder = Order::where('id', $id_order)->first();
        return view('halamanProfesi.tambahProgres', ['id_order' => $id_order, 'dataOrder' => $dataOrder]);
    }

    public function setStatus($status, $id_order)
    {
        if ($status == 6) {
            $dataOrder = Order::where('id', $id_order)->where('id_profesi', Session::get('id_profesi'))->update(['statusLagi' => 6, 'status' => 'Menunggu pembayaran']);
        } else if ($status == 12) {
            $dataOrder = Order::where('id', $id_order)->where('id_profesi', Session::get('id_profesi'))->update(['statusLagi' => 12, 'status' => 'Menunggu pembayaran']);
        } else if ($status == 18) {
            $dataOrder = Order::where('id', $id_order)->where('id_profesi', Session::get('id_profesi'))->update(['statusLagi' => 18, 'status' => 'Menunggu pembayaran']);
        } 
        // else if ($status == 24) {
        //     $dataOrder = Order::where('id', $id_order)->where('id_profesi', Session::get('id_profesi'))->update(['statusLagi' => 24, 'status' => 'Order sedang diproses']);
        // } 
        else {
            $dataOrder = Order::where('id', $id_order)->where('id_profesi', Session::get('id_profesi'))->update(['statusLagi' => $status, 'status' => 'Order sedang diproses']);
        }
    }

    public function getBayarLagi(Request $request)
    {
        if (Session::has('username')) {
            $orders = Order::where(['id_user' => Session::get('id'), 'statusLagi' => $request->input('statusLagi')])->where('id', $request->input('id'))->first();
            $items = Project::where('id', $orders->id_project)->first();
            $transaksis= Transaksi::where('id', $orders->id_transaksi)->first();
            return view('pembayaranSelanjutnya', ['orders' => $orders, 'items' => $items, 'transaksis' => $transaksis]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }
    public function transaksiOrderLagi(Request $request)
    {
        $dataTransaksi = new Transaksi;
        $dataTransaksi->jumlah = $request->jumlah;
        $dataTransaksi->sisaharga = $request->sisaharga;
        $dataTransaksi->bank_pengirim = $request->bank_pengirim;
        $dataTransaksi->bank_tujuan = $request->bank_pengirim;
        $dataTransaksi->kode_token = rand(100, 999);
        $dataTransaksi->save();
        $id_transaksiLama = $request->id_transaksiLama;
        return redirect("/konfirmasiPembayaranLagi/$dataTransaksi->id/$id_transaksiLama");
    }

    public function orderProgres(Request $request, $id_order)
    {
        if ($request['files'] != null) {
            $data = new Progres();
            $data->id_order = $id_order;
            $data->id_profesi = $request->id_profesi;
            $data->id_project = $request->id_project;
            $data->status = $request->status;
            $data->id_user = $request->id_user;
            $data->url_gambar = implode(" ", $request['files']);
            $data->pesan = $request->pesan;
            $data->save();
            $this->setStatus($request->status, $id_order);
            return redirect('/')->with('alert', 'Order Progres Telah Diupdate');
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
        $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;
        $upload_success = $image->storeAs($directory, $filename, 'public');
        if ($upload_success) {
            return response()->json($upload_success, 200);
        } else {
            return response()->json('error', 400);
        }
    }
}
