
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
                            <h3><i class="fas fa-user mr-4"></i>Data Pribadi</h3>
                        </div>
                    </div>
                    
                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>Nama Karyawan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->nama_karyawan }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Tempat Tanggal Lahir</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->tempat_lahir }}, {{tanggal_indonesia($model->tanggal_lahir)}}</h6>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>Jabatan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->jabatan }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Usia</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->usia }}</h6>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>Nik</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->nik }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Status Keluarga</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->status_keluarga }}</h6>
                        </div>
                    </div>

                    <div class="form-row mt-4 mb-2">
                        <div class="col-md-3">
                            <h3><i class="fas fa-briefcase mr-4"></i>Data Pegawai</h3>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>Jabatan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->jabatan }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Pendidikan Terakhir</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->pendidikan }}</h6>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>Tanggal Masuk Kerja</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ tanggal_indonesia($model->tanggal_masuk_kerja) }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Masa Kerja</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->masa_kerja }}</h6>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>Tanggal Pemilihan Jabatan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ tanggal_indonesia($model->tanggal_pilih_jabatan) }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Masa Jabatan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{$model->masa_jabatan}}</h6>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>Sk. Capeg</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->sk }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>NO. Peserta Wajib Pajak</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{$model->no_npwp}}</h6>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col-md-2">
                            <h6>No BPJS Ketenagakerjaan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{ $model->no_bpjs_ketenagakerjaan }}</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>No BPJS Kesehatan</h6>
                        </div>
                        <div class="col-md-3">
                            <h6> : {{$model->no_bpjs_kesehatan}}</h6>
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