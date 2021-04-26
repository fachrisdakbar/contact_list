@extends('layouts.template_admin')


@section('judulcontent2', 'data agent')

@section('content')
                        
                               
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             <?php $no = 0;?>
                                            @foreach ($agent as $dk)    
                                                <tr>
                                                    <?php $no++ ;?>
                                                    <td>{{ $no }}</td>
                                                    <td>{{$dk->nama_karyawan}} </td>
                                                    <td>{{$dk->jabatan}}</td>
                                                    <td>{{$dk->status}} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $agent->links() }} <!-- ini pagination -->
                        
                           
 
@endsection