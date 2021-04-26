@extends('layouts.template_admin')


@section('judulcontent2', 'data karyawan')

@section('content')
                        
                                <a href="{{route('data_karyawan_tambahdata')}}" class="btn btn-primary  mb-3 ">Tambah Data</a> 
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             <?php $no = 0;?>
                                            @foreach ($status as $s)    
                                                <tr>
                                                    <?php $no++ ;?>
                                                    <td>{{ $no }}</td>
                                                    <td>{{$s->nama_karyawan}} </td>
                                                    <td>{{$s->jabatan}}</td>
                                                    <td>{{$s->status}} </td>
                                                    <td>{{$s->no_hp}} </td>
                                                    <td>{{$s->alamat}} </td>
                                                    <td> 
                                                    <a href="/admin/data/status/editdata/{{$s->id_status}}">edit</a> 
                                                    <a href="/admin/data/status/hapus/{{$s->id_status}}">hapus</a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $data_karyawan->links() }} <!-- ini pagination -->
                        
                           
 
@endsection