@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('css')
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection

@section('content')
    <div class="container untuk-daftar-profesi halaman-profile">
        <div class="row">
            <center><h2 style="margin-bottom: 30px;"><img src="/z_aderimLogo.png" width="50" height="50">FOTO PROJECT</h2></center>
            {{ csrf_field() }}
            <div class="col-md-4">
                <form action="{{ url('/uploadFotoProject') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                    {{csrf_field()}}
                </form>
            </div>
            <div class="col-md-8 untuk-isi-daftar-profesi">
                <form id="tambah-project" method='post' action='{{url('/tambah-projectproses')}}'>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="namaProject"><b>Nama Project</b></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="namaProject" value="{{ old('namaProject') }}" placeholder="Nama Project" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="category"><b>Jenis Project</b></label>
                            </div>
                            <div class="col-md-6">
                            <select name="category" class="form-control" required>
                                <option value="">(Pilih kategori)</option>
                                <option value="rumah">Rumah</option>
                                <option value="apartemen">Apartemen</option>
                                <option value="hotel">Hotel</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="estimasi"><b>Estimasi Harga</b></label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="estimasi" placeholder="Rp." value="{{ old('estimasi') }}" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="deskripsi"><b>Deskripsi</b></label>
                            </div>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="deskripsi" placeholder="Tulis deskripsi project Anda di sini" style="height: 150px;" required>{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <center><input type="submit" name="submit" value="Unggah project" class="btn" /></center>
                </form>
            </div>

        </div>
    </div>
    @section('js')
    <script src="/js/dropzone.js"></script>
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
                files.setAttribute('name', 'fotoproject');
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
    </script>
    @endsection
@endsection
