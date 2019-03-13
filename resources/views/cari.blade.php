@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')
@section('content')
<div class="container">
    @if(count($items) > 0)
    <div class="row">
        <h2 class="text-center light bold">HASIL PENCARIAN</h2>
        @for($i=0;$i < count($items);$i++) <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="/{{ $items[$i]->namagambar}}" style="cursor: zoom-in;">
                <div class="card-block">
                    <figure class="profile-uploaderz">
                        <img src="/logo2.png" class="profile-avatar" alt="">
                    </figure>
                    <h4 class="uploader mt-3"><a href="/project/{{ $items[$i]->id}}" style="text-decoration: none; color: black;">{{ $items[$i]->namaProject}}</a></h4>
                    <div class="kategori">
                        <h5>{{ $profesis[$i]->nama_profesi}}</h5>
                    </div>
                    <div class="deskripsi">
                        Estimasi Harga: {{ $items[$i]->estimasi}}
                    </div>
                </div>
                <div class="card-footer">
                    <small><i class="fas fa-map-marker-alt"></i> {{ $profesis[$i]->alamat}}</small>
                    <a href="/project/{{ $items[$i]->id}}"><button type="button" class="btn btn-success" >TAMPILKAN</button></a>
                </div>
            </div>
    </div>
</div>
@endfor
@else
<center>
  <h1 style="font-size: 100px;"><i class="fas fa-frown-open"></i></h1>
  <div class="project-tidak-ditemukan">
      <center>
          <p><i class="fas fa-times-circle"></i> PROJECT TIDAK DITEMUKAN <i class="fas fa-times-circle"></i></p>
      </center>
  </div>
  <br>
  <br>
  <br>
  <button type="button" class="btn btn-link"><a href="/home#branda">KEMBALI</a></button>
</center>
@endif
</div>
@endsection