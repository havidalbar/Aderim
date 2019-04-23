@extends (\Session::has('username') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Halaman Admin | Pendaftaran Profesi')

@section('content')
@if(\Session::has('alert'))        
    <div style="position:absolute;right:15px;top:15px;max-width:400px">
        <div class="ui negative message alert" style="display:none">                        
            {{Session::get('alert')}}         
        </div>  
    </div>                  
@elseif(\Session::has('alert-success'))
    <div style="position:absolute;right:15px;top:15px;max-width:400px">
        <div class="ui positive message alert" style="display:none">                        
            {{Session::get('alert-success')}}         
        </div>  
    </div>  
@endif
<div class="ui container" style="margin-top:50px">
    <div class="ui borderless huge stackable secondary pointing menu">
        <a class="item" data-tab="konfirmasi-pembayaran" style="font-size:17px">
            <b>Konfirmasi Pembayaran</b>
        </a>
        <a class="active item" data-tab="pendaftaran-profesi" style="font-size:17px">
            <b>Pendaftaran Profesi</b>
        </a>
    </div>
    <div class="ui tab" data-tab="konfirmasi-pembayaran" style="padding:20px 20px 30px 20px">
        @include('halamanAdmin.tabKonfirmasiTransfer')
    </div>
    <div class="active ui tab" data-tab="pendaftaran-profesi" style="padding:20px 20px 30px 20px">
        @include('halamanAdmin.tabPendaftaranProfesi')
    </div>
</div>

@include('layouts.footer')
@endsection
