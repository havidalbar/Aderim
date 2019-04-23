<?php
namespace App\Http\Controllers;

use App\Order;
use App\Profesi;
use App\Progres;
use App\Project;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;

class UserController extends Controller
{

    public function informasiAkun()
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
            for ($i = 0; $i < count($orders); $i++) {
                $items[$i] = Project::where('id', $orders[$i]->id_project)->first();
            }
            $profesis = array();
            for ($i = 0; $i < count($orders); $i++) {
                $profesis[$i] = Profesi::where('id', $items[$i]->id_profesi)->first();
            }
            return view('informasiAkun.informasiAkunProfil', ['histories' => $orders, 'items' => $items, 'profesis' => $profesis,
                'infos' => $infos]);
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

                return redirect('/home');
            } else {
                return redirect()->back()->with('alert', 'Password yang anda masukan salah!');
            }
        } else {
            return redirect()->back()->with('alert', 'Email dan Password yang anda masukan tidak sesuai!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/'); //
    }

    public function getProfesi()
    {
        if (Session::has('nama_profesi')) {
            return redirect()->back()->with('alert', 'Anda telah menjadi profesi');
        } else {
            return view('daftarProfesi');
        }
    }

    private function generateId()
    {
        $char = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
        $id = "";
        for ($i = 0; $i < 6; $i++) {
            $id = $id . $char[rand(0, 15)];
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
            $filename = $id . '.' . $fileExt;
            $path = $request->foto->storeAs('image/profile', $filename, 'public_uploads');

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

            return redirect('/home');

        }
    }

    public function daftarProfesi(Request $request)
    {
        if ($request['files'] != null) {
            $filename = explode('.', $request->foto->getClientOriginalName());
            $fileExt = end($filename);
            $id = $this->generateId();
            $filename = $id . '.' . $fileExt;
            $path = $request->foto->storeAs('image/profile', $filename, 'public_uploads');

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
            return redirect('/')->with('alert-success', 'Berhasil mendaftar profesi');
        } else {
            return redirect()->back()->with('alert', 'Anda wajib memberikan foto Portofolio kepada pihak Aderim!')->withInput();
        }
    }
}
