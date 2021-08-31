@extends('admin.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{url('admin/skbm')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-footer">

                    <!-- judul form-->

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Formulir Surat Pernyataan <br> Kebenaran Harga</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('skbm.store')}}" method="post" class="skb">
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
                                    <label>Alamat</label>
                                    <input name="alamat_tujuan" class="form-control @error('alamat_tujuan') is-invalid @enderror" value="{{old('alamat_tujuan')}}" />
                                    @error('alamat_tujuan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>No Telepon</label>
                                    <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{old('no_telp')}}">
                                    @error('no_telp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">

                                    <label>Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{old('tanggal_surat')}}" />
                                    @error('tanggal_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>

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
                                <div class="col-md-6 search_select_box">
                                    <label>General/Manager</label>
                                    <select name="ttd1" id="" class="form-control @error('ttd1') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach ($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd1')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach ($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd2')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <center>
                                <input type="submit" class="btn btn-success btn-lg" name="selanjutnya" id="selanjutnya" value="Selanjutnya">
                            </center>
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


<!-- /.container-fluid -->
@endsection