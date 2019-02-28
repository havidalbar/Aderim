<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @yield('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
<header>
    @if(\Session::has('alert'))
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
          <a href="/home"><img src="/cropped-WWS-Logo-Icon-512px_512px.png" class="Logo"/></a>
        </div>

      <li><form method="GET" action="/get-search">
        <input class="search" type="search" name="cari" placeholder="Cari project">
        <input class="button" type="submit" value="Cari" style="cursor:pointer;">
    </form></li>
    <li><a href="#" class="kategori">Kategori</a>
        <ul>
              <li> <a href="/kategori/rumah">Rumah</a></li>
              <li> <a href="/kategori/hotel">Hotel</a></li>
              <li> <a href="/kategori/apartemen">Apartemen</a></li>
          </ul>
        </li>
      {{-- <li><a href="/#"><img src="/icon_cart_alt.png" class="beli"></a></li> --}}
      @if(Session::has('nama_profesi'))
      <li><a href="#"><img src="/market.png" class="market"></a></li>
<li><a href="{{url('daftar-profesi')}}" class="profesi">Profesi</a>
      <ul style="left: 1245px; width:157px;">
      <li><a href="/profesi/{{Session::get('id_profesi')}}">Profesi Saya</a></li>
      {{-- <li><a href="/order">Order</a></li> --}}
      <li><a href="/tambah-project">Tambah Project</a></li>
      </ul>
      </li>
      <ul>
            <li> <a href="/kategori/rumah">Rumah</a></li>
            <li> <a href="/kategori/hotel">hotel</a></li>
            <li> <a href="/kategori/apartemen">Apartemen</a></li>
      </ul>
      @else
      <li><a href="/daftar-profesi"><img src="/market.png" class="market"></a></li>
      <li><a href="/daftar-profesi" class="profesi">Profesi</a></li>
      @endif
      <li><a href="/informasi-akun"><img src="/user.png" class="user"></a></li>
      <li><a href="/informasi-akun" class="akun">{{\Session::get('name')}}</a>
      <ul style="left: 1330px; width:157px;">
        @if(Session::get('name') == "admin")
        <li><a href="/halaman-admin">Halaman Admin</a></li>
        @endif
        <li><a href="/informasi-akun">Informasi Akun</a></li>
        {{-- <li><a href="/riwayat-order">History Order</a></li> --}}
        <li><a href="/logoutproses">Log Out</a></li>
      </ul>
      </li>
</nav>
@yield('js')
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
