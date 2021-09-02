@extends('admin.layout.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{url('admin/sppbjm')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-footer">
                    <!-- judul form-->

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Formulir Permintaan Pengadaan <br> Barang/Jasa</h1>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Barang Sppbj</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input name="nama_barang" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis/Spesifikasi</label>
                                        <input name="spesifikasi" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select name="satuan[]" type="text" class="form-control">
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
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <input name="jumlah" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Barang (Rp)</label>
                                        <input name="harga_satuan" type="text" class="form-control" required>
                                        @error('harga_satuan')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary simpan">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- isi form input -->
                    <input type="hidden" name="sppbjm_id" value="{{$id}}">
                    <form action="{{route('sppbjm.update',$data_sppbjm->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>Dari/Peminta</label>
                                    <select name="karyawan_id" class="form-control @error('mataanggaran_id') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$data_sppbjm->karyawan_id)
                                            selected
                                            @endif

                                            >
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Nama Pengadaan</label>
                                    <input type="text" name="nama_pengadaan" value="{{$data_sppbjm->nama_pengadaan}}" class="form-control @error('nama_pengadaan') is-invalid @enderror" value="{{old('nama_pengadaan')}}" />
                                    @error('nama_pengadaan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Mata Anggaran</label>
                                    <select name="mataanggaran_id" id="" class="form-control @error('mataanggaran_id') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($mataanggaran as $item)
                                        <option value={{$item->id}} @if($item->id==$data_sppbjm->mataanggaran_id)
                                            selected
                                            @endif

                                            >
                                            {{$item->nomor}} - {{$item->keterangan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('mataanggaran_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 search_select_box">
                                    <label>Tanggal Surat Dibuat</label>
                                    <input type="date" name="tanggal_surat" value="{{$data_sppbjm->tanggal_surat}}" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{old('tanggal_surat')}}" />
                                    @error('tanggal_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Bulan Dibutuhkan</label>
                                    <select class="form-control" name="bulan_dibutuhkan" data-live-search=" true">

                                        @foreach([
                                        "Januari" => "Januari",
                                        "Februari" => "Februari",
                                        "Maret" => "Maret",
                                        "April" => "April",
                                        "Mei" => "Mei",
                                        "Juni" => "Juni",
                                        "Juli" => "Juli",
                                        "Agustus" => "Agustus",
                                        "September" => "September",
                                        "Oktober" => "Oktober",
                                        "November" => "November",
                                        "Desember" => "Desember",
                                        ] AS $item => $itemBulan)
                                        <option value="{{ $item }}" {{ old("bulan_dibutuhkan", $data_sppbjm->bulan_dibutuhkan) == $item ? "selected" : "" }}>{{ $itemBulan }}</option>
                                        @endforeach
                                    </select>
                                    <label>Nomor Surat</label>
                                    <input type="number" name="nomor_surat" value="{{$data_sppbjm->nomor_surat}}" class="form-control @error('nomor_surat') is-invalid @enderror" value="{{old('nomor_surat')}}" />
                                    @error('nomor_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mt-2 mb-3 text-right">
                                <div class="col-md-9">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah </button>
                                </div>
                            </div>




                            <br>
                            <!-- Pengadaan Barang -->
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis/Spesifikasi</th>
                                                <th>Satuan</th>
                                                <th>Jumlah Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_sppbjm->barangSp2bj as $item)
                                            <input type="hidden" name="id[]" value="{{$item->id}}">
                                            <tr>
                                                <td class="text-center">
                                                    <p>{{$loop->iteration}}</p>
                                                </td>
                                                <td><input name="nama_barang[]" type="text" value="{{$item->nama_barang}}" class="form-control @error('nama_barang.*') is-invalid @enderror">
                                                    @error('nama_barang.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input name="spesifikasi[]" type="" value="{{$item->spesifikasi}}" class="form-control @error('spesifikasi.*') is-invalid @enderror"></td>
                                                @error('nama_barang.*')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                                <td>
                                                    <select name="satuan[]" type="text" class="form-control">
                                                        @foreach([
                                                        "roll" => "roll",
                                                        "pcs" => "pcs",
                                                        "unit" => "unit",
                                                        "Pack" => "Pack",
                                                        "Set" => "Set",
                                                        "Batang" => "Batang",
                                                        "Botol" => "Botol",
                                                        "Kotak" => "Kotak",
                                                        "Gross" => "Gross",
                                                        "Rim" => "Rim",
                                                        "Kodi" => "Kodi",
                                                        "Dus" => "Dus",
                                                        "Bal" => "Bal",
                                                        "Ls" => "Ls",
                                                        "Meter" => "Meter",
                                                        "Gram" => "Gram",
                                                        "Cm" => "Cm",
                                                        "M2" => "M2",
                                                        "M3" => "M3",
                                                        "Liter" => "Liter",
                                                        "Kg" => "Kg",
                                                        "Ton" => "Ton",
                                                        "Ons" => "Ons",
                                                        "Lembar" => "Lembar",
                                                        "Orang" => "Orang",
                                                        ] AS $i => $satuans)
                                                        <option value="{{ $i }}" {{ old("satuan", $item->satuan) == $i ? "selected" : "" }}>{{ $satuans }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </td>
                                                <td><input name="jumlah[]" type="text" value="{{$item->jumlah}}" class="form-control @error('jumlah.*') is-invalid @enderror">
                                                    @error('jumlah.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input name="harga_satuan[]" type="text" value="{{$item->harga_satuan}}" class="form-control @error('harga_satuan.*') is-invalid @enderror">
                                                    @error('harga_satuan.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input class="btn btn-danger mr-2 hapus" type="button" name="hapus" data-id="{{$item->id}}" value="Hapus"></td>
                                            </tr>

                                            @endforeach
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
                                    <input name="catatan_peminta" value="{{$data_sppbjm->catatan_peminta}}" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('catatan_peminta')}}" />
                                    <label>Catatan</label>
                                    <input name="catatan" value="{{$data_sppbjm->catatan}}" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('catatan')}}" />
                                    <label>Catatan Ketersediaan Anggaran</label>
                                    <input name="catatan_anggaran" value="{{$data_sppbjm->catatan_anggaran}}" type="text" class="form-control" placeholder="Boleh Tidak Diisi" value="{{old('catatan_anggaran')}}" />
                                    <label>Catatan Ketersediaan Stok</label>
                                    <input name="catatan_stok" value="{{$data_sppbjm->catatan_stok}}" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('catatan_stok')}}" />
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Peminta Barang/Jasa</label>
                                    <select name="ttd1" id="" class="form-control @error('ttd1') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih Peminta Barang/Jasa-</option>
                                        @foreach($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$data_sppbjm->ttd1)
                                            selected
                                            @endif

                                            >
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
                                        <option value={{$item->id}} @if($item->id==$data_sppbjm->ttd2)
                                            selected
                                            @endif

                                            >
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
                                        <option value={{$item->id}} @if($item->id==$data_sppbjm->ttd3)
                                            selected
                                            @endif

                                            >
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
                                        <option value={{$item->id}} @if($item->id==$data_sppbjm->ttd4)
                                            selected
                                            @endif

                                            >
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

                            <button type="submit" class="btn btn-success btn-lg">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    $('.simpan').on('click', function() {
        $.ajax({
            url: '{{url("admin/sppbjm/tambah")}}',
            method: 'post',
            data: {
                _token: '{{csrf_token()}}',
                sppbjm_id: $('input[name=sppbjm_id]').val(),
                jumlah: $('input[name=jumlah]').val(),
                satuan: $('input[name=satuan]').val(),
                nama_barang: $('input[name=nama_barang]').val(),
                spesifikasi: $('input[name=spesifikasi]').val(),
                harga_satuan: $('input[name=harga_satuan]').val()
            },
            dataType: 'json',
            success() {
                alert('Data Berhasil Ditambahkan');
                window.location.reload();
            }
        });
    });

    $('.hapus').on('click', function() {
        $.ajax({
            url: '{{url("/")}}' + '/admin/sppbjm/' + $(this).data('id') + '/hapus',
            dataType: 'json',
            success() {
                alert('Data Berhasil Dihapus');
                window.location.reload();
            }
        });
    });
</script>


@endsection