@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{route('sp2bj.create')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if(session()->get('sukses'))
            <div class="alert alert-success">
                {{session()->get('sukses')}}
            </div>

            @endif
            <h6 class="m-0 font-weight-bold text-primary">Verifikasi Surat Perintah Membayar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Verifikator</th>
                            <th>Tanggal Surat Dibuat</th>
                            <th>Uraian Pekerjaan</th>
                            <th>Divisi</th>
                            <th>User/Pembuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_verspm as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->verif->nama_karyawan}}</td>
                            <td>{{$item->tanggal_surat}}</td>
                            <td>{{$item->sp2bj->nama_pengadaan}}</td>
                            <td>{{$item->spm->divisi->nama_divisi}}</td>
                            <td>{{$item->user->name}}</td>
                            <td class="d-flex">
                                <a href="{{route('verspmhistori.show',$item->id)}}" class="btn btn-success">Show</a>
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