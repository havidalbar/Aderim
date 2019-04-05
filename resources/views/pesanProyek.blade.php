@extends ('layouts.cobanavLogin')
@section('title', 'Pesan Proyek | Aderim')

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
            var forms = document.getElementById('tambah-order');
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
</script>@endsection

@section('content')
<div class="ui container" style="color:#4d4d4d;margin-top:50px">
    <div style="max-width:700px;margin: 0 auto;border:1px solid #e1e2e3;border-radius:6px;padding:40px 45px 40px 45px">
        <div style="font-size:28px"><b>Pesan Proyek</b></div>
        <div style="font-size:20px;margin-top:15px;line-height:1.5">
            Anda akan melakukan pemesanan proyek dari profesi :
        </div>
        <div class="ui stackable grid" style="margin-top:5px">
            <div class="three wide column">
                <img class="ui circular image" src="{{asset($profesi->foto)}}"
                    style="width:80px;height:80px;object-fit:cover">
            </div>
            <div class="thirteen wide column">
                <div style="font-size:22px"><b>{{$profesi->nama_profesi}}</b></div>
                <div style="margin-top:5px">
                    <span><i class="map pin teal icon"></i></span>
                    <span style="font-size:18px">{{$desProject->daerah}}</span>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="ui container fluid" style="margin-top:20px">
            <div style="font-size:18px"><b>Gambar Desain</b></div>
            <form action="{{ url('/uploadFotoOrder') }}" enctype="multipart/form-data" class="dropzone"
                id="my-dropzone" style="margin-top:5px">
                {{csrf_field()}}
            </form>
            <button id="submit-all" type="submit" class="submitDropzone" style="display:none">Unggah</button>
        </div>
        <form class="ui form" style="margin-top:15px" id="tambah-order" method='post'
            action="{{url('/tambah-orderproses')}}" enctype="multipart/form-data">
            <input type="hidden" name="id_project" value="{{$desProject->id}}" />
            <input type="hidden" name="id_user" value="{{Session::get('id')}}" />
            <input type="hidden" name="id_profesi" value="{{$desProject->id_profesi}}" />
            <div class="field">
                <label style="font-size:18px">Deskripsi Proyek</label>
                <textarea name="pesan" maxlength="500" rows="6"
                    placeholder="Tuliskan deskripsi pesanan proyek anda..." required=""></textarea>
            </div>
            <div class="field">
                <label style="font-size:18px">Biaya Proyek</label>
                <div class="ui labeled fluid input" style="font-size:18px">
                    <label class="ui label">Rp</label>
                    <input type="number" name="estimasi" value="{{$desProject->estimasi}}" readonly style="background-color:#e8e8e8;border:none">
                </div>
            </div>
            {{csrf_field()}}
            <button class="ui big teal button fluid" onclick="" type="submit" name="submit" style="margin-top:40px">
                Pesan Proyek
            </button>
        </form>
    </div>
</div>

@include('layouts.cobafooter')
@endsection