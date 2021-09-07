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

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Jabatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Jabatan</label>
                                <input name="nama_jabatan" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary simpan">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan Karyawan</h6>
                <div class="text-right">
                    @can('sdm-create')
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah</button>
                    @endcan
                </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jabatan as $i=>$row)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->nama_jabatan}}</td>
                            <td class="d-flex">
                                @can('sdm-delete')    
                                <form action="{{route('jabatan.destroy', $row->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Hapus</button>
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

<script>
    $('.simpan').on('click', function() {
        $.ajax({
            url: '{{url("admin/jabatan/tambah")}}',
            method: 'post',
            data: {
                _token: '{{csrf_token()}}',
                nama_jabatan: $('input[name=nama_jabatan]').val(),
            },
            dataType: 'json',
            success() {
                window.location.reload();
            }
        });
    });
</script>

@endsection