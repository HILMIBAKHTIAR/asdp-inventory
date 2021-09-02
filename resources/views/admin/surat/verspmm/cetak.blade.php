@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Info Data Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>Verifikator</th>
                        <th>Pembuat Verifikator</th>
                        <th>tanggal surat</th>
                        <th>Divisi</th>
                    </tr>
                    <tr>
                        <td>{{ $cetak->karyawan_id }}</td>
                        <td>{{ $cetak->verifikator }}</td>
                        <td>{{ $cetak->tanggal_surat }}</td>
                        <td>{{ $cetak->devisi }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection