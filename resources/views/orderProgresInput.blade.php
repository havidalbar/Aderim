@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('css')
<link rel="stylesheet" href="/css/dropzone.css">
@endsection

@section('content')
<a href="/order-progres"><button class="btn btn-primary pull-left"><i class="fas fa-arrow-left"></i> KEMBALI</button></a><br>
<p><br></p>
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="row">
        <center><h2 style="margin-bottom: 30px;">UPDATE PROGRES</h2></center>
        <div class="col-md-4">
            @if(old('gambarprogres') == null)
            <form action="{{ url('/uploadProgres') }}" id="my-dropzone" enctype="multipart/form-data" class="dropzone">
                {{csrf_field()}}
            </form>
            <center><button id="submitbukti" class="submitbukti btn-block">Unggah</button></center>
            @endif
        </div>
        <div class="col-md-8 untuk-isi-daftar-profesi">
            <form id="formprogres" method="POST" action='{{url('/orderprogresproses/'.$id_order)}}'>
                <input type="hidden" name="id_project" value="{{$dataOrder->id_project}}" />
                <input type="hidden" name="id_profesi" value="{{$dataOrder->id_profesi}}" />
                <input type="hidden" name="id_user" value="{{$dataOrder->id_user}}" />
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
                <div class="form-check">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                        <select name="status" class="form-control" required>
                            <option value="">(Pilih Waktu)</option>
                            <option value="1">1 bulan</option>
                            <option value="2">2 bulan</option>
                            <option value="3">3 bulan</option>
                            <option value="4">4 bulan</option>
                            <option value="5">5 bulan</option>
                            <option value="6">6 bulan</option>
                            <option value="7">7 bulan</option>
                            <option value="8">8 bulan</option>
                            <option value="9">9 bulan</option>
                            <option value="10">10 bulan</option>
                            <option value="11">11 bulan</option>
                            <option value="12">12 bulan</option>
                        </select>
                        </div>
                    </div>
                </div>
                <br>
                {{csrf_field()}}
                <center><input type="submit" name="submit" value="Update Progres" class="btn" /></center>
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
        maxFilesize: 5,
        maxFiles: 4,
        parallelUploads: 10,
        acceptedFiles: "image/*",

        init: function() {
            this.on("success", function(file, response) {
                let hasil = 'image/' + response;

                var forms = document.getElementById('formprogres');
                var files = document.createElement("input");
                files.setAttribute('name', 'files[]');
                files.setAttribute("type", "hidden");
                files.setAttribute("value", hasil);
                forms.appendChild(files);
                });

    var submitButton = document.querySelector("#submitbukti");
        myDropzone = this;
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
