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

                    @if($errors->any())

                    <div class="alert alert-danger">
                        <div class="list-group">
                            @foreach($errors->all() as $error)
                            <li class="list-group-item">
                                {{$error}}
                            </li>
                            @endforeach
                        </div>
                    </div>

                    @endif

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Formulir Verifikasi Pembelian <br> Tunai Unit Kerja</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('verspm.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Jenis Pekerjaan</label>
                                    <input name="jenis_pekerjaan" type="text" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Uraian Pekerjaan</label>
                                    <input name="uraian_pekerjaan" type="text" class="form-control" />
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Anggaran Tahun</label>
                                    <input name="tahun_anggaran" type="date" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label>Verifikator</label>
                                    <select name="karyawan_id" id="" class="form-control @error('karyawan_id') is-invalid @enderror">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('karyawan_id') == $item->id ? 'selected' : null}}>
                                            {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>
                            <!-- Pengadaan Barang
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Barang/Jasa</h1>
                            </div>
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
                            </div> -->

                            <!-- FORM TTD -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd1" id="" class="form-control  @error('ttd1') is-invalid @enderror">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd1') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Pembuat Verifikator</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd2') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
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
            $("#dataTable").append('<tr><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td class = "" ><input href = "" class = "btn btn-danger mr-2"type = "button"name = "hapus" id = "hapus" value = "Hapus" /></input></td></tr>');
            $("#dataTable").on('click', '#hapus', function() {
                $(this).closest('tr').remove();
            })
        });
    });
</script>
@endsection