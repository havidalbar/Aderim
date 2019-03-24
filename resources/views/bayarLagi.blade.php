@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Aderim')

@section('content')
<div class="container untuk-daftar-profesi halaman-profile">
    <div class="row">
        @if(count($orders) > 0)
        <center>
            <h2>Periksa Kembali Order Anda Sebelum Melakukan Transfer.</h2>
        </center>
        <?php $total = 0; $sisa = 0; ?>
        @for($i = 0; $i < 1; $i++)
        <div class="col-md-8 untuk-isi-daftar-profesi" style="font-size: 20px; margin-top: 30px;">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>Nama Project</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: {{$items[$i]->namaProject}}</b></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>Harga Project</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: Rp.{{ number_format($items[$i]->estimasi,0,",",".")}}</b></label>
                    </div>
                </div>
            </div>
            <?php
            $total += ($items[$i]->estimasi);
            if(($orders[$i]->statusLagi)===3){
            $sisa += $total - ($total*0.25) - ($total*0.25);
            }else if(($orders[$i]->statusLagi)===6){
            $sisa += $total - ($total*0.25) - ($total*0.25) - ($total*0.25);
            }else if(($orders[$i]->statusLagi)===9){
            $sisa += $total - ($total*0.25) - ($total*0.25) - ($total*0.25) - ($total*0.25);
            }
            ?>
            @endfor
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>Total Dibayarkan</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: <?php $bayarFormatted = number_format($total*0.25, 0, ',', '.'); echo "Rp.$bayarFormatted";?></b></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaProject"><b>Sisa Harga Project</b></label>
                    </div>
                    <div class="col-md-6">
                        <label for="namaProject"><b>: <?php $sisaFormatted = number_format($sisa, 0, ',', '.'); echo "Rp.$sisaFormatted";?></b></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form action = "{{url('/transaksiorderLagi')}}" method = "post" id="langsungbayar">
                                <input type="hidden" name="jumlah" value="{{$total}}" />
                                <input type="hidden" name="sisaharga" value="{{$sisa}}" />
                                @for($i = 0; $i < count($orders); $i++)
                                <input type="hidden" name="id_transaksiLama" value="{{$orders[$i]->id_transaksi}}" />
                                @endfor
                                {{csrf_field()}}
                                <button type="submit" style="font-size:20px;" class="btn btn-success" value="Bayar" /><i class="far fa-credit-card"></i> Bayar</button>
                            </form>
                        </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
        @else
        <center>
            <h2><i class="fas fa-exclamation-triangle"></i></h2>
            <h2>Anda Belum Melakukan Kontrak.</h2>
        </center>
    </div>
    @endif
</div>
@endsection
