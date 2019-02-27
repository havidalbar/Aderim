<?php
namespace App\Http\Controllers;

use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Profesi;

class UserController extends Controller
{

    public function informasi()
    {
        if (Session::get('/')) {
            if (Session::has('name')) {
                $infos = User::where('name', Session::get('name'))->first();
            } else {
                $infos = User::where('email', Session::get('email'))->first();
            }
            return view('informasiAkun', ['infos' => $infos]);
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
            $data = User::where('name', $email)->first();
        }
        if (!($data == null)) {
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('/', true);

                $dataProfesi = Profesi::where('id_user', $data->id)->first();

                if($dataProfesi != null) {
                    Session::put('nama_profesi', $dataProfesi->nama_profesi);
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
            return view('daftarProfesi');
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
        if($request->fotoprofesi != null) {
            $data = new Profesi();
            $data->url_image = $request->fotoprofesi;
            $data->nama_profesi = $request->nama_profesi;
            $data->alamat = $request->address;
            $data->nohp = $request->nohp;
            $data->job_title = $request->job_title;
            $data->id_user = Session::get('id');
            $data->save();
            Session::put('nama_profesi', $data->nama_profesi);
            Session::put('id', $data->id);
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
