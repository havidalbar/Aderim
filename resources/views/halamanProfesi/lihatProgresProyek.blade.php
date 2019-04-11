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
                    <img class="ui circular image" src="{{asset($user->foto)}}"
                        style="width:80px;height:80px;object-fit:cover">
                </div>
                <div class="twelve wide middle aligned column">
                    <div style="font-size:22px"><b>{{$user->name}}</b></div>
                <div style="font-size:17px">{{$user->email}}</div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="ui stackable grid">
                <div class="twelve wide middle aligned column">
                    <div style="font-size:22px">
                    <b>{{$items->namaProject}}</b>
                    </div>
                    <div style="margin-top:10px;display:flex;flex-direction:row;align-items: center">
                        <div><i class="map marker alternate teal icon"></i></div>
                        <div style="font-size:16px">{{$dataOrder->address}}</div>
                    </div>  
                </div>
                <div class="four wide right aligned middle aligned column">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:5px 15px 5px 15px;font-size:17px">
                        {{$items->category}}
                    </span>
                </div>
            </div>            
            <div class="ui divider"></div>
            <div style="font-size:20px"><b>Progres Proyek</b></div>
            <div style="font-size:17px;margin-top:10px">
                <span>Bulan </span>
            <span>{{$dataOrder->statusLagi}}</span>
            </div>
            <div style="font-size:20px;margin-top:15px"><b>Deskripsi Progres</b></div>
            <div style="font-size:17px;margin-top:10px;line-height:1.5">
                {{$dataOrder->pesan}}
            </div>
            <div class="ui divider"></div>
            <button class="ui large button teal right floated" onclick="window.location.href='/order-progres/{{ $dataOrder->id}}/tambah'">Tambah Progres</button>
        </div>
    </div>
    
    <div class="ui divider" style="margin-top:20px"></div>
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