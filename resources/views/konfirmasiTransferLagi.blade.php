@extends (\Session::has('username') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('css')
<link rel="stylesheet" href="/css/dropzone.css">
@endsection

@section('content')
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="row">
        <center><h2 style="margin-bottom: 30px;"> Konfirmasi Pembayaran</h2></center>
        <div class="col-md-4">
            @if(old('gambarbukti') == null)
            <form action="{{ url('/uploadBukti') }}" id="my-dropzone" enctype="multipart/form-data" class="dropzone">
                {{ csrf_field() }}
            </form>
            <center><button id="submitbukti" class="submitbukti btn-block">Unggah</button></center>
            @endif
        </div>
        <div class="col-md-8 untuk-isi-daftar-profesi">
            <form id="formbukti" method="POST" action='{{url('/buktiprosesLagi/'.$id_transaksi)}}'>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name"><b>Nomor Transaksi</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="idTransaksiBaru" value="{{$id_transaksi}}" placeholder="Nomor ID Transaksi Anda" readonly />
                            <input type="hidden" name="id_transaksiLama" value="{{$id_transaksiLama}}" />
                            @if($orders->statusLagi===3)
                            <input type="hidden" name="id_transaksi2" value="{{$id_transaksi}}" />
                            @elseif($orders->statusLagi===6)
                            <input type="hidden" name="id_transaksi3" value="{{$id_transaksi}}" />
                            @elseif($orders->statusLagi===9)
                            <input type="hidden" name="id_transaksi4" value="{{$id_transaksi}}" />
                            @endif
                        <input type="hidden" name="id_order" value="{{$orders->id}}" />
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="bank" ><b>Bank Anda</b></label>
                        </div>
                        <div class="col-md-6">
                        <select class="form-control" name="bank">
                            <option selected="" value="Default">(Pilih Bank Anda)</option>
                            <option value="MANDIRI">MANDIRI</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="CIMB">CIMB Niaga</option>
                            <option value="BCA">BCA</option>
                        </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name"><b>Nomor Rekening</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="noRek" placeholder="Nomor Rekening Anda" value="{{ old('noRek') }}" required="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name"><b>Nama Pemilik Rekening</b></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaRek" placeholder="Nama Rekening Anda" value="{{ old('namaRek') }}" required="" />
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                <div class="form-check">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="bank" ><b>Bank Tujuan</b></label>
                        </div>
                        <div class="col-md-6">
                        <select class="form-control" name="bank_penerima">
                            <option selected="" value="Default">(Pilih Bank Aderim)</option>
                            <option value="MANDIRI">MANDIRI</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="CIMB">CIMB Niaga</option>
                            <option value="BCA">BCA</option>
                        </select>
                        </div>
                    </div>
                </div>
                <br>
                <button onclick="window.location.href='/home'" class="btn btn-danger" ><i class="fas fa-times"></i> Batal</button>
                <input type="submit" class="btn btn-success" value="✔ Selesai">
            </form>
        </div>

    </div>
</div>
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
@endsection
