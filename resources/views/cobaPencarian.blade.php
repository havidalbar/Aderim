@extends (\Session::has('username') ? 'layouts.cobanavLogin' : 'layouts.cobanav')
@section('title', 'Pencarian | Aderim')

@section('content')

<div class="ui container" style="margin-top:30px">
    <div style="margin-top:10px;font-size:24px">
        Silahkan cari hingga mendapatkan desain arsitek terbaik pilihan anda
    </div>
    <div style="margin-top:10px;font-size:17px">
        Terdapat 100 desain untuk <b>"rumah minimalis"</b> di Aderim
    </div>
</div>

<div class="ui divider"></div>

<div class="ui container">
    <span style="font-size:18px;margin-right:10px">Urutkan : </span>
    <div class="ui selection dropdown" style="font-size:17px">
        <input type="hidden" name="urutkan">
        <i class="dropdown icon"></i>
        <div class="default text">Berdasarkan</div>
        <div class="menu">
            <div class="item" style="font-size:16px">Terbaru</div>
            <div class="item" style="font-size:16px">Harga Tertinggi</div>
            <div class="item" style="font-size:16px">Harga Terendah</div>
        </div>
    </div>
</div>

<div class="ui container" style="margin-top:30px">
    <!-- Kalo gak ketemu -->
    <div class="ui container center aligned">
        <i class="search icon massive"></i>
        <div>Oops, desain tidak ditemukan :(</div>
        <div>Hasil pencarian untuk " sepatuasasasasa" tidak ditemukan. Coba keyword lain?</div>
    </div>


    <div class="ui four stackable doubling link cards">
        <div class="card" onclick="$('.ui.small.first.modal.bayar').modal('show');">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection         Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection         Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection         Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection         Yogyakarta
@endsection         Eka Iqbal Virgiawan
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection         Eka Iqbal Virgiawan
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.cobafooter')
@endsection <div class="content">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ui container" style="margin-top:30px">
    <div class="ui center aligned container" style="font-size:36px">
        <p>Mulai Membuat Rumah Impian?</p>
    </div>
    <div class="ui center aligned container" style="margin-top:10px;font-size:22px">
        <p>Silahkan cari hingga mendapatkan desain arsitek terbaik pilihan anda</p>
    </div>
    <div class="ui fluid action input" style="margin-top:20px;font-size:18px;padding-left:60px;padding-right:60px">
        <input type="text" name="cari" placeholder="Cari desain rumah impian yang ingin anda buat..."
            onclick="window.location.href='/get-search'">
        <div class="ui button teal" onclick="window.location.href='/get-search'">Cari</div>
    </div>
</div>

<div class="ui container" style="margin-top:30px">
    <div class="ui four stackable doubling link cards">
        <div class="card" onclick="$('.ui.small.first.modal.bayar').modal('show');">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
    <div class="ui center aligned container" style="margin-top:40px">
        <a href="#">
            <div class="ui vertical animated large teal button" style="width:150px">
                <div class="hidden content">Lihat Semua</div>
                <div class="visible content">
                    <i class="angle double down icon"></i>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="ui container" style="margin-top:30px">
    <div class="ui center aligned container" style="font-size:36px">
        <p>Mulai Membuat Rumah Impian?</p>
    </div>
    <div class="ui center aligned container" style="margin-top:10px;font-size:22px">
        <p>Silahkan cari hingga mendapatkan desain arsitek terbaik pilihan anda</p>
    </div>
    <div class="ui fluid action input" style="margin-top:20px;font-size:18px;padding-left:60px;padding-right:60px">
        <input type="text" name="cari" placeholder="Cari desain rumah impian yang ingin anda buat..."
            onclick="window.location.href='/get-search'">
        <div class="ui button teal" onclick="window.location.href='/get-search'">Cari</div>
    </div>
</div>

<div class="ui container" style="margin-top:30px">
    <div class="ui four stackable doubling link cards">
        <div class="card" onclick="$('.ui.small.first.modal.bayar').modal('show');">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="{{asset('rumah1.jpg')}}" style="object-fit:cover;height:250px">
            </div>
            <div class="content">
                <div class="header">Rumah Minimalis</div>
                <div class="meta" style="margin-top:5px">
                    <span style="border:2px solid #d4d4d5;border-radius:4px;padding:2px 4px 2px 4px">
                        Rumah
                    </span>
                </div>
                <div class="description">
                    Rumah minimalis dengan lingkungan yang sejuk
                </div>
            </div>
            <div class="extra content">
                <div>
                    <i class="user circle teal icon"></i>
                    Eka Iqbal Virgiawan
                </div>
                <div style="margin-top:5px">
                    <i class="map pin teal icon"></i>
                    Yogyakarta
                </div>
            </div>
        </div>
    </div>
    <div class="ui center aligned container" style="margin-top:40px">
        <a href="#">
            <div class="ui vertical animated large teal button" style="width:150px">
                <div class="hidden content">Lihat Semua</div>
                <div class="visible content">
                    <i class="angle double down icon"></i>
                </div>
            </div>
        </a>
    </div>
</div>

@include('layouts.cobafooter')
@endsection