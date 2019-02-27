<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title> {{--ini fungsi untuk memasukkan judul layout--}}
    @yield('css') {{--ini fungsi ketika master di extend oleh child maka kamu bisa panggil lagi di child dengan keyword section dan mengimport link css--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> {{--nanti km desain di file ini ya ada di folder public--}}
    <link rel="stylesheet" type="text/css" href=" https://fonts.googleapis.com/css?family=Raleway:300,400,600">

</head>
<body>
<header>
@if(\Session::has('alert')){{--ini fungsi buat deteksi yg login--}} {{--note:name pada setiap class/button/dropdown/input samain jangan dirubah--}}
<script type="text/javascript">
    alert("{{Session::get('alert')}}");
</script>
@endif
@if(\Session::has('alert-success'))
<script type="text/javascript">
    alert("{{Session::get('alert-success')}}");
</script>
@endif
<nav id="menu">
<div class="boxmenu">
    <ul>
    <li>
        <div id="quickmenu">
        </div>
    </li>
        <div id="heading">
        <a href="/home"><img src="/cropped-WWS-Logo-Icon-512px_512px.png" class="Logo" /></a>
        </div>
    <li><a href="#" class="kategori">Kategori</a>
        <ul>
        <li> <a href="/kategori/rumah">Rumah</a></li>
        <li> <a href="/kategori/hotel">Hotel</a></li>
        <li> <a href="/kategori/apartemen">Apartemen</a></li>
        </ul>
    </li>
        <li><form class="kotakcari" method="GET" action="/get-search">
            <input class="search" type="search" name="cari" placeholder="Cari project"\>
            <input class="button" type="submit" value="Cari" style="cursor:pointer;">
        </form></li>
    <li><a href="/#"><img src="/icon_cart_alt.png" class="beli"></a></li>
    <li><a href="/register" class= "daftar">Daftar</a></li>
    <li><a href="/login" class= "daftar">Login</a></li>

    </ul>
    </div>
</nav>
@yield('js')
<script type="text/javascript">
function myFunctionLogin() {
    document.getElementById("myDropdownLogin").classList.toggle("show");
}

window.onclick = function(event) {
if (!event.target.matches('.dropbtnlogin')) {

    var dropdowns = document.getElementsByClassName("dropdownlogin-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
    }
    }
}
}
</script>
</header>
<br>
    @yield('content')
</br>

<br>
    @yield('bawah')
</br>



<footer>


</footer>
</body>
</html>
