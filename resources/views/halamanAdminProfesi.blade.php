@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Halaman Admin')

@section('content')
<div class="haladmin">
    <center><p style="font-size:34px;margin-bottom:30px;">Halaman Admin</p></center>
    <div class="tab">
        {{-- <button style="font-size:24px;" class="tablinks" onclick="window.location.href='/halaman-admin'">Konfirmasi Order</button> --}}
        <button style="font-size:24px;" class="tablinks" onclick="openCity(event, 'pendaftaran')" id="defaultOpen">Pendaftaran Profesi</button>
    </div>
<!-- Pendaftaran profesi -->
<div id="pendaftaran" class="tabcontent">
  <div style="display:flex;flex-direction:row;font-size:20px">
      <div style="border: 1px solid #ddd;width:16.66%"><center>ID Profesi</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Nama Profesi</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Portofolio</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Alamat Kantor</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Nama Pemilik</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Nomor Telepon Yang Dapat Dihubungi</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Konfirmasi</center></div>
  </div>
  @for($i = 0; $i < count($profesis); $i++)
  <?php
  $fotos= explode(" ", $profesis[$i]->url_image);
  ?>
  <div style="display:flex;flex-direction:row;font-size:20px">
      <div style="border: 1px solid #ddd;width:16.66%"><center>{{$profesis[$i]->id}}</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>{{$profesis[$i]->nama_profesi}}</center></div>

      @for($j=0; $j<count($fotos); $j++)
      <div style="border: 1px solid #ddd;width:16.66%"><center><img style="width:100px" src="/{{$fotos[$j]}}"</center></div>
      <a href="/{{$fotos[$j]}}" download="namafile"><button class="terima">Download</button></a>
      @endfor
      <div style="border: 1px solid #ddd;width:16.66%"><center>{{$profesis[$i]->alamat}}</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>{{$profesis[$i]->nama_profesi}}</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>{{$profesis[$i]->nohp}}</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>
        <form action='/terima-profesi?id={{$profesis[$i]->id}}' method="post">
            {{csrf_field()}}
            <button type="submit" class="terima">Terima</button>
        </form>
        <form action='/tolak-profesi?id={{$profesis[$i]->id}}' method="post">
                {{csrf_field()}}
                <button type="submit" class="tolak">Tolak</button>
            </form>
        </center></div>
  </div>
  @endfor
</div>

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
</script>
@endsection
