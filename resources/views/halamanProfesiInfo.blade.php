@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="row">
        <center>
            <h2 style="margin-bottom: 30px;">{{ $profesi->nama_profesi}}</h2>
        </center>
        <div class="tab">
            <center>
                <button style="font-size:20px;" class="tablinks btn btn-primary" onclick="window.location.href='/profesi/{{$profesi->id}}'">Project</button>
                <button style="font-size:20px;" class="tablinks btn btn-primary disabled" onclick="openCity(event, 'informasitoko')" id="defaultOpen">Informasi profesi</button>
            </center>
        </div>
        <!-- Tab content -->
        <div class="col-md-8 untuk-isi-daftar-profesi" style="font-size: 20px; margin-top: 30px;">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>Nama Profesi</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: {{$profesi->nama_profesi}}</b></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>Alamat</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: {{$profesi->alamat}}</b></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>No HP</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: {{$profesi->nohp}}</b></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>Bergabung sejak</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: {{$profesi->created_at}}</b></label>
                    </div>
                </div>
            </div>
        </div>
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
