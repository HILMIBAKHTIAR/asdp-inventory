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
                                <div class="col-md-6 search_select_box">
                                    <label>Dari/Peminta</label>
                                    <select name="karyawan_id" id="" class="form-control @error('karyawan_id') is-invalid @enderror" data-live-search=" true">
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
                                <div class="col-md-4 search_select_box">
                                    <label>Mata Anggaran</label>
                                    <select name="mataanggaran_id" id="" class="form-control @error('mataanggaran_id') is-invalid @enderror" data-live-search=" true">
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

                                <div class="col-md-4 search_select_box">
                                    <label>Bulan Dibutuhkan</label>
                                    <select class="form-control" name="bulan_dibutuhkan" data-live-search=" true">
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
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
                                    <div class="text-right">
                                        <input class="btn btn-primary mr-2 mb-2" type="button" name="tambah" id="tambah" value="Tambah">
                                    </div>
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
                                            @forelse (old('jumlah', []) as $i => $name_progress)
                                            <tr>
                                                <td>
                                                    <input name="jumlah[]" type="number" class="form-control @error('jumlah.*') is-invalid @enderror" value="{{$name_progress}}">
                                                    @error('jumlah.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-control" name="satuan[]">
                                                        <option value="roll" {{old('satuan')[$i] == 'roll' ? 'selected' : '' }}>roll</option>
                                                        <option value="pcs" {{old('satuan')[$i] == 'pcs' ? 'selected' : '' }}>pcs</option>
                                                        <option value="unit" {{old('satuan')[$i] == 'unit' ? 'selected' : '' }}>unit</option>
                                                        <option value="pack" {{old('satuan')[$i] == 'pack' ? 'selected' : '' }}>Pack</option>
                                                        <option value="Set" {{old('satuan')[$i] == 'Set' ? 'selected' : '' }}>Set</option>
                                                        <option value="Batang" {{old('satuan')[$i] == 'Batang' ? 'selected' : '' }}>Batang</option>
                                                        <option value="Lusin" {{old('satuan')[$i] == 'Lusin' ? 'selected' : '' }}>Lusin</option>
                                                        <option value="Botol" {{old('satuan')[$i] == 'Botol' ? 'selected' : '' }}>Botol</option>
                                                        <option value="Kotak" {{old('satuan')[$i] == 'Kotak' ? 'selected' : '' }}>Kotak</option>
                                                        <option value="Gross" {{old('satuan')[$i] == 'Gross' ? 'selected' : '' }}>Gross</option>
                                                        <option value="Rim" {{old('satuan')[$i] == 'Rim' ? 'selected' : '' }}>Rim</option>
                                                        <option value="Kodi" {{old('satuan')[$i] == 'Kodi' ? 'selected' : '' }}>Kodi</option>
                                                        <option value="Dus" {{old('satuan')[$i] == 'Dus' ? 'selected' : '' }}>Dus</option>
                                                        <option value="Bal" {{old('satuan')[$i] == 'Bal' ? 'selected' : '' }}>Bal</option>
                                                        <option value="Ls" {{old('satuan')[$i] == 'Ls' ? 'selected' : '' }}>Ls</option>
                                                        <option value="Meter" {{old('satuan')[$i] == 'Meter' ? 'selected' : '' }}>Meter</option>
                                                        <option value="Gram" {{old('satuan')[$i] == 'Gram' ? 'selected' : '' }}>Gram</option>
                                                        <option value="Cm" {{old('satuan')[$i] == 'Cm' ? 'selected' : '' }}>Cm</option>
                                                        <option value="M2" {{old('satuan')[$i] == 'M2' ? 'selected' : '' }}>M2</option>
                                                        <option value="M3" {{old('satuan')[$i] == 'M3' ? 'selected' : '' }}>M3</option>
                                                        <option value="Liter" {{old('satuan')[$i] == 'Liter' ? 'selected' : '' }}>Liter</option>
                                                        <option value="Kg" {{old('satuan')[$i] == 'Kg' ? 'selected' : '' }}>Kg</option>
                                                        <option value="Ton" {{old('satuan')[$i] == 'Ton' ? 'selected' : '' }}>Ton</option>
                                                        <option value="Ons" {{old('satuan')[$i] == 'Ons' ? 'selected' : '' }}>Ons</option>
                                                        <option value="Lembar" {{old('satuan')[$i] == 'Lembar' ? 'selected' : '' }}>Lembar</option>
                                                        <option value="Orang" {{old('satuan')[$i] == 'Orang' ? 'selected' : '' }}>Orang</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input name="nama_barang[]" type="text" class="form-control @error('nama_barang.*') is-invalid @enderror" value="{{old('nama_barang')[$i]}}">
                                                    @error('nama_barang.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input name="spesifikasi[]" type="text" class="form-control @error('spesifikasi.*') is-invalid @enderror" value="{{old('spesifikasi')[$i]}}">
                                                    @error('spesifikasi.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input name="harga_satuan[]" type="number" class="form-control @error('harga_satuan.*') is-invalid @enderror" value="{{old('harga_satuan')[$i]}}">
                                                    @error('harga_satuan.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                               <td>
                                                   
                                                   <input class="hapus btn btn-danger mr-2" type="button" name="hapus" id="hapus" value="Hapus">
                                            </td>
                                            </tr>

                                            {{-- empty value original --}}
                                            @empty

                                             <tr>
                                                <td>
                                                    <input name="jumlah[]" type="number" class="form-control @error('jumlah.*') is-invalid @enderror">
                                                    @error('jumlah.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-control" name="satuan[]">
                                                        <option value="roll">roll</option>
                                                        <option value="pcs">pcs</option>
                                                        <option value="unit">unit</option>
                                                        <option value="Pack">Pack</option>
                                                        <option value="Set">Set</option>
                                                        <option value="Batang">Batang</option>
                                                        <option value="Lusin">Lusin</option>
                                                        <option value="Botol">Botol</option>
                                                        <option value="Kotak">Kotak</option>
                                                        <option value="Gross">Gross</option>
                                                        <option value="Rim">Rim</option>
                                                        <option value="Kodi">Kodi</option>
                                                        <option value="Dus">Dus</option>
                                                        <option value="Bal">Bal</option>
                                                        <option value="Ls">Ls</option>
                                                        <option value="Meter">Meter</option>
                                                        <option value="Gram">Gram</option>
                                                        <option value="Cm">Cm</option>
                                                        <option value="M2">M2</option>
                                                        <option value="M3">M3</option>
                                                        <option value="Liter">Liter</option>
                                                        <option value="Kg">Kg</option>
                                                        <option value="Ton">Ton</option>
                                                        <option value="Ons">Ons</option>
                                                        <option value="Lembar">Lembar</option>
                                                        <option value="Orang">Orang</option>
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
                                                <td><input class="hapus btn btn-danger mr-2" type="button" name="hapus" id="hapus" value="Hapus"></td>
                                            </tr>
                                            @endforelse
                                            
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
                                <div class="col-md-6 search_select_box">
                                    <label>Peminta Barang/Jasa</label>
                                    <select name="ttd1" id="" class="form-control @error('ttd1') is-invalid @enderror" data-live-search=" true">
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
                                    <select name="ttd2" id="" class="form-control  @error('ttd2') is-invalid @enderror" data-live-search=" true">
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
                                    <select name="ttd3" id="" class="form-control  @error('ttd3') is-invalid @enderror" data-live-search=" true">
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
                                    <select name="ttd4" id="" class="form-control  @error('ttd4') is-invalid @enderror" data-live-search=" true">
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
                        <option value="roll">roll</option>
                                                <option value="pcs">pcs</option>
                                                <option value="unit">unit</option>
                                                <option value="Pack">Pack</option>
                                                <option value="Set">Set</option>
                                                <option value="Batang">Batang</option>
                                                <option value="Lusin">Lusin</option>
                                                <option value="Botol">Botol</option>
                                                <option value="Kotak">Kotak</option>
                                                <option value="Gross">Gross</option>
                                                <option value="Rim">Rim</option>
                                                <option value="Kodi">Kodi</option>
                                                <option value="Dus">Dus</option>
                                                <option value="Bal">Bal</option>
                                                <option value="Ls">Ls</option>
                                                <option value="Meter">Meter</option>
                                                <option value="Gram">Gram</option>
                                                <option value="Cm">Cm</option>
                                                <option value="M2">M2</option>
                                                <option value="M3">M3</option>
                                                <option value="Liter">Liter</option>
                                                <option value="Kg">Kg</option>
                                                <option value="Ton">Ton</option>
                                                <option value="Ons">Ons</option>
                                                <option value="Lembar">Lembar</option>
                                                <option value="Orang">Orang</option>
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