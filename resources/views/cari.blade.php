@extends (\Session::has('username') ? 'layouts.cobanavLogin' : 'layouts.cobanav')
@section('title', 'Pencarian | Aderim')

@section('content')

<div class="ui container" style="margin-top:30px">
    <div style="margin-top:10px;font-size:24px">
        Silahkan cari hingga mendapatkan desain arsitek terbaik pilihan anda
    </div>
    <div style="margin-top:10px;margin-bottom:25px;font-size:17px">
        Terdapat 100 desain untuk <b>'{{$key}}'</b> di Aderim
    </div>
</div>

<div class="ui divider"></div>

<div class="ui container">
    <form action="/get-urut" method="get">
        <div class="ui checkbox">
            <input type="checkbox" name="urutkan" value="baru">
            <label>Desain Terbaru</label>
        </div>
        <div class="ui checkbox">
            <input type="checkbox" name="urutkan" value="tinggi">
            <label>Harga Tertinggi</label>
        </div>
        <div class="ui checkbox">
            <input type="checkbox" name="urutkan" value="rendah">
            <label>Harga Terendah</label>
        </div>
    </form>
</div>

<div class="ui container" style="margin-top:30px">
    @if(count($items) <= 0) <!-- Kalo gak ketemu -->
        <div class="ui container center aligned">
            <i class="search icon teal huge"></i>
            <div style="font-size:24px;margin-top:15px"><b>Oops, desain tidak ditemukan :(</b></div>
            <div style="font-size:18px;margin:15px 0px 15px 0px">
                Hasil pencarian untuk <b>'{{$key}}'</b> tidak ditemukan.
                Silahkan coba keyword lainnya
            </div>
        </div>
        </div>
        @elseif(count($items) > 0)
        <!-- Kalo ketemu -->
        <div class="ui four stackable doubling link cards">
            @for($i=0;$i < count($items);$i++) <?php
        $fotos = explode(" ", $items[$i]->namagambar);
        ?> <div class="card" onclick="$('.ui.fullscreen.modal.detail.<?php echo $i ?>').modal('show');">
                <div class="image">
                    <img src="{{asset($fotos[0])}}" style="object-fit:cover;height:250px">
                </div>
                <div class="content">
                    <div class="header">{{ $items[$i]->namaProject}}</div>
                    <div class="meta" style="margin-top:5px">
                        <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                            {{ $items[$i]->category}}
                        </span>
                    </div>
                    <div class="description">
                        {{ $items[$i]->deskripsi}}
                    </div>
                </div>
                <div class="extra content">
                    <div>
                        <i class="user circle teal icon"></i>
                        {{ $profesis[$i]->nama_profesi}}
                    </div>
                    <div style="margin-top:5px">
                        <i class="map pin teal icon"></i>
                        {{ $items[$i]->daerah}}
                    </div>
                </div>
        </div>
        <!-- Modal Detail -->
        <div class="ui fullscreen modal detail <?php echo $i ?>">
            <div class="content">
                <div class="ui stackable grid">
                    <div class="nine wide column">
                        <div class="ui stackable grid" style="height:100%">
                            <div class="twelve wide middle aligned column">
                                <div class="ui one stackable cards">
                                    <div class="card">
                                        <div class="image">
                                            <img class="ui big image" src="/{{$fotos[0]}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="four wide middle aligned column">
                                @for($j=0; $j < count($fotos); $j++) <div class="ui one stackable cards">
                                    <div class="card">
                                        <div class="image">
                                            <img src="/{{$fotos[$j]}}" style="height:145px;object-fit:cover">
                                        </div>
                                    </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="seven wide column">
                    <div class="ui divider"></div>
                    <div class="ui grid">
                        <div class="one wide middle aligned column">
                            <i class="info circle large teal icon"></i>
                        </div>
                        <div class="fifteen wide column">
                            <div style="font-size:22px;color:teal"><b>Detail Proyek</b></div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui stackable grid">
                        <div class="three wide column">
                            <img class="ui circular image" src="{{asset('arsitek2.jpg')}}"
                                style="width:80px;height:80px;object-fit:cover">
                        </div>
                        <div class="thirteen wide column">
                            <div style="font-size:22px"><b>Arsitek Java</b></div>
                            <div style="font-size:17px">Arsitektur</div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui stackable grid">
                        <div class="twelve wide column">
                            <div style="font-size:22px">
                                <b>Rumah Minimalis</b>
                            </div>
                        </div>
                        <div class="four wide middle aligned column">
                            <button class="ui button basic"><b>Rumah</b></button>
                        </div>
                    </div>
                    <div>
                        <span><i class="map pin teal icon"></i></span>
                        <span style="font-size:18px">Surabaya</span>
                    </div>
                    <div class="ui divider"></div>
                    <div>
                        <div style="font-size:16px"><b>Deskripsi</b></div>
                        <div style="font-size:15px">
                            Rumah minimalis dengan lingkungan yang sejuk Rumah minimalis dengan lingkungan yang
                            sejuk
                            Rumah
                            minimalis dengan lingkungan yang sejuk dan sejuk
                        </div>
                    </div>
                    <div style="margin-top:10px">
                        <div style="font-size:16px"><b>Spesifikasi</b></div>
                        <div style="font-size:15px">
                            Rumah minimalis dengan lingkungan yang sejuk Rumah minimalis dengan lingkungan yang
                            sejuk
                            Rumah
                            minimalis dengan lingkungan yang sejuk dan sejuk Rumah minimalis dengan lingkungan
                            yang
                            sejuk Rumah minimalis dengan lingkungan yang sejuk
                            Rumah
                            minimalis dengan lingkungan yang sejuk dan sejuk Rumah minimalis dengan lingkungan
                            yang
                            sejuk Rumah minimalis dengan lingkungan yang sejuk
                            Rumah
                            minimalis dengan lingkungan yang sejuk dan sejuk
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui container fluid" style="text-align:right">
                        <div style="font-size:22px"><b>Biaya Proyek</b></div>
                        <div style="color:teal;font-size:20px">
                            <b>
                                <span>Rp </span>
                                <span>400.000.000</span>
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <a href="#">
                <button class="ui negative button">
                    Pilih Lagi
                </button>
                <button class="ui positive button">
                    Pesan Proyek
                </button>
            </a>
        </div>
</div>
<!--Akhir Modal Detail -->
@endfor
</div>
</div>
@endif

@include('layouts.cobafooter')
@endsection