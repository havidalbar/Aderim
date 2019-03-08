@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')

<div class="luarhistory">

    <div class="boxluarhistory">

        <h2>History Transaksi</h2>
        @for($i = 0; $i < count($orders); $i++)
        <?php
        $fotos = explode(" ", $orders[$i]->url_gambar);
        ?>
        <div class="kotakhistory">

            <div class="iconhistory">

                <div class="iconimage">
                    <img src={{$items[$i]->namagambar}}>
                </div>
                <div class="tatahistory">
                    <h4><a style="text-decoration: none; color: black;" href ="/progresorder/{{ $orders[$i]->id}}">{{ $items[$i]->namaProject}}</a></h4>
                    <div class="iconhistory">
                        <div>
                            <div style="padding-bottom: 5px">
                                <p>profesi :</p>
                            <p2>{{$profesis[$i]->nama_profesi}}</p2>
                            </div>
                        </div>
                    </div>
                        <div class="keteranganhistory">
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
