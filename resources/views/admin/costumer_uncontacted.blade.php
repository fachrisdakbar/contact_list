@extends('layouts.template_admin')


@section('judulcontent2', 'contact disetujui')

@section('content')
                        
                             <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                               
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                        <?php $no = 0;?>
                                            @foreach ($costumers as $c)    
                                                <tr>
                                                    <?php $no++ ;?>
                                                    <td>{{ $no }}</td>
                                                    <td>{{$c->created_at}} </td>
                                                    <td>{{$c->name}}</td>
                                                    <td>{{$c->phone}} </td>
                                                    <td>{{$c->email}} </td>
                                                    <td>{{$c->status}} </td>
                                                    <td> 
                                                    <a href="/admin/dashboard/detail/{{$c->id}}" >detail</a> |
                                                        <a href="/admin/dashboard/costumer/hapus/{{$c->id}}">hapus</a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $costumers->links() }} <!-- ini pagination -->
                                </div>

                 
                            
                            
                                
                            </div>
 
@endsection