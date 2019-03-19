@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<center><h2>ORDER</h2></center>
<br>
<div class="tab"><center>
  <button style="font-size:24px;" class="tablinks btn btn-primary" onclick="window.location.href='/order/terima-order'">Terima Order</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary disabled" onclick="openCity(event, 'transaksi')" id="defaultOpen">Riwayat Order</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary"  onclick="window.location.href='/order/konfirmasi-order'">Konfirmasi Order</button>
</center></div>
<br><br>

<div class="input-group" style="margin: 20px;">
  <div class="row">
    <div class="col-md-9">
      <input type="text" id="myInput" class="form-control" placeholder="Cari riwayat order..." aria-label="" aria-describedby="basic-addon1" style="border: 2px solid black; border-radius: 12px">
    </div>
    <div class="col-md-3">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit"><i class="fas fa-search">Cari</i></button>
      </div>
    </div>
  </div>
</div>

<!-- Riwayat Order -->
<div id="pendaftaran">
<table>
  <thead>
    <tr>
      <th><center>ID Order</center></th>
      <th><center>Nama Pembeli</center></th>
      <th><center>Nama Project</center></th>
      <th><center>Jumlah Transaksi</center></th>
    </tr>
  </thead>
  @for($i=0;$i< count($dataOrder);$i++)
  <tbody id="myTable">
    <tr>
      <td><center>{{$dataOrder[$i]->id}}</center></td>
      <td><center>{{$users[$i]->name}}</center></td>
      <td><center>{{$items[$i]->namaProject}}</center></td>
      <td><center>{{$items[$i]->estimasi}}</center></td>
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
