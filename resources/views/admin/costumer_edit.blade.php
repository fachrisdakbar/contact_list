@extends('layouts.template_user')


@section('judulcontent2', 'dashboard / contact / edit')

@section('content')
                        
@foreach ($costumers as $c)
    
      
<form action="{{route('contact_edit_store')}}" method="post">

    {{ csrf_field() }}
<input type="hidden" value="{{$m->id}}" name="id">
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
  <option>{{$m->ditujukan_kepada}}</option>
  <option> --Pilih-- </option>
 @foreach ($data_karyawan as $dk)
    <option value="{{ $dk->nama_karyawan }}"> 
        {{ $dk->nama_karyawan }} 
    </option>
  @endforeach  
</select>
<br/>

<!-- <div class="form-group">
    <textarea class="ckeditor" id="ckedtor" name="isi_surat">{{$m->isi_surat}}</textarea>
</div> -->



<a href="{{route('home')}}" class="btn btn-warning">kembali</a>
<button type="submit" class="btn btn-primary">Simpan</button>
</form>
 <br/>
 <br/>
 <br/>
<br/>             


@endforeach       
@endsection