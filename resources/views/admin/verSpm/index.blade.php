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
                        <h1 class="h4 text-gray-900 mb-4">Formulir Verifikasi Pembelian <br> Tunai Unit Kerja</h1>
                    </div>

                    <!-- isi form input -->
                    <form class="sppbj">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" />
                                    <label>Jenis Pekerjaan</label>
                                    <input type="text" class="form-control" />
                                    <label>Uraian Pekerjaan</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Mata Anggaran</label>
                                    <input type="text" class="form-control">
                                    <label>Anggaran Tahun</label>
                                    <input type="date" class="form-control" />
                                    <label>Penanggung Jawab Anggaran</label>
                                    <input type="text" class="form-control" />
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
                                                <th>Jenis Dokumen</th>
                                                <th>Nomor Dokumen</th>
                                                <th>Tanggal</th>
                                                <th>Harga</th>
                                                <th>Keterangan </th>
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
                                    <label>Manager SDM & Umum</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Pembuat Verifikator</label>
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