<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('/aderimLogoBGWhite.jpg')}}">

        <!--STYLE-->
        @yield('css')
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        
        <!--FRAMEWORK-->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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
        <div id="navbarHeader">
            <div class="container">
                <div class="row kolomA">
                    <ul class="ukuran-besar-navBar pull-right">
                      <li class="upper-links"><a class="links" href="/home">BERANDA</a></li>
                      @if(Session::has('nama_profesi'))
                      <li class="upper-links"><a href="/tambah-project" class="links">TAMBAH PROJECT</a></li>
                      <li class="upper-links"><a href="/profesi/{{Session::get('id_profesi')}}" class="links">PROFESI SAYA</a></li>
                      @else
                      <li  class="upper-links"><a href="/daftar-profesi" class="links">DAFTAR PROFESI</a></li>
                      @endif
                      <li class="upper-links"><a class="links" href="/order-progres">ORDER PROGRES</a></li>
                      <li class="upper-links"><a class="links" href="/order">ORDER</a></li>
                      @if(Session::get('name') == "admin")
                      <li class="upper-links"><a href="/halaman-admin" class="links"><i class="fas fa-book-open"></i> HALAMAN ADMIN</a></li>
                      @endif                     
                    </ul>
                </div>
                <div class="row kolomB">
                    <div class="col-sm-2 logo">
                        <h2><span class="ukuran-kecil-navBar menu" onclick="openNav()"><i class="fas fa-bars"></i></span></h2>
                        <a href="/home"><h2><span class="ukuran-kecil-navBar menu">ADERIM</span></h2></a>
                        <a href="/home"><h1><span class="ukuran-besar-navBar"><b>ADERIM</b></span></h1></a>
                    </div>
                    <div class="navbarHeader-search smallsearch col-sm-6 col-xs-11">
                        <div class="row">
                            <form class="navbar-form navbar-right" method="GET" action="/get-search" style="margin-left: 0px;" autocomplete="off">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="cari" placeholder="Cari project">
                                    <input class="search_icon" type="submit" value="➤" style="cursor:pointer;">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ukuran-besar-navBar col-sm-2 pull-right navbarBeliKategori" style="width: 162px; padding-left: 0px;">
                      <li class="upper-links dropdown"><a href="/informasi-akun" class="dropdown-toggle links" data-toggle="dropdown"><i class="fas fa-user"></i> {{\Session::get('name')}}</a>
                        <ul class="dropdown-menu">
                          <li><a href="/informasi-akun">Informasi Akun</a></li>
                          <li><a href="/progres-order">Progres Order</a></li>
                          <li><a href="/riwayat-order">History Order</a></li>
                          <li><a href="/logoutproses">Log Out</a></li>
                        </ul>
                      </li>
                    </div>
                    <div class="ukuran-besar-navBar col-sm-2 pull-right navbarBeliKategori" style="width: 162px; padding-left: 0px;">
                        <li class="upper-links dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-archive"></i> KATEGORI</a>
                            <ul class="dropdown-menu">
                                <li><a href="/kategori/rumah"><i class="fas fa-home"></i> Rumah</a></li>
                                <li><a href="/kategori/hotel"><i class="fas fa-hotel"></i> Hotel</a></li>
                                <li><a href="/kategori/apartemen"><i class="fas fa-building"></i> Apartemen</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div id="myNavbarSamping" class="navbar-samping">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <button class="dropdown-btn">
                <i class="fas fa-user"></i> {{\Session::get('name')}} <i class="caret"></i>
            </button>
            <div class="dropdown-container-navBar-samping">
                <a href="/informasi-akun">Informasi Akun</i></a>
                <a href="/progres-order">Progres Order</a>
                <a href="/riwayat-order">History Order</i></a>
                <a href="/logoutproses">Log Out</i></a>
            </div>
            @if(Session::get('name') == "admin")
            <a href="/halaman-admin">HALAMAN ADMIN</a>
            @endif
            @if(Session::has('nama_profesi'))
            <button class="dropdown-btn">
                <i class="fas fa-pencil-ruler"></i> PROFESI <i class="caret"></i>
            </button>
            <div class="dropdown-container-navBar-samping">
                <a href="/tambah-project">Tambah Project</i></a>
                <a href="/profesi/{{Session::get('id_profesi')}}">Profesi Saya</i></a>
            </div>
            @else
            <a href="/daftar-profesi">DAFTAR PROFESI</a>
            @endif
            <button class="dropdown-btn">
                <i class="fas fa-archive"></i> KATEGORI <i class="caret"></i>
            </button>
            <div class="dropdown-container-navBar-samping">
                <a href="/kategori/rumah">Rumah <i class="fas fa-home"></i></a>
                <a href="/kategori/hotel">Hotel <i class="fas fa-hotel"></i></a>
                <a href="/kategori/apartemen">Apartemen <i class="fas fa-building"></i></a>
            </div>
            <a href="/order">ORDER</a>
            <a href="/order-progres">ORDER PROGRES</a>
            <a href="/home">BERANDA</a>
        </div>
        </header>

        <section id="branda" class="container">
            <br>
            <br>
            
            <br>@yield('content')</br>
        </section>

        <footer class="section footer-classic context-dark bg-image">
            <div class="container">
                <div class="row row-30">
                    <div class="col-md-4 col-xl-5">
                        <div class="pr-xl-4">
                            <p><br>Universitas Brawijaya<br>Fakultas Ilmu Komputer</p>
                            <!-- Rights-->
                            <p class="rights"><span>©  </span><span class="copyright-year">2019</span><span> </span><span>ADERIM</span><span>. </span><span>Kelompok X.</span></p>
                        </div>
                    </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <dl class="contact-list">
                        <dt>Alamat:</dt>
                        <dd>Jl. Veteran No.8 Polinema</dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>Email:</dt>
                        <dd><a href="mailto:#" style="color: white;"><u>aderimofficial@gmail.com</u></a></dd>
                    </dl>
                </div>
                <div class="col-md-4 col-xl-3">
                    <h5 style="color: red;">Tambahan</h5>
                    <ul class="nav-list">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Kelompok 10</a></li>
                        <li><a href="#">Bcc 2019</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </footer>
        <button onclick="topFunction()" id="backtop" title="Kembali ke atas">&#8657</button>

    </body>

    <!--SCRIPT-->
    @yield('js')
    <script src="{{asset('js/scriptLain.js')}}"></script>

</html>