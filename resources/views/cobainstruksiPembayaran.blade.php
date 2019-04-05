@extends ('layouts.cobanavLogin')
@section('title', 'Pesan Proyek | Aderim')

@section('js')
<script src="/js/dropzone.js"></script>
<script type="text/javascript">
Dropzone.options.myDropzone = {
    autoProcessQueue: false,
    addRemoveLinks: true,
    paramName: 'file',
    maxFilesize: 5,
    maxFiles: 1,
    acceptedFiles: "image/*",
    init: function() {
        this.on("success", function(file, response) {
            let hasil = 'image/' + response;
            var forms = document.getElementById('formbukti');
            var files = document.createElement("input");
            files.setAttribute('name', 'gambarbukti');
            files.setAttribute("type", "hidden");
            files.setAttribute("value", hasil);
            forms.appendChild(files);
        });
        var submitButton = document.querySelector("#submitbukti");
        myDropzone = this;
        submitButton.addEventListener("click", function() {
            myDropzone.processQueue();
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
<div class="ui container" style="margin-top:50px">
    <div style="max-width:600px;margin: 0 auto;border:1px solid #e1e2e3;border-radius:6px;background-color:white">
        <div class="ui container center aligned" style="padding:40px 60px 40px 60px">
            <div>
                <h2>Instruksi Pembayaran</h2>
                <p style="font-size:16px">Transfer tepat sesuai dengan nominal berikut</p>
            </div>
            <div style="display:flex;flex-direction:row;justify-content:center;font-weight:bold;margin-top:20px">
                <div style="font-size:28px;color:#4d4d4d">Rp</div>
                <div id="nominal_donasi" style="margin-left:10px;font-size:28px;color:#4d4d4d">300.863</div>
            </div>
            <div class="ui pointing label fluid"
                style="font-size:16px;line-height:1.6;background-color:#fff7c2;color:#4d4d4d">
                <div class="ui grid" style="padding:10px">
                    <div class="one wide middle aligned column">
                        <i class="large exclamation circle icon"></i>
                    </div>
                    <div class="fifteen wide column">
                        <div>
                            PENTING! Mohon transfer tepat sampai 3 angka terakhir agar pembayaran anda dapat diproses.
                        </div>
                    </div>
                </div>
            </div>
            <div style="border:1px solid #e1e2e3;border-radius:6px;margin:20px 5px 20px 5px;padding:10px">
                <div class="ui stackable grid container">
                    <div class="eight wide column left aligned">
                        <div style="font-size:17px;color:#263d40"><b>Jumlah Pembayaran</b></div>
                    </div>
                    <div class="eight wide column right aligned">
                        <div style="display:flex;flex-direction:row;float:right">
                            <div style="font-size:17px"><b>Rp</b></div>
                            <div style="font-size:17px;margin-left:5px"><b>300.000</b></div>
                        </div>
                    </div>
                </div>

                <div class="ui divider"></div>

                <div class="ui stackable grid container">
                    <div class="eight wide column left aligned">
                        <div style="font-size:17px;color:#263d40"><b>Kode Unik</b></div>
                    </div>
                    <div class="eight wide column right aligned">
                        <div style="font-size:17px"><b>863</b></div>
                    </div>
                </div>
            </div>
            <button type="button" name="copyToken" value="copy" class="copyToken ui large teal button"
                onclick="copyToClipboard('#nominal_donasi')">
                SALIN NOMINAL
            </button>
        </div>
    </div>
</div>
<div class="ui container" style="margin-top:30px">
    <div style="max-width:600px;margin: 0 auto;border:1px solid #e1e2e3;border-radius:6px;background-color:white">
        <div class="ui container center aligned" style="padding:40px 60px 40px 60px">
            <div>
                <p style="font-size:16px">Transfer ke rekening a/n <b>Yayasan Help Pet</b> berikut ini :</p>
            </div>
            <div class="ui stackable grid"
                style="border:1px solid #e1e2e3;border-radius:6px;margin:20px 5px 20px 5px;padding:10px">
                <div class="seven wide column">
                    <img class="ui small image" src="{{asset('bankbca.png')}}" style="padding-left:10px">
                </div>
                <div class="five wide column middle aligned">
                    <div id="nomor_rekening" style="font-size:20px"><b>4911008989</b></div>
                </div>
                <div class="four wide column middle aligned">
                    <button type="button" name="copyToken" value="copy" class="copyToken ui large button"
                        onclick="copyToClipboard('#nomor_rekening')" style="background:none;color:#263d40">
                        SALIN
                    </button>
                </div>
            </div>
            <div style="border:1px solid #e1e2e3;border-radius:6px;margin:20px 5px 0px 5px;padding:10px">
                <div style="font-size:16px;text-align:left;line-height:1.5;padding:10px">
                    Transfer sebelum <b>25 Maret 2019 12:00 WIB</b> atau pembayaran anda otomatis dibatalkan oleh
                    sistem.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tombol Selesai -->
<div style="max-width:600px;margin: 0 auto">
    <button class="fluid ui big teal button" style="margin-top:30px;margin-bottom:50px"
        onclick="$('.ui.tiny.modal').modal('show');">
        Unggah Bukti Pembayaran
    </button>
</div>

<!-- Dimmer -->
<div class="ui tiny modal">
    <div class="header">
        Unggah Bukti Pembayaran
    </div>
    <div class="content">
        <form action="{{ url('/uploadBukti') }}" id="my-dropzone" enctype="multipart/form-data" class="dropzone">
            {{ csrf_field() }}
        </form>        
    </div>
    <div class="actions">
        <a href="#">
            <button class="ui positive button">
                Selesai
            </button>
        </a>
    </div>
</div>

@include('layouts.cobafooter')
@endsection