@extends ('layouts.cobanavLogin')
@section('title', 'Pilih Metode Pembayaran | Aderim')

@section('content')
<button class="ui teal button" onclick="$('.ui.small.modal.belum.progres').modal('show')">Cek</button>

<!-- Modal belum ada progres -->
<div class="ui small modal belum progres">
    <div class="header">
        Belum Ada Progres
    </div>
    <div class="content">
    <div class="ui container center aligned">
            <i class="sync alternate icon teal massive"></i>
            <div style="font-size:24px;margin-top:15px"><b>Oops, progres pengerjaan proyek anda belum tersedia...</b></div>
            <div style="font-size:19px">Harap tunggu beberapa saat sampai profesi mengirimkan progres pengerjaan proyek anda</div>
        </div>               
    </div>
    <div class="actions">
        <button class="ui positive button">
            Oke
        </button>                          
    </div>
</div>
@include('layouts.cobafooter')
@endsection