@extends ('layouts.cobanavLogin')
@section('title', 'Beranda | Aderim')

@section('js')
<script type="text/javascript">
Dropzone.options.myDropzone = {
    autoProcessQueue: false,
    addRemoveLinks: true,
    paramName: 'file',
    maxFilesize: 20, // MB
    maxFiles: 10,
    parallelUploads: 10,
    // acceptedFiles: ".jpeg,.jpg,.png,",
    acceptedFiles: "image/*",

    init: function() {
        this.on("success", function(file, response) {
            let hasil = 'image/' + response;

            var forms = document.getElementById('tambah-profesi');
            var files = document.createElement("input");
            files.setAttribute('name', 'files[]');
            files.setAttribute("type", "hidden");
            files.setAttribute("value", hasil);
            forms.appendChild(files);
        });

        var submitButton = document.querySelector("#submit-all");
        myDropzone = this; // closure
        submitButton.addEventListener("click", function() {
            myDropzone.processQueue();
        });
        this.on("addedfile", function() {});
    },
    removedfile: function(file) {
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
};
</script>
@endsection

@section('content')
<div class="ui container" style="color:#4d4d4d;margin-top:50px">
    <div style="max-width:700px;margin: 0 auto;border:1px solid #e1e2e3;border-radius:6px;padding:40px 45px 40px 45px">
        <div style="font-size:28px"><b>Formulir Pendaftaran Profesi</b></div>
        <div style="font-size:20px;margin-top:15px;line-height:1.5">
            Daftarkan diri sebagai profesi agar bisa mengerjakan proyek dari para pengguna Aderim
        </div>
        <div class="ui divider"></div>
        <div class="ui container fluid" style="margin-top:20px">
            <div style="font-size:18px"><b>Foto Portofolio</b></div>
            <form action="{{ url('/uploadFoto') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone"
                style="margin-top:5px">
                {{csrf_field()}}
            </form>
            <label for="submit-all" class="ui large label" style="cursor:pointer;margin-top:10px">
                <i class="cloud upload icon"></i>
                Unggah Foto
            </label>
            <button id="submit-all" type="submit" class="submitDropzone" style="display:none">Unggah</button>
        </div>
        <form class="ui form" style="margin-top:15px" id="tambah-profesi" method='post'
            action="{{url('/daftarprofesiproses')}}" enctype="multipart/form-data">
            <div class="ui container fluid">
                <div style="font-size:18px"><b>Foto Profil</b></div>
                <img class="ui small image" id="image-preview1" style="margin-top:10px">
                <label for="unggah_gambar1" class="ui label" style="cursor:pointer;margin-top:5px;margin-bottom:15px">
                    <i class="cloud upload icon"></i>
                    Pilih Foto
                </label>
                <input type="file" id="unggah_gambar1" name="foto"
                    onchange="previewImage('image-preview1','unggah_gambar1')" style="display: none">
            </div>
            <div class="field">
                <label style="font-size:18px">Nama Profesi</label>
                <input type="text" name="nama_profesi" placeholder="Masukkan Nama Profesi" required>
            </div>
            <div class="field">
                <label style="font-size:18px">Pekerjaan</label>
                <div class="ui selection dropdown">
                    <input type="hidden" name="job_title" required>
                    <i class="dropdown icon"></i>
                    <div class="default text">Pilih Pekerjaan</div>
                    <div class="menu">
                        <div class="item" value="arsitektur">Arsitektur</div>
                        <div class="item" value="desain">Desain Interior</div>
                    </div>
                </div>
            </div>
            <div class="field">
                <label style="font-size:18px">Alamat Lengkap</label>
                <input type="text" name="address" placeholder="Masukkan Alamat Lengkap" required>
            </div>
            <div class="field">
                <label style="font-size:18px">Nomor Telepon</label>
                <input type="text" name="nohp" placeholder="Masukkan Nomor Telepon" required>
            </div>
            {{csrf_field()}}
            <button class="ui big teal button fluid" onclick="" type="submit" name="submit"
                style="margin-top:40px">Kirim
                Pendaftaran</button>
        </form>
    </div>
</div>

@include('layouts.cobafooter')
@endsection