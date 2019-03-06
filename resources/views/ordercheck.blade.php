@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="order">
    @if(count($orders) > 0)
    <div class="order1">
            <p style="margin:10px;">Periksa kembali order belanja Anda sebelum melakukan transfer.</p>
            </div>
            <?php
            $total = 0;
            $sisa = 0;
            ?>
            @for($i = 0; $i < 1; $i++)
                    <div style="margin-top:25px;border: 1px solid #ddd;background-color:#f8f8f8;display: flex; flex-direction: row;">
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
                       <p style="margin:7px;font-size:19px;">Catatan untuk percetakan:</p>
                       <p style="margin:7px;font-size:16px;font-family:segoe ui;">{{$orders[$i]->deskripsi}}</p>
                    </div>
                    <div class="totalbelanja">
                        <div style="border: 1px solid #ddd;background-color:#f8f8f8;width:75%">
                        <p style="margin:7px;font-size:19px;float:right;">Total Harga Project :</p>
                        </div>
                        <div style="border: 1px solid #ddd;background-color:#f8f8f8;width:25%">
                            <p style="margin:7px;font-size:19px;">Rp {{ number_format(($items[$i]->estimasi),0,",",".")}}</p>
                        </div>
                    </div>
                    <?php
        $total += ($items[$i]->estimasi);
        $sisa += $total - ($total*0.25);
        ?>
            @endfor
            <div style="display:flex;flex-direction:row;margin-top:30px">
                <div style="border: 1px solid #ddd;background-color:#f8f8f8;width:75%">
                    <p style="margin:7px;font-size:19px;float:right;">Total Dibayarkan :</p>
                    <br>
                    <p style="margin:7px;font-size:19px;float:right;">Sisa Harga :</p>
                </div>
                <div style="border: 1px solid #ddd;background-color:#f8f8f8;width:25%">
                        <?php
                        $bayarFormatted = number_format($total*0.25, 0, ',', '.');
                        echo "<p style='margin:7px;font-size:19px;'>Rp $bayarFormatted</p>";
                        $sisaFormatted = number_format($sisa, 0, ',', '.');
                        echo "<p style='margin:7px;font-size:19px;'>Rp $sisaFormatted</p>";

                        ?>
                </div>
            </div>
        <br>
        <br>

                    <div style="display:flex;flex-direction:row;">

                        <div><button onclick="window.location.href='/home'" class="submitcash" style="cursor:pointer;">Lanjutkan Belanja</button></div>
                        <div style="margin-left:450px"><form action = "{{url('/transaksiorder')}}" method = "post" id="langsungbayar">
                        <input type="hidden" name="jumlah" value="{{$total}}" />
                        <input type="hidden" name="sisaharga" value="{{$total-($total*0.25)}}" />
                        {{csrf_field()}}

                        <input type="submit" class="submitcash" value="Bayar" style="cursor:pointer;"/>
                        </form>
                        </div>
                    </div>
    @else
    <center>
    <div style="background-color:#f7f8f7;border: 1px solid #3097d1;font-size:16px;border-radius: 5px;width: 81%;margin-left:20px;margin-top: 40px;height: 40px;">
    <center><p style="padding-top: 10px;">Anda belum memiliki item di order.</p></center>
    </div>
</center>

    @endif
</div>
@endsection
