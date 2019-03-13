@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<center><h2>ORDER</h2></center>
<br>
<div class="tab"><center>
  <button style="font-size:24px;" class="tablinks btn btn-primary disabled" onclick="openCity(event, 'pendaftaran')" id="defaultOpen">Terima Order</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary" onclick="window.location.href='/order'">Riwayat Order</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary"  onclick="window.location.href='/order/konfirmasi-order'">Konfirmasi Order</button>
</center></div>
<br><br><br><br>

<!-- Terima Order -->
<div id="pendaftaran">
<table>
  <thead>
    <tr>
      <th><center>ID Order</center></th>
      <th><center>Nama Pembeli</center></th>
      <th><center>File Desain</center></th>
      <th><center>Nama Project</center></th>
      <th><center>Jumlah Transaksi</center></th>
      <th><center>Konfirmasi</center></th>
    </tr>
  </thead>
  @for($i=0;$i< count($dataOrder); $i++)
  <?php
  $fotos= explode(" ", $dataOrder[$i]->url_gambar);
  ?>
  <tbody id="myTable">
    <tr>
      <td><center>{{$dataOrder[$i]->id}}</center></td>
      <td><center>{{$users[$i]->name}}</center></td>
      <td>
        <center><a href="" data-toggle="modal" data-target="#foto-modal"><button class="btn btn-primary">LIHAT</button></a></center>
      </td>
      <td><center>{{$items[$i]->namaProject}}</center></td>
      <td><center>{{$items[$i]->estimasi}}</center></td>
      <td style="padding: 1px;">
        <center><form action='/terima-order?id={{$dataOrder[$i]->id}}' method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-success">Terima</button>
        </form></center>
        <center><form action='/tolak-order?id={{$dataOrder[$i]->id}}' method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-danger">Tolak</button>
        </form></center>
      </td>
    </tr>
  </tbody>
  <!--FILE DESAIN-->
  <div class="modal fade" id="foto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="loginmodal-container" style="background-color: gray;">
              <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
              </button>
              <center>
                <h1>FILE DESAIN</h1>
                <h5><i>Dari: {{$users[$i]->name}}</i></h5><br>
              </center>
              <div class="row">
                  <div class="col-sm">
                      @for($j=0; $j< count($fotos); $j++)
                      <center>
                        <img src="/{{$fotos[$j]}}" width="130" height="90" style="padding-top: 5px;">
                      </center>
                      <center>
                        <a href="/{{$fotos[$j]}}" download="namafile"><button class="btn btn-success">Download</button></a>
                      </center>
                      @endfor
                  </div>
              </div>
              <br>
          </div>
      </div>
  </div>
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
