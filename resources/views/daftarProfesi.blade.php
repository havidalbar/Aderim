@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')

@section('title', 'Aderim')
@section('css')
<link rel="stylesheet" href="/css/dropzone.css">
@endsection
@section('content')
<div class="infoprofesi">
    <div style="margin-left:20px;">
<div style="display: flex;flex-direction">

    <div class="tampiluploadproject">
        <center>
            <h2 style="padding: 3px;">FOTO PORTOFOLIO</h2>
            <form action="{{ url('/uploadFoto') }}" enctype="multipart/form-data" style="width:360px; height: 200px" class="dropzone" id="my-dropzone">

                {{csrf_field()}}
            </form>

        </center>
        <div class="contactFrm">
                <center><button id="submit-all" type="submit" class="submitDropzone">Kirim</button></center>
        <form id="tambah-profesi" method='post' action='{{url('/daftarprofesiproses')}}'>
                <label for="nama_profesi">Nama Profesi:</label>
                <input type="text" style="border-radius: 5px;" name="nama_profesi" value="{{ old('nama_profesi') }}" required="" />
                <label for="job_title">Pekerjaan:</label>
                <select name="job_title" required>
                        <option value="">(Pilih Pekerjaan)</option>
                        <option value="arsitektur">Arsitektur</option>
                        <option value="desain">Desain Interior</option>
                    </select>
                    <br>
                    <label for="address">Alamat:</label>
                    <input type="text" style="border-radius: 5px;" name="address" value="{{ old('address') }}" required="" />
                    <label for="nohp">Nomor Telpon:</label>
                    <input type="text" style="border-radius: 5px;" name="nohp" value="{{ old('nohp') }}" required="" />
                {{csrf_field()}}
                <center><input type="submit" name="submit" value="Daftar Profesi" /></center>
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
            autoProcessQueue : false,
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
