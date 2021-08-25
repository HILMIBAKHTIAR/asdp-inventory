{{-- @extends('admin.layout.master')

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
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Nik</th>
                    </tr>
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->nama_karyawan }}</td>
                        <td>{{ $model->jabatan }}</td>
                        <td>{{ $model->nik }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row d-flex justify-content-center ">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info Data Karyawan</h6>
                </div>
                <div class="card-body">
                    <div class="form-row mb-2">
                        <div class="col-md-3">
                            <h3>Profil</h3>
                        </div>
                    </div>
                    
                    <div class="form-row mt-2">
                        <div class="col-md-3">
                            <h6>Nama Karyawan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->nama_karyawan }}</h6>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-3">
                            <h6>Jabatan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->jabatan }}</h6>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-3">
                            <h6>Nik</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->nik }}</h6>
                        </div>
                    </div>

                    <div class="form-row mt-4">
                        <div class="col-md-3">
                            <a href="{{route('karyawan.index')}}" class="btn btn-primary mr-2">kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection