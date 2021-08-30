@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{url('admin/surat/')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if(session()->get('sukses'))
            <div class="alert alert-success">
                {{session()->get('sukses')}}
            </div>

            @endif
            <h6 class="m-0 font-weight-bold text-primary">Spm Manual</h6>
            <div class="d-flex justify-content-end">
                <a href="{{route('spmm.create')}}" class="btn btn-primary"> Tambah</a>
            </div>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_spmm as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nomor_surat_spm}}</td>
                            <td>{{$item->tanggal_surat}}</td>
                            <td>{{$item->devisi}}</td>
                            <td>{{$item->tahun_anggaran}}</td>
                            <td>{{$item->jenis_transaksi}}</td>

                            <td class="d-flex">
                                <a href="{{route('spmm.show',$item->id)}}" class="btn btn-success mr-2">Show</a>
                                <a href="{{route('spmm.edit',$item->id)}}" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{route('spmm.destroy', $item->id)}}" method="post">
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