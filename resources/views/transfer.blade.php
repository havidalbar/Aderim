@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="luarbayar">
    <br>
    <br>
    <center><p style:"font-weight: bold;">Checkout Berhasil</p></center>
    <div class="dalambayar">
        <div style="background-color:#f7f8f7;border: 1px solid #3097d1;font-size:16px;border-radius: 5px;">
        <center><p>SEGERA LAKUKAN PEMBAYARAN DALAM WAKTU</p></center>
        <center><p>24 Jam</p></center>
        </div>
        <div style="margin-top:30px;background-color:#fff7da;border: 1px solid #edd97c;font-size:16px;border-radius: 5px;">
        <center><p style="margin:10px;">Pastikan untuk tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali TitipCetak</p></center>
        </div>
        <p style="margin-top:30px;">Transfer pembayaran ke nomor rekening :</p>
        <img src="/bca.png">
        <p>372 177 3939 a/n PT. TitipCetak</p>
        <hr width="100%" color="#ededed" align="center">
        <img style="margin-top:20px;" src="/mandiri.png">
        <p>372 177 3939 a/n PT. TitipCetak</p>
        <hr width="100%" color="#ededed" align="center">
        <img style="margin-top:20px;" src="/bri.png">
        <p>372 177 3939 a/n PT. TitipCetak</p>
        <hr width="100%" color="#ededed" align="center">
        <img style="margin-top:20px;" src="/bni.png">
        <p>372 177 3939 a/n PT. TitipCetak</p>
        <hr width="100%" color="#ededed" align="center">
        <img style="margin-top:20px;" src="/cimb.png">
        <p>372 177 3939 a/n PT. TitipCetak</p>
        <hr width="100%" color="#ededed" align="center">
        <br>
        <p>ID Transaksi Anda :</p>
        <p>#{{$dataTransaksi->id}}</p>
        <p>Jumlah yang harus dibayar :</p>
        <p style="color:red;">Rp {{ number_format(($dataTransaksi->jumlah + $dataTransaksi->kode_token),0,",",".")}}</p>
        <div style="margin-top:20px;background-color:#4c4c4c;border: 1px solid #4c4c4c;border-radius: 5px;">
        <center><p style = "color:white;">Transfer tepat sampai 3 digit terakhir</p></center>
        <center><p style = "color:white;">Perbedaan nominal menghambat proses verifikasi</p></center>
        </div>
        <a style="text-decoration:none;" href="/konfirmasi-pembayaran"><div style="margin-top:20px;background-color:#3097d1;border: 1px solid #3097d1;border-radius: 5px;">
        <center><p style = "color:white;font-size:20px;">Konfirmasi Pembayaran</p></center>
        </div></a>
    </div>

</div>
@endsection
