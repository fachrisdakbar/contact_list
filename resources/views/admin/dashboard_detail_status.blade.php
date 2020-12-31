@extends('layouts.template_admin')
@section('judulcontent2', 'Status')
@section('content')

@foreach ($mails as $m)
<form action="/admin/dashboard/detail/status/store" method="post">

    {{ csrf_field() }}

<input type="hidden" name="nomor_surat" value="{{$m->nomor_surat}}">
    <label>Status Surat</label>
    <select class="form-control" name="status">
        <option>{{ $m->status }}</option>
        <option>disetujui</option>
        <option>ditolak</option>
        <option>proses</option>
    </select>
<br/>
    <br/>

<div class="form-group">
    <label>Keterangan</label>
    <textarea class="form-control" name="keterangan" rows="3">{{$m->keterangan}}</textarea>
</div>

<a href="/admin/dashboard/detail/{{$m->nomor_surat}}" class="btn btn-warning">Kembali</a>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endforeach
@endsection