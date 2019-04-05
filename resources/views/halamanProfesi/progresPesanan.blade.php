@extends (\Session::has('username') ? 'layouts.cobanavLogin' : 'layouts.cobanav')
@section('title', 'Informasi Profesi | Aderim')

@section('content')
<div class="ui container" style="margin-top:86px;margin-bottom:86px">
    <div class="ui stackable grid">
        <div class="four wide column">
            <div
                style="border:4px solid #4b8991;border-radius:5px;background-color:#f8f8f8;padding:40px 30px 40px 30px">
                <img class="ui circular centered image" src="{{asset(Session::get('foto_profesi'))}}"
                    style="width:150px;height:150px;object-fit:cover;border:5px solid #4b8991;padding:3px">
                <div
                    style="text-align:center;line-height:1.5;font-size:22px;margin-top:20px;margin-bottom:20px;color:#4d4d4d">
                    <b>{{Session::get('nama_profesi')}}</b>
                </div>
                <div class="ui divider" style="margin-top:10px;margin-bottom:20px"></div>
                <div class="ui secondary vertical pointing fluid menu" style="color:#4d4d4d;font-size:17px">
                    <a class="item" data-tab="profil-profesi">
                        Profil Profesi
                    </a>
                    <a class="item" data-tab="kumpulan-proyek">
                        Kumpulan Proyek
                    </a>
                    <a class="item" data-tab="pesanan-proyek">
                        Pesanan Proyek
                    </a>
                    <a class="active item" data-tab="progres-pesanan">
                        Progres Pesanan Proyek
                    </a>
                </div>
                <div class="ui divider" style="margin-top:20px"></div>
            </div>
        </div>
        <div class="twelve wide column" style="padding-left:30px">
            <div class="ui tab" data-tab="profil-profesi">
                @include('halamanProfesi.tabProfilProfesi')
            </div>
            <div class="ui tab" data-tab="kumpulan-proyek">
                @include('halamanProfesi.tabKumpulanProyek')
            </div>
            <div class="ui tab" data-tab="pesanan-proyek">
                @include('halamanProfesi.tabPesananProyek')
            </div>
            <div class="ui active tab" data-tab="progres-pesanan">
                @include('halamanProfesi.tabProgresPesanan')
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection