@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('css')
<link rel="stylesheet" href="/css/dropzone.css">
@endsection

@section('content')
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="row">
        <center><h2 style="margin-bottom: 30px;"><img src="/z_aderimLogo.png" width="50" height="50"> FOTO PORTOFOLIO</h2></center>
        <div class="col-md-4">
            <form action="{{ url('/uploadFoto') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                {{csrf_field()}}
            </form>
            <center><button id="submit-all" type="submit" class="submitDropzone btn-block">Kirim</button></center>
        </div>
        <div class="col-md-8 untuk-isi-daftar-profesi">
            <form id="tambah-profesi" method='post' action='{{url('/daftarprofesiproses')}}'>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama_profesi"><b>Nama Profesi</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nama_profesi" value="{{ old('nama_profesi') }}" placeholder="Nama Profesi" required="" />
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="job_title" ><b>Pekerjaan</b></label>
                        </div>
                        <div class="col-md-6">
                        <select name="job_title" class="form-control" required>
                            <option value="">(Pilih Pekerjaan)</option>
                            <option value="arsitektur">Arsitektur</option>
                            <option value="desain">Desain Interior</option>
                        </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="address"><b>Alamat</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" placeholder="Jl." value="{{ old('address') }}" required="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nohp"><b>Nomor Telpon</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nohp" placeholder="08xx" value="{{ old('nohp') }}" required="" />
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                <center><input type="submit" name="submit" value="Daftar Profesi" class="btn" style="color: background-color: #ff5722;" /></center>
            </form>
        </div>

    </div>
</div>
    @section('js')
    <script src="/js/dropzone.js"></script>
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
@endsection
