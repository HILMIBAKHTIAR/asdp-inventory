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
            <h6 class="m-0 font-weight-bold text-primary">Spm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Devisi</th>
                            <th>Tahun Anggaran</th>
                            <th>Jenis Transaksi</th>
                            <th>Pembuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($data_spm as $item)
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nomor_surat_spm}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{$item->devisi}}</td>
                            <td>{{$item->tahun_anggaran}}</td>
                            <td>{{$item->jenis_transaksi}}</td>
                            <td>{{$item->user->name}}</td>
                            <td class="d-flex">
                                <a href="{{route('spmhistori.show',$item->id)}}" class="btn btn-success mr-2">Show</a>
                                <a href="" class="btn btn-primary mr-2">Edit</a>
                                <form action="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="ml-5 btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection