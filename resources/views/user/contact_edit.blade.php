@extends('layouts.template_user')


@section('judulcontent2', 'dashboard / contact / edit')

@section('content')
                        
@foreach ($mails as $c)
    
      
<form action="{{route('contact_edit_store')}}" method="post">

    {{ csrf_field() }}
<input type="hidden" value="{{$c->id}}" name="id">

<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control"  name="name" value="{{$c->name}}">
</div>

<div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control"  name="phone" value="{{$c->phone}}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control"  name="email" value="{{$c->email}}">
</div>

<label>Kepada</label>
<select class="form-control" name="ditujukan_kepada">
  <option>{{$c->ditujukan_kepada}}</option>
  <option> --Pilih-- </option>
 @foreach ($data_karyawan as $dk)
    <option value="{{ $dk->nama_karyawan }}"> 
        {{ $dk->nama_karyawan }} 
    </option>
  @endforeach  
</select>
<br/>

<div class="form-group">
    <textarea class="ckeditor" id="ckedtor" name="isi_surat">{{$c->isi_surat}}</textarea>
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