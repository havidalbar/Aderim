@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Penjualan')

@section('content')
<div class="haladmin">
    <center><p style="font-size:34px;margin-bottom:30px;">Penjualan</p></center>
    <div class="tab">
        <button style="font-size:24px;" class="tablinks" onclick="window.location.href='/order'">Riwayat Order</button>
        <button style="font-size:24px;" class="tablinks" onclick="openCity(event, 'pendaftaran')" id="defaultOpen">Terima Order</button>
        <button style="font-size:24px;" class="tablinks" onclick="window.location.href='/order/konfirmasi-order'">Konfirmasi Order</button>
    </div>

<div id="pendaftaran" class="tabcontent">
  <div style="display:flex;flex-direction:row;font-size:20px">
      <div style="border: 1px solid #ddd;width:14.28%"><center>ID Order</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>Nama Pembeli</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>Nama Project</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>Jumlah Transaksi</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>File Desain</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>Konfirmasi</center></div>
  </div>
  @for($i=0;$i<count($dataOrder); $i++)
  <?php
  $fotos= explode(" ", $dataOrder[$i]->url_gambar);
  ?>
  <div style="display:flex;flex-direction:row;font-size:20px">
      <div style="border: 1px solid #ddd;width:14.28%"><center>{{$dataOrder[$i]->id}}</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>{{$users[$i]->name}}</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>{{$items[$i]->namaProject}}</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>{{$items[$i]->estimasi}}</center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>
          @for($j=0; $j<count($fotos); $j++)
          <a href="/{{$fotos[$j]}}" download="namafile"><button class="terima">Download</button></a>
          @endfor
        </center></div>
      <div style="border: 1px solid #ddd;width:14.28%"><center>
        <form action='/tolak-order?id={{$dataOrder[$i]->id}}' method="post">
            {{csrf_field()}}
            <button type='submit' class="terima">Tolak</button>
        </form>
          <form action='/terima-order?id={{$dataOrder[$i]->id}}' method="post">
            {{csrf_field()}}
            <button type='submit' class="terima">Terima</button>
        </form>
        </center></div>
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
