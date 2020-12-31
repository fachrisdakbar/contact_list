@extends('layouts.template_admin')


@section('judulcontent2', 'Surat Masuk')

@section('content')
                        
                       

           @foreach ($mails as $m)
    <table class="table-sm table-borderless">
  <tbody>
    <tr>
      <td>Judul</td>
      <td>:</td>
      <td>{{$m->judul_surat}}</td>
    </tr>
    <tr>
      <td>Dari</td>
      <td>:</td>
      <td>{{$m->surat_dari}}</td>
    </tr>
    <tr>
      <td>Kepada</td>
      <td>:</td>
      <td>{{$m->ditujukan_kepada}}</td>
    </tr> 
    <tr>
      <td>Status</td>
      <td>:</td>
      <td>{{$m->status}}-</td>
    </tr> 
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td>{{$m->keterangan}}-</td>
    </tr> 
   <tr> 
       <td><b> Isi Surat </b></td> 
    </tr>
</tbody>
</table>

<div class="card">
  <div class="card-body">
   {{$m->isi_surat}} 
  </div>
</div>
<br/>             
<a href="{{route('admin_dashboard')}}" class="btn btn-warning">kembali</a>
<a href="/admin/dashboard/detail/status/{{$m->nomor_surat}}" class="btn btn-primary">Status</a>
@endforeach       
@endsection