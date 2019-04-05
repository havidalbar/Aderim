<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Pesanan Orderan Anda</b>
</div>
<div
    style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;padding:30px 20px 30px 20px;color:#4d4d4d">
        @if(count($dataOrder5)<=0)
            <div class="ui container center aligned">
                <i class="huge icons">
                    <i class="big teal dont icon"></i>
                    <i class="shopping teal  basket icon"></i>
                </i>
                <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum mendapatkan pesanan :(</b></div>
                <div style="font-size:20px;margin-top:15px">Yuk bagikan link proyek anda keseluruh media sosial anda...</div>
            </div>
        @elseif(count($dataOrder5)>0)
    <div style="font-size:20px">
        <b>Silahkan pilih salah satu proyek yang ingin anda lihat atau tambah progres pengerjaannya</b>
    </div>
    <div class="ui stackable three doubling link special cards" style="margin-top:10px">
        @for($i=0;$i< count($dataOrder5);$i++)
        <?php
        $fotos = explode(" ", $dataOrder5[$i]->url_gambar);
        ?>
        <div class="card">
            <div class="blurring dimmable image">
                <div class="ui dimmer">
                    <div class="content">
                        <span>
                            <button class="ui inverted medium button">Lihat</button>
                        </span>
                        <span>
                            <button class="ui inverted medium button">Tambah</button>
                        </span>
                    </div>
                </div>
                <img src="{{asset($fotos[count($fotos)-1])}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">{{$dataOrder5[$i]->namaProject}}</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        {{$dataOrder5[$i]->category}}
                    </span>
                </div>
                <div class="description">
                    {{$dataOrder[$i]->deskripsi}}
                </div>
            </div>
        </div>
        @endfor
    </div>
    @endif
</div>