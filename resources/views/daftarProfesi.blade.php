@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Indesign')

@section('content')
<div class="daftarprofesiinfomasi">
    <p style="margin:10px;">Jika dalam 2 hari kerja, profesi anda belum terdaftar. Maka permohonan anda ditolak, harap mengajukan permohonan ulang kembali. Terima kasih </p>
</div>
<div class="daftarprofesi">
<p style="font-size:22px;margin-top:20px;margin-left:20px;">Hai, {{Session::get('name')}}</p>
<br>
<center><p style="font-size:19px;">Selamat datang di Ardein, ayo daftarkan profesimu disini!</p></center>
<br>
<p style="color:#4c4c4c;font-size:17px;margin-left:20px;">Silahkan lengkapi data-data berikut!</p>
<div style="margin-top:15px;font-size:16px;margin-left:20px;">
    <form method="POST" action='{{url('/daftarprofesiproses')}}'>
        @csrf
    <label for="nama_profesi">Nama Profesi :</label>
    <br>
    <input style="width:716px;height:25px;margin-bottom:10px;margin-top:5px" type="text" name="namaprofesi" placeholder=" Nama Profesi Anda"/>
    <label for="address">Alamat Kantor :</label>
    <textarea name="address" placeholder=" Alamat Lengkap Profesi Anda" required="" style="width:716px;height:100px;"></textarea>
        <br>
    <label for="job_title">Profesi:</label>
                <select name="job_title" value="{{ old('job_title') }}">
                    <option selected="" value="Default">(Pilih Profesi Anda)</option>
                    <option value="Arsitektur">Arsitektur</option>
                    <option value="Desain Interior">Desain Interior</option>
                </select>
                <br>
    <p>Nomor Telepon yang Dapat Dihubungi : </p>
    <input style="width:716px;height:25px;margin-bottom:10px;margin-top:5px" type="number" name="nohp" placeholder="No Telepon Percetakan Anda"/>
</div>
{{csrf_field()}}
<center><input class="daftarp" style="margin-bottom:30px;" type="submit" name="submit" value="Daftar Profesi"></center>
</form>
</div>
@endsection
