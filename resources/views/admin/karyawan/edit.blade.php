@extends('admin.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{url('admin/karyawan')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-footer">

                    <!-- judul form-->

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Form Data Pribadi</h1>
                    </div>

                    <!-- Form Data Pribbadi -->
                    <form action="{{route('karyawan.update', $karyawan->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>Nama</label>
                                    <input name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" value="{{old('nama_karyawan')}}" />
                                    @error('nama_karyawan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Lahir</label>
                                    <input name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir')}}" />
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tempat Lahir</label>
                                    <input name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}" />
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Pendidikan</label>
                                    <select name="pendidikan" id="" class="form-control @error('pendidikan') is-invalid @enderror" data-live-search=" true">
                                        @foreach([
                                        "SD" => "SD",
                                        "SMP" => "SMP",
                                        "SMA" => "SMA",
                                        "D3" => "D3",
                                        "D4" => "D4",
                                        "S1" => "S1",
                                        "S2" => "S2",
                                        "S3" => "S3",
                                        ] AS $item => $itempendidikan)
                                        <option value="{{ $item }}" {{ old("pendidikan", $karyawan->pendidikan) == $item ? "selected" : "" }}>{{ $itempendidikan }}</option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Status Keluarga</label>
                                    <select name="status_keluarga" class="form-control @error('status_keluarga') is-invalid @enderror" data-live-search=" true">
                                        @foreach([
                                        "K/0" => "K/0",
                                        "K/1" => "K/1",
                                        "K/2" => "K/2",
                                        "K/3" => "K/3",
                                        "K/4" => "K/4",
                                        ] AS $item => $itemstatus)
                                        <option value="{{ $item }}" {{ old("status_keluarga", $karyawan->status_keluarga) == $item ? "selected" : "" }}>{{ $itemstatus }}</option>
                                        @endforeach
                                    </select>
                                    @error('status_keluarga')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Nomor Induk Kependudukan</label>
                                    <input name="nik_ktp" value="{{ $karyawan->nik_ktp }}" type="text" class="form-control @error('nik_ktp') is-invalid @enderror" value="{{old('nik_ktp')}}" />
                                    @error('nik_ktp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Nomor BPJS Kesehatan</label>
                                    <input name="no_bpjs_kesehatan" value="{{ $karyawan->no_bpjs_kesehatan }}" type="text" class="form-control @error('no_bpjs_kesehatan') is-invalid @enderror" value="{{old('no_bpjs_kesehatan')}}" />
                                    @error('no_bpjs_kesehatan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Nomor BPJS Ketenagakerjaan</label>
                                    <input name="no_bpjs_ketenagakerjaan" value="{{ $karyawan->no_bpjs_ketenagakerjaan }}" type="text" class="form-control @error('no_bpjs_ketenagakerjaan') is-invalid @enderror" value="{{old('no_bpjs_ketenagakerjaan')}}" />
                                    @error('no_bpjs_ketenagakerjaan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6 text-center">
                                        <label>Jurusan</label>
                                        <input name="jurusan" value="{{ $karyawan->jurusan }}" type="text" class="form-control @error('jurusan') is-invalid @enderror" value="{{old('jurusan')}}" />
                                        @error('jurusan')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Form Data Pegawai -->
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Form Data Pegawai</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Nomor Induk Kepegawaian</label>
                                    <input name="nik" value="{{ $karyawan->nik }}" type="text" class="form-control @error('nik') is-invalid @enderror" value="{{old('nik')}}" />
                                    @error('nik')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Jabatan</label>
                                    <select name="jabatan" id="" class="form-control">
                                        @foreach([
                                        "Manager SDM & Umum" => "Manager SDM & Umum",
                                        "Manager Usaha Ketapang" => "Manager Usaha Ketapang",
                                        "Manager Usaha Gilimanuk" => "Manager Usaha Gilimanuk",
                                        "Manager Keuangan" => "Manager Keuangan",
                                        "Manager Teknik" => "Manager Teknik",
                                        "Staf SDM & Umum" => "Staf SDM & Umum",
                                        "Staf Teknik Ketapang" => "Staf Teknik Ketapang",
                                        "Staf Usaha" => "Staf Usaha",
                                        ] AS $item => $itemjabatan)
                                        <option value="{{ $item }}" {{ old("jabatan", $karyawan->jabatan) == $item ? "selected" : "" }}>{{ $itemjabatan }}</option>
                                        @endforeach
                                    </select>

                                    <label>Tanggal Masuk Kerja</label>
                                    <input name="tanggal_masuk_kerja" value="{{ $karyawan->tanggal_masuk_kerja }}" type="date" class="form-control @error('tanggal_masuk_kerja') is-invalid @enderror" value="{{old('tanggal_masuk_kerja')}}" />
                                    @error('tanggal_masuk_kerja')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror


                                </div>

                                <div class="col-md-6">
                                    <label>NPWP</label>
                                    <input name="no_npwp" value="{{ $karyawan->no_npwp }}" type="text" class="form-control @error('no_npwp') is-invalid @enderror" value="{{old('no_npwp')}}" />
                                    @error('no_npwp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>No. Sk</label>
                                    <input name="sk" value="{{ $karyawan->sk }}" type="text" class="form-control @error('sk') is-invalid @enderror" value="{{old('sk')}}" />
                                    @error('sk')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Dipilih jabatan</label>
                                    <input name="tanggal_pilih_jabatan" value="{{ $karyawan->tanggal_pilih_jabatan }}" type="date" class="form-control @error('tanggal_pilih_jabatan') is-invalid @enderror" value="{{old('tanggal_pilih_jabatan')}}" />
                                    @error('tanggal_pilih_jabatan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>

                        </div>

                        <div class="col text-center">

                            <button type="submit" class="btn btn-success btn-lg">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection