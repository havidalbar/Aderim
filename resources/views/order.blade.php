@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')

@section('title', 'Aderim')
@section('css')
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection
@section('content')
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="row">
        <center><h2 style="margin-bottom: 30px;"><img src="/z_aderimLogo.png" width="50" height="50"> FOTO ATAU CATATAN YANG MENDUKUNG</h2></center>
        <div class="col-md-4">
            <form action="{{ url('/uploadFotoOrder') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                {{csrf_field()}}
            </form>
            <center><button id="submit-all" type="submit" class="submitDropzone btn-block">Kirim</button></center>
        </div>
        <div class="col-md-8 untuk-isi-daftar-profesi">
            <form id="tambah-order" method='post' action='{{url('/tambah-orderproses')}}'>
                <input type="hidden" name="id_project" value="{{$desProject->id}}" />
                <input type="hidden" name="id_user" value="{{Session::get('id')}}" />
                <input type="hidden" name="id_profesi" value="{{$desProject->id_profesi}}" />                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="pesan"><b>Deskripsi</b></label>
                        </div>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="pesan" placeholder="Tulis deskripsi project Anda di sini" style="height: 150px;" required>{{ old('pesan') }}</textarea>
                        </div>
                    </div>
                </div>                
                {{csrf_field()}}
                <center><input type="submit" name="submit" value="Lanjutkan ke pembayaran" class="btn" style="color: background-color: #ff5722;" /></center>
            </form>
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

                    var forms = document.getElementById('tambah-order');
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
