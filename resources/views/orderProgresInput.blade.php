@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('css')
<link rel="stylesheet" href="/css/dropzone.css">
@endsection

@section('content')
<div class="luarbukti">
<br>
<center><p style:"font-weight: bold;">Update Progres</p></center>
    <div style="margin-top:15px;font-size:16px;margin-left:20px;">
        @if(old('gambarprogres') == null)
            <div class="boxuploadbukti">
                    <form action="{{ url('/uploadProgres') }}" id="my-dropzone" enctype="multipart/form-data" class="dropzone" style="width: 97%; height: 200px">
                        {{ csrf_field() }}
                    </form>
                    <div style="float: right; padding: 3%">
                    <button id="submitbukti" class="submitbukti" style="cursor:pointer;" >Unggah</button>
                    </div>
                </div>


                @endif


                <div style="padding-top: 38px">
                    <form id="formprogres" method="POST" action='{{url('/orderprogresproses/'.$id_order)}}'>
                        <label for="pesan">Deskripsi:</label>
                        <textarea name="pesan" style="border-radius: 5px;" placeholder="Tulis deskripsi project Anda di sini" required>{{ old('pesan') }}</textarea>
                        <input type="hidden" name="id_project" value="{{$dataOrder->id_project}}" />
                        <input type="hidden" name="id_profesi" value="{{$dataOrder->id_profesi}}" />
                        <input type="hidden" name="id_user" value="{{$dataOrder->id_user}}" />
                        <select name="status" required>
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
                        {{csrf_field()}}
                        <center><input type="submit" name="submit" value="Lanjutkan ke pembayaran" /></center>
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
