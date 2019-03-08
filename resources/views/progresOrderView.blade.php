@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')

<div class="luarhistory">

    <div class="boxluarhistory">

        <h2>Progres Order</h2>
        @for($i = 0; $i < count($orderProgres); $i++)
        <?php
        $fotos = explode(" ", $orderProgres[$i]->url_gambar);
        ?>
        <div class="kotakhistory">

            <div class="iconhistory">
                <div class="tatahistory">
                    <h3 style="margin-bottom: 5px;">{{$orders[$i]->namaProject}}</h3>
                    <div class="iconhistory">
                        <div>
                            <div style="padding-bottom: 5px">
                                <p>Status Pemesanan :</p>
                                <p2>{{$orderProgres[$i]->status}}</p2>
                            </div>
                            <div style="padding-bottom: 5px">
                                <p>profesi :</p>
                            <p2>{{$profesis[$i]->nama_profesi}}</p2>
                            </div>
                        </div>
                        </div>
                        <div class="keteranganhistory">
                            <div style="padding-bottom: 5px;">
                                <p>Catatan Untuk Penjual :</p>
                                <p2>{{$orderProgres[$i]->pesan}}</p2>
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
