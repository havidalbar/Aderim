@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')

@section('title', 'Aderim')
@section('css')
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection
@section('content')
<div style="display: flex;flex-direction">
    <div class="infoprofesi">
        <div style="margin-left:20px;">
    <div class="tampiluploadproject">
        <center>
            <h2 style="padding: 3px;">FOTO PROJECT</h2>
            {{ csrf_field() }}
            <form action="{{ url('/uploadFotoProject') }}" enctype="multipart/form-data" style="width:700px; height: 200px" class="dropzone" id="my-dropzone">
                {{csrf_field()}}
            </form>

        </center>
        <div class="contactFrm">
        <form id="tambah-project" method='post' action='{{url('/tambah-projectproses')}}'>
                <label for="namaProject">Nama Project:</label>
                <input type="text" style="border-radius: 5px;" name="namaProject" value="{{ old('namaProject') }}" required="" />
                <label for="category">Jenis Project:</label>
                <select name="category" required>
                        <option value="">(Pilih kategori)</option>
                        <option value="rumah">Rumah</option>
                        <option value="apartemen">Apartemen</option>
                        <option value="hotel">Hotel</option>
                    </select>
                    <br>
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" style="border-radius: 5px;" placeholder="Tulis deskripsi project Anda di sini" required>{{ old('deskripsi') }}</textarea>
                {{csrf_field()}}
                <center><input type="submit" name="submit" value="Unggah project" /></center>
        </form>
    </div>
    </div>
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
            this.on("addedfile", function() {
            });
          },
                removedfile: function(file) {
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }
            };
        </script>
    @endsection
@endsection
