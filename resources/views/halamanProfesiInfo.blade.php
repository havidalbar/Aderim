@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="boxluartoko">
    <center><p style="font-size:54px;margin-bottom:30px;margin-top:20px;color: #006faa;">{{ $profesi->nama_profesi}}</p></center>
    <div class="tab">
    <button style="font-size:20px;" class="tablinks" onclick="window.location.href='/profesi/{{$profesi->id}}'">project</button>
        <button style="font-size:20px;" class="tablinks" onclick="openCity(event, 'informasitoko')" id="defaultOpen">Informasi profesi</button>
    </div>
<!-- Tab content -->
<div id="informasitoko">
    <div class="infotoko">
        <div class="barisinfo">
            <p style="width:25%;">Nama profesi</p>
            <p style="width:75%;">{{$profesi->nama_profesi}}</p>
        </div>
        <div class="barisinfo">
            <p style="width:25%;">Alamat profesi</p>
        <p style="width:75%;">{{$profesi->alamat}}</p>
            <div class="barisinfo">
            <p style="width:25%;">Nomor Telepon</p>
            <p style="width:75%;">{{$profesi->nohp}}</p>
        </div>
        <div class="barisinfo">
            <p style="width:25%;margin-bottom:20px;">Terdaftar Sejak</p>
            <p style="width:75%;">{{date_format($profesi->created_at,"d-m-Y")}}</p>
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
