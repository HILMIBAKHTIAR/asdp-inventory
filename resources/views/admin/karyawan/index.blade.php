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
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
            <div class="d-flex justify-content-end">
                <a href="{{route('karyawan.create')}}" class="btn btn-primary"> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Nik</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i=>$row)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->nama_karyawan}}</td>
                            <td>{{$row->jabatan}}</td>
                            <td>{{$row->nik}}</td>

                            <td class="d-flex">
                                <a href="{{route('karyawan.show',$row->id)}}" class="btn btn-success mr-2">Show</a>
                                <a href="{{route('karyawan.edit',$row->id)}}" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{route('karyawan.destroy', $row->id)}}" method="post">
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