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
          <img src="/menu.png" class="logomenu"/>
        </div>
          <ul>
            <li> <a href="/home">Beranda</a></li>
            <li> <a href="/hubungi-kami">Hubungi Kami</a></li>
          </ul>
      </li>
        <div id="heading">
          <a href="/home"><img src="/logo2.png" class="Logo"/></a>
        </div>
      <li><a href="#" class="kategori">Kategori</a>
      <ul>
            <li> <a href="/kategori/rumah">Rumah</a></li>
            <li> <a href="/kategori/mall">Mall</a></li>
            <li> <a href="/kategori/apartemen">Apartemen</a></li>
            <li> <a href="/kategori/rumahsakit"></a>Rumah Sakit</li>
        </ul>
      </li>
      <li><form method="GET" action="/get-search">
        <input class="search" type="search" name="cari" placeholder="Cari project disini...">
        <input class="button" type="submit" value="Cari" style="cursor:pointer;">
    </form></li>
      <li><a href="/keranjang"><img src="/icon_cart_alt.png" class="beli"></a></li>
      @if(Session::has('nama_profesi'))
      <li><a href="#"><img src="/market.png" class="market"></a></li>
      <li><a href="" class="profesi">Profesi</a>
      <ul style="left: 1245px; width:157px;">
      <li><a href="/profesi/{{Session::get('id_user')}}">Profesi Saya</a></li>
      <li><a href="/penjualan">Penjualan</a></li>
      <li><a href="/tambah-project">Tambah Project</a></li>
      </ul>
      </li>
      </li>
      <ul>
            <li> <a href="/kategori/rumah">Rumah</a></li>
            <li> <a href="/kategori/mall">Mall</a></li>
            <li> <a href="/kategori/apartemen">Apartemen</a></li>
            <li> <a href="/kategori/rumahsakit"></a>Rumah Sakit</li>
      </ul>
      @else
      <li><a href="/daftar-profesi"><img src="/market.png" class="market"></a></li>
      <li><a href="/daftar-profesi" class="toko">Profesi</a></li>
      @endif
      <li><a href="/informasi-akun"><img src="/user.png" class="user"></a></li>
      <li><a href="/informasi-akun" class="akun">{{\Session::get('name')}}</a>
      <ul style="left: 1330px; width:157px;">
        @if(Session::get('name') == "admin")
        <li><a href="/halaman-admin">Halaman Admin</a></li>
        @endif
        <li><a href="/informasi-akun">Informasi Akun</a></li>
        <li><a href="#">Pesan</a></li>
        <li><a href="/riwayat-transaksi">Riwayat</a></li>
        <li><a href="/logoutproses">Log Out</a></li>
      </ul>
      </li>
    </ul>
    </div>
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
