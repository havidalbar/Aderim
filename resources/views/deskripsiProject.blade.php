@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')

@section('title', 'Aderim')
@section('content')

@if(isset($desProject))
<div class="viewproject">
        <div class="tampilkiriproject">
            <div class="sizekiriproject">
                <center><img src='/{!! $desProject->namagambar !!}' /></center>
            </div>
            <div class="infotokodeskripsi">
                <div style="background:#3097d1;color:white;border-top-right-radius:5px;border-top-left-radius:5px;">
                    <p style="margin-left:25px;font-size:22px">Informasi Profesi</p>
                </div>
                <div class="barisinfodeskripsi">
                    <p style="width:25%;border-right:2px solid #ddd">Nama Profesi</p>
                    <p style="width:75%;margin-left:5px;">{{$profesi->nama_profesi}}</p>
                </div>
                <div class="barisinfodeskripsi">
                    <p style="width:25%;border-right:2px solid #ddd">Alamat Profesi</p>
                <p style="width:75%;margin-left:5px;">{{$profesi->alamat}}</p>
                </div>
                <div class="barisinfodeskripsi">
                    <p style="width:25%;border-right:2px solid #ddd">Nomor Telepon</p>
                    <p style="width:75%;margin-left:5px;">{{$profesi->nohp}}</p>
                </div>
                <div class="barisinfodeskripsi">
                    <p style="width:25%;border-right:2px solid #ddd">Terdaftar Sejak</p>
                    <p style="width:75%;margin-left:5px;">{{date_format($profesi->created_at,"d-m-Y")}}</p>
                </div>
            </div>
        </div>
        <div class="styleKanan">
        <div class="tampilkananproject">
            <div class="detailproject">
                <div style="float:left;">
                <h1>{!! $desProject->namaProject !!}</h1>
                </div>
                <div class="buttonpembayaran" style="float:right;margin-right:20px;">
                <center><button onclick="window.location.href='/project/{{$desProject->id}}/upload'" id="menu-pembayaran" class="submitcash" style="cursor:pointer;">Kontrak</button></center>
            </div>
            </div>

            <div class="deskripsiproject">
                <h4>Deskripsi :</h4><br>
                <p>{!! $desProject->deskripsi !!}</p>
            </div>
            <!-- <div class="buttonpembayaran">
                <center><a  href="/upload"><button id="menu-pembayaran" class="submitcash">Beli</button></a></center>
            </div> -->
        </div>
        <br>
        <div class="container">
        <fieldset>
        <legend>Ringkasan Ulasan</legend>
        <div class="kotak">
            <div class="iconcoment">
                <div class="iconprofil">
                    <img src="/grab-vector-graphic-person-icon--imagebasket-13.png">
                </div>
                <div class="iconcomentdetail">
                    <p>Budi</p>
                    <p2>12 Desember 2020, 14:48 WIB</p2>
                </div>
            </div>
            <div class="ulasan">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. when an unknown printer took a galley of type and scrambled it to make a type specimen book....</p>
            </div>
        </div>
        <div class="kotak">
            <div class="iconcoment">
                <div class="iconprofil">
                    <img src="/grab-vector-graphic-person-icon--imagebasket-13.png">
                </div>
                <div class="iconcomentdetail">
                    <p>Bambang</p>
                    <p2>20 Desember 2020, 01:35 WIB</p2>
                </div>
            </div>
            <div class="ulasan">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. when an unknown printer took a galley of type and scrambled it to make a type specimen book....</p>
            </div>
        </div>
        <div class="kotak">
            <div class="iconcoment">
                <div class="iconprofil">
                    <img src="/grab-vector-graphic-person-icon--imagebasket-13.png">
                </div>
                <div class="iconcomentdetail">
                    <p>Mantan</p>
                    <p2>30 Desember 2020, 02:45 WIB</p2>
                </div>
            </div>
            <div class="ulasan">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. when an unknown printer took a galley of type and scrambled it to make a type specimen book....</p>
            </div>
        </div>
        </fieldset>
        </div>
        <br>

    </div>
</div>

    @else
    <div style="margin: 40px; border: 1px solid grey; border-radius: 3px; display: inline-block; padding: 2px">
    <h1>Project tidak ditemukan</h1>
    </div>
@endif
@endsection
