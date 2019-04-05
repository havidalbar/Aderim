<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Riwayat Orderan Anda</b>
</div>
<div style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;color:#4d4d4d">
    <div class="ui borderless inverted huge stackable menu" style="background-color:#4b8991;border-radius:0px">
        <a class="active item" data-tab="dalam-pengerjaan" style="font-size:17px;color:white">
            <b>Dalam Pengerjaan</b>
        </a>
        <a class="item" data-tab="selesai" style="font-size:17px;color:white">
            <b>Selesai</b>
        </a>
        <a class="item" data-tab="dibatalkan" style="font-size:17px;color:white">
            <b>Dibatalkan</b>
        </a>
    </div>
    <div class="ui active tab" data-tab="dalam-pengerjaan" style="padding:20px 20px 30px 20px">
    @if(count($histories2)<=0)
    <div class="ui container center aligned">
        <i class="shopping cart icon teal huge"></i>
        <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum melakukan pemesanan :(</b></div>
        <div style="font-size:20px;margin-top:15px">Yuk lakukan pemesanan sekarang...</div>
    </div>
    @endif
        <div class="ui stackable three doubling link special cards" style="margin-top:10px">
            @for($i = 0; $i < count($histories2); $i++)
            <?php
            $fotos2 = explode(" ", $histories2[$i]->url_gambar);
            ?>
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <i class="teal clock outline huge icon"></i>
                            <div style="font-size:22px;margin-top:10px;margin-bottom:20px">
                                Dalam Pengerjaan
                            </div>
                            <div class="ui inverted medium button">Lihat</div>
                        </div>
                    </div>
                    <img src="{{asset($fotos2[count($fotos2)-1])}}" style="object-fit:cover;height:250px">
                </div>
                <div class="content">
                    <div class="header">{{ $items2[$i]->namaProject}}</div>
                    <div class="meta" style="margin-top:5px">
                        <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                            {{ $items2[$i]->category}}
                        </span>
                    </div>
                    <div class="description">
                        {{ $items[$i]->deskripsi}}
                    </div>
                </div>
                <div class="extra content">
                    <div>
                        <i class="user circle teal icon"></i>
                        {{$profesis[$i]->nama_profesi}}
                    </div>
                    <div style="margin-top:5px">
                        <i class="map pin teal icon"></i>
                        {{ $items[$i]->daerah}}
                    </div>
                </div>
            </div>
            @endfor
            
        </div>
    </div>
    <div class="ui tab" data-tab="selesai" style="padding:20px 20px 30px 20px">
    @if(count($histories3)<=0)
    <div class="ui container center aligned">
        <i class="shopping cart icon teal huge"></i>
        <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum melakukan pemesanan :(</b></div>
        <div style="font-size:20px;margin-top:15px">Yuk lakukan pemesanan sekarang...</div>
    </div>
    @endif
        <div class="ui stackable three doubling link special cards" style="margin-top:10px">
            @for($i = 0; $i < count($histories3); $i++)
            <?php
            $fotos3 = explode(" ", $histories3[$i]->url_gambar);
            ?>
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <i class="green check circle outline huge icon"></i>
                            <div style="font-size:22px;margin-top:10px;margin-bottom:20px">
                                Selesai
                            </div>
                            <div class="ui inverted medium button">Lihat</div>
                        </div>
                    </div>
                    <img src="{{asset($fotos3[count($fotos3)-1])}}" style="object-fit:cover;height:250px">
                </div>
                <div class="content">
                    <div class="header">{{ $items3[$i]->namaProject}}</div>
                    <div class="meta" style="margin-top:5px">
                        <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                            {{ $items3[$i]->category}}
                        </span>
                    </div>
                    <div class="description">
                        {{ $items3[$i]->deskripsi}}
                    </div>
                </div>
                <div class="extra content">
                    <div>
                        <i class="user circle teal icon"></i>
                        {{$profesis[$i]->nama_profesi}}
                    </div>
                    <div style="margin-top:5px">
                        <i class="map pin teal icon"></i>
                        {{ $items3[$i]->daerah}}
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    <div class="ui tab" data-tab="dibatalkan" style="padding:20px 20px 30px 20px">
    
        <div class="ui stackable three doubling link special cards" style="margin-top:10px">
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <i class="red times circle outline huge icon"></i>
                            <div style="font-size:22px;margin-top:10px;margin-bottom:20px">
                                Dibatalkan
                            </div>
                            <div class="ui inverted medium button">Lihat</div>
                        </div>
                    </div>
                    <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
                </div>
                <div class="content">
                    <div class="header">Rumah Minimalis</div>
                    <div class="meta" style="margin-top:5px">
                        <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                            Rumah
                        </span>
                    </div>
                    <div class="description">
                        Rumah minimalis dengan lingkungan yang sejuk
                    </div>
                </div>
                <div class="extra content">
                    <div>
                        <i class="user circle teal icon"></i>
                        Eka Iqbal Virgiawan
                    </div>
                    <div style="margin-top:5px">
                        <i class="map pin teal icon"></i>
                        Yogyakarta
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <i class="red times circle outline huge icon"></i>
                            <div style="font-size:22px;margin-top:10px;margin-bottom:20px">
                                Dibatalkan
                            </div>
                            <div class="ui inverted medium button">Lihat</div>
                        </div>
                    </div>
                    <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
                </div>
                <div class="content">
                    <div class="header">Rumah Minimalis</div>
                    <div class="meta" style="margin-top:5px">
                        <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                            Rumah
                        </span>
                    </div>
                    <div class="description">
                        Rumah minimalis dengan lingkungan yang sejuk
                    </div>
                </div>
                <div class="extra content">
                    <div>
                        <i class="user circle teal icon"></i>
                        Eka Iqbal Virgiawan
                    </div>
                    <div style="margin-top:5px">
                        <i class="map pin teal icon"></i>
                        Yogyakarta
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>