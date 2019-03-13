@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="container untuk-daftar-profesi halaman-profile">
        <center><h2 style="margin-bottom: 30px;">{{ $profesi->nama_profesi}}</h2></center>
    <div class="tab"><center>
        <button style="font-size:20px;" class="tablinks btn btn-primary disabled" onclick="openCity(event, 'semuaproject')" id="defaultOpen">Project</button>
        <button style="font-size:20px;" class="tablinks btn btn-primary" onclick="window.location.href='/profesi/{{$profesi->id}}/info'">Informasi profesi</button>
    </center></div>
    <!-- Tab content -->
    <div id="semuaproject">
        <center><p style="font-size:20px;font-weight:bold;margin-top:20px;color:#4c4c4c">Semua project</p></center>
        @for($i = 0; $i < count($items); $i++)
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="/{{$items[$i]->namagambar}}" style="cursor: zoom-in;">
                <div class="card-block" style="background-color: white;">
                    <h4 class="uploader mt-3"><a href="/project/{{ $items[$i]->id_profesi}}" style="text-decoration: none; color: black;">{{ $items[$i]->project}}</a></h4>
                    <div class="kategori">
                        <h5>{{ $profesi->nama_profesi}}</h5>
                    </div>
                    <div class="deskripsi">
                        Estimasi Harga: {{ $items[$i]->estimasi}}
                    </div>
                </div>
                <div class="card-footer">
                    <small><i class="fas fa-map-marker-alt"></i> {{ $profesi->alamat}}</small>
                </div>
            </div>
        </div>
    @endfor
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
