@extends('layouts.template_admin')
@section('judulcontent2', 'Tambah Data Karyawan')
@section('content')

@foreach ($data_karyawan as $dk)
    

<form action="{{route('data_karyawan_editdata_store')}}" method="post">

    {{ csrf_field() }}
<input type="hidden" value="{{$dk->id_karyawan}}" name="id_karyawan">
<div class="form-group">
    <label>Nama Karyawan</label>
    <input type="text" class="form-control"  name="nama_karyawan" value="{{$dk->nama_karyawan}}">
</div>
<div class="form-group">
    <label>Jabatan</label>
    <input type="text" class="form-control"  name="jabatan" value="{{$dk->jabatan}}">
</div>

<label>Status</label>
<select class="form-control" name="status">
  <option>{{$dk->status}}</option>
    <option>Ditempat</option>
    <option>Luar Kota</option>
</select>
<br/>
<div class="form-group">
    <label>Handphone</label>
    <input type="text" class="form-control"  name="no_hp" value="{{$dk->no_hp}}">
</div>
<div class="form-group">
    <label>Alamat</label>
    <input type="text" class="form-control"  name="alamat" value="{{$dk->alamat}}">
</div>

<button type="submit" class="btn btn-primary">Tambah</button>
</form>
 <br/>
 <br/>
 <br/>
 @endforeach
@endsection