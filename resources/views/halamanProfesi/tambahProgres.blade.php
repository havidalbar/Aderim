@extends ('layouts.cobanavLogin')
@section('title', 'Tambah Progres | Aderim')

@section('js')
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
            var forms = document.getElementById('tambah-progres');
            var files = document.createElement("input");
            files.setAttribute('name', 'files[]');
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

@section('content')
<div class="ui container" style="color:#4d4d4d;margin-top:50px">
    <div style="max-width:700px;margin: 0 auto;border:1px solid #e1e2e3;border-radius:6px;padding:40px 45px 40px 45px">
        <div style="font-size:28px"><b>Tambah Progres</b></div>
        <div style="font-size:20px;margin-top:15px;line-height:1.5">
            Tambahkan progres pengerjaan proyek yang anda kerjakan.
        </div>
        <div class="ui divider"></div>
        <div class="ui container fluid" style="margin-top:20px">
            <div style="font-size:18px"><b>Foto Progres Proyek</b></div>
            <form action="{{ url('/uploadProgres') }}" enctype="multipart/form-data" class="dropzone"
                id="my-dropzone" style="margin-top:5px">
                {{csrf_field()}}
            </form>
            <button id="submit-all" type="submit" class="submitDropzone" style="display:none">Unggah</button>
        </div>
        <form class="ui form" style="margin-top:15px" id="tambah-progres" method="post"
            action='{{url('/orderprogresproses/'.$id_order)}}' enctype="multipart/form-data">
            <input type="hidden" name="id_project" value="{{$dataOrder->id_project}}" />
            <input type="hidden" name="id_profesi" value="{{$dataOrder->id_profesi}}" />
            <input type="hidden" name="id_user" value="{{$dataOrder->id_user}}" />
            <div class="field">
                <label style="font-size:18px">Deskripsi Progres Proyek</label>
                <textarea name="pesan" maxlength="500" rows="6"
                    placeholder="Tuliskan deskripsi mengenai progres pengerjaan proyek anda..." required=""></textarea>
            </div>
            <div class="field">
                <label style="font-size:18px">Progres Bulan Ke</label>
                <div class="ui selection dropdown">
                    <input type="hidden" name="status">
                    <i class="dropdown icon"></i>
                    <div class="default text">Pilih Bulan</div>
                    <div class="menu">
                        @for($i=1;$i<25;$i++)
                    <div class="item" data-value="{{$i}}">{{$i}}</div>
                        @endfor
                    </div>
                </div>
            </div>
            {{csrf_field()}}
            <button class="ui big teal button fluid" onclick="" type="submit" name="submit" style="margin-top:40px">
                Tambah Progres
            </button>
        </form>
    </div>
</div>

@include('layouts.cobafooter')
@endsection