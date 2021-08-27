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
                        <h1 class="h4 text-gray-900 mb-4">Input Data Karyawan</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('karyawan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>Nama</label>
                                    <input name="nama_karyawan[]" type="text" class="form-control @error('nama_karyawan[]') is-invalid @enderror" value="{{old('nama_karyawan[]')}}" />
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
                                            <label>Tempat Lahir</label>
                                            <input name="tempat_lahir" type="daye" class="form-control">
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>NIK</label>
                                    <input name="nik[]" type="text" class="form-control">
                                    <label>Nomor Induk Kependudukan</label>
                                    <input name="nomor_induk_kependudukan" type="text" class="form-control">
                                    <label>Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="daye" class="form-control">

                                    {{-- <label>Penangung Jawab Anggaran</label>
                                    <select name="devisi" class="form-control @error('devisi') is-invalid @enderror" data-live-search=" true">
                                        <option value="SDM & Umum" @if (old('devisi')=='SDM & Umum' ) selected="selected" @endif>SDM & Umum</option>
                                        <option value="Usaha" @if (old('devisi')=='Usaha' ) selected="selected" @endif>Usaha</option>
                                        <option value="Teknik" @if (old('devisi')=='Teknik' ) selected="selected" @endif>Teknik</option>
                                        <option value="Teknik Ketapang" @if (old('devisi')=='Teknik Ketapang' ) selected="selected" @endif>Teknik Ketapang</option>
                                        <option value="Keuangan" @if (old('devisi')=='Keuangan' ) selected="selected" @endif>Keuangan</option>
                                    </select>
                                    @error('devisi')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Verifikator</label>
                                    <select name="verifikator" id="" class="form-control @error('verifikator') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('karyawan_id') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Surat Dibuat</label>
                                    <input name="tanggal_surat" type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{old('tanggal_surat')}}" />
                                    @error('tanggal_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror --}}

                                </div>
                            </div>

                            <!-- Form Document -->
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Form Dokumen</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>No. Dokumen SPPBJ</label>
                                    <input name="no_sppbj" type="number" class="form-control @error('no_sppbj') is-invalid @enderror" value="{{old('no_sppbj')}}" />
                                    @error('no_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>No. Dokumen Berita Acara</label>
                                    <input name="no_berita" type="number" class="form-control @error('uraian_pekerjaan') is-invalid @enderror" value="{{old('uraian_pekerjaan')}}" />

                                </div>

                                <div class="col-md-4">
                                    <label>Tanggal Dokumen SPPBJ</label>
                                    <input name="tanggal_sppbj" type="date" class="form-control @error('tanggal_sppbj') is-invalid @enderror" value="{{old('tanggal_sppbj')}}" />
                                    @error('tanggal_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Dokumen Berita</label>
                                    <input name="tanggal_berita_acara" type="date" class="form-control @error('tanggal_berita_acara') is-invalid @enderror" value="{{old('tanggal_berita_acara')}}" />
                                    @error('tanggal_berita_acara')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Jumlah Harga SPPBJ</label>
                                    <input name="jumlah_harga_sppbj" type="number" class="form-control @error('jumlah_harga_sppbj') is-invalid @enderror" value="{{old('jumlah_harga_sppbj')}}" />
                                    @error('jumlah_harga_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Jumlah Harga Berita Acara</label>
                                    <input name="jumlah_harga_berita" type="number" class="form-control @error('jumlah_harga_berita') is-invalid @enderror" value="{{old('jumlah_harga_berita')}}" />
                                    @error('jumlah_harga_berita')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Tanggal Dokumen SKB</label>
                                    <input name="tanggal_skb" type="date" class="form-control @error('tanggal_skb') is-invalid @enderror" value="{{old('tanggal_skb')}}" />
                                    @error('tanggal_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Jumlah Harga SKB</label>
                                    <input name="jumlah_harga_skb" type="number" class="form-control @error('jumlah_harga_skb') is-invalid @enderror" value="{{old('jumlah_harga_skb')}}" />
                                    @error('jumlah_harga_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <!-- FORM TTD -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd1" id="" class="form-control  @error('ttd1') is-invalid @enderror" data-live-search=" true">
                                    
                                    </select>
                                    @error('ttd1')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Pembuat Verifikator</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror" data-live-search=" true">
                        
                                    </select>
                                    @error('ttd2')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">

                            <input type="submit" class="btn btn-success btn-lg" name="selanjutnya" id="selanjutnya" value="Selanjutnya" style="padding: 5px 50px; margin-top: 10px;">

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