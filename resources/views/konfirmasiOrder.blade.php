@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Order')

@section('content')
<div class="haladmin">
    <center><p style="font-size:34px;margin-bottom:30px;">Order</p></center>
    <div class="tab">
        <button style="font-size:24px;" class="tablinks" onclick="window.location.href='/order'">Riwayat Order</button>
        <button style="font-size:24px;" class="tablinks" onclick="window.location.href='/order/terima-order'">Terima Pesanan</button>
        <button style="font-size:24px;" class="tablinks" onclick="openCity(event, 'transaksi')" id="defaultOpen">Konfirmasi Order</button>
    </div>
<!-- Tab content -->
<div id="transaksi" class="tabcontent">
  <div style="display:flex;flex-direction:row;font-size:20px">
      <div style="border: 1px solid #ddd;width:16.66%"><center>ID Order</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Nama Pembeli</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Nama Project</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Jumlah Transaksi</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Status</center></div>
  </div>
  @for($i=0;$i<count($dataOrder);$i++)
  <div style="display:flex;flex-direction:row;font-size:20px">
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$dataOrder[$i]->id}}</center></div>
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$users[$i]->name}}</center></div>
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$items[$i]->namaProject}}</center></div>
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$items[$i]->estimasi}}</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>
            <form action='/konfirmasi-order?id={{$dataOrder[$i]->id}}' method="post">
                {{csrf_field()}}
                <button type='submit' class="terima">Selesai</button>
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
