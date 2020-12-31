@extends('layouts.template_user')


@section('judulcontent2', 'dashboard / surat / edit')

@section('content')
                        
@foreach ($mails as $m)
    
      
<form action="{{route('surat_edit_store')}}" method="post">

    {{ csrf_field() }}
<input type="hidden" value="{{$m->nomor_surat}}" name="nomor_surat">
<div class="form-group">
    <label>Judul Surat</label>
    <input type="text" class="form-control"  name="judul_surat" value="{{$m->judul_surat}}">
</div>

<label>Kepada</label>
<select class="form-control" name="ditujukan_kepada">
  <option>{{$m->ditujukan_kepada}}</option>
  <option> --Pilih-- </option>
 @foreach ($data_karyawan as $dk)
    <option value="{{ $dk->nama_karyawan }}"> 
        {{ $dk->nama_karyawan }} 
    </option>
  @endforeach  
</select>
<br/>

<div class="form-group">
    <textarea class="ckeditor" id="ckedtor" name="isi_surat">{{$m->isi_surat}}</textarea>
</div>



<a href="{{route('home')}}" class="btn btn-warning">kembali</a>
<button type="submit" class="btn btn-primary">Simpan</button>
</form>
 <br/>
 <br/>
 <br/>
<br/>             


@endforeach       
@endsection