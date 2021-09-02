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
            <h6 class="m-0 font-weight-bold text-primary">Skb Manual</h6>
            <div class="d-flex justify-content-end">
                @can('umum-create')
                <a href="{{route('skbm.create')}}" class="btn btn-primary"> Tambah</a>
                @endcan
            </div>
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

                        @foreach ($skbm as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->karyawan->jabatan}} - {{$item->karyawan->nama_karyawan}}</td>
                            <td>{{tanggal_indonesia($item->tanggal_surat)}}</td>
                            <td>{{$item->alamat_tujuan}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->user->name}}</td>

                            <td class="d-flex">
                                @can('umum-show')
                                <a href="{{route('skbm.show',$item->id)}}" class="btn btn-success mr-2">Show</a>
                                @endcan
                                @can('umum-edit')
                                <a href="{{route('skbm.edit',$item->id)}}" class="btn btn-primary mr-2">Edit</a>
                                @endcan
                                @can('umum-delete')
                                <form action="{{route('skbm.destroy',$item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="ml-5 btn btn-danger" type="submit">Hapus</button>
                                </form>
                                @endcan
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