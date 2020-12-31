@extends('layouts.template_user')


@section('judulcontent2', 'dashboard / mail')

@section('content')
                        
                               
  <div class="row">

                          

                             <div class="card-body">
                                 <a href="{{route('ajukan_surat')}}" class="btn btn-primary mb-3">Tulis Surat</a>
                                  
                                    
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Judul Surat</th>
                                                <th>Pengirim</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                               
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             <?php $no = 0;?>
                                            @foreach ($mails as $m)    
                                                <tr>
                                                    <?php $no++ ;?>
                                                    <td>{{ $no }}</td>
                                                    <td>{{$m->created_at}} </td>
                                                    <td>{{$m->judul_surat}}</td>
                                                    <td>{{$m->surat_dari}} </td>
                                                    <td>{{$m->status}} </td>
                                                    <td>{{$m->keterangan}}- </td>
                                                    <td> 
                                                    <a href="/home/surat/edit/{{$m->nomor_surat}}" >edit</a> |
                                                        <a href="/home/surat/hapus/{{$m->nomor_surat}}">hapus</a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $mails->links() }} <!-- ini pagination -->
                                </div>

                                
                            </div>
@endsection