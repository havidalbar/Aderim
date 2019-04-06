<?php
namespace App\Http\Controllers;

use App\Profesi;
use App\Order;
use App\User;
use App\Progres;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Validator;

class UserController extends Controller
{

    public function informasi()
    {
        if (Session::get('/')) {
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
            return view('informasiAkun.informasiAkunProfil', ['histories' => $orders, 'items' => $items,'profesis' => $profesis,
            'infos' => $infos,'orderProgres' => $orderProgres]);
        } else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');
        }
    }

    public function index()
    {
        if (Session::get('/')) {
            return redirect('/')->with('alert', 'Kamu harus login dulu');
        } else {
            return view('home');
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if ($data == null) {
            $data = User::where('username', $email)->first();
        }
        if (!($data == null)) {
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('username', $data->username);
                Session::put('name', $data->name);
                Session::put('foto', $data->foto);
                Session::put('email', $data->email);
                Session::put('/', true);

                $dataProfesi = Profesi::where('id_user', $data->id)->first();

                if ($dataProfesi != null) {
                    Session::put('nama_profesi', $dataProfesi->nama_profesi);
                    Session::put('id_profesi', $dataProfesi->id);
                    Session::put('foto_profesi', $dataProfesi->foto);
                }

                return redirect('/home')->with('alert', 'Anda telah login'); 
            } else {
                return redirect()->back()->with('alert', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('alert', 'Email atau Password salah!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert', 'Kamu sudah logout'); //
    }

    public function getProfesi()
    {
        if (Session::has('nama_profesi')) {
            return redirect()->back()->with('alert', 'Anda telah menjadi profesi');
        } else {
            return view('daftarProfesi');
        }
    }

    private function generateId(){
        $char = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
        $id = "";
        for($i=0;$i<6;$i++){
            $id = $id.$char[rand(0, 15)];
        }
        return $id;
    }

    public function registerproses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:100',
            'nama' => 'required|min:3|max:100',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required|min:6|max:20',
            'validpassword' => 'required|same:password',
            'address' => 'required',
            'nohp' => 'required|min:6|max:15|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $filename = explode('.', $request->foto->getClientOriginalName());
            $fileExt = end($filename);
            $id = $this->generateId();
            $filename = $id.'.'.$fileExt;
            $path = $request->foto->storeAs('image/profile',$filename, 'public_uploads');

            $data = new User();
            $data->username = $request->username;
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->foto = $path;
            $data->address = $request->address;
            $data->nohp = $request->nohp;
            $data->save();
            $data = User::where('email', $data->email)->first();
            Session::put('id', $data->id);
            Session::put('username', $data->username);
            Session::put('name', $data->name);
            Session::put('foto', $data->foto);
            Session::put('email', $data->email);
            Session::put('/', true);

            $dataProfesi = Profesi::where('id_user', $data->id)->first();

            if ($dataProfesi != null) {
                Session::put('nama_profesi', $dataProfesi->nama_profesi);
                Session::put('id_profesi', $dataProfesi->id);
                Session::put('foto_profesi', $dataProfesi->foto);
            }

            return redirect('/home')->with('alert', 'Anda telah login'); //

        }
    }

    public function daftarProfesi(Request $request)
    {
        if ($request['files'] != null) {
            $filename = explode('.', $request->foto->getClientOriginalName());
            $fileExt = end($filename);
            $id = $this->generateId();
            $filename = $id.'.'.$fileExt;
            $path = $request->foto->storeAs('image/profile',$filename, 'public_uploads');
            
            $data = new Profesi();
            $data->foto = $path;
            $data->url_image = implode(" ", $request['files']);
            $data->nama_profesi = $request->nama_profesi;
            $data->alamat = $request->address;
            $data->nohp = $request->nohp;
            $data->job_title = $request->job_title;
            $data->id_user = Session::get('id');
            $data->save();
            Session::put('nama_profesi', $data->nama_profesi);
            Session::put('id_profesi', $data->id);
            Session::put('foto_profesi', $data->foto);
            return redirect('/')->with('alert', 'Berhasil mendaftar profesi');
        } else {
            return redirect()->back()->with('alert', 'Masukkan gambar terlebih dahulu')->withInput();
        }
    }
    public function uploadFoto(Request $request)
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
