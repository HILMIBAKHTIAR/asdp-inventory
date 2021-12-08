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
            <h6 class="m-0 font-weight-bold text-primary">Surat Kebenaran Harga</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Peminta</th>
                            <th>Tanggal Surat</th>
                            <th>Alamat Tujuan</th>
                            <th>Nomor Telp</th>
                            <th>User/Pembuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_skb as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->sp2bj->karyawan->nama_karyawan}}</td>
                            <td>{{$item->tanggal_surat}}</td>
                            <td>{{$item->alamat_tujuan}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->user->name}}</td>
                            <td class="d-flex">
                                <a href="{{route('skbhistori.show',$item->id)}}" class="btn btn-success">Show</a>
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