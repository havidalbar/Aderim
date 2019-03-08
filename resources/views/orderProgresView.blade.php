@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Order')

@section('content')
<div class="haladmin">

<!-- Tab content -->
  <div style="display:flex;flex-direction:row;font-size:20px">
      <div style="border: 1px solid #ddd;width:16.66%"><center>ID Order</center></div>
      <div style="border: 1px solid #ddd;width:16.66%"><center>Nama Pembeli</center></div>
      <div style="border: 1px solid #ddd;width:16.66%" ><center>Nama Project</center></div>
  </div>
  @for($i=0;$i<count($dataOrder);$i++)
  <div style="display:flex;flex-direction:row;font-size:20px">
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$dataOrder[$i]->id}}</center></div>
  <div style="border: 1px solid #ddd;width:16.66%"><center>{{$users[$i]->name}}</center></div>
  <a style="border: 1px solid #ddd;width:16.66%" href ="/order-progres/{{ $dataOrder[$i]->id}}">{{ $items[$i]->namaProject}}<center></center></a>
        </center></div>

  @endfor

</div>

</div>

@endsection
