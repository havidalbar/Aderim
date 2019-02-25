<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Project;
use App\Profesi;

class ProjectController extends Controller
{
    function index(){
        $items = Project::all();
        $profesis = array();
        for($i = 0; $i < count($items); $i++) {
            $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
        }
        return view('home', ['items' => $items, 'profesis' => $profesis]);//
    }

    function tambahProject() {
        if(Session::has('nama_profesi')) {
            return view('addProject');
        } else {
            return redirect()->back()->with('alert', "Anda belum mendaftar profesi");
        }
    }

    function category($category, Request $request){
        // $items = Project::where('category', $category);
        // if($request->input('max') != null) {
        //     $items->where('harga', '<=', $request->input('max'));
        // }
        // if($request->input('min') != null) {
        //     $barangs->where('harga', '>=', $request->input('min'));
        // }
        // $barangs = $barangs->get();
        // $percetakans = array();
        // for($i = 0; $i < count($barangs); $i++) {
        //     $percetakans[$i] = percetakan::where('id', $barangs[$i]->id_percetakan)->first();
        // }
        // return view('category', ['barangs' => $barangs, 'percetakans' => $percetakans]);
    }

    function getSearch(Request $request) {
        return redirect('/search?q='.$request->cari);
    }

    function projectProfesi($id) {
        $items = Project::where('id_profesi', $id)->get();
        $profesi = Profesi::where('id', $id)->first();
        return view('halamantoko', ['items' => $items, 'profesi' => $profesi]);//
    }

    function informasiProfesi($id) {
        $profesi = Profesi::where('id', $id)->first();
        return view('halamantokoinfo', ['profesi' => $profesi]);//
    }

    function search(Request $request){
        $items = Project::where('Project', 'like', '%'.$request->input('q').'%');
        // if($request->input('max') != null) {
        //     $barangs->where('harga', '<=', $request->input('max'));
        // }
        // if($request->input('min') != null) {
        //     $barangs->where('harga', '>=', $request->input('min'));
        // }
        $items = $items->get();
        $profesis = array();
        for($i = 0; $i < count($items); $i++) {
            $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
        }
        return view('category', ['items' => $items, 'profesis' => $profesis]);//
    }

    function project($id) {
        $desProject = Project::where('id', $id)->first();
        $profesi = Profesi::where('id', $desProject->id_profesi)->first();
        return view('deskripsi-produk', ['desProject'=>$desProject, 'profesi' => $profesi]);//
    }

    function uploadProject(Request $request) {
        if($request->fotoProject != null) {
            $data = new Project();
            $data->namagambar = $request->fotoProject;
            $data->namaProject = $request->namaProject;
            $data->deskripsi = $request->deskripsi;
            $data->category = $request->category;
            $data->id_profesi = Session::get('id_profesi');
            $data->save();
            return redirect('/home')->with('alert', 'Project telah ditambahkan');//
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();//
        }
    }
}
