@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')
@section('content')
<div class="display">
   @if(count($items) > 0)
   <div class="dropdown">
      {{-- <button onclick="myFunction()" class="dropbtn">Urutkan</button> --}}
      {{-- <div id="myDropdown" class="dropdown-content">
         <a href="#">Terbaru</a>
         <a href="#">Termurah</a>
         <a href="#">Termahal</a>
         <a href="#">Terpopuler</a>
         <a href="#">A - Z</a>
         <a href="#">Z - A</a>
      </div> --}}
      <div class="list2">
        @for($i=0;$i<count($items);$i++)
        <div class="box">
          <div class="project">
            <img src="/{{ $items[$i]->namagambar}}">
            <ul><a style="text-decoration: none; color: black;" href ="/project/{{ $items[$i]->id}}">{{ $items[$i]->namaProject}}</a></ul>
          </div>
          <div class="profesi">
            <ul>{{ $profesis[$i]->nama_profesi}}</ul>
            <ul><img src= "/pinblue.png" class="pin">{{ $profesis[$i]->alamat}}</ul>
          </div>
        </div>
        @endfor
      </div>
   </div>
   @else
   <div style="background-color:#f7f8f7;border: 1px solid #3097d1;font-size:16px;border-radius: 5px;width: 40%;margin-left: 150px;margin-top: 50px;height: 40px;">
    <center><p style="padding-top: 10px;">project tidak ditemukan</p></center>
    </div>
   @endif
</div>
@endsection
