@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<center><h2>ORDER</h2></center>
<br>
<div class="tab"><center>
  <button style="font-size:24px;" class="tablinks btn btn-primary" onclick="window.location.href='/order/terima-order'">Terima Order</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary" onclick="window.location.href='/order'">Riwayat Order</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary disabled"  onclick="openCity(event, 'transaksi')" id="defaultOpen">Konfirmasi Order</button>
</center></div>
<br><br><br><br>

<!-- Konfirmasi Order -->
<div id="pendaftaran">
<table>
  <thead>
    <tr>
      <th><center>ID Order</center></th>
      <th><center>Nama Pembeli</center></th>
      <th><center>Nama Project</center></th>
      <th><center>Jumlah Transaksi</center></th>
      <th><center>Status</center></th>
    </tr>
  </thead>
  @for($i=0;$i<count($dataOrder);$i++)
  <tbody id="myTable">
    <tr>
      <td><center>{{$dataOrder[$i]->id}}</center></td>
      <td><center>{{$users[$i]->name}}</center></td>
      <td><center>{{$items[$i]->namaProject}}</center></td>
      <td><center>{{$items[$i]->estimasi}}</center></td>
      <td style="padding: 1px;">
        <center><form action='/konfirmasi-order?id={{$dataOrder[$i]->id}}' method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-success">Selesai</button>
        </form></center>
      </td>
    </tr>
  </tbody>
  @endfor
</table>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) { tabcontent[i].style.display = "none"; } tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) { tablinks[i].className = tablinks[i].className.replace(" active", ""); } document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
@endsection
