@extends('layouts.template_user')


@section('judulcontent2', 'data narasumber')

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
                                            @foreach ($narasumber as $dk)    
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
                                                    {{ $narasumber->links() }} <!-- ini pagination -->
                        
                           
 
@endsection