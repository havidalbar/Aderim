@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Halaman Admin')

@section('content')
<center><h2 class="judul-halaman-admin">HALAMAN ADMIN</h2></center>
<br>
<div class="tab"><center>
  <button style="font-size:24px;" class="tablinks btn btn-primary disabled">Konfirmasi Transfer</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary" onclick="window.location.href='/halaman-admin/profesi'">Pendaftaran Profesi</button>
</center></div>
<br>
<br>
<div class="input-group" style="margin: 20px;">
  <div class="row">
    <div class="col-md-9">
      <input type="text" id="myInput" class="form-control" placeholder="Cari daftar..." aria-label="" aria-describedby="basic-addon1" style="border: 2px solid black; border-radius: 12px">
    </div>
    <div class="col-md-3">
      <div class="input-group-append">
        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>
</div>

<!-- Pendaftaran profesi -->
<div id="pendaftaran">
<table>
  <thead>
    <tr>
      <th><center>Nomor Transaksi</center></th>
      <th><center>Tanggal Transaksi</center></th>
      <th><center>Nama Pembeli</center></th>
      <th><center>No. Rekening</center></th>
      <th><center>Total Biaya</center></th>
      <th><center>Bukti Pembayaran</center></th>
      <th><center>Konfirmasi</center></th>
    </tr>
  </thead>
  @for($i = 0; $i < count($transaksis); $i++)
  <tbody id="myTable">
    <tr>
      <td><center>{{$transaksis[$i]->id}}</center></td>
      <td><center>{{$transaksis[$i]->created_at}}</center></td>
      <td><center>{{$transaksis[$i]->nama}}</center></td>
      <td><center>{{$transaksis[$i]->norek}}</center></td>
      <td><center>{{$transaksis[$i]->jumlah*0.25+$transaksis[$i]->kode_unik}}</center></td>
      <td><br>
        <center><a href="" data-toggle="modal" data-target="#login-modal"><img style="width:100px" src="/{{$transaksis[$i]->gambar_konfirmasi}}"></a></center><br>
        <center><a href="/{{$transaksis[$i]->gambar_konfirmasi}}" download="buktitransfer"><button class="btn btn-success">Download</button></a></center><br>
<!--         <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-container">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text"><i class="fas fa-times" style="background-color: red; padding: 5px; color: white; border-radius: 12px;"></i></span>
                    </button>
                    <center style="margin-top: 100px;">
                        <img src="/{{$transaksis[$i]->gambar_konfirmasi}}" style="width: 85%;">
                    </center>
                    <div class="login-help">
                        <br>
                        <center><a href="/{{$transaksis[$i]->gambar_konfirmasi}}" download="buktitransfer"><button class="btn btn-success">Download</button></a></center>
                    </div>
                </div>
            </div>
        </div> -->
      </td>
      <td style="padding: 1px;">
        <center><form action='/terima-transfer?id={{$transaksis[$i]->id}}' method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-success">Terima</button>
        </form></center>
        <center><form action='/tolak-transfer?id={{$transaksis[$i]->id}}' method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-danger">Tolak</button>
        </form></center>
      </td>
    </tr>
  </tbody>
  @endfor
</table>
</div>

<script>

$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
@endsection
