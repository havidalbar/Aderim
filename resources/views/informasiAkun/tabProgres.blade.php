<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Progres Orderan Anda</b>
</div>
<div
    style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;padding:30px 20px 30px 20px;color:#4d4d4d">
    @if(count($histories)<=0)
    <div class="ui container center aligned">
        <i class="shopping cart icon teal huge"></i>
        <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum melakukan pemesanan :(</b></div>
        <div style="font-size:20px;margin-top:15px">Yuk lakukan pemesanan sekarang...</div>
    </div>
    @elseif(count($histories)>0)
        <div style="font-size:20px">
            <b>Silahkan pilih salah satu orderan yang ingin anda lihat progres pengerjaannya</b>
        </div>
        <div class="ui stackable three doubling link special cards" style="margin-top:10px">
            @for($i = 0; $i < count($histories); $i++)
            <?php
            $fotos = explode(" ", $histories[$i]->url_gambar);
            ?>
            @if(($histories[$i]->status=="Order sedang diproses" || $histories[$i]->status=="Pembayaran tidak terkonfirmasi" || $histories[$i]->status=="Menunggu pembayaran") && $histories[$i]->statusLagi>=0)
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">                        
                        <div class="content">
                            <i class="teal clock outline huge icon"></i>
                            <div style="font-size:22px;margin-top:10px;margin-bottom:20px">
                                Dalam Pengerjaan
                            </div>
                            <button class="ui inverted medium button" onclick="window.location.href='/informasi-akun/{{ $histories[$i]->id}}/progres'">Lihat</button>
                        </div>
                    </div>
                    <img class="ui fluid image" src="{{asset($fotos[count($fotos)-1])}}" style="object-fit:cover;height:250px">
                    <div class="ui top right attached teal large label" style="max-width:55%">
                        {{$histories[$i]->status}}
                    </div>
                </div>
                <div class="content">
                    <div class="header">{{ucfirst($items[$i]->namaProject)}}</div>
                    <div class="meta" style="margin-top:5px">
                        <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                            {{ucfirst($items[$i]->category)}}
                        </span>
                    </div>
                    <div class="description">
                        {{$items[$i]->deskripsi}}
                    </div>
                </div>
                <div class="extra content">
                    <div>
                        <i class="user circle teal icon"></i>
                        {{ucfirst($profesis[$i]->nama_profesi)}}
                    </div>
                    <div style="margin-top:5px;display:flex;flex-direction:row;align-items: center">
                        <div><i class="map marker alternate teal icon"></i></div>
                        <div>{{ucfirst($items[$i]->daerah)}}</div>
                    </div>
                </div>
            </div>
            @endif
            @endfor
        </div>
    @endif
</div>

<!-- Modal belum ada progres -->
<div class="ui small modal belum progres">
    <div class="header">
        Belum Ada Progres
    </div>
    <div class="content">
    <div class="ui container center aligned">
            <i class="sync alternate icon teal massive"></i>
            <div style="font-size:24px;margin-top:15px"><b>Oops, progres pengerjaan proyek anda belum tersedia...</b></div>
            <div style="font-size:19px">Harap tunggu beberapa saat sampai profesi mengirimkan progres pengerjaan proyek anda</div>
        </div>
    </div>
    <div class="actions">
        <button class="ui positive button">
            Oke
        </button>
    </div>
</div>
