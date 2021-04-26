@extends('layouts.template_user')


@section('judulcontent2', 'dashboard / mail')

@section('content')
                        
                               
  <div class="row">

                          

                             <div class="card-body">
                                 <a href="{{route('ajukan_contact')}}" class="btn btn-primary mb-3">Add New Contact</a>
                                  
                                    
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
                                                <th>Keterangan</th>
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
                                                    <td>{{$c->keterangan}}- </td>
                                                    <td> 
                                                    <a href="/home/surat/edit/{{$m->nomor_surat}}" >edit</a> |
                                                        <a href="/home/surat/hapus/{{$m->nomor_surat}}">hapus</a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $costumers->links() }} <!-- ini pagination -->
                                </div>

                                
                            </div>
@endsection