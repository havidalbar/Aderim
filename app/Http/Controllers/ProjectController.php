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
        $items = Project::where('category', $category);
        $items = $items->get();
        $profesis = array();
        for($i = 0; $i < count($items); $i++) {
            $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
        }
        return view('cari', ['items' => $items, 'profesis' => $profesis]);
    }

    function getSearch(Request $request) {
        return redirect('/search?keyword='.$request->cari);
    }

    function projectProfesi($id) {
        $items = Project::where('id_profesi', $id)->get();
        $profesi = Profesi::where('id', $id)->first();
        return view('halamanProfesi', ['items' => $items, 'profesi' => $profesi]);//
    }

    function informasiProfesi($id) {
        $profesi = Profesi::where('id', $id)->first();
        return view('halamanProfesiInfo', ['profesi' => $profesi]);//
    }

    function search(Request $request){
        $items = Project::where('namaProject', 'like', '%'.$request->input('keyword').'%');
        $items = $items->get();
        $profesis = array();
        for($i = 0; $i < count($items); $i++) {
            $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
        }
        return view('cari', ['items' => $items, 'profesis' => $profesis]);
    }

    function project($id) {
        $desProject = Project::where('id', $id)->first();
        $profesi = Profesi::where('id', $desProject->id_profesi)->first();
        return view('deskripsiProject', ['desProject'=>$desProject, 'profesi' => $profesi]);
    }

    function uploadProject(Request $request) {

    }
}
