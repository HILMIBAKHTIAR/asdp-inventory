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
                        <h1 class="h4 text-gray-900 mb-4">Formulir Permintaan Pengadaan <br> Barang/Jasa</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('sp2bj.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Dari/Peminta</label>
                                    <select name="karyawan_id" id="" class="form-control @error('karyawan_id') is-invalid @enderror">
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
                                </div>

                                <div class="col-md-6">
                                    <label>Nama Pengadaan</label>
                                    <input type="text" name="nama_pengadaan" class="form-control @error('nama_pengadaan') is-invalid @enderror" value="{{old('nama_pengadaan')}}" />
                                    @error('nama_pengadaan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                                
                            <div class="form-row mt-3">
                                <div class="col-md-4">
                                    <label>Mata Anggaran</label>
                                    <select name="mataanggaran_id" id="" class="form-control @error('mataanggaran_id') is-invalid @enderror">
                                        <option value="">-Pilih-</option>
                                        @foreach($mataanggaran as $item)
                                        <option value="{{$item->id}}" {{old('mataanggaran_id') == $item->id ? 'selected' : null}}>
                                            {{$item->nomor}} - {{$item->keterangan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('mataanggaran_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Tanggal Surat Dibuat</label>
                                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{old('tanggal_surat')}}" />
                                    @error('tanggal_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Klasifikasi</label>
                                    <select class="form-control" name="klasifikasi">
                                        <option value="Normal">Normal</option>
                                        <option value="Emergency">Emergency</option>
                                        <option value="Urgent">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <!-- Pengadaan Barang -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Barang/Jasa</h1>
                            </div>
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tableSppbj" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Nama Barang</th>
                                                <th>Spesifikasi</th>
                                                <th>Harga Satuan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input name="jumlah[]" type="number" class="form-control @error('jumlah.*') is-invalid @enderror">
                                                    @error('jumlah.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-control" name="satuan[]">
                                                        <option value="roll">Roll</option>
                                                        <option value="pcs">Pcs</option>
                                                        <option value="unit">Unit</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input name="nama_barang[]" type="text" class="form-control @error('nama_barang.*') is-invalid @enderror">
                                                    @error('nama_barang.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input name="spesifikasi[]" type="text" class="form-control @error('spesifikasi.*') is-invalid @enderror">
                                                    @error('spesifikasi.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input name="harga_satuan[]" type="number" class="form-control @error('harga_satuan.*') is-invalid @enderror">
                                                    @error('harga_satuan.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input class="btn btn-primary mr-2" type="button" name="tambah" id="tambah" value="Tambah"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- FORM TTD -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Catatan Peminta Barang/Jasa</label>
                                    <input name="catatan_peminta" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('catatan_peminta')}}" />
                                    <label>Catatan</label>
                                    <input name="catatan" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('catatan')}}" />
                                    <label>Catatan Ketersediaan Anggaran</label>
                                    <input name="catatan_anggaran" type="text" class="form-control" placeholder="Boleh Tidak Diisi" value="{{old('catatan_anggaran')}}" />
                                    <label>Catatan Ketersediaan Stok</label>
                                    <input name="catatan_stok" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('catatan_stok')}}" />
                                </div>
                                <div class="col-md-6">
                                    <label>Peminta Barang/Jasa</label>
                                    <select name="ttd1" id="" class="form-control @error('ttd1') is-invalid @enderror">
                                        <option value="">-Pilih Peminta Barang/Jasa-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd1') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd1')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>General Manager Cabang Ketapang</label>
                                    <select name="ttd2" id="" class="form-control  @error('ttd2') is-invalid @enderror">
                                        <option value="">-Pilih Nama General Manager Cabang-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd2') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd2')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Manager Keuangan</label>
                                    <select name="ttd3" id="" class="form-control  @error('ttd3') is-invalid @enderror">
                                        <option value="">-Pilih Manager Keuangan-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd3') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('ttd3')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd4" id="" class="form-control  @error('ttd4') is-invalid @enderror">
                                        <option value="">-Pilih Manager SDM & Umum-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd4') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd4')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <center>
                                <input type="submit" class="btn btn-success btn-lg" name="selanjutnya" id="selanjutnya" value="Selanjutnya" style="padding: 5px 50px; margin-top: 10px;">
                            </center>
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
            $("#tableSppbj").append(`
            <tr>
                <td>
                    <input name="jumlah[]" type="number" class="form-control @error('jumlah.*') is-invalid @enderror">
                    @error('jumlah.*')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </td>
                <td>
                    <select class="form-control" name="satuan[]">
                    <option value="roll">Roll</option>
                    <option value="pcs">Pcs</option>
                    <option value="unit">Unit</option>
                    </select>
                </td>
                <td>
                    <input name="nama_barang[]" type="text" class="form-control @error('nama_barang.*') is-invalid @enderror">
                    @error('nama_barang.*')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </td>
                <td>
                    <input name="spesifikasi[]" type="text" class="form-control @error('spesifikasi.*') is-invalid @enderror">
                    @error('spesifikasi.*')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </td>
                    <td>
                    <input name="harga_satuan[]" type="number" class="form-control @error('harga_satuan.*') is-invalid @enderror">
                    @error('harga_satuan.*')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </td>
                <td><input class="btn btn-danger mr-2" type="button" name="hapus" id="hapus" value="Hapus"></td>
                </tr>`);
            $("#tableSppbj").on('click', '#hapus', function() {
                $(this).closest('tr').remove();
            })
        });
    });
</script>
@endsection