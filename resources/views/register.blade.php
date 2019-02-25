@extends (\Session::has('name') ? 'layouts.navlogin' : 'layouts.nav')
@section('title', 'Indesign')
@section('content')

<div class="mainContent" style="width: 45%; border: 1px solid grey">
    <center><h2>Daftar</h2></center>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <br>
    <div class="contactFrm">
        <form name='registration'
        method='post' action='{{url('registerproses')}}'>
                <label for="name">Nama Pengguna:</label>
                <input type="text" name="name" value="{{ old('name') }}" required="" />
                <label for="email">Email:</label>
                <input type="text" name="email" value="{{ old('email') }}" required="" />
                <label for="password">Password:</label>
                <input type="password" name="password" required="" />
                <label for="confirmation">Konfirmasi Password:</label>
                <input type="password" name="confirmation" required="" />
                <label for="address">Alamat:</label>
                <input type="text" name="address" value="{{ old('address') }}" required="" />
                <label for="nohp">Nomor HP:</label>
                <input type="text" name="nohp" value="{{ old('nohp') }}" required="" />
                {{csrf_field()}}
                <center><input type="submit" name="submit" value="Submit" /></center>
        </form>
    </div>
