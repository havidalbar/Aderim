@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')
@section('content')
    <div id="index">
    {{-- <a href="/home"><img src="home2.jpg" class="homelogo" /></a> --}}
        <div class="cara">
        {{-- <img src="#">
        <img src="#">
        <img src="#">
        <img src="#"> --}}
        </div>
    </div>
<div class="tulisanhome">Project Pilihan :</div>
<div class="list">

    @for($i=0;$i<(count($items) > 10 ? 10 : count($items));$i++) {{--ini fungsi buat manggil project di looping--}}

    <div class="box">
    <div class="project">
        <img src= {{ $items[$i]->namagambar}}> {{--ini fungsi buat manggil gambar project di looping--}}
        <ul><a style="text-decoration: none; color: black;" href ="/project/{{ $items[$i]->id}}">{{ $items[$i]->project}}</a></ul>  {{--ini fungsi buat manggil project di looping--}}
        </div>
      <div class="profesi">
        <ul>{{ $profesis[$i]->nama_profesi}}</ul> {{--ini fungsi buat manggil nama profesi di looping--}}
        <ul><img src= "/pinblue.png" class="pin">{{ $profesis[$i]->alamat}}</ul> {{--ini fungsi buat manggil alamat profesi di looping--}}
      </div>
    </div>
    @endfor
</div>
<div class="tulisanhome">Pencarian Terpopuler :</div>{{--class untuk search--}}
<div class="list">
@for($i=0;$i<(count($items) > 10 ? 10 : count($items));$i++)
<div class="box">
    <div class="project">
    <img src= {{ $items[$i]->namagambar}}> {{--ini fungsi buat manggil gambar project di looping--}}
    <ul><a style="text-decoration: none; color: black;" href ="/project/{{ $items[$i]->id_profesi}}">{{ $items[$i]->namaProject}}</a></ul> {{--ini fungsi buat manggil project di looping--}}
    </div>
    <div class="profesi">
      <ul>{{ $profesis[$i]->namaProect}}</ul>
      <ul><img src= "/pinblue.png" class="pin">{{ $profesis[$i]->alamat}}</ul>
    </div>
  </div>
  @endfor
</div>
@endsection
