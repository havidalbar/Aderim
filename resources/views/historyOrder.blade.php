@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="container" style="border:2px solid black; background-color: #faf9f9;">
    <div class="row">
        <h2 class="text-center light bold">HISTORY TRANSAKSI</h2>
        @for($i = 0; $i < count($histories); $i++)
        <?php
        $fotos = explode(" ", $histories[$i]->url_gambar);
        ?>
        <div class="col-sm-10" style="display:inline-block; width:100%; height:auto; border-bottom: 2px solid black; margin-top: 20px;">
            <center><img src="{{$items[$i]->namagambar}}" class="img-responsive center" width="600"></center>
            <center><p><br></p><h3>{{ $items[$i]->namaProject}}</h3></center>
            <details>
                <summary>Status</summary>
                <p>{{$histories[$i]->status}}</p>
            </details>
            <details>
                <summary>Profesi</summary>
                <p>{{$profesis[$i]->nama_profesi}}</p>
            </details>
            <details>
                <summary>Total harga</summary>
                <p>Rp.{{ number_format($items[$i]->estimasi,0,",",".")}}</p>
            </details>
            <details>
                <summary>Deskripsi Pesanan Pembeli</summary>
                <center><p class="text-justify">{{$histories[$i]->pesan}}</p></center>
            </details>

            <center><h3>Desain</h3></center>
            <br>
            <center>
                <div class="col-sm" style="padding-bottom: 20px;">
                    @for($j=0; $j< count($fotos); $j++)
                    <img src="/{{$fotos[$j]}}" width="100" height="80" style="border:2px solid black; margin: 1px; padding: 2px;">
                    @endfor
                </div>
            </center>
        </div>
        @endfor
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection