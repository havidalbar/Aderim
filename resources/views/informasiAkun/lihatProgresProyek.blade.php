@extends ('layouts.cobanavLogin')
@section('title', 'Progres Proyek | Aderim')

@section('content')

<div class="ui container" style="padding:65px 0px 65px 0px">
    <h2>Progres Pengerjaan Proyek</h2>
    <div class="ui divider" style="margin-bottom:20px"></div>
    <div class="ui stackable grid">
        <div class="ten wide column">
            <div class="ui stackable grid" style="height:100%">
                <?php
                $fotos = explode(" ", $orderProgres->url_gambar);
                ?> 
                <div class="twelve wide column">
                    <div class="ui one stackable cards">
                        <div class="card">
                            <div class="image">
                                <img class="ui big image" src="{{asset($fotos[0])}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide column">
                    @for($j=0; $j < count($fotos); $j++)
                    <div class="ui one stackable cards">
                        <div class="card">
                            <div class="image">
                                <img src="{{asset($fotos[$j])}}"
                                    style="height:145px;object-fit:cover">
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="six wide column">
            <div class="ui divider"></div>
            <div class="ui grid">
                <div class="one wide middle aligned column">
                    <i class="info circle large teal icon"></i>
                </div>
                <div class="fourteen wide middle aligned column" style="margin-left:5px">
                    <div style="font-size:22px;color:teal"><b>Detail Progres Proyek</b></div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="ui stackable grid">
                <div class="four wide column">
                    <img class="ui circular image" src="{{asset($profesi->foto)}}"
                        style="width:80px;height:80px;object-fit:cover">
                </div>
                <div class="twelve wide middle aligned column">
                <div style="font-size:22px"><b>{{$profesi->nama_profesi}}</b></div>
                    <div style="font-size:17px;margin-top:5px">{{$profesi->job_title}}</div>
                <div style="font-size:17px;margin-top:5px">{{$user2->email}}</div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="ui stackable grid">
                <div class="twelve wide middle aligned column">
                    <div style="font-size:22px">
                        <b>{{$items->namaProject}}</b>
                    </div>
                </div>
                <div class="four wide middle aligned column">
                    <button class="ui button basic"><b>{{$items->category}}</b></button>
                </div>
            </div>
            <div class="ui grid">
                <div class="one wide middle aligned column">
                    <i class="map pin large teal icon"></i>
                </div>
                <div class="fourteen wide column" style="margin-left:5px">
                    <div style="font-size:17px">
                            {{$dataOrder->address}}
                    </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div style="font-size:20px"><b>Progres Proyek</b></div>
            <div style="font-size:17px;margin-top:10px">
                <span>Bulan </span>
                <span>{{$dataOrder->statusLagi}}</span>
            </div>
            <div style="font-size:20px;margin-top:15px"><b>Deskripsi Progres</b></div>
            <div style="font-size:17px;margin-top:10px">
                    {{$orderProgres->pesan}}
            </div>
            <div class="ui divider"></div>
            @if(($dataOrder->statusLagi===6 && $dataOrder->id_transaksi2==null) || ($dataOrder->statusLagi==12 &&
                    $dataOrder->id_transaksi3==null)|| ($dataOrder->statusLagi===18 && $dataOrder->id_transaksi4==null)||
                    ($dataOrder->status=="Pembayaran tidak terkonfirmasi" && $dataOrder->id_transaksi2==null)||
                    ($dataOrder->status=="Pembayaran tidak terkonfirmasi" && $dataOrder->id_transaksi3==null)||
                    ($dataOrder->status=="Pembayaran tidak terkonfirmasi" && $dataOrder->id_transaksi4==null))
            <form class="ui button teal right floated" action='/bayarLagi?statusLagi={{$dataOrder->statusLagi}}&id={{$dataOrder->id}}' method="post">
                {{csrf_field()}}    
                <button type="submit" class="ui button teal right floated">Bayar Progres Selanjutnya</button>
            </form>
            @endif
        </div>
    </div>

    <div style="margin-top:20px;padding:20px 40px 20px 40px;border-radius:5px;background-color:#F7EFD2">
        <div class="ui grid">
            <div class="one wide column middle aligned">
                <i class="info circle bi teal icon"></i>
            </div>
            <div class="fifteen wide column" style="font-size:16px;line-height:1.5">
                Pembayaran total biaya proyek dilakukan secara bertahap sebanyak 4 kali. Pembayaran dilakukan
                untuk progres pengerjaan proyek selama 6 bulan kedepan. Jika tidak melakukan pembayaran selanjutnya maka progres pengerjaan proyek akan dihentikan untuk sementara waktu.
            </div>
        </div>
    </div>
    <div class="ui divider" style="margin-top:30px"></div>
    <h3>Lihat Progres Pengerjaan Proyek Bulan Ke</h3>
    <div class="ui pagination menu">
            <?php
            $bulan = $dataOrder->statusLagi;
            ?>
            @for($j=0; $j < $bulan; $j++)
                <a class="item">
                    {{$j+1}}
                </a>
            @endfor 
    </div>    
</div>

@include('layouts.cobafooter')
@endsection