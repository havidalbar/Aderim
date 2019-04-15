@extends (\Session::has('username') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Tambah Proyek | Aderim')

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
        <div style="font-size:28px"><b>Tambah Proyek</b></div>
        <div style="font-size:20px;margin-top:15px;line-height:1.5">
            Bagikan informasi proyek anda kepada para pengguna Aderim agar mereka tertarik menggunakan jasa anda.
        </div>
        <div class="ui divider"></div>
        <div class="ui container fluid" style="margin-top:20px">
            <div style="font-size:18px"><b>Foto Proyek Anda</b></div>
            <form action="{{ url('/uploadFotoProject') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone"
                style="margin-top:5px">
                {{csrf_field()}}
            </form>
            <button id="submit-all" type="submit" class="submitDropzone" style="display:none">Unggah</button>
        </div>
        <form class="ui form" style="margin-top:15px" id="tambah-project" method='post'
            action="{{url('/tambah-projectproses')}}" enctype="multipart/form-data">
            <div class="field">
                <label style="font-size:18px">Nama Proyek</label>
                <input type="text" name="namaProject" placeholder="Masukkan Nama Proyek" required>
            </div>
            <div class="field">
                <label style="font-size:18px">Kategori Proyek</label>
                <div class="ui selection dropdown">
                    <input type="hidden" name="category" required>
                    <i class="dropdown icon"></i>
                    <div class="default text">Pilih Kategori Proyek</div>
                    <div class="menu">
                        <div class="item" value="Rumah">Rumah</div>
                        <div class="item" value="Hotel">Hotel</div>
                        <div class="item" value="Apartemen">Apartemen</div>
                    </div>
                </div>
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

@include('layouts.footer')
@endsection
