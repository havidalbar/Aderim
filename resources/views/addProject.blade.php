@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')

@section('title', 'Aderim')
@section('css')
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection
@section('content')
<div style="display: flex;flex-direction">

    <div class="tampiluploadproject">
        <center>
            <h2 style="padding: 3px;">FOTO PROJECT</h2>
            {{ csrf_field() }}
            <form action="{{ url('/uploadproses') }}" enctype="multipart/form-data" style="width:200px; height: 200px" class="dropzone" id="my-dropzone">
                {{csrf_field()}}
            </form>

        </center>
        <div class="contactFrm">
        <form id="tambah-project" method='post' action='{{url('/tambah-projectproses')}}'>
                <label for="project">Nama Project:</label>
                <input type="text" style="border-radius: 5px;" name="project" value="{{ old('project') }}" required="" />
                <label for="category">Jenis Project:</label>
                <select name="category" required>
                        <option value="">(Pilih kategori)</option>
                        <option value="arsitektur">Arsitektur</option>
                        <option value="desaininterior">Desain Interior</option>
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
    @section('js')
    <script src="{{asset('js/dropzone.css')}}"></script>
    <script type="text/javascript">
        Dropzone.options.myDropzone = {
            addRemoveLinks: true,
            paramName: 'file',
            maxFilesize: 20, // MB
            maxFiles: 1,
            acceptedFiles: "image/*",

            init: function() {
                this.on("success", function(file, response) {
                    let hasil = 'uploads/' + response;

                    var forms = document.getElementById('tambah-project');
                    var files = document.createElement("input");
                    files.setAttribute('name', 'fotoproject');
                    files.setAttribute("type", "hidden");
                    files.setAttribute("value", hasil);
                    forms.appendChild(files);
                    });
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
