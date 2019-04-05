<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Pesanan Proyek Anda</b>
</div>
<div style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;color:#4d4d4d">
    <div class="ui borderless inverted huge stackable menu" style="background-color:#4b8991;border-radius:0px">
        <a class="active item" data-tab="terima-pesanan" style="font-size:17px;color:white"><b>Terima Pesanan</b></a>
        <a class="item" data-tab="konfirmasi-pesanan" style="font-size:17px;color:white"><b>Konfirmasi Pesanan</b></a>
        <a class="item" data-tab="riwayat-pesanan" style="font-size:17px;color:white"><b>Riwayat Pesanan</b></a>
    </div>
    <div class="ui active tab" data-tab="terima-pesanan" style="padding:20px 20px 30px 20px">        
        @if(count($dataOrder2)<=0)
            <div class="ui container center aligned">
                <i class="huge icons">
                    <i class="big teal dont icon"></i>
                    <i class="shopping teal  basket icon"></i>
                </i>
                <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum mendapatkan pesanan :(</b></div>
                <div style="font-size:20px;margin-top:15px">Yuk bagikan link proyek anda keseluruh media sosial anda...</div>
            </div>
        @elseif(count($dataOrder2)>0)
        <table class="ui striped stackable sortable celled teal table center aligned" style="margin-top:15px">
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Nama Pemesan</th>
                    <th>
                        <div>Nama Proyek dan</div>
                        <div>File Desain</div>
                    </th>
                    <th>Nominal Transaksi</th>
                    <th>Konfirmasi</th>
                </tr>
            </thead>
            @for($i=0;$i< count($dataOrder2); $i++) <?php
            $fotos= explode(" ", $dataOrder2[$i]->url_gambar);
            ?> <tbody>
                <tr>
                    <td>{{$dataOrder2[$i]->id}}</td>
                    <td>{{$users2[$i]->name}}</td>
                    <td>
                        <div>{{$items2[$i]->namaProject}}</div>
                        <div>
                            <button class="ui button basic teal" onclick="$('.ui.large.modal.desain.').modal('show')">
                                Lihat
                            </button>
                        </div>
                    </td>
                    <td>
                        <span>Rp </span>
                        <span>{{$items2[$i]->estimasi}}</span>
                    </td>
                    <td>
                        <div class="ui internally celled grid">
                            <div class="row">
                                <form class="eight wide column" action="/terima-order?id={{$dataOrder2[$i]->id}}"
                                    method="post">
                                    {{csrf_field()}}
                                    <button class="ui button basic green">Terima</button>
                                </form>
                                <form class="eight wide column" action="/tolak-order?id={{$dataOrder2[$i]->id}}"
                                    method="post">
                                    {{csrf_field()}}
                                    <button class="ui button basic red">Tolak</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endfor
                </tbody>
        </table>
        @endif
    </div>
    <div class="ui tab" data-tab="konfirmasi-pesanan" style="padding:20px 20px 30px 20px">
        @if(count($dataOrder3)<=0)
            <div class="ui container center aligned">
                <i class="huge icons">
                    <i class="big teal dont icon"></i>
                    <i class="shopping teal  basket icon"></i>
                </i>
                <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum mendapatkan pesanan :(</b></div>
                <div style="font-size:20px;margin-top:15px">Yuk bagikan link proyek anda keseluruh media sosial anda...</div>
            </div>
        @elseif(count($dataOrder3)>0)
        <table class="ui striped stackable sortable celled teal table center aligned" style="margin-top:15px">
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Proyek</th>
                    <th>Nominal Transaksi</th>
                    <th>Konfirmasi</th>
                </tr>
            </thead>
            @for($i=0;$i<count($dataOrder3);$i++) <tbody>
                <tr>
                    <td>{{$dataOrder3[$i]->id}}</td>
                    <td>{{$users3[$i]->name}}</td>
                    <td>{{$items3[$i]->namaProject}}</td>
                    <td>
                        <span>Rp </span>
                        <span>{{$items3[$i]->estimasi}}</span>
                    </td>
                    <td>
                        <form action="/konfirmasi-order?id={{$dataOrder3[$i]->id}}" method="post">
                            {{csrf_field()}}
                            <button class="ui button basic green">Selesai</button>
                        </form>
                    </td>
                </tr>
                @endfor
                </tbody>
        </table>
        @endif
    </div>
    <div class="ui tab" data-tab="riwayat-pesanan" style="padding:20px 20px 30px 20px">
        @if(count($dataOrder4)<=0)
            <div class="ui container center aligned">
                <i class="huge icons">
                    <i class="big teal dont icon"></i>
                    <i class="shopping teal  basket icon"></i>
                </i>
                <div style="font-size:24px;margin-top:15px"><b>Oops, anda belum mendapatkan pesanan :(</b></div>
                <div style="font-size:20px;margin-top:15px">Yuk bagikan link proyek anda keseluruh media sosial anda...</div>
            </div>
        @elseif(count($dataOrder4)>0)
        <table class="ui striped stackable sortable celled teal table center aligned" style="margin-top:15px">
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Proyek</th>
                    <th>Nominal Transaksi</th>
                </tr>
            </thead>
            @for($i=0;$i< count($dataOrder4);$i++) <tbody>
                <tr>
                    <td>{{$dataOrder[$i]->id}}</td>
                    <td>{{$users4[$i]->name}}</td>
                    <td>{{$items4[$i]->namaProject}}</td>
                    <td>
                        <span>Rp </span>
                        <span>{{$items4[$i]->estimasi}}</span>
                    </td>
                </tr>
                @endfor
                </tbody>
        </table>
        @endif
    </div>
</div>