@extends('layouts.template_admin')
@section('judulcontent2', 'Status')
@section('content')

@foreach ($costumers as $c)
<form action="/admin/dashboard/detail/status/store" method="post">

    {{ csrf_field() }}

<input type="hidden" name="id" value="{{$c->id}}">
    <label>Status Surat</label>
    <select class="form-control" name="status">
        <option>{{ $c->status }}</option>
        <option>Qualified</option>
        <option>Pending</option>
        <option>Uncontacted</option>
        <option>Lost</option>
    </select>
<br/>
    <br/>

<!-- <div class="form-group">
    <label>Keterangan</label>
    <textarea class="form-control" name="keterangan" rows="3">{{$c->keterangan}}</textarea>
</div> -->

<a href="/admin/dashboard/detail/{{$c->id}}" class="btn btn-warning">Kembali</a>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endforeach
@endsection