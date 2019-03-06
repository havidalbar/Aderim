@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')

<div class="luarhistory">

    <div class="boxluarhistory">

        <h2>History Transaksi</h2>
        @for($i = 0; $i < count($histories); $i++)
        <?php
        $fotos = explode(" ", $histories[$i]->url_gambar);
        ?>
        <div class="kotakhistory">

            <div class="iconhistory">

                <div class="iconimage">
                    <img src={{$items[$i]->namagambar}}>
                </div>
                <div class="tatahistory">
                    <h3 style="margin-bottom: 5px;">{{$items[$i]->namaProject}}</h3>
                    <div class="iconhistory">
                        <div>
                            <div style="padding-bottom: 5px">
                                <p>Status Pemesanan :</p>
                                <p2>{{$histories[$i]->status}}</p2>
                            </div>
                            <div style="padding-bottom: 5px">
                                <p>profesi :</p>
                            <p2>{{$profesis[$i]->nama_profesi}}</p2>
                            </div>
                        </div>
                            <div style="padding-bottom: 5px">
                                <p>Total Harga :</p>
                                <p2>Rp {{ number_format($items[$i]->estimasi,0,",",".")}}</p2>
                            </div>
                        </div>
                        <div class="keteranganhistory">
                            <div style="padding-bottom: 5px;">
                                <p>Catatan Untuk Penjual :</p>
                                <p2>{{$histories[$i]->pesan}}</p2>
                            </div>
                            <div class="" style="padding-bottom: 5px">
                                <p>Design :</p>
                                <div class="tinyimagehistory">
                                    @for($j=0; $j<count($fotos); $j++)
                                    <img src="/{{$fotos[$j]}}" style="width: 35px; height: 35px; margin: 3px;">
                                @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @endfor

    </div>

</div>

@endsection
