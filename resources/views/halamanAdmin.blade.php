@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Halaman Admin')

@section('content')
<div class="haladmin">
    <center><p style="font-size:34px;margin-bottom:30px;">Halaman Admin</p></center>
    <div class="tab">
        <button style="font-size:24px;" class="tablinks" onclick="openCity(event, 'transaksi')" id="defaultOpen">Konfirmasi Transfer</button>
        <button style="font-size:24px;" class="tablinks" onclick="window.location.href='/halaman-admin/profesi'">Pendaftaran Profesi</button>
    </div>
<!-- Tab content -->
<div id="transaksi" class="tabcontent">
  <div style="display:flex;flex-direction:row;font-size:20px">
      <div style="border: 1px solid #ddd;width:16.66%"><center>ID Transaksi</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Tanggal Transaksi</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Nama Pembeli</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>No. Rekening</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Total Biaya</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Gambar Konfirmasi</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Konfirmasi</center></div>
  </div>
  @for($i = 0; $i < count($transaksis); $i++)
  <div style="display:flex;flex-direction:row;font-size:20px">
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$transaksis[$i]->id}}</center></div>
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$transaksis[$i]->created_at}}</center></div>
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$transaksis[$i]->nama}}</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>{{$transaksis[$i]->norek}}</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>{{$transaksis[$i]->jumlah*0.25+$transaksis[$i]->kode_unik}}</center></div>
  <div style="border: 1px solid #ddd;width:16.66%"><center><img style="width:100px" src="/{{$transaksis[$i]->gambar_konfirmasi}}"</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>
            <form action='/tolak-transfer?id={{$transaksis[$i]->id}}' method="post">
                {{csrf_field()}}
                <button type="submit" class="tolak">Tolak</button>
            </form>
            <form action='/terima-transfer?id={{$transaksis[$i]->id}}' method="post">
                {{csrf_field()}}
                <button type="submit" class="terima">Terima</button>
            </form>
        </div>
  </div>
  @endfor

</div>

</div>

<script>
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>
@endsection
