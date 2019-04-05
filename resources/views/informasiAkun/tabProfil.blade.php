<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Informasi Akun</b>
</div>
<div
    style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;padding:40px 50px 40px 50px;color:#4d4d4d">
    <div>
        <label style="font-size:22px"><b>Nama Pengguna</b></label>
        <div style="font-size:18px;margin-top:10px">
            {{Session::get('username')}}
        </div>
    </div>
    <div style="margin-top:30px">
        <label style="font-size:22px"><b>Nama Lengkap</b></label>
        <div style="font-size:18px;margin-top:10px">
            {{Session::get('name')}}
        </div>
    </div>
    <div style="margin-top:30px">
        <label style="font-size:22px"><b>Alamat Email</b></label>
        <div style="font-size:18px;margin-top:10px">
            {{Session::get('email')}}
        </div>
    </div>
    <div style="margin-top:30px">
        <label style="font-size:22px"><b>Nomor Telepon</b></label>
        <div style="font-size:18px;margin-top:10px">
            {{$infos->nohp}}
        </div>
    </div>
    <div style="margin-top:30px">
        <label style="font-size:22px"><b>Alamat Tempat Tinggal</b></label>
        <div style="font-size:18px;margin-top:10px">
            {{$infos->address}}
        </div>
    </div>
    <div style="margin-top:30px">
        <div style="font-size:16px;margin-top:10px">
            Bergabung dengan Aderim sejak <b>{{$infos->created_at}}</b>
        </div>
    </div>
</div>