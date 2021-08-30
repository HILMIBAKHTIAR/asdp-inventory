{{-- @extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row d-flex justify-content-center ">
        <div class="col-xl-6 col-lg-6">
            <div class="card mb-4">
                <div class="card-footer">
                    <form action="{{route('karyawan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <table class="table table-bordered" id="tabelData" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <td><input name="nama_karyawan[]" type="text" class="form-control"></td>
                                            <td class=""><input href="" class="btn btn-primary mr-2" type="button" name="tambah" id="tambah" value="Tambah"></input></td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td class="search_select_box">
                                                <select name="jabatan[]" id="" class="form-control" data-live-search=" true">
                                                    <option value="">-Pilih-</option>
                                                    <option value="Manager SDM & Umum">Manager SDM & Umum</option>
                                                    <option value="Manager Usaha Ketapang">Manager Usaha Ketapang</option>
                                                    <option value="Manager Usaha Gilimanuk">Manager Usaha Gilimanuk</option>
                                                    <option value="Manager Keuangan">Manager Keuangan</option>
                                                    <option value="Manager Teknik">Manager Teknik</option>
                                                    <option value="Staf SDM & Umum">Staf SDM & Umum</option>
                                                    <option value="Verifikator">Verifikator</option>
                                                    <option value="Staf Teknik Ketapang">Staf Teknik Ketapang</option>
                                                    <option value="Staf Usaha">Staf Usaha</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nik</th>
                                            <td><input name="nik[]" type="text" class="form-control"></td>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var x = 1;
        $("#tambah").click(function() {
            $("#tabelData").append(`<thead>
                                        <tr>
                                            <th>Nama</th>
                                            <td><input name="nama_karyawan[]" type="text" class="form-control"></td>
                                            <td class=""><input href="" class="btn btn-danger mr-2" type="button" name="hapus" id="hapus" value="Hapus"></input></td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td>
                                                <select name="jabatan[]" id="" class="form-control">
                                                    <option value="">-Pilih-</option>
                                                    <option value="Manager SDM & Umum">Manager SDM & Umum</option>
                                                    <option value="Manager Usaha Ketapang">Manager Usaha Ketapang</option>
                                                    <option value="Manager Usaha Gilimanuk">Manager Usaha Gilimanuk</option>
                                                    <option value="Manager Keuangan">Manager Keuangan</option>
                                                    <option value="Manager Teknik">Manager Teknik</option>
                                                    <option value="Staf SDM & Umum">Staf SDM & Umum</option>
                                                    <option value="Verifikator">Verifikator</option>
                                                    <option value="Staf Teknik Ketapang">Staf Teknik Ketapang</option>
                                                    <option value="Staf Usaha">Staf Usaha</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nik</th>
                                            <td><input name="nik[]" type="text" class="form-control"></td>
                                        </tr>
                                    </thead>`);
            $("#tabelData").on('click', '#hapus', function() {
                $(this).closest('thead').remove();
            })
        });
    });
</script>

@endsection --}}

@extends('admin.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-footer">

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
                                    <input name="nama_karyawan[]" type="text" class="form-control @error('nama_karyawan[]') is-invalid @enderror" value="{{old('nama_karyawan[]')}}" />
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
                                    <input name="pendidikan" type="text" class="form-control @error('pendidikan') is-invalid @enderror" value="{{old('pendidikan')}}" />
                                    @error('pendidikan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Status Keluarga</label>
                                    <input name="status_keluarga" type="text" class="form-control @error('status_keluarga') is-invalid @enderror" value="{{old('status_keluarga')}}" />
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

                            <!-- Form Data Pegawai -->
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Form Data Pegawai</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>NIK</label>
                                    <input name="nik[]" type="text" class="form-control">
                                    <label>Jabatan</label>
                                            <select name="jabatan[]" id="" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <option value="Manager SDM & Umum">Manager SDM & Umum</option>
                                                <option value="Manager Usaha Ketapang">Manager Usaha Ketapang</option>
                                                <option value="Manager Usaha Gilimanuk">Manager Usaha Gilimanuk</option>
                                                <option value="Manager Keuangan">Manager Keuangan</option>
                                                <option value="Manager Teknik">Manager Teknik</option>
                                                <option value="Staf SDM & Umum">Staf SDM & Umum</option>
                                                <option value="Verifikator">Verifikator</option>
                                                <option value="Staf Teknik Ketapang">Staf Teknik Ketapang</option>
                                                <option value="Staf Usaha">Staf Usaha</option>
                                            </select>
                                    

                                </div>

                                <div class="col-md-6">
                                    <label>NPWP</label>
                                    <input name="tanggal_sppbj" type="text" class="form-control @error('tanggal_sppbj') is-invalid @enderror" value="{{old('tanggal_sppbj')}}" />
                                    @error('tanggal_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>SK.Capeg</label>
                                    <input name="tanggal_berita_acara" type="text" class="form-control @error('tanggal_berita_acara') is-invalid @enderror" value="{{old('tanggal_berita_acara')}}" />
                                    @error('tanggal_berita_acara')
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
<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        var x = 1;
        $("#tambah").click(function() {
            $("#tabelData").append(`<thead>
                                        <tr>
                                            <th>Nama</th>
                                            <td><input name="nama_karyawan[]" type="text" class="form-control"></td>
                                            <td class=""><input href="" class="btn btn-danger mr-2" type="button" name="hapus" id="hapus" value="Hapus"></input></td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td>
                                                <select name="jabatan[]" id="" class="form-control">
                                                    <option value="">-Pilih-</option>
                                                    <option value="Manager SDM & Umum">Manager SDM & Umum</option>
                                                    <option value="Manager Usaha Ketapang">Manager Usaha Ketapang</option>
                                                    <option value="Manager Usaha Gilimanuk">Manager Usaha Gilimanuk</option>
                                                    <option value="Manager Keuangan">Manager Keuangan</option>
                                                    <option value="Manager Teknik">Manager Teknik</option>
                                                    <option value="Staf SDM & Umum">Staf SDM & Umum</option>
                                                    <option value="Verifikator">Verifikator</option>
                                                    <option value="Staf Teknik Ketapang">Staf Teknik Ketapang</option>
                                                    <option value="Staf Usaha">Staf Usaha</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nik</th>
                                            <td><input name="nik[]" type="text" class="form-control"></td>
                                        </tr>
                                    </thead>`);
            $("#tabelData").on('click', '#hapus', function() {
                $(this).closest('thead').remove();
            })
        });
    });
</script>

@endsection