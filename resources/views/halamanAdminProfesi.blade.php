@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Halaman Admin')

@section('content')
<center><h2 class="judul-halaman-admin">HALAMAN ADMIN</h2></center>
<br>
<div class="tab"><center>
  <button style="font-size:24px;" class="tablinks btn btn-primary" onclick="window.location.href='/halaman-admin'">Konfirmasi Transfer</button>
  <button style="font-size:24px;" class="tablinks btn btn-primary disabled" onclick="openCity(event, 'pendaftaran')" id="defaultOpen">Pendaftaran Profesi</button>
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
        <button class="btn btn-success" type="submit"><i class="fas fa-search">Cari</i></button>
      </div>
    </div>
  </div>
</div>

<!-- Pendaftaran profesi -->
<div id="pendaftaran">
<table>
  <thead>
    <tr>
      <th><center>ID Profesi</center></th>
      <th><center>Nama Profesi</center></th>
      <th><center>Portofolio dengan minimal 4 gambar</center></th>
      <th><center>Alamat Kantor</center></th>
      <th><center>Nama Pemilik</center></th>
      <th><center>Nomor Telepon</center></th>
      <th><center>Konfirmasi</center></th>
    </tr>
  </thead>
  @for($i = 0; $i < count($profesis); $i++)
  <?php
  $fotos= explode(" ", $profesis[$i]->url_image);
  ?>
  <tbody id="myTable">
    <tr>
      <td><center>{{$profesis[$i]->id}}</center></td>
      <td><center>{{$profesis[$i]->nama_profesi}}</center></td>
      <td>
        <center><a href="" data-toggle="modal" data-target="#foto-modal"><button class="btn btn-primary">LIHAT</button></a></center>
      </td>
      <td><center>{{$profesis[$i]->alamat}}</center></td>
      <td><center>{{$profesis[$i]->nama_profesi}}</center></td>
      <td><center>{{$profesis[$i]->nohp}}</center></td>
      <td style="padding: 1px;">
        <center><form action='/terima-profesi?id={{$profesis[$i]->id}}' method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-success">Terima</button>
        </form></center>
        <center><form action='/tolak-profesi?id={{$profesis[$i]->id}}' method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-danger">Tolak</button>
        </form></center>
      </td>
    </tr>
  </tbody>
  <!--GAMBAR PORTOFOLIO-->
  <div class="modal fade" id="foto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="loginmodal-container" style="background-color: gray;">
              <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
              </button>
              <center>
                <h1>PORTOFOLIO</h1>
                <h5><i>{{$profesis[$i]->nama_profesi}}</i></h5><br>
              </center>
              <div class="row">
                  <div class="col-sm">
                      @for($j=0; $j < count($fotos); $j++)
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
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

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
