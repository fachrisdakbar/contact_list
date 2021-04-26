@extends('layouts.template_admin')
@section('judulcontent2', 'Add New Contact')
@section('content')


<form action="{{route('ajukan_contact_store')}}" method="post">
    
    {{ csrf_field() }}

<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control"  name="name">
</div>

<div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control"  name="phone">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control"  name="email">
</div>

<label>Assign To</label>
<select class="form-control" name="ditujukan_kepada">
  <option>Pilih</option>
 @foreach ($data_karyawan as $dk)
    <option value="{{ $dk->nama_karyawan }}"> 
        {{ $dk->nama_karyawan }} 
    </option>
  @endforeach  
</select>
<br/>


<!-- -->

<!-- <div class="form-group">
    <textarea class="form-control" rows="15" name="isi_surat"></textarea>
</div> -->




<button type="submit" class="btn btn-primary">Kirim</button>
</form>
 <br/>
 <br/>
 <br/>
@endsection