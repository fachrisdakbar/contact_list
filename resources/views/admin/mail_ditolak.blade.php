@extends('layouts.template_admin')


@section('judulcontent2', 'surat disetujui')

@section('content')
                        
                             <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Judul Surat</th>
                                                <th>Pengirim</th>
                                                <th>Status</th>
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
                                                    <td>{{$m->judul_surat}} t</td>
                                                    <td>{{$m->surat_dari}} </td>
                                                    <td>{{$m->status}} </td>
                                                    <td> 
                                                    <a href="/admin/dashboard/detail/{{$m->nomor_surat}}" >detail</a> |
                                                        <a href="/admin/dashboard/mail/hapus/{{$m->nomor_surat}}">hapus</a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $mails->links() }} <!-- ini pagination -->
                                </div>

                           
                            
                            
                                
                            </div>
 
@endsection