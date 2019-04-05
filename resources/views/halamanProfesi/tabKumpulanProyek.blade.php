<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Kumpulan Proyek Anda</b>
</div>
<div
    style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;padding:30px 20px 30px 20px;color:#4d4d4d">
    <div style="font-size:20px">
        <b>Silahkan pilih salah satu proyek yang ingin anda lihat atau ubah detail proyeknya</b>
    </div>
    <div class="ui stackable three doubling link special cards" style="margin-top:10px">
        @for($i = 0; $i < count($items); $i++)
        <?php
            $fotos= explode(" ", $items[$i]->namagambar);
            ?>
        <div class="card">
            <div class="blurring dimmable image">
                <div class="ui dimmer">
                    <div class="content">
                        <span>
                            <button class="ui inverted medium button">Lihat</button>
                        </span>
                        <span>
                            <button class="ui inverted medium button">Ubah</button>
                        </span>
                    </div>
                </div>
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
                    {{$profesi->nama_profesi}}
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    {{$items[$i]->daerah}}
                </div>
            </div>
        </div>
        @endfor
        <!-- Card untuk tambah proyek -->
        <div class="card">
            <div class="blurring dimmable segments" style="height:100%;padding:190px 20px 190px 20px">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="center">
                            <a href="/tambah-project"></a>
                                <button class="ui inverted button">Tambah Proyek</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content center aligned">
                    <div class="meta">
                        <i class="icon huge plus"></i>
                        <div style="font-size:24px;margin-top:20px"><b>Tambah Proyek</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>