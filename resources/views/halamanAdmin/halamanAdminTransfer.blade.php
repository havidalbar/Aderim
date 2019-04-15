@extends (\Session::has('username') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Halaman Admin | Konfirmasi Pembayaran')

@section('content')

<div class="ui container" style="margin-top:50px">
    <div class="ui borderless huge stackable secondary pointing menu">
        <a class="active item" data-tab="konfirmasi-pembayaran" style="font-size:17px">
            <b>Konfirmasi Pembayaran</b>
        </a>
        <a class="item" data-tab="pendaftaran-profesi" style="font-size:17px">
            <b>Pendaftaran Profesi</b>
        </a>
    </div>
    <div class="active  ui tab" data-tab="konfirmasi-pembayaran" style="padding:20px 20px 30px 20px">
        @include('halamanAdmin.tabKonfirmasiTransfer')
    </div>
    <div class="ui tab" data-tab="pendaftaran-profesi" style="padding:20px 20px 30px 20px">
        @include('halamanAdmin.tabPendaftaranProfesi')
    </div>
</div>

@include('layouts.footer')
@endsection
