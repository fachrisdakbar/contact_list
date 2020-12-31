@extends('layouts.template_admin')
@section('judulcontent2', 'Tambah Data Karyawan')
@section('content')


<form action="{{route('data_karyawan_tambahdata_store')}}" method="post">

    {{ csrf_field() }}

<div class="form-group">
    <label>Nama Karyawan</label>
    <input type="text" class="form-control"  name="nama_karyawan">
</div>
<div class="form-group">
    <label>Jabatan</label>
    <input type="text" class="form-control"  name="jabatan">
</div>

<label>Status</label>
<select class="form-control" name="status">
  <option>--Pilih Status--</option>
    <option>Ditempat</option>
    <option>Luar Kota</option>
</select>
<br/>
<div class="form-group">
    <label>Handphone</label>
    <input type="text" class="form-control"  name="no_hp">
</div>
<div class="form-group">
    <label>Alamat</label>
    <input type="text" class="form-control"  name="alamat">
</div>

<button type="submit" class="btn btn-primary">Tambah</button>
</form>
 <br/>
 <br/>
 <br/>
@endsection