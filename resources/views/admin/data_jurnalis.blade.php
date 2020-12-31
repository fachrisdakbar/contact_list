@extends('layouts.template_admin')


@section('judulcontent2', 'data jurnalis media')

@section('content')
                        
                               
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                               
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             <?php $no = 0;?>
                                            @foreach ($data_jurnalis as $dj)    
                                                <tr>
                                                    <?php $no++ ;?>
                                                    <td>{{ $no }}</td>
                                                    <td>{{$dj->name}} </td>
                                                    <td>{{$dj->email}}</td> 
                                                    <td> 
                                                    <a href="/admin/data/jurnalis/hapus/{{$dj->id}}">hapus</a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $data_jurnalis->links() }} <!-- ini pagination -->
                        
                           
 
@endsection