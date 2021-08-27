@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if(session()->get('sukses'))
            <div class="alert alert-success">
                {{session()->get('sukses')}}
            </div>

            @endif
            <h6 class="m-0 font-weight-bold text-primary">Verifikasi Spm Manual</h6>
            <div class="d-flex justify-content-end">
                <a href="{{ route('verspmm.create') }}" class="btn btn-primary"> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Verifikator</th>
                            <th>Pembuat Verifikator</th>
                            <th>Tanggal Surat Dibuat</th>
                            <th>Uraian Pekerjaan</th>
                            <th>Divisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($verspmm as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->verif->jabatan }}-{{ $item->verif->nama_karyawan }}</td>
                            <td>{{ $item->karyawan->jabatan }}-{{ $item->karyawan->nama_karyawan }}</td>
                            <td>{{ $item->tanggal_surat }}</td>
                            <td>{{ $item->uraian_pekerjaan }}</td>
                            <td>{{ $item->devisi}}</td>
                            
                            <td class="d-flex">
                                <a href="{{ route('verspmm.show',$item->id) }}" class="btn btn-success mr-2">Show</a>
                                <a href="{{ route('verspmm.edit',$item->id) }}" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{route('verspmm.destroy', $item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="ml-5 btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection