@extends('admin.layout.master')

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

@endsection