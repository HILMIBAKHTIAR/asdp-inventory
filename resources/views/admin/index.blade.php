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
                    <form class="sppbj">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Dari</label>
                                    <input type="text" class="form-control" />
                                    <label>Nama Pengadaan</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Mata Anggaran</label>
                                    <input type="text" class="form-control">
                                    <label>Tanggal Dibutuhkan</label>
                                    <input type="date" class="form-control" />
                                </div>
                            </div>

                            <br>
                            <!-- Pengadaan Barang -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Barang/Jasa</h1>
                            </div>
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
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
                                    <input type="text" class="form-control" />
                                    <label>Catatan</label>
                                    <input type="text" class="form-control" />
                                    <label>Catatan Ketersediaan Anggaran</label>
                                    <input type="text" class="form-control" />
                                    <label>Catatan Ketersediaan Stok</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Peminta Barang/Jasa</label>
                                    <input type="text" class="form-control">
                                    <label>General Manager Cabang Ketapang</label>
                                    <input type="text" class="form-control">
                                    <label>Manager Keuangan</label>
                                    <input type="text" class="form-control">
                                    <label>Manager SDM & Umum</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div>
                            <center>
                                <input type="submit" class="btn btn-success" name="print" id="print" value="Print">
                                <input type="button" class="btn btn-primary" name="selanjutnya" id="selanjutnya" value="Selanjutnya">
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
            $("#dataTable").append('<tr><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td class = "" ><input href = "" class = "btn btn-danger mr-2"type = "button"name = "hapus" id = "hapus" value = "Hapus" /></input></td></tr>');
            $("#dataTable").on('click', '#hapus', function() {
                $(this).closest('tr').remove();
            })
        });
    });
</script>
@endsection