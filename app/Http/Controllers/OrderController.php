<?php

namespace App\Http\Controllers;

use App\Order;
use App\Profesi;
use App\Progres;
use App\Project;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function getPesanProject($id)
    {
        if (Session::has('username')) {
            $desProject = Project::where('id', $id)->first();
            $profesi = Profesi::where('id', $desProject->id_profesi)->first();
            return view('pesanProyek', ['desProject' => $desProject, 'profesi' => $profesi]);
        } else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function orderCheck($id_order)
    {
        if (Session::has('username')) {
            $orders = Order::where(['id_user' => Session::get('id'), 'status' => 'order', 'id' => $id_order])->first();
            $items = Project::where('id', $orders->id_project)->first();
            $profesi = Profesi::where('id', $orders->id_profesi)->first();
            return view('periksaPesanan', ['orders' => $orders, 'items' => $items, 'profesi' => $profesi]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function orderProses(Request $request)
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
            return redirect('/order-check/' . $data->id);
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar desain proyek terlebih dahulu!')->withInput();
        }
    }

    public function getTransferOrder($id_transaksi)
    {
        $dataTransaksi = Transaksi::where('id', $id_transaksi)->first();
        $dataOrder = Order::where('id_user', Session::get('id'))->where('id_transaksi', $id_transaksi)->first();
        if (Session::has('username')) {
            if ($dataOrder->id_user == Session::get('id')) {
                if ($dataOrder->status == "Menunggu pembayaran") {
                    return view('pilihMetodePembayaran', ['dataTransaksi' => $dataTransaksi, 'dataOrder' => $dataOrder]);
                } else {
                    return redirect("/history-transaksi")->with('alert-succes', 'Transaksi telah disetujui');
                }
            } else {
                return redirect("/")->with('alert', 'Anda tidak memiliki hak untuk melihat transaksi user lain');
            }
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function hapusOrder(Request $request)
    {
        $data = Order::where('id', $request->input('id'))->update(['status' => 'Dibatalkan']);
        return redirect('/')->with('alert-success', 'Pesanan Telah Dibatalkan');
    }

    public function transaksiOrderProses(Request $request)
    {
        $dataTransaksi = new Transaksi;
        $dataTransaksi->jumlah = $request->jumlah;
        $dataTransaksi->sisaharga = $request->sisaharga;
        $dataTransaksi->kode_token = rand(100, 999);
        $dataTransaksi->save();
        $order = Order::where(['id_user' => Session::get('id'), 'status' => 'order'])->update(['status' => 'Menunggu pembayaran', 'id_transaksi' => $dataTransaksi->id]);
        return redirect("/transaksi/$dataTransaksi->id/transfer");
    }

    public function updateTransaksiOrder(Request $request)
    {
        $dataTransaksi2 = Transaksi::where('id', $request->id_transaksi)->update([
            'nama' => $request->namaRek,
            'norek' => $request->noRek, 'bank_pengirim' => $request->bank_pengirim, 'bank_tujuan' => $request->bank_pengirim
        ]);
        $dataTransaksi = Transaksi::where('id', $request->id_transaksi)->first();
        return redirect('/konfirmasiPembayaran/' . $dataTransaksi->id);
    }

    public function getKonfirmasiTransfer($id_transaksi)
    {
        if (Session::has('username')) {
            $dataTransaksi = Transaksi::where('id', $id_transaksi)->first();
            return view('instruksipembayaran', ['dataTransaksi' => $dataTransaksi]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getKonfirmasiTransferLagi($id_transaksi, $id_transaksiLama)
    {
        if (Session::has('username')) {
            $orders = Order::where('id_user', Session::get('id'))->where('id_transaksi', $id_transaksiLama)->first();
            $dataTransaksi = Transaksi::where('id', $id_transaksi)->first();
            return view('instruksipembayaranselanjutnya', ['id_transaksi' => $id_transaksi, 'orders' => $orders, 'id_transaksiLama' => $id_transaksiLama, 'dataTransaksi' => $dataTransaksi]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function inputBuktiProses(Request $request, $id_transaksi)
    {
        if ($request->gambarbukti != null) {
            $data = Transaksi::where('id', $id_transaksi)->first();
            $data->gambar_konfirmasi = $request->gambarbukti;
            $data->save();
            return redirect('/home')->with('alert-success', 'Permohonan konfirmasi telah dikirim');
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }

    public function inputBuktiLagiProses(Request $request, $id_transaksi)
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
            return redirect('/home')->with('alert-success', 'Permohonan konfirmasi telah dikirim');
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }

    public function getHistoryAkun()
    {
        if (Session::has('username')) {
            //informasi akun
            $infos = User::where('username', Session::get('username'))->first();

            //progres order
            $orders = Order::where('id_user', Session::get('id'));
            $orders = $orders->where('status', "!=", "order")->get();
            $items = array();
            for ($i = 0; $i < count($orders); $i++) {
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            $profesis = array();
            for ($i = 0; $i < count($orders); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            return view('informasiAkun.informasiAkunRiwayat', [
                'histories' => $orders, 'items' => $items, 'profesis' => $profesis,
                'infos' => $infos
            ]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function terimaOrder(Request $request)
    {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Order sedang diproses";
        $order->save();
        return redirect()->back()->with('alert-success', 'Berhasil mensetujui order');
    }

    public function tolakOrder(Request $request)
    {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Order ditolak";
        $order->save();
        return redirect()->back()->with('alert', 'Berhasil menolak order');
    }

    public function getTerimaPesanan()
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

                return view('halamanProfesi.pesananProyek', [
                    'items' => $items, 'profesi' => $profesi,
                    'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
                    'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
                    'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4
                ]);
            } else {
                return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
            }
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    public function konfirmasiOrderProses(Request $request)
    {
        $order = Order::where('id', $request->input('id'))->first();
        $order->status = "Selesai";
        $order->save();
        return redirect()->back()->with('alert-success', 'Project telah selesai');
    }

    public function getProgresPesananAkun()
    {
        if (Session::has('username')) {
            //informasi akun
            $infos = User::where('username', Session::get('username'))->first();

            //progres order
            $orders = Order::where('id_user', Session::get('id'));
            $orders = $orders->where('status', "!=", "order")->get();
            $items = array();
            for ($i = 0; $i < count($orders); $i++) {
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            $profesis = array();
            for ($i = 0; $i < count($orders); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            return view('informasiAkun.informasiAkunProgres', [
                'histories' => $orders, 'items' => $items, 'profesis' => $profesis,
                'infos' => $infos
            ]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }

    public function getProgresPesananDetail($id_order)
    {
        $dataOrder = Order::where('id', $id_order)->where('status', "!=", "order")->first();
        $orderProgres = Progres::where('id_order', $dataOrder->id)->where('status', $dataOrder->statusLagi)->first();
        $items = Project::where('id', $dataOrder->id_project)->first();
        $profesi = Profesi::where('id', $items->id_profesi)->first();
        $user = User::where('id', $profesi->id_user)->first();
        if ($orderProgres != null) {
            return view('informasiAkun.lihatProgresProyek', ['dataOrder' => $dataOrder, 'user' => $user, 'orderProgres' => $orderProgres, 'items' => $items, 'profesi' => $profesi]);
        } else {
            return redirect()->back()->with('alert', 'Belum ada progres pengerjaan dari project yang anda pilih, silahkan cek dilain waktu');
        }
    }

    public function getProgresPesananDetailBulan($id_order, $bulan)
    {
        $dataOrder = Order::where('id', $id_order)->where('status', "!=", "order")->first();
        $orderProgres = Progres::where('id_order', $dataOrder->id)->where('status', $bulan)->first();
        $items = Project::where('id', $dataOrder->id_project)->first();
        $profesi = Profesi::where('id', $items->id_profesi)->first();
        $user = User::where('id', $profesi->id_user)->first();
        if ($orderProgres != null) {
            return view('informasiAkun.lihatProgresProyek', ['dataOrder' => $dataOrder, 'user' => $user, 'orderProgres' => $orderProgres, 'items' => $items, 'profesi' => $profesi]);
        } else {
            return redirect()->back()->with('alert', 'Belum ada progres dari project ini');
        }
    }

    public function getPesananProgresProfesi()
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

                return view('halamanProfesi.progresPesanan', [
                    'items' => $items, 'profesi' => $profesi,
                    'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
                    'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
                    'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4
                ]);
            } else {
                return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
            }
        } else {
            return redirect()->back()->with('alert', 'Anda belum menjadi profesi');
        }
    }

    public function getPesananProgresProfesiList($id_order)
    {
        $dataOrder = Order::where('id', $id_order)->where('status', "!=", "order")->first();
        $user = User::where('id', $dataOrder->id_user)->first();
        $orderProgres = Progres::where('id_order', $dataOrder->id)->where('status', $dataOrder->statusLagi)->first();
        $items = Project::where('id', $dataOrder->id_project)->first();
        if ($orderProgres != null) {
            return view('halamanProfesi.lihatProgresProyek', ['dataOrder' => $dataOrder, 'user' => $user, 'orderProgres' => $orderProgres, 'items' => $items]);
        } else {
            return redirect('/halaman-profesi/' . $id_order . '/tambah-progres')->with('alert', 'Progres order masih belum ada silahkan menambahkan terlebih dahulu');
        }
    }

    public function getPesananProgresProfesiListBulan($id_order, $bulan)
    {
        $dataOrder = Order::where('id', $id_order)->where('status', "!=", "order")->first();
        $user = User::where('id', $dataOrder->id_user)->first();
        $orderProgres = Progres::where('id_order', $dataOrder->id)->where('status', $bulan)->first();
        $items = Project::where('id', $dataOrder->id_project)->first();
        if ($orderProgres != null) {
            return view('halamanProfesi.lihatProgresProyek', ['dataOrder' => $dataOrder, 'user' => $user, 'orderProgres' => $orderProgres, 'items' => $items]);
        } else {
            return redirect()->back()->with('alert', 'Belum ada progres dari project ini');
        }
    }

    public function getPesananProgresProfesiTambah($id_order)
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
        } else {
            $dataOrder = Order::where('id', $id_order)->where('id_profesi', Session::get('id_profesi'))->update(['statusLagi' => $status, 'status' => 'Order sedang diproses']);
        }
    }

    public function getBayarLagi(Request $request)
    {
        if (Session::has('username')) {
            $orders = Order::where(['id_user' => Session::get('id'), 'statusLagi' => $request->input('statusLagi')])->where('id', $request->input('id'))->first();
            $items = Project::where('id', $orders->id_project)->first();
            $transaksis = Transaksi::where('id', $orders->id_transaksi)->first();
            return view('pembayaranSelanjutnya', ['orders' => $orders, 'items' => $items, 'transaksis' => $transaksis]);
        } else {
            return redirect("/login")->with('alert', 'Kamu harus login dulu');
        }
    }
    public function transaksiOrderLagiProses(Request $request)
    {
        $dataTransaksi = new Transaksi;
        $dataTransaksi->jumlah = $request->jumlah;
        $dataTransaksi->sisaharga = $request->sisaharga;
        $dataTransaksi->nama = $request->namaRek;
        $dataTransaksi->norek = $request->noRek;
        $dataTransaksi->bank_pengirim = $request->bank_pengirim;
        $dataTransaksi->bank_tujuan = $request->bank_pengirim;
        $dataTransaksi->kode_token = rand(100, 999);
        $dataTransaksi->save();
        $id_transaksiLama = $request->id_transaksiLama;
        return redirect("/konfirmasiPembayaranLagi/$dataTransaksi->id/$id_transaksiLama");
    }

    public function orderProgresProses(Request $request, $id_order)
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
            return redirect('/')->with('alert-success', 'Order Progres Telah Diupdate');
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }
}
