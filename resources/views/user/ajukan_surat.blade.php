@extends('layouts.template_user')
@section('judulcontent2', 'Tulis Surat')
@section('content')


<form action="{{route('ajukan_surat_store')}}" method="post">

    {{ csrf_field() }}

<div class="form-group">
    <label>Judul Surat</label>
    <input type="text" class="form-control"  name="judul_surat">
</div>

<label>Kepada</label>
<select class="form-control" name="ditujukan_kepada">
  <option>Pilih</option>
 @foreach ($data_karyawan as $dk)
    <option value="{{ $dk->nama_karyawan }}"> 
        {{ $dk->nama_karyawan }} 
    </option>
  @endforeach  
</select>
<br/>

<div class="form-group">
    <textarea class="form-control" rows="15" name="isi_surat"></textarea>
</div>




<button type="submit" class="btn btn-primary">Kirim</button>
</form>
 <br/>
 <br/>
 <br/>
@endsection