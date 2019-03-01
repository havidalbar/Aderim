@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="keranjang">

    <div class="keranjang1">
            <p style="margin:10px;">Periksa kembali orderan anda.</p>
            </div>

                    <div style="margin-top:25px;border: 1px solid #ddd;background-color:#f8f8f8;display: flex; flex-direction: row;">
                        <div style="width:100%">
                            <p style="margin:7px;font-size:19px;">Nama Profesi: <a style="text-decoration:none;color:#3097d1" href="#">{{$items[$i]->nama_profesi}}</a></p>
                        </div>
                        <form action='/hapusorder?id={{$orders[$i]->id}}' method="post">
                        {{csrf_field()}}
                        <button type="submit" style="background-color:#00000000; border:none; cursor:pointer"><img style="width: 30px;" src="/trash29black.png"></button></form>

                    </div>
                    <div class="baris1">
                    <div style="border: 1px solid #ddd;width:50%">
                        <p style="margin:7px;font-size:17px;color:#3097d1">{{$items[$i]->namaProject}}</p>
                    </div>
                    <div style="border: 1px solid #ddd;width:25%">
                        <p style="margin:7px;font-size:17px;color:#4c4c4c">Harga Project</p>
                        <p style="margin:7px;font-family:segoe ui;font-size:14px;color:#ff5722">Rp {{ number_format($items[$i]->estimasi,0,",",".")}}</p>
                    </div>
                    </div>
                    <div style="border: 1px solid #ddd;">
                       <p style="margin:7px;font-size:19px;">Catatan untuk profesi:</p>
                       <p style="margin:7px;font-size:16px;font-family:segoe ui;">{{$orders[$i]->pesan}}</p>
                    </div>

        <br>
        <br>
                    <div style="display:flex;flex-direction:row;">
                        <div style="margin-left:450px"><form action = "{{url('/transaksiproses')}}" method = "post" id="langsungbayar">
                        {{csrf_field()}}
                        <input type="submit" class="submitcash" value="Bayar" style="cursor:pointer;"/>
                        </form>
                        </div>
                    </div>
    @else

</div>
@endsection
