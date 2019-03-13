@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="container" style="border:2px solid black">
    <div class="row">
        <h2 class="text-center light bold">PROGRES ORDER</h2>
        @for($i = 0; $i < count($orderProgres); $i++)
        <?php
        $fotos = explode(" ", $orderProgres[$i]->url_gambar);
        ?>
        <div class="col-sm-10" style="display:inline-block; width:100%; height:auto; border-bottom: 2px solid black; margin-top: 20px;">
            <center><h3>{{$orders[$i]->namaProject}}</h3></center>
            <br>
            <details open>
                <summary>Status Pemesanan</summary>
                <p>{{$orderProgres[$i]->status}} bulan</p>
            </details>
            <details open>
                <summary>Profesi</summary>
                <p>{{$profesis[$i]->nama_profesi}}</p>
            </details>
            <details>
                <summary>Catatan Untuk Penjual</summary>
                <p class="text-justify">{{$orderProgres[$i]->pesan}}</p>
            </details>            
            <center>
                <h3>Desain</h3>
                <br>
                <div class="col-sm" style="padding-bottom: 20px;">
                    @for($j=0; $j< count($fotos); $j++)
                    <img src="/{{$fotos[$j]}}" width="200" height="150" style="border:2px solid black; margin: 1px; padding: 2px;">
                    @endfor
                </div>
            </center>
        </div>
        @endfor
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
