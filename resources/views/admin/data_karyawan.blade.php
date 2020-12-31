@extends('layouts.template_admin')


@section('judulcontent2', 'data karyawan')

@section('content')
                        
                                <a href="{{route('data_karyawan_tambahdata')}}" class="btn btn-primary  mb-3 ">Tambah Data</a> 
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                                <th>Handphone</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                               
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             <?php $no = 0;?>
                                            @foreach ($data_karyawan as $dk)    
                                                <tr>
                                                    <?php $no++ ;?>
                                                    <td>{{ $no }}</td>
                                                    <td>{{$dk->nama_karyawan}} </td>
                                                    <td>{{$dk->jabatan}}</td>
                                                    <td>{{$dk->status}} </td>
                                                    <td>{{$dk->no_hp}} </td>
                                                    <td>{{$dk->alamat}} </td>
                                                    <td> 
                                                    <a href="/admin/data/karyawan/editdata/{{$dk->id_karyawan}}">edit</a> |
                                                    <a href="/admin/data/karyawan/hapus/{{$dk->id_karyawan}}">hapus</a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                    {{ $data_karyawan->links() }} <!-- ini pagination -->
                        
                           
 
@endsection