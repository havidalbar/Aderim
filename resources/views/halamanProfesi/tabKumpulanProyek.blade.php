<div
    style="font-size:32px;color:white;text-align:center;background-color:#4b8991;border-top-left-radius:5px;border-top-right-radius:5px;padding:20px">
    <b style="line-height:1.5">Kumpulan Proyek Anda</b>
</div>
<div
    style="margin-top:20px;background-color:#f8f8f8;border:5px solid #4b8991;border-radius:5px;padding:30px 20px 30px 20px;color:#4d4d4d">
    @if(count($items)<=0)
        <div class="ui container center aligned">
            <i class="huge search teal icon"></i>
            <div style="font-size:24px;line-height:1.5;margin-top:15px"><b>Oops, anda belum memiliki proyek :(</b></div>
            <div style="font-size:20px;line-height:1.5;margin-top:15px">Yuk tambahkan proyek anda ke Aderim agar calon pemesan tertarik dengan jasa yang anda tawarkan.</div>
            <button class="ui large teal button"  style="margin-top:15px" onclick="window.location.href='/halaman-profesi/tambah-project'">Tambah Proyek</button>
        </div>
    @else
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
                            <button class="ui inverted medium button" onclick="$('.ui.fullscreen.modal.lihat.<?php echo $i ?>').modal('show');">Lihat</button>
                        </span>
                        <span>
                            <button class="ui inverted medium button" onclick="window.location.href='/project/{{$items[$i]->id}}/ubah'">Ubah</button>
                        </span>
                    </div>
                </div>
                <img src="{{asset($fotos[0])}}" style="object-fit:cover;height:250px">
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
                    {{ucfirst($profesi->nama_profesi)}}
                </div>
                <div style="margin-top:5px;display:flex;flex-direction:row;align-items: center">
                    <div><i class="map marker alternate teal icon"></i></div>
                    <div>{{ucfirst($items[$i]->daerah)}}</div>
                </div>
            </div>
        </div>
            <!-- Modal Detail -->
            <div class="ui fullscreen modal lihat <?php echo $i ?>">
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
                                @for($j=0; $j < count($fotos); $j++)
                                    <div class="ui one stackable cards">
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
                                    <img class="ui circular image" src="{{asset($profesi->foto)}}"
                                        style="width:80px;height:80px;object-fit:cover">
                                </div>
                                <div class="thirteen wide column">
                                    <div style="font-size:22px"><b>{{ucfirst($profesi->nama_profesi)}}</b></div>
                                    <div style="font-size:17px">{{ucfirst($profesi->job_title)}}</div>
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div class="ui stackable grid">
                                <div class="twelve wide column">
                                    <div style="font-size:22px">
                                        <b>{{ucfirst($items[$i]->namaProject)}}</b>
                                    </div>
                                    <div style="margin-top:5px;display:flex;flex-direction:row;align-items: center">
                                        <div><i class="map marker alternate teal icon"></i></div>
                                        <div style="font-size:17px">{{ucfirst($items[$i]->daerah)}}</div>
                                    </div>
                                </div>
                                <div class="four wide right aligned middle aligned column">
                                    <span
                                        style="border:2px solid #d4d4d5;border-radius:4px;padding:5px 15px 5px 15px;font-size:17px">
                                        {{ucfirst($items[$i]->category)}}
                                    </span>
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div>
                                <div style="font-size:16px"><b>Deskripsi</b></div>
                                <div style="font-size:15px">
                                    {{$items[$i]->deskripsi}}
                                </div>
                            </div>
                            <div style="margin-top:10px">
                                <div style="font-size:16px"><b>Spesifikasi</b></div>
                                <div style="font-size:15px">
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
                    <a href="#">
                        <button class="ui negative button" onclick="$('.ui.tiny.modal.hapus').modal('show')">
                            Hapus Proyek
                        </button>
                        <button class="ui teal button" onclick="window.location.href='/project/{{$items[$i]->id}}/ubah'">
                            Ubah Detail Proyek
                        </button>
                    </a>
                </div>
            </div>
            <!--Akhir Modal Detail -->
            <!-- Dimmer hapus -->
            <div class="ui tiny modal hapus">
                <div class="header">
                    Hapus Proyek
                </div>
                <div class="content">
                    <div style="font-size:18px">Apakah anda yakin ingin menghapus proyek ini?</div>
                </div>
                <div class="actions">
                    <div style="display:flex;flex-direction:row-reverse">
                        <form action='/hapusproyek?id={{$items[$i]->id}}' method="post">
                            {{csrf_field()}}
                            <button class="ui positive button">
                                Iya
                            </button>
                        </form>
                        <button class="ui negative button" style="margin-right:10px">
                            Tidak
                        </button>
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
                            <a>
                                <button class="ui inverted button" onclick="window.location.href='/halaman-profesi/tambah-project'">Tambah Proyek</button>
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
    @endif
</div>
