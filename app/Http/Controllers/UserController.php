<?php
namespace App\Http\Controllers;

use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Profesi;

class UserController extends Controller
{
    //
    public function info()
    {
        if (Session::get('/')) {
            if (Session::has('name')) {
                $infos = User::where('name', Session::get('name'))->first();
            } else {
                $infos = User::where('email', Session::get('email'))->first();
            }
            return view('informasiakun', ['infos' => $infos]);
        } else {
            return redirect('/login')->with('alert', 'Kamu harus login dulu');//
        }
    }

    public function index()
    {
        if (Session::get('/')) {
            return redirect('/')->with('alert', 'Kamu harus login dulu');
        } else {
            return view('user');//
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if ($data == null) {
            $data = User::where('name', $email)->first();
        }
        if (!($data == null)) {
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('/', true);

                $dataProfesi = Profesi::where('id_profesi', $data->id)->first();

                if($dataProfesi != null) {
                    Session::put('nama_profesi', $dataProfesi->nama_percetakan);
                    Session::put('id_profesi', $dataProfesi->id);
                }

                return redirect('/home')->with('alert', 'Anda telah login');//
            } else {
                return redirect()->back()->with('alert', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('alert', 'Username atau Email salah!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert', 'Kamu sudah logout');//
    }

    public function getProfesi() {
        if(Session::has('nama_profesi')) {
            return redirect()->back()->with('alert', 'Anda telah menjadi profesi');
        } else {
            return view('bukatoko');//
        }
    }

    public function registerproses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required|min:6|max:20',
            'confirmation' => 'required|same:password',
            'address' => 'required',
            'nohp' => 'required|min:11|max:15|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->address = $request->address;
            $data->nohp = $request->nohp;
            $data->save();
            return redirect('/login')->with('alert', 'Kamu berhasil Register');//
        }
    }

    public function daftarProfesi(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_profesi' => 'required|min:3|max:255',
            'address' => 'required',
            'nohp' => 'required|min:11|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = new Profesi();
            $data->nama_profesi = $request->namaprofesi;
            $data->id_profesi = Session::get('id');
            $data->alamat = $request->address;
            $data->nohp = $request->nohp;
            $data->save();
            Session::put('nama_profesi', $data->nama_profesi);
            Session::put('id_profesi', $data->id);
            return redirect('/')->with('alert', 'berhasil mendaftar profesi');
        }
    }
}
