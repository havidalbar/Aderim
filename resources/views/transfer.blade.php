@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="row">
        <center>
            <h2>SEGERA LAKUKAN PEMBAYARAN DALAM WAKTU</h2>
            <h3>24 JAM</h3>
            <br>
            <p style="background-color:#fff7da;border: 1px solid #edd97c;font-size:16px;border-radius: 5px; margin-left: 10px; margin-right: 10px; padding: 10px;">Pastikan untuk tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali Aderim</p>
        </center>
        </center>
        <div class="col-md-8 untuk-isi-daftar-profesi" style="font-size: 20px; margin-top: 30px;">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="namaProject"><b>Transfer pembayaran ke nomor rekening: </b></label>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject">
                            <select id="select-show">
                                <option selected disabled style="font-weight: bold; background-color: #e0e0e0;">Pilih Bank</option>
                                <option value="satu">MANDIRI</option>
                                <option value="dua">BRI</option>
                                <option value="tiga">BNI</option>
                                <option value="empat">CIMB Niaga</option>
                                <option value="lima">BCA</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div id="satu-show" class="option-show">
        <p style="font-size: 24px;"><img src="http://cdn2.tstatic.net/jateng/foto/bank/images/bank-mandiri_20160131_221055.jpg" width="50px" style="margin-bottom: 10px;" style="margin-bottom: 10px;"> 172 177 3911 a/n Aderim</p>
        <h3>Nomor transaksi anda: </h3>
        <h4>{{$dataTransaksi->id}}</h4>
        <h3>Jumlah yang harus dibayar: </h3>
        <h4>Rp.{{ number_format(($dataTransaksi->jumlah*0.25 + $dataTransaksi->kode_token),0,",",".")}}</h4>
        <a href="{{url('/konfirmasiPembayaran/'.$dataTransaksi->id)}}"><button class="btn btn-success"><i class="fas fa-file-import"></i> Konfirmasi Pembayaran</button></a>
    <p><br></p>
    </div>
    <div id="dua-show" class="option-show">
        <p style="font-size: 24px;"><img src="http://3.bp.blogspot.com/-SWgS93bdb6g/VXGypPygDJI/AAAAAAAADxc/frkZIt2K0jM/s1600/Logo%2BBRI.jpg" width="50px" style="margin-bottom: 10px;"> 272 177 3922 a/n Aderim</p>
        <h3>Nomor transaksi anda: </h3>
        <h4>{{$dataTransaksi->id}}</h4>
        <h3>Jumlah yang harus dibayar: </h3>
        <h4>Rp.{{ number_format(($dataTransaksi->jumlah*0.25 + $dataTransaksi->kode_token),0,",",".")}}</h4>
        <a href="{{url('/konfirmasiPembayaran/'.$dataTransaksi->id)}}"><button class="btn btn-success"><i class="fas fa-file-import"></i> Konfirmasi Pembayaran</button></a>
    <p><br></p>
    </div>
    <div id="tiga-show" class="option-show">
        <p style="font-size: 24px;"><img src="https://www.indonesiamaritimechallenge.com/wp-content/uploads/2018/03/Logo-Bank-BNI-JPG.jpeg" width="50px" style="margin-bottom: 10px;"> 372 177 3933 a/n Aderim</p>
        <h3>Nomor transaksi anda: </h3>
        <h4>{{$dataTransaksi->id}}</h4>
        <h3>Jumlah yang harus dibayar: </h3>
        <h4>Rp.{{ number_format(($dataTransaksi->jumlah*0.25 + $dataTransaksi->kode_token),0,",",".")}}</h4>
        <a href="{{url('/konfirmasiPembayaran/'.$dataTransaksi->id)}}"><button class="btn btn-success"><i class="fas fa-file-import"></i> Konfirmasi Pembayaran</button></a>
    <p><br></p>
    </div>
    <div id="empat-show" class="option-show">
        <p style="font-size: 24px;"><img src="http://pressrelease.id/uploads/release/logo_CIMB_Niaga.jpg" width="50px" style="margin-bottom: 10px;"> 372 177 3944 a/n Aderim</p>
        <h3>Nomor transaksi anda: </h3>
        <h4>{{$dataTransaksi->id}}</h4>
        <h3>Jumlah yang harus dibayar: </h3>
        <h4>Rp.{{ number_format(($dataTransaksi->jumlah*0.25 + $dataTransaksi->kode_token),0,",",".")}}</h4>
        <a href="{{url('/konfirmasiPembayaran/'.$dataTransaksi->id)}}"><button class="btn btn-success"><i class="fas fa-file-import"></i> Konfirmasi Pembayaran</button></a>
    <p><br></p>
    </div>
    <div id="lima-show" class="option-show">
        <p style="font-size: 24px;"><img src="https://jokohariyanto.files.wordpress.com/2012/06/vector-logo-bca.jpg?w=625" width="50px" style="margin-bottom: 10px;"> 572 177 3955 a/n Aderim</p>
        <h3>Nomor transaksi anda: </h3>
        <h4>{{$dataTransaksi->id}}</h4>
        <h3>Jumlah yang harus dibayar: </h3>
        <h4>Rp.{{ number_format(($dataTransaksi->jumlah*0.25 + $dataTransaksi->kode_token),0,",",".")}}</h4>
        <a href="{{url('/konfirmasiPembayaran/'.$dataTransaksi->id)}}"><button class="btn btn-success"><i class="fas fa-file-import"></i> Konfirmasi Pembayaran</button></a>
    <p><br></p>
    </div>
    <div style="background: rgba(0, 0, 0, 0.8);border: 1px solid #4c4c4c;border-radius: 5px;">
        <center>
            <p style="color: white;">Transfer tepat sampai 3 digit terakhir<br>Perbedaan nominal menghambat proses verifikasi</p>
        </center>
    </div>
</div>
<script>
document.getElementById('select-show').onchange = function() {
    for (var i = 0; i < document.getElementsByClassName('option-show').length; i++) {
        document.getElementsByClassName('option-show')[i].style.display = 'none';
    }
    document.getElementById(document.getElementById('select-show').value + '-show').style.display = 'block';
}    
</script>
@endsection