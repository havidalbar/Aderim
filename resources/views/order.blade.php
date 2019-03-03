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
            <h2 style="padding: 3px;">FOTO ATAU CATATAN YANG MENDUKUNG</h2>
            {{ csrf_field() }}
            <form action="{{ url('/uploadFotoOrder') }}" enctype="multipart/form-data" style="width:400px; height: 200px" class="dropzone" id="my-dropzone">
                {{csrf_field()}}
            </form>

        </center>
        <div class="contactFrm">
                <center><button id="submit-all" type="submit" class="submitDropzone">Kirim</button></center>
        <form id="tambah-order" method='post' action='{{url('/tambah-orderproses')}}'>
                <label for="pesan">Deskripsi:</label>
                <textarea name="pesan" style="border-radius: 5px;" placeholder="Tulis deskripsi project Anda di sini" required>{{ old('pesan') }}</textarea>
                <input type="hidden" name="id_project" value="{{$desProject->id}}" />
                <input type="hidden" name="id_user" value="{{Session::get('id')}}" />
                <input type="hidden" name="id_profesi" value="{{$desProject->id_profesi}}" />
                {{csrf_field()}}
                <center><input type="submit" name="submit" value="Lanjutkan ke pembayaran" /></center>
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
