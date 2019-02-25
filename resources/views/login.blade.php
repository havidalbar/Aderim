@extends (\Session::has('name') ? 'layouts.navlogin' : 'layouts.nav')
@section('title', 'Indesign')
@section('content')
<div class="mainContent" style="width: 25%; border: 1px solid grey">
    <h2><center>Masuk</center></h2>
    <br>
    <div class="contactFrm">
        <form method="post" action='{{url('loginproses')}}' style="padding: 10px">
        <input type='text' name="email" placeholder='Email / username'>
        <input type='password' name="password" placeholder='Password'>
        {{csrf_field()}}
        <center><input type='submit' value="Masuk" style="margin-bottom:5%;margin-top:1%"></center>
        </form>
    </div>
    <p><center>Belum punya akun? Daftar <a href="/register">di sini</a></center></p>
</div>
@endsection
