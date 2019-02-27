@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="boxluartoko">
    <center><p style="font-size:54px;margin-bottom:30px;color: #006faa;">{{ $profesi->nama_profesi}}</p></center>
    <div class="tab">
        <button style="font-size:20px;" class="tablinks" onclick="openCity(event, 'semuaproject')" id="defaultOpen">project</button>
    <button style="font-size:20px;" class="tablinks" onclick="window.location.href='/profesi/{{$profesi->id}}/info'">Informasi profesi</button>
    </div>
<!-- Tab content -->
<div id="semuaproject">
    <p style="font-size:20px;font-weight:bold;margin-top:20px;color:#4c4c4c">Semua project</p>
    <center><div class="projecttoko">
        @for($i = 0; $i < count($items); $i++)
        <div class="box" style="text-align:left">
                <div class="project">
                  <img src="/{{$items[$i]->namagambar}}">
                  <ul><a style="text-decoration: none; color: black;" href ="/project/{{ $items[$i]->id_profesi}}">{{ $items[$i]->project}}</a></ul>
                </div>
                <div class="profesi">
                  <ul>{{ $profesi->nama_profesi}}</ul>
                  <ul><img src= "/pinblue.png" class="pin">{{ $profesi->alamat}}</ul>
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
