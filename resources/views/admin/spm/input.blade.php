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
                        <h1 class="h4 text-gray-900 mb-4">Formulir Perintah Membayar</h1>
                    </div>

                    <!-- isi form input -->
                    <form class="sppbj">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Tanggal</label>
                                    <input type="text" class="form-control" />
                                    <label>Jenis Tranksaksi</label>
                                    <input type="text" class="form-control" />
                                    <label>program</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Tahun Anggaran</label>
                                    <input type="date" class="form-control">
                                    <label>Penanggung Jawab Unit Fungsi</label>
                                    <input type="text" class="form-control" />
                                    <label>Pembebanan Anggaran</label>
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
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Urian Kegiatan</th>
                                                <th>MA</th>
                                                <th>Permohonan Dana</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td class=""><input href="" class="btn btn-primary mr-2" name="tambah" id="tambah" value="Tambah"></input></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>
                            {{-- form isi  --}}

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form isi Bank</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Terbilang</label>
                                    <input type="text" class="form-control" />
                                    <label>Penerima Dana</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Nomor Rekening</label>
                                    <input type="text" class="form-control">
                                    <label>Bank</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <br>
                            <!-- FORM TTD -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>General Manager</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Manager SDM & Umum</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Staf SDM & Umum</label>
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
            $("#dataTable").append('<tr> <td><input type="text" class="form-control"></td><td><input type="text" class="form-control"></td><td><input type="text" class="form-control"></td><td><input type="text" class="form-control"></td><td class=""><input href="" class="btn btn-danger mr-2" name="Hapus" id="hapus" value="Hapus"></input></td> </tr>');
            $("#dataTable").on('click', '#hapus', function() {
                $(this).closest('tr').remove();
            })
        });
    });
</script>
@endsection