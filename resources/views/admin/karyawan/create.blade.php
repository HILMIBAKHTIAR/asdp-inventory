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

                    {{-- @if($errors->any())

                        <div class="alert alert-danger">
                            <div class="list-group">
                                @foreach($errors->all() as $error)
                                <li class="list-group-item">
                                    {{$error}}
                    </li>
                    @endforeach
                </div>
            </div>

            @endif --}}

            <!-- judul form-->

            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Data Pribadi</h1>
            </div>

            <!-- Form Data Pribbadi -->
            <form action="{{route('karyawan.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6 search_select_box">
                            <label>Nama</label>
                            <input name="nama_karyawan" type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" value="{{old('nama_karyawan')}}" />
                            @error('nama_karyawan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir')}}" />
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}" />
                            @error('tempat_lahir')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Pendidikan</label>
                            <select name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" data-live-search=" true">
                                <option value="SD" @if (old('pendidikan')=='SD' ) selected="selected" @endif>SD</option>
                                <option value="SMP" @if (old('pendidikan')=='SMP' ) selected="selected" @endif>SMP</option>
                                <option value="SMA" @if (old('pendidikan')=='SMA' ) selected="selected" @endif>SMA</option>
                                <option value="D3" @if (old('pendidikan')=='D3' ) selected="selected" @endif>D3</option>
                                <option value="D4" @if (old('pendidikan')=='D4' ) selected="selected" @endif>D4</option>
                                <option value="S1" @if (old('pendidikan')=='S1' ) selected="selected" @endif>S1</option>
                                <option value="S2" @if (old('pendidikan')=='S2' ) selected="selected" @endif>S2</option>
                                <option value="S3" @if (old('pendidikan')=='S3' ) selected="selected" @endif>S3</option>
                            </select>
                            @error('pendidikan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 search_select_box">
                            <label>Status Keluarga</label>
                            <select name="status_keluarga" class="form-control @error('status_keluarga') is-invalid @enderror" data-live-search=" true">
                                <option value="K/0" @if (old('status_keluarga')=='K/0' ) selected="selected" @endif>K/0</option>
                                <option value="K/1" @if (old('status_keluarga')=='K/1' ) selected="selected" @endif>K/1</option>
                                <option value="K/2" @if (old('status_keluarga')=='K/2' ) selected="selected" @endif>K/2</option>
                                <option value="K/3" @if (old('status_keluarga')=='K/3' ) selected="selected" @endif>K/3</option>
                                <option value="K/4" @if (old('status_keluarga')=='K/4' ) selected="selected" @endif>K/4</option>
                            </select>
                            @error('status_keluarga')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Nomor Induk Kependudukan</label>
                            <input name="nik_ktp" type="text" class="form-control @error('nik_ktp') is-invalid @enderror" value="{{old('nik_ktp')}}" />
                            @error('nik_ktp')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Nomor BPJS Kesehatan</label>
                            <input name="no_bpjs_kesehatan" type="text" class="form-control @error('no_bpjs_kesehatan') is-invalid @enderror" value="{{old('no_bpjs_kesehatan')}}" />
                            @error('no_bpjs_kesehatan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Nomor BPJS Ketenagakerjaan</label>
                            <input name="no_bpjs_ketenagakerjaan" type="text" class="form-control @error('no_bpjs_ketenagakerjaan') is-invalid @enderror" value="{{old('no_bpjs_ketenagakerjaan')}}" />
                            @error('no_bpjs_ketenagakerjaan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6 text-center">
                                <label>Jurusan</label>
                                <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" value="{{old('jurusan')}}" />
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
                            <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" value="{{old('nik')}}" />
                            @error('nik')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Jabatan</label>
                            <select name="jabatan_id" id="" class="form-control">
                                @foreach($jabatan as $item)
                                        <option value="{{$item->id}}" {{old('jabatan_id') == $item->id ? 'selected' : null}}>
                                            {{$item->nama_jabatan}}
                                        </option>
                                        @endforeach
                            </select>

                            <label>Tanggal Masuk Kerja</label>
                            <input name="tanggal_masuk_kerja" type="date" class="form-control @error('tanggal_masuk_kerja') is-invalid @enderror" value="{{old('tanggal_masuk_kerja')}}" />
                            @error('tanggal_masuk_kerja')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror


                        </div>

                        <div class="col-md-6">
                            <label>NPWP</label>
                            <input name="no_npwp" type="text" class="form-control @error('no_npwp') is-invalid @enderror" value="{{old('no_npwp')}}" />
                            @error('no_npwp')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>No. Sk</label>
                            <input name="sk" type="text" class="form-control @error('sk') is-invalid @enderror" value="{{old('sk')}}" />
                            @error('sk')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label>Tanggal Dipilih jabatan</label>
                            <input name="tanggal_pilih_jabatan" type="date" class="form-control @error('tanggal_pilih_jabatan') is-invalid @enderror" value="{{old('tanggal_pilih_jabatan')}}" />
                            @error('tanggal_pilih_jabatan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <br>

                </div>

                <div class="col text-center">

                    <input type="submit" class="btn btn-success btn-lg" name="simpan" id="simpan" value="simpan" style="padding: 5px 50px; margin-top: 10px;">

                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>
@endsection