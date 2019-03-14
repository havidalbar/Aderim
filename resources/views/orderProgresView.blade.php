@extends (\Session::has('name') ? 'layouts.navLogin' : 'layouts.nav')
@section('title', 'Order')

@section('content')
<center><h1><i class="fas fa-business-time" style="font-size: 100px;"></i></h1><br><h2>PROGRES</h2></center>
<br><br><br><br><br>

<!-- Progres Order -->
<div id="pendaftaran">
<table style="font-size: 20px;">
  <thead>
    <tr>
      <th><center>ID Order</center></th>
      <th><center>Nama Pembeli</center></th>
      <th><center>Nama Project</center></th>
    </tr>
  </thead>
  @for($i=0;$i< count($dataOrder);$i++)
  <tbody id="myTable">
    <tr>
      <td><center>{{$dataOrder[$i]->id}}</center></td>
      <td><center>{{$users[$i]->name}}</center></td>
      <td><center><a href="/order-progres/{{ $dataOrder[$i]->id}}">{{$items[$i]->namaProject}}</a></center></td>
    </tr>
  </tbody>
  @endfor
</table>
</div>
@endsection
