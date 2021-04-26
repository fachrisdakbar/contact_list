@extends('layouts.template_admin')


@section('judulcontent2', 'Contact List')

@section('content')
                        
                       

           @foreach ($costumers as $c)
    <table class="table-sm table-borderless">
  <tbody>
    <tr>
      <td>Name</td>
      <td>:</td>
      <td>{{$c->name}}</td>
    </tr>
    <tr>
      <td>Phone</td>
      <td>:</td>
      <td>{{$c->phone}}</td>
    </tr>
    <tr>
      <td>email</td>
      <td>:</td>
      <td>{{$c->email}}</td>
    </tr>
    <tr>
      <td>Kepada</td>
      <td>:</td>
      <td>{{$c->ditujukan_kepada}}</td>
    </tr> 
    <tr>
      <td>Status</td>
      <td>:</td>
      <td>{{$c->status}}-</td>
    </tr> 
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td>{{$c->keterangan}}-</td>
    </tr> 
</tbody>
</table>


<br/>             
<a href="{{route('admin_dashboard')}}" class="btn btn-warning">kembali</a>
<a href="/admin/dashboard/detail/status/{{$c->id}}" class="btn btn-primary">Status</a>
@endforeach       
@endsection