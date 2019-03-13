@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')
@section('content')
<div class="container halaman-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="kotak-foto">
                    <img src="{{asset('/user.png')}}" alt="" style="border:4px solid black; background-color: white; width: 274px; height: 230px;" />
<!--                     <div class="file btn btn-lg btn-primary">
                        Ganti Foto
                        <input type="file" name="file" />
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="kotak-profil-atas">
                    <h2>
                        {{$infos->name}}
                    </h2>
                    <h6>
                        Bergabung sejak {{$infos->created_at}}
                    </h6>
                    <p class="kotak-email">Email: <i>{{$infos->email}}</i></p>
                    <ul class="nav deskripsi" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="deskripsi-tampilkan active" style="background-color: transparent; font-size: 19px;">ABOUT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="kotak-data-tambahan">
                    <p>Alamat: {{$infos->address}}</p>
                    <p><u>Social Media</u></p>
                    <a href="https://www.facebook.com/" class="fb" target="_blank"><i class="fab fa-facebook-square"></i> FACEBOOK</a><br />
                    <a href="https://www.instagram.com/?hl=id" class="ig" target="_blank"><i class="fab fa-instagram"></i> INSTAGRAM</a><br />
                    <a href="https://twitter.com/login?lang=id" class="twit" target="_blank"><i class="fab fa-twitter-square"></i> TWITTER</a><br />
                </div>
            </div>
            <div class="col-md-8" >
                <div class="tab-content deskripsinya">
                    <div class="tab-pane show active" style="background-color: transparent;">
                        <div class="col-md-9 text-justify" >
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
