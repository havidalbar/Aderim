<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title> {{--ini fungsi untuk memasukkan judul layout--}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('/aderimLogoBGWhite.jpg')}}">

        <!--STYLE-->
        @yield('css')
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!--FRAMEWORK-->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <header>
        <div id="navbarHeader">
            <div class="container">
                <div class="row kolomA">
                    <ul class="ukuran-besar-navBar pull-left">
                        <li class="upper-links"><a class="links" href="" data-toggle="modal" data-target="#login-modal">LOGIN</a></li>
                        <li class="upper-links"><a class="links" href="" data-toggle="modal" data-target="#daftar-modal">DAFTAR</a></li>
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
                            <form class="navbar-form navbar-right" method="GET" action="/get-search#branda" style="margin-left: 0px;">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="cari" placeholder="Cari Project">
                                    <input class="search_icon" type="submit" value="➤" style="cursor:pointer;">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ukuran-besar-navBar col-sm-2 pull-right navbarBeliKategori" style="width: 162px; padding-left: 0px;">
                        <li class="upper-links dropdown"><a href="#" class="dropdown-toggle x" data-toggle="dropdown"><i class="fas fa-archive"></i> KATEGORI</a>
                            <ul class="dropdown-menu">
                                <li><a href="/kategori/rumah#branda"><i class="fas fa-home"></i> Rumah</a></li>
                                <li><a href="/kategori/hotel#branda"><i class="fas fa-hotel"></i> Hotel</a></li>
                                <li><a href="/kategori/apartemen#branda"><i class="fas fa-building"></i> Apartemen</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div id="myNavbarSamping" class="navbar-samping">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/home" onclick="closeNav()">BERANDA</a>
            <a href="" data-toggle="modal" data-target="#login-modal" onclick="closeNav()">LOGIN</a>
            <a href="" data-toggle="modal" data-target="#daftar-modal" onclick="closeNav()">DAFTAR</a>
            <button class="dropdown-btn">
                KATEGORI<i class="caret"></i>
            </button>
            <div class="dropdown-container-navBar-samping">
                <a href="/kategori/rumah#branda" onclick="closeNav()">Rumah <i class="fas fa-home"></i></a>
                <a href="/kategori/hotel#branda" onclick="closeNav()">Hotel <i class="fas fa-hotel"></i></a>
                <a href="/kategori/apartemen#branda" onclick="closeNav()">Apartemen <i class="fas fa-building"></i></a>
            </div>
        </div>
        </header>

        <div class="image">
           <h1 class="heading">Arsitek Desain Rum<i class="fas fa-home"></i>h Impian</h1>
           <p><button class="btn btn-large button"><a href="#branda"><span><b><i>PILIH LANGSUNG </i></b></span></a></button></p>
        </div>

        <section id="alur-sistem">
            <div class="container">
                <h2 class="text-center light bold">Keuntungan Profesi</h2>
                <div class="row">
                    <div class="col-sm-4 py-2">
                        <center>
                            <h1><i class="fas fa-file-image"></i></h1>
                            </span></p><button class="btn btn-danger" style="cursor: default;">PROJECT</button>
                            <h4><br>Memasarkan project profesi untuk dilihat pelanggan</h4>
                        </center>
                    </div>
                    <div class="col-sm-4 py-2">
                        <center>
                            <h1><i class="fas fa-handshake"></i></h1>
                            </span></p><button class="btn btn-success" style="cursor: default;">KESEPAKATAN</button>
                            <h4><br>Menjalin kesepakatan jasa antar profesi dengan pelanggan</h4>
                        </center>
                    </div>
                    <div class="col-sm-4 py-2">
                        <center>
                            <h1><i class="fas fa-money-bill-wave"></i></h1>
                            </span></p><button class="btn btn-info" style="cursor: default;">KEUNTUNGAN</button>
                            <h4><br>Mendapatkan penghasilan dari project</h4>
                        </center>
                    </div>
                </div>
        </section>
        <div class="container pembatas"></div>
        <section id="alur-sistem">
            <div class="container">
                <h2 class="text-center light bold">Keuntungan Pelanggan</h2>
                <div class="row">
                    <div class="col-sm-4 py-2">
                        <center>
                            <h1><i class="fas fa-search"></i></h1>
                            </span></p><button class="btn btn-danger" style="cursor: default;">MENEMUKAN</button>
                            <h4><br>Mencari dan memilih desain keinginan pelanggan</h4>
                        </center>
                    </div>
                    <div class="col-sm-4 py-2">
                        <center>
                            <h1><i class="fas fa-binoculars"></i></h1>
                            </span></p><button class="btn btn-success" style="cursor: default;">PENGAWASAN</button>
                            <h4><br>Mengawasi progres pekerjaan profesi</h4>
                        </center>
                    </div>
                    <div class="col-sm-4 py-2">
                        <center>
                            <h1><i class="fas fa-shield-alt"></i></h1>
                            </span></p><button class="btn btn-info" style="cursor: default;">KEAMANAN</button>
                            <h4><br>Menjaga kenyamanan pelanggan dalam kelangsungan transaksi</h4>
                        </center>
                    </div>
                </div>
        </section>
        <div class="container pembatas"></div>
            <!--SLIDE GAMBAR-->
            <br><br>
            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="/z_ADERIMWallz.jpg" style="width:100%">
                </div>
                <div class="mySlides">
                    <img src="/Apartemen1_1.jpg" style="width:100%">
                    <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.8);">
                        <p>Kerapian merupakan keindahan yang ternyaman untuk disaksikan</p>
                    </div>
                </div>
                <div class="mySlides">
                    <img src="/Apartemen1_3.jpg" style="width:100%">
                    <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.8);">
                        <p>Suasana cahaya dengan ketinggian yang rapi membuat mata menjadi manja</p>
                    </div>
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

        <section id="branda" class="container">
            <br>
            <br>

            <!--LOGIN MENU-->
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                        <center><h1>HALAMAN LOGIN</h1><br></center>
                        <form method="post" action='{{url('loginproses')}}'>
                            <div class="form-group">
                                <input type="text" id="email" name="email" placeholder="✉ email/ username">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" placeholder="⌨ password">
                            </div>
                            {{csrf_field()}}
                            <input type="submit" class="login loginmodal-submit" value="Masuk">
                        </form>
                        <div class="login-help">
                            <p>Belum punya akun? Daftar <a data-dismiss="modal" aria-label="Close" style="text-decoration: none; color: #428bca; cursor: pointer;" data-toggle="modal" data-target="#daftar-modal"><b> disini</b></a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!--DAFTAR MENU-->
            <div class="modal fade" id="daftar-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                        <center><h1>HALAMAN DAFTAR</h1><br></center>
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red">{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <form name='registration' method='post' action='{{url('registerproses')}}'>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required="" />
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama:</label>
                                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama" required="" />
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="address">Alamat:</label>
                                        <input type="text" name="address" value="{{ old('address') }}" placeholder="Jln." required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="@mail" required="" />
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" placeholder="******" required="" />
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="confirmation">Ulang Password:</label>
                                        <input type="password" name="validpassword" placeholder="******" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nohp">Nomor HP:</label>
                                <input type="text" name="nohp" value="{{ old('nohp') }}" placeholder="08xx" required="" />
                            </div>
                            {{csrf_field()}}
                            <input type="submit" name="submit" value="Daftar" class="login loginmodal-submit"/>
                        </form>
                        <div class="login-help">
                            <p>Sudah punya akun? Login <a data-dismiss="modal" aria-label="Close" style="text-decoration: none; color: #428bca; cursor: pointer;" data-toggle="modal" data-target="#login-modal"><b> disini</b></a></p>
                        </div>
                    </div>
                </div>
            </div>

            <br>@yield('content')</br>
        </section>

        <footer class="section footer-classic context-dark bg-image">
            <div class="container">
                <div class="row row-30">
                    <div class="col-md-4 col-xl-5">
                        <div class="pr-xl-4">
                            <p><br>Universitas Brawijaya<br>Fakultas Ilmu Komputer</p>
                            <!-- Sisi Kanan -->
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
                        <li><a href="">About</a></li>
                        <li><a href="">Kelompok 10</a></li>
                        <li><a href="">Bcc 2019</a></li>
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
    <script>
        // Slide Image
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 3000); // 3 detik
        }
    </script>

</html>
