@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')

@section('title', 'Aderim')
@section('content')

@if(isset($desProject))
<center><h1>{!! $desProject->namaProject !!}</h1></center>
<center><h5>Estimasi Harga: Rp.{!! $desProject->estimasi !!}</h5></center>
<center><img src="/{!! $desProject->namagambar !!}" class="img-thumbnail" alt="" style="width: 500px; height: 300px;"></center>
<br>
<button class="btn btn-danger btn-block disabled">Diharapkan login dahulu untuk melakukan kontrak</button>
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="col-md-8 untuk-isi-daftar-profesi">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="namaProject"><b><i class="fas fa-address-card"></i> Nama Profesi</b></label>
                </div>
                <div class="col-md-6">
                    <label for="namaProject"><b>{{$profesi->nama_profesi}}</b></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="namaProject"><b><i class="fas fa-map-pin"></i> Alamat Profesi</b></label>
                </div>
                <div class="col-md-6">
                    <label for="namaProject"><b>{{$profesi->alamat}}</b></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="namaProject"><b><i class="fas fa-phone-square"></i> Nomor Telepon</b></label>
                </div>
                <div class="col-md-6">
                    <label for="namaProject"><b>{{$profesi->nohp}}</b></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="namaProject"><b><i class="fas fa-address-book"></i> Terdaftar Sejak</b></label>
                </div>
                <div class="col-md-6">
                    <label for="namaProject"><b>{{date_format($profesi->created_at,"d-m-Y")}}</b></label>
                </div>
            </div>
        </div>
        <button onclick="window.location.href='/project/{{$desProject->id}}/order'" id="menu-pembayaran" class="submitcash btn btn-success" style="cursor:pointer; float: left; margin-left: 20px;">Kontrak</button>
            {{-- <h4>Deskripsi :</h4><br>
            <p>{!! $desProject->deskripsi !!}</p> --}}
            {{-- <div class="buttonpembayaran">
                <center><a  href="/upload"><button id="menu-pembayaran" class="submitcash">Beli</button></a></center> 
            </div> --}}
    </div>
</div>
    <div class="reviews">
        <legend>Ulasan pengguna</legend>
        <div class="row blockquote review-item">
            <div class="col-md-3 text-center">
                <img class="rounded-circle reviewer" src="{{asset('/grab-vector-graphic-person-icon--imagebasket-13.png')}}">
                <div class="caption">
                    <small>dari <a href="#">Ucup</a></small>
                </div>
            </div>
            <div class="col-md-9">
                <h4>Luar biasa projek di ADERIM</h4>
                <div class="ratebox text-center" data-id="0" data-rating="5"></div>
                    <p class="review-text">Desain yang sangat elegan memanjakan mata. Membuat diri ingin memiliki lebih banyak lagi pada projek itu, nyaman pokoknya. Langsung aja di order jasa profesi dia. Dijamin lancar dan memuaskan, thanks Aderim </p>
            </div>
        </div>
        <br>
        <div class="row blockquote review-item">
            <div class="col-md-3 text-center">
                <img class="rounded-circle reviewer" src="{{asset('/user.png')}}">
                <div class="caption">
                    <small>dari <a href="#">Rendi</a></small>
                </div>
            </div>
            <div class="col-md-9">
                <h4>Fantastik</h4>
                <div class="ratebox text-center" data-id="0" data-rating="5"></div>
                    <p class="review-text">Sungguh mantap sekali desainnya, saya juga mau order lah. Pokoknya tempat Aderim ini yang terbaik lah untuk desain dan arsitektur yang diberikannya.</p>
            </div>
        </div>
    </div>
    @else
    <div style="margin: 40px; border: 1px solid grey; border-radius: 3px; display: inline-block; padding: 2px">
    <h1>Project tidak ditemukan</h1>
    </div>
@endif
@endsection
