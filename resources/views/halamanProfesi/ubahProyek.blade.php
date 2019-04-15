@extends ('layouts.cobanavLogin')
@section('title', 'Ubah Detail Proyek | Aderim')

@section('js')
<script type="text/javascript">
Dropzone.options.myDropzone = {
    addRemoveLinks: true,
    paramName: 'file',
    maxFilesize: 20, // MB
    maxFiles: 4,
    acceptedFiles: "image/*",
    init: function() {
        this.on("success", function(file, response) {
            let hasil = 'image/' + response;
            var forms = document.getElementById('tambah-project');
            var files = document.createElement("input");
            files.setAttribute('name', 'files[]');
            files.setAttribute("type", "hidden");
            files.setAttribute("value", hasil);
            forms.appendChild(files);
        });
        this.on("addedfile", function() {});
    },
    removedfile: function(file) {
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
};
</script>@endsection

@section('content')
<div class="ui container" style="color:#4d4d4d;margin-top:50px">
    <div style="max-width:700px;margin: 0 auto;border:1px solid #e1e2e3;border-radius:6px;padding:40px 45px 40px 45px">
        <div style="font-size:28px;line-height:1"><b>Ubah Detail Proyek</b></div>
        <div style="font-size:20px;margin-top:15px;line-height:1.5">
            Ubah informasi proyek anda menjadi lebih menarik agar para pengguna Aderim tertarik menggunakan jasa anda.
        </div>
        <div class="ui divider"></div>
        <div style="font-size:20px;margin-top:15px;line-height:1.5">
            Anda akan melakukan perubahan pada proyek berikut :
        </div>
        <div class="ui stackable grid" style="margin-top:5px">
            <div class="five wide column">
                <div class="ui one special cards">
                    <div class="card">
                        <div class="blurring dimmable image">
                            <div class="ui dimmer">
                                <div class="content">
                                    <span>
                                        <button class="ui inverted medium button"
                                            onclick="$('.ui.fullscreen.modal.lihat').modal('show');">Lihat</button>
                                    </span>
                                </div>
                            </div>
                            <img class="ui rounded image" src="{{asset('Apartemen1_2.jpg')}}"
                                style="height:150px;object-fit:cover">
                        </div>
                    </div>
                </div>
            </div>
            <div class="eleven wide left aligned column">
                <div style="font-size:22px"><b>Hotel Mewah</b></div>
                <div style="margin-top:10px;font-size:15px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:3px 8px 3px 8px">
                        Hotel
                    </span>
                </div>
                <div style="margin-top:10px;display:flex;flex-direction:row;align-items: center">
                    <div><i class="map marker alternate grey icon"></i></div>
                    <div style="font-size:19px">Surabaya</div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="ui container fluid" style="margin-top:20px">
            <div style="font-size:18px"><b>Foto Proyek Anda</b></div>
            <form action="{{ url('/uploadFotoProject') }}" enctype="multipart/form-data" class="dropzone"
                id="my-dropzone" style="margin-top:5px">
                {{csrf_field()}}
            </form>
            <button id="submit-all" type="submit" class="submitDropzone" style="display:none">Unggah</button>
        </div>
        <form class="ui form" style="margin-top:15px" id="tambah-project" method='post'
            action="{{url('/tambah-projectproses')}}" enctype="multipart/form-data">
            <div class="field">
                <label style="font-size:18px">Nama Proyek</label>
                <input type="text" name="namaProject" placeholder="Hotel Mewah" readonly>
            </div>
            <div class="field">
                <label style="font-size:18px">Kategori Proyek</label>
                <input type="text" name="category" placeholder="Hotel" readonly>
            </div>
            <div class="field">
                <label style="font-size:18px">Deskripsi Singkat Proyek</label>
                <textarea name="deskripsi" maxlength="144" rows="4"
                    placeholder="Tuliskan deskripsi singkat mengenai proyek anda..." required=""></textarea>
            </div>
            <div class="field">
                <label style="font-size:18px">Spesifikasi Proyek</label>
                <textarea name="spesifikasi" maxlength="500" rows="6"
                    placeholder="Tuliskan spesifikasi mengenai proyek anda..." required=""></textarea>
            </div>
            <div class="field">
                <label style="font-size:18px">Biaya Proyek</label>
                <div class="ui labeled fluid input">
                    <label class="ui label">Rp</label>
                    <input type="number" name="estimasi" placeholder="Masukkan Biaya Proyek">
                </div>
            </div>
            <div class="field">
                <label style="font-size:18px">Daerah Proyek</label>
                <input type="text" name="daerah" placeholder="Masukkan Alamat Lengkap" required>
            </div>
            {{csrf_field()}}
            <button class="ui big teal button fluid" onclick="" type="submit" name="submit" style="margin-top:40px">
                Tambah Proyek
            </button>
        </form>
    </div>
</div>

<!-- Modal detail -->
<div class="ui fullscreen modal lihat">
    <div class="content">
        <div class="ui stackable grid">
            <div class="nine wide column">
                <div class="ui stackable grid" style="height:100%">
                    <div class="twelve wide middle aligned column">
                        <div class="ui one stackable cards">
                            <div class="card">
                                <div class="image">
                                    <img class="ui big image" src="{{asset('Apartemen1_2.jpg')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="four wide middle aligned column">

                        <div class="ui one stackable cards">
                            <div class="card">
                                <div class="image">
                                    <img src="{{asset('Apartemen1_2.jpg')}}" style="height:145px;object-fit:cover">
                                </div>
                            </div>
                        </div>

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
                        <img class="ui circular image" src="{{asset('arsitek.jpg')}}"
                            style="width:80px;height:80px;object-fit:cover">
                    </div>
                    <div class="thirteen wide column">
                        <div style="font-size:22px"><b>Arsitek Jaya</b></div>
                        <div style="font-size:17px">Arsitektur</div>
                    </div>
                </div>
                <div class="ui divider"></div>
                <div class="ui stackable grid">
                    <div class="twelve wide column">
                        <div style="font-size:22px">
                            <b>Hotel Mewah</b>
                        </div>
                        <div style="margin-top:5px;display:flex;flex-direction:row;align-items: center">
                            <div><i class="map marker alternate teal icon"></i></div>
                            <div style="font-size:17px">Surabaya</div>
                        </div>
                    </div>
                    <div class="four wide right aligned middle aligned column">
                        <span
                            style="border:2px solid #d4d4d5;border-radius:4px;padding:5px 15px 5px 15px;font-size:17px">
                            Hotel
                        </span>
                    </div>
                </div>
                <div class="ui divider"></div>
                <div>
                    <div style="font-size:16px"><b>Deskripsi</b></div>
                    <div style="font-size:15px">
                        asasa
                    </div>
                </div>
                <div style="margin-top:10px">
                    <div style="font-size:16px"><b>Spesifikasi</b></div>
                    <div style="font-size:15px">
                        asasa
                    </div>
                </div>
                <div class="ui divider"></div>
                <div class="ui container fluid" style="text-align:right">
                    <div style="font-size:22px"><b>Biaya Proyek</b></div>
                    <div style="color:teal;font-size:20px">
                        <b>
                            <span>Rp </span>
                            <span>100.000.000</span>
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <button class="ui positive button">
            Oke
        </button>
    </div>
</div>
<!-- Akhir Modal detail -->

@include('layouts.cobafooter')
@endsection