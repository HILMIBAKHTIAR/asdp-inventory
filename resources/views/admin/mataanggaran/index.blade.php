@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mata Anggaran</h6>
            <div class="d-flex justify-content-end">
                <a href="{{route('mataanggaran.create')}}" class="btn btn-primary"> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Anggaran</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i=>$row)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->nomor}}</td>
                            <td>{{$row->keterangan}}</td>

                            <td class="d-flex">
                                <a href="{{route('mataanggaran.edit',$row->id)}}" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{route('mataanggaran.destroy', $row->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Hapus</button>
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