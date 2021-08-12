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
                                    <label>Dari</label>
                                    <select name="ttd1[]" id="" class="form-control">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>Nama Pengadaan</label>
                                    <input type="text" name="nama_pengadaan" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Mata Anggaran</label>
                                    <input type="text" name="mata_anggaran" class="form-control">
                                    <label>Tanggal Dibutuhkan</label>
                                    <input type="date" name="tanggal_dibutuhkan" class="form-control" />
                                </div>
                            </div>

                            <br>
                            <!-- Pengadaan Barang -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Barang/Jasa</h1>
                            </div>
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
                                                <td><input name="jumlah[]" type="text" class="form-control"></td>
                                                <td><select class="form-control" name="satuan[]">
                                                        <option value="roll">Roll</option>
                                                        <option value="pcs">Pcs</option>
                                                        <option value="unit">Unit</option>
                                                    </select></td>
                                                <td><input name="nama_barang[]" type="text" class="form-control"></td>
                                                <td><input name="spesifikasi[]" type="text" class="form-control"></td>
                                                <td><input name="harga_satuan[]" type="text" class="form-control"></td>
                                                <td class=""><input href="" class="btn btn-primary mr-2" type="button" name="tambah" id="tambah" value="Tambah"></input></td>
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
                                    <input name="catatan_peminta" type="text" class="form-control" placeholder="Boleh Tidak Diisi" />
                                    <label>Catatan</label>
                                    <input name="catatan" type="text" class="form-control" placeholder="Boleh Tidak Diisi" />
                                    <label>Catatan Ketersediaan Anggaran</label>
                                    <input name="catatan_anggaran" type="text" class="form-control" placeholder="Boleh Tidak Diisi" />
                                    <label>Catatan Ketersediaan Stok</label>
                                    <input name="catatan_stok" type="text" class="form-control" placeholder="Boleh Tidak Diisi" />
                                </div>
                                <div class="col-md-6">
                                    <label>Peminta Barang/Jasa</label>
                                    <select name="ttd1[]" id="" class="form-control">
                                        <option value="">-Pilih Peminta Barang/Jasa-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>General Manager Cabang Ketapang</label>
                                    <select name="ttd1[]" id="" class="form-control">
                                        <option value="">-Pilih Nama General Manager Cabang-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>Manager Keuangan</label>
                                    <select name="ttd1[]" id="" class="form-control">
                                        <option value="">-Pilih Manager Keuangan-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd1[]" id="" class="form-control">
                                        <option value="">-Pilih Manager SDM & Umum-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
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
            $("#dataTable").append(`
            <tr>
                <td>
                <input name="jumlah[]" type="text" class="form-control"></td>
                <td><select class="form-control" name="satuan[]" id="">
                    <option value="roll">Roll</option>
                    <option value="pcs">Pcs</option>  
                    <option value="unit">Unit</option>      
                </select></td>
                <td><input name="nama_barang[]" type="text" class="form-control"></td>
                <td><input name="spesifikasi[]" type="text" class="form-control"></td>
                <td><input name="harga_satuan[]" type="text" class="form-control"></td>
                <td class=""><input href="" class="btn btn-danger mr-2" type="button" name="hapus" id="hapus" value="hapus">
                </input>
            </td>
            </tr>`);
            $("#dataTable").on('click', '#hapus', function() {
                $(this).closest('tr').remove();
            })
        });
    });
</script>
@endsection