<?php

namespace App\Http\Controllers;

use App\Order;
use App\Profesi;
use App\Project;
use App\Progres;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    public function index()
    {
        $items = Project::all();
        $profesis = array();
        for ($i = 0; $i < count($items); $i++) {
            $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
        }
        return view('home', ['items' => $items, 'profesis' => $profesis]); //
    }

    public function getTambahProjectProfesi()
    {
        $profesi = Profesi::where('id', Session::get('id_profesi'))->first();
        if (Session::has('nama_profesi')) {
            if ($profesi->status != null) {
                return view('halamanProfesi.tambahProyek');
            } else {
                return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
            }
        } else {
            return redirect()->back()->with('alert', "Anda belum mendaftar profesi");
        }
    }

    public function ubahProjectProses(Request $request, $id_project)
    {
        if ($request['files'] != null) {
            $dataProfesi = Project::where('id_profesi', Session::get('id_profesi'))->where('id', $id_project)->update([
                'namagambar' => implode(" ", $request['files']),
                'namaProject' => $request->namaProject, 'deskripsi' => $request->deskripsi, 'spesifikasi' => $request->spesifikasi, 'category' => $request->category,
                'daerah' => $request->daerah, 'estimasi' => $request->estimasi
            ]);
            return redirect('/')->with('alert', 'Project berhasil di ubah');
        } else {
            return redirect()->back()->with('alert', 'Masukkan foto terbaru proyek anda terlebih dahulu!')->withInput();
        }
    }

    public function tambahProjectProses(Request $request)
    {
        if ($request['files'] != null) {
            $data = new Project();
            $data->namagambar = implode(" ", $request['files']);
            $data->namaProject = $request->namaProject;
            $data->deskripsi = $request->deskripsi;
            $data->spesifikasi = $request->spesifikasi;
            $data->category = $request->category;
            $data->daerah = $request->daerah;
            $data->estimasi = $request->estimasi;
            $data->id_profesi = Session::get('id_profesi');
            $data->save();
            return redirect('/')->with('alert', 'Berhasil upload project');
        } else {
            return redirect()->back()->with('alert', 'Masukkan foto proyek anda terlebih dahulu!')->withInput();
        }
    }

    public function category($category, Request $request)
    {
        $items = Project::where('category', $category);
        $items = $items->get();
        $key = $category;
        $profesis = array();
        for ($i = 0; $i < count($items); $i++) {
            $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
        }
        return view('cari', ['items' => $items, 'profesis' => $profesis, 'key' => $key]);
    }

    public function getSearch(Request $request)
    {
        return redirect('/search?keyword=' . $request->cari);
    }

    public function getUrut(Request $request)
    {
        return redirect('/search?keyword=' . $request->urutkan);
    }

    public function getProjectProfesi($id)
    {
        //informasi profesi
        $profesi = Profesi::where('id', Session::get('id_profesi'))->first();
        if (Session::has('nama_profesi')) {
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
                return view('halamanProfesi.kumpulanProyek', [
                    'items' => $items, 'profesi' => $profesi,
                    'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
                    'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
                    'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4,
                    'dataOrder5' => $dataOrder5, 'users5' => $users5, 'items5' => $items5
                ]);
            } else {
                return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
            }
        } else {
            return redirect()->back()->with('alert', "Anda belum mendaftar profesi");
        }
    }

    public function getInformasiProfesi($id)
    {
        //informasi profesi
        $profesi = Profesi::where('id', Session::get('id_profesi'))->first();
        if (Session::has('nama_profesi')) {
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
                return view('halamanProfesi.profilProfesi', [
                    'items' => $items, 'profesi' => $profesi,
                    'dataOrder2' => $dataOrder2, 'users2' => $users2, 'items2' => $items2,
                    'dataOrder3' => $dataOrder3, 'users3' => $users3, 'items3' => $items3,
                    'dataOrder4' => $dataOrder4, 'users4' => $users4, 'items4' => $items4,
                    'dataOrder5' => $dataOrder5, 'users5' => $users5, 'items5' => $items5
                ]);
            } else {
                return redirect()->back()->with('alert', "Anda belum disetujui menjadi profesi");
            }
        } else {
            return redirect()->back()->with('alert', "Anda belum mendaftar profesi");
        }
    }

    public function search(Request $request)
    {
        $items = Project::where('namaProject', 'like', '%' . $request->input('keyword') . '%');
        $items = $items->get();
        $key = $request->input('keyword');
        $profesis = array();
        for ($i = 0; $i < count($items); $i++) {
            $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
        }

        return view('cari', ['items' => $items, 'profesis' => $profesis, 'key' => $key]);
    }

    public function getUbahProject($id_project)
    {
        $dataProject = Project::where('id', $id_project)->where('id_profesi', Session::get('id_profesi'))->first();
        $dataProfesi = Profesi::where('id', $dataProject->id_profesi)->first();
        return view('halamanProfesi.ubahProyek', ['dataProject' => $dataProject, 'dataProfesi' => $dataProfesi]);
    }

    public function hapusProject(Request $request)
    {
        $dataProject = Project::where('id', $request->input('id'))->first();
        $dataOrder =  Order::where('id_project', $dataProject->id)->first();
        $dataProgres =  Progres::where('id_project', $dataProject->id)->first();
        if ($dataOrder != null || $dataProgres != null) {
            return redirect()->back()->with('alert', 'Project tidak dapat dihapus, karena memiliki progres atau pesanan');
        }
        return redirect('/')->with('alert', 'Project telah dihapus');
    }
}
