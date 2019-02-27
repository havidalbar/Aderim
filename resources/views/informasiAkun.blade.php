@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')
@section('content')
<div class="kotakinformasiakun">
    <div class="informasiakun">
    <center><p style="color:white;margin-top:10px;margin-bottom:10px;">Informasi Akun</p></center>
    </div>
    <div class="infoakun">
        <div style="margin-left:20px;">
            <p>Nama</p>
            <p>Alamat</p>
            <p>Email</p>
            <p>No HP</p>
            <p>Bergabung pada Tahun</p>
        </div>
        <div style="margin-left:70px;">
            <p>{{$infos->name}}</p>
            <p>{{$infos->address}}</p>
            <p>{{$infos->email}}</p>
            <p>{{$infos->nohp}}</p>
            <p>{{$infos->created_at}}</p>
        </div>
    </div>
</div>
@endsection
