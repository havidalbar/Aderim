@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('css')
<link rel="stylesheet" href="/css/dropzone.css">
@endsection

@section('content')
<div class="luarbukti">
<br>
<center><p style:"font-weight: bold;">Konfirmasi Pembayaran</p></center>
    <div style="margin-top:15px;font-size:16px;margin-left:20px;">
        @if(old('gambarbukti') == null)
            <div class="boxuploadbukti">
                    <form action="{{ url('/uploadBukti') }}" id="my-dropzone" enctype="multipart/form-data" class="dropzone" style="width: 97%; height: 200px">
                        {{ csrf_field() }}
                    </form>
                    <div style="float: right; padding: 3%">
                    <button id="submitbukti" class="submitbukti" style="cursor:pointer;" >Unggah</button>
                    </div>
                </div>


                @endif


                <div style="padding-top: 38px">
        <form id="formbukti" method="POST" action='{{url('/buktiproses/'.$id_transaksi)}}'>
            <br>
            <label for="name">ID Pemesanan :</label>
            <br>
            <input style="width:716px;margin-bottom:10px" type="number" name="idOrder" value={{$id_transaksi}} placeholder=" Nomor ID Transaksi Anda"/ readonly>
            <br>
    <label for="bank">Bank Anda :</label>
    <select style="width:716px;height: 30px;margin-bottom:10px" name="bank">
            <option selected="" value="Default">(Pilih Bank Anda)</option>
            <option value="BCA">BCA</option>
            <option value="MANDIRI">MANDIRI</option>
            <option value="BRI">BRI</option>
            <option value="BNI">BNI</option>
            <option value="CIMB">CIMB</option>
            </select>
    <label for="name">Nomor Rekening :</label>
    <br>
    <input style="width:716px;margin-bottom:10px" type="number" name="noRek" value="{{ old('noRek') }}" required="" placeholder=" Nomor Rekening Anda"/>
    <label for="name">Nama Pemilik Rekening :</label>
    <br>
    <input style="width:716px;margin-bottom:10px" type="text" name="namaRek" value="{{ old('namaRek') }}" required="" placeholder=" Nama Rekening Anda"/>
        {{csrf_field()}}
        <label for="bank_penerima">Bank Tujuan :</label>
    <br>
        <select style="width:716px;height: 30px;margin-bottom:10px" name="bank_penerima">
        <option selected="" value="Default">(Pilih Bank TitipCetak)</option>
        <option value="BCA">BCA</option>
        <option value="MANDIRI">MANDIRI</option>
        <option value="BRI">BRI</option>
        <option value="BNI">BNI</option>
        <option value="CIMB">CIMB</option>
        </select>

    <br>
    <button onclick="window.location.href='/home'" class="buktibatal" style="margin-left:545px;cursor:pointer;">Batal</button>
    <input type="submit" class="buktiselesai" style="float:right;cursor:pointer;" value="Selesai">
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
