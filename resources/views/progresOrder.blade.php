@extends (\Session::has('username') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="container" style="border:2px solid black">
    <div class="row">

        <h2 class="text-center light bold">PROGRES ORDER</h2>
        @for($i = 0; $i < count($orders); $i++) <?php
        $fotos = explode(" ", $orders[$i]->url_gambar);
        ?> <div class="col-sm-10"
            style="display:inline-block; width:100%; height:auto; border-bottom: 2px solid black; margin-top: 20px;">
            <center><img src="{{$items[$i]->namagambar}}" class="img-responsive center" width="600"></center>
            <center>
                <p><br></p>
            </center>
            <center>
                <h3>{{ $items[$i]->namaProject}}</h3>
            </center>
            <br>
            <center><a href="/progresorder/{{ $orders[$i]->id}}"><button class="btn btn-primary">LIHAT PROGRES DARI
                        PROJECT INI</button></a></center>
            <br>
            @if(($orders[$i]->statusLagi===6 && $orders[$i]->id_transaksi2==null) || ($orders[$i]->statusLagi==12 &&
            $orders[$i]->id_transaksi3==null)
            || ($orders[$i]->statusLagi===18 && $orders[$i]->id_transaksi4==null)||($orders[$i]->status=="Pembayaran tidak terkonfirmasi"))
            <form action='/bayarLagi?statusLagi={{$orders[$i]->statusLagi}}&id={{$orders[$i]->id}}' method="post"
                style="margin-left: 20px;">
                {{csrf_field()}}
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>bayar bro</button>
            </form>
            @endif
            <details>
                <summary>Status</summary>
                <p>{{$orders[$i]->status}}</p>
            </details>
            @if($orders[$i]->statusLagi!=0)
            <details>
                <summary>Status Lagi</summary>
                <p>{{$orders[$i]->statusLagi}} Bulan</p>
            </details>
            @elseif($orders[$i]->status=="Order sedang diproses")
            {{-- @if($orderProgres->statusLagi!=null)
            <details>
                    <summary>Status Lagi</summary>
                    <p>{{$orderProgres->status}} Bulan</p>
            </details>
            @endif --}}
            @endif
            <details>
                <summary>Nama Profesi</summary>
                <p>{{$profesis[$i]->nama_profesi}}</p>
            </details>
            <center>
                <h3>Desain</h3><br>
            </center>
            <div class="container" style="width: 50%;">
                <div class="row">
                    @for($j=0; $j< count($fotos); $j++) <div class="col-lg-6 col-md-6">
                        <div class="box-part text-center">
                            <div class="title">
                                <img src="/{{$fotos[$j]}}" width="200" height="150"
                                    style="border:2px solid black; margin: 1px; padding: 2px;">
                            </div>
                            <a href="/{{$fotos[$j]}}" download="namafile"><button class="btn btn-success"
                                    style="margin-top: 10px; margin-bottom: 10px;">Download</button></a>
                        </div>
                </div>
                @endfor
            </div>
    </div>
    <!--             <center>
                <h3>Desain</h3>
                <br>
                <div class="col-sm" style="padding-bottom: 20px;">
                    @for($j=0; $j< count($fotos); $j++)
                    <img src="/{{$fotos[$j]}}" width="100" height="80" style="border:2px solid black; margin: 1px; padding: 2px;">
                    @endfor
                </div>
            </center> -->
</div>
@endfor
</div>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection