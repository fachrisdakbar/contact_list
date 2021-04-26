@extends('layouts.template_admin')


@section('judulcontent2', 'dashboard / contact masuk')

@section('content')
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Costumer Uncontacted</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('costumer_uncontacted') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Costumer Qualified</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('costumer_disetujui')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Costumer Pending</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('costumer_ditolak')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Costumer Lost </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('costumer_lost')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                                Halaman : {{ $costumers->currentPage() }} <br/>
                                Jumlah Data : {{ $costumers->total() }} <br/>
                                Data Per Halaman : {{ $costumers->perPage() }} <br/>
                            
                            
                                
                            </div>
 
@endsection