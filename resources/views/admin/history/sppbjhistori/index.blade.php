@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-start">
            <a href="{{ route('sp2bj.create') }}" class="btn btn-success"> Kembali</a>
            <div class="ml-2 text-right">

                <a class="btn btn-warning" href="{{ url('admin/file-exportSppbj') }}">Export Excel</a>

            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session()->get('sukses'))
                    <div class="alert alert-success">
                        {{ session()->get('sukses') }}
                    </div>

                @endif
                <h6 class="m-0 font-weight-bold text-primary">Surat Permintaan Pengadaan Barang/Jasa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Nama Pengadaan</th>
                                <th>Nama Peminta</th>
                                <th>User/Pembuat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sppbj as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nomor_surat }}</td>
                                    <td>{{ $item->tanggal_surat }}</td>
                                    <td>{{ $item->nama_pengadaan }}</td>
                                    <td>{{ $item->karyawan->jabatan->nama_jabatan }} - {{ $item->karyawan->nama_karyawan }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('sppbjhistori.show', $item->id) }}"
                                            class="btn btn-success mr-2">Show</a>

                                        @can('umum-delete')
                                            <form action="{{ route('sppbjhistori.destroy', $item->id) }}" method="post">
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
