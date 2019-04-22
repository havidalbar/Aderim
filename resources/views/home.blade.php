@extends (\Session::has('username') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Beranda | Aderim')

@section('content')
<div class="ui container fluid" style="background-color:#273d40">
    <div class="ui container center aligned">
        <div class="ui three row stackable grid">
            <div class="column">
                <div class="row">
                    <h1 style="font-size:36px;color:white;margin-top:20px">Wujudkan Rumah Impian Anda</h1>
                </div>
                <div class="ui two column stackable grid" style="margin-top:20px">
                    <div class="row">
                        <div class="column">
                            <img src="{{asset('home.png')}}" class="ui big centered image">
                        </div>
                        <div class="column middle aligned">
                            <div class="ui two row grid">
                                <div class="column">
                                    <div class="row">
                                        <h2 class="ui header" style="color:white">Apa Itu Aderim?</h2>
                                        <p style="color:white;font-size:16px">Aderim merupakan merupakan singkatan dari
                                            Arsitek Desain Rumah
                                            Impian. Aderim merupakan pilihan yang tepat bagi
                                            masyarakat untuk membangun, mendesain, maupun merenovasi rumah, hotel, dan
                                            apartemen.
                                        </p>
                                    </div>
                                    <div class="row" style="margin-top:30px">
                                        <h2 class="ui header" style="color:white">Berbagai Desain Arsitektur</h2>
                                        <p style="color:white;font-size:16px">Selain itu, di Aderim kamu juga bisa
                                            mendaftar sebagai arsitektur atau desain interior, lho!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    @if(!Session::has('username'))
                    <a href="/register">
                        <div class="ui huge animated fade button teal" tabindex="0"
                            style="border-radius:5px;margin-bottom:20px;color:white">
                            <div class="visible content">Buat Rumah Impian?</div>
                            <div class="hidden content">
                                Daftar Sekarang
                            </div>
                        </div>
                    </a>
                    @else
                    <a href="#cari">
                        <div class="ui huge animated fade button teal" tabindex="0"
                            style="border-radius:5px;margin-bottom:20px;color:white">
                            <div class="visible content">Buat Rumah Impian?</div>
                            <div class="hidden content">
                                Pesan Sekarang
                            </div>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ui container" style="margin-top:60px;margin-bottom:40px">
    <div style="font-size:36px;text-align:center">
        <p>Apa Keuntungan Menggunakan Aderim?</p>
    </div>
    <div class="ui divider" style="margin:40px 0px 20px 0px"></div>
    <div style="font-size:32px;margin-bottom:10px">
        <p>Bagi Profesi</p>
    </div>
    <div class="ui middle aligned stackable grid">
        <div class="seven wide left floated column">
            <img src="{{asset('arsitek2.jpg')}}" class="ui large rounded image">
        </div>
        <div class="nine wide column">
            <div class="ui middle aligned stackable grid">
                <div class="two wide left floated column">
                    <i class="file image huge icon"></i>
                </div>
                <div class="fourteen wide left floated column" style="padding-left:20px">
                    <h2>Proyek</h2>
                    <p style="font-size:18px">Memasarkan proyek profesi untuk dilihat semua pengguna Aderim</p>
                </div>
            </div>
            <div class="ui middle aligned stackable grid">
                <div class="two wide left floated column">
                    <i class="handshake huge icon"></i>
                </div>
                <div class="fourteen wide left floated column" style="padding-left:20px">
                    <h2>Kesepakatan</h2>
                    <p style="font-size:18px">Menjalin kesepakatan jasa antar profesi dengan pelanggan</p>
                </div>
            </div>
            <div class="ui middle aligned stackable grid">
                <div class="two wide left floated column">
                    <i class="money bill alternate huge icon"></i>
                </div>
                <div class="fourteen wide left floated column" style="padding-left:20px">
                    <h2>Keuntungan</h2>
                    <p style="font-size:18px">Mendapatkan penghasilan dari proyek yang dikerjakan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="ui divider" style="margin:40px 0px 20px 0px"></div>
    <div style="font-size:32px;margin-bottom:10px;text-align:right">
        <p>Bagi Pelanggan</p>
    </div>
    <div class="ui middle aligned stackable grid">
        <div class="nine wide column">
            <div class="ui middle aligned stackable grid">
                <div class="two wide left floated column">
                    <i class="search huge icon"></i>
                </div>
                <div class="fourteen wide left floated column" style="padding-left:20px">
                    <h2>Menemukan</h2>
                    <p>Memasarkan proyek profesi untuk dilihat semua pengguna Aderim</p>
                </div>
            </div>
            <div class="ui middle aligned stackable grid">
                <div class="two wide left floated column">
                    <i class="eye huge icon"></i>
                </div>
                <div class="fourteen wide left floated column" style="padding-left:20px">
                    <h2>Pengawasan</h2>
                    <p>Memasarkan proyek profesi untuk dilihat semua pengguna Aderim</p>
                </div>
            </div>
            <div class="ui middle aligned stackable grid">
                <div class="two wide left floated column">
                    <i class="shield alternate huge icon"></i>
                </div>
                <div class="fourteen wide left floated column" style="padding-left:20px">
                    <h2>Keamanan</h2>
                    <p>Memasarkan proyek profesi untuk dilihat semua pengguna Aderim</p>
                </div>
            </div>
        </div>
        <div class="seven wide right floated column">
            <img src="{{asset('customer.jpg')}}" class="ui large rounded right floated image">
        </div>
    </div>
</div>

<div id="cari" class="ui container fluid">
    <div class="ui divider"></div>
    <div class="ui container" style="margin-top:30px">
        <div class="ui center aligned container" style="font-size:36px">
            <p>Mulai Membuat Rumah Impian?</p>
        </div>
        <div class="ui center aligned container" style="margin-top:10px;font-size:22px">
            <p>Silahkan cari hingga mendapatkan desain arsitek terbaik pilihan anda</p>
        </div>
        <form class="ui fluid action input" style="margin-top:20px;font-size:18px;padding-left:60px;padding-right:60px"
            method="get" action="/get-search">
            <input type="text" name="cari" placeholder="Cari desain rumah impian yang ingin anda buat...">
            <div class="ui button teal">Cari</div>
        </form>
    </div>

    <div class="ui container" style="margin-top:30px">
        <div class="ui four stackable doubling link cards">
            @for($i=0;$i<(count($items)> 10 ? 10 : count($items));$i++)
                <?php
                $fotos = explode(" ", $items[$i]->namagambar);
                ?>
                <div class="card" onclick="$('.ui.fullscreen.modal.detail.<?php echo $i ?>').modal('show');">
                    <div class="image">
                        <img src="{{asset($fotos[0])}}" style="object-fit:cover;height:250px">
                    </div>
                    <div class="content">
                        <div class="header">{{$items[$i]->namaProject}}</div>
                        <div class="meta" style="margin-top:5px">
                            <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                                {{$items[$i]->category}}
                            </span>
                        </div>
                        <div class="description">
                            {{$items[$i]->deskripsi}}
                        </div>
                    </div>
                    <div class="extra content">
                        <div>
                            <i class="user circle teal icon"></i>
                            {{$profesis[$i]->nama_profesi}}
                        </div>
                        <div style="margin-top:5px;display:flex;flex-direction:row;align-items: center">
                            <div><i class="map marker alternate teal icon"></i></div>
                            <div>{{$items[$i]->daerah}}</div>
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
                                    <img class="ui circular image" src="{{asset($profesis[$i]->foto)}}"
                                        style="width:80px;height:80px;object-fit:cover">
                                </div>
                                <div class="thirteen wide column">
                                    <div style="font-size:22px"><b>{{$profesis[$i]->nama_profesi}}</b></div>
                                    <div style="font-size:17px">{{$profesis[$i]->job_title}}</div>
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div class="ui stackable grid">
                                <div class="twelve wide column">
                                    <div style="font-size:22px">
                                        <b>{{$items[$i]->namaProject}}</b>
                                    </div>
                                    <div style="margin-top:5px;display:flex;flex-direction:row;align-items: center">
                                        <div><i class="map marker alternate teal icon"></i></div>
                                        <div style="font-size:17px">{{$items[$i]->daerah}}</div>
                                    </div>
                                </div>
                                <div class="four wide right aligned middle aligned column">
                                    <span
                                        style="border:2px solid #d4d4d5;border-radius:4px;padding:5px 15px 5px 15px;font-size:17px">
                                        {{$items[$i]->category}}
                                    </span>
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div>
                                <div style="font-size:17px"><b>Deskripsi</b></div>
                                <div style="font-size:16px">
                                    {{$items[$i]->deskripsi}}
                                </div>
                            </div>
                            <div style="margin-top:10px">
                                <div style="font-size:17px"><b>Spesifikasi</b></div>
                                <div style="font-size:16px">
                                    {{$items[$i]->spesifikasi}}
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div class="ui container fluid" style="text-align:right">
                                <div style="font-size:22px"><b>Biaya Proyek</b></div>
                                <div style="color:teal;font-size:20px">
                                    <b>
                                        <span>Rp </span>
                                        <span>{{number_format(($items[$i]->estimasi),0,",",".")}}</span>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <button class="ui negative button">
                        Pilih Lagi
                    </button>
                    <button class="ui positive button"
                        onclick="window.location.href='/project/{{$items[$i]->id}}/order'">
                        Pesan Proyek
                    </button>
                </div>
        </div>
        <!--Akhir Modal Detail -->
        @endfor
    </div>
    <div class="ui center aligned container" style="margin-top:40px">
        <a href="#">
            <div class="ui vertical animated large teal button" style="width:150px">
                <div class="hidden content">Lihat Semua</div>
                <div class="visible content">
                    <i class="angle double down icon"></i>
                </div>
            </div>
        </a>
    </div>
</div>
</div>





@include('layouts.footer')
@endsection