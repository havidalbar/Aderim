<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Progres Orderan Anda</b>
</div>
<div
    style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;padding:30px 20px 30px 20px;color:#4d4d4d">
    <div class="ui container center aligned">
        <i class="shopping cart icon teal huge"></i>
        <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum melakukan pemesanan :(</b></div>
        <div style="font-size:20px;margin-top:15px">Yuk lakukan pemesanan sekarang...</div>
    </div>
    @if(count($histories)>0)
    <div style="font-size:20px">
        <b>Silahkan pilih salah satu orderan yang ingin anda lihat progres pengerjaannya</b>
    </div>
    <div class="ui stackable three doubling link special cards" style="margin-top:10px">
        @for($i = 0; $i < count($histories); $i++) 
        <?php
            $fotos = explode(" ", $histories[$i]->url_gambar);
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
                <img src="{{asset($fotos[count($fotos)-1])}}" style="object-fit:cover;height:250px">
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
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    {{$items[$i]->daerah}}
                </div>
            </div>            
        </div>
        @endfor    
    </div>
    @endif
</div>