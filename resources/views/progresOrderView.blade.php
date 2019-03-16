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
            <center><h3>{{$items[$i]->namaProject}}</h3></center>
            <br>
            <details open>
                <summary>Status Progres</summary>
                <p>{{$orderProgres[$i]->status}} bulan</p>
            </details>
            <details open>
                <summary>Nama Profesi</summary>
                <p>{{$profesis[$i]->nama_profesi}}</p>
            </details>
            <details>
                <summary>Catatan Dari Profesi</summary>
                <p class="text-justify">{{$orderProgres[$i]->pesan}}</p>
            </details>
            <center><h3>Desain</h3><br></center>
            <div class="container" style="width: 50%;">
                <div class="row">
                    @for($j=0; $j< count($fotos); $j++)
                    <div class="col-lg-6 col-md-6">
                        <div class="box-part text-center">
                            <div class="title">
                                <img src="/{{$fotos[$j]}}" width="200" height="150" style="border:2px solid black; margin: 1px; padding: 2px;">
                            </div>
                            <a href="/{{$fotos[$j]}}" download="namafile"><button class="btn btn-success" style="margin-top: 10px; margin-bottom: 10px;">Download</button></a>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
