@extends('admin.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{url('admin/verspmm')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-footer">

                    <!-- judul form-->

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Formulir Verifikasi Pembelian <br> Tunai Unit Kerja</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('verspmm.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>Nama</label>
                                    <select name="karyawan_id" id="" class="form-control @error('karyawan_id') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('karyawan_id') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Uraian Pekerjaan</label>
                                    <input name="uraian_pekerjaan" type="text" class="form-control @error('uraian_pekerjaan') is-invalid @enderror" value="{{old('uraian_pekerjaan')}}" />
                                    @error('uraian_pekerjaan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tahun Anggaran</label>
                                    <input type="date" class="form-control" name="tahun_anggaran" @error('tahun_anggaran') is-invalid @enderror" value="{{old('tahun_anggaran')}}">
                                    @error('tahun_anggaran')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Penangung Jawab</label>
                                    <select name="divisi_id" id="" class="form-control @error('devisi') is-invalid @enderror" data-live-search=" true">
                                        @foreach($divisi as $item)
                                        <option value="{{$item->id}}" {{old('divisi_id') == $item->id ? 'selected' : null}}>
                                            {{$item->nama_divisi}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('devisi')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Verifikator</label>
                                    <select name="verifikator" id="" class="form-control @error('verifikator') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('karyawan_id') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Surat Dibuat</label>
                                    <input name="tanggal_surat" type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{old('tanggal_surat')}}" />
                                    @error('tanggal_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>

                            <!-- Form Document -->
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Form Dokumen</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>No. Dokumen SPPBJ</label>
                                    <input name="no_sppbj" type="number" class="form-control @error('no_sppbj') is-invalid @enderror" value="{{old('no_sppbj')}}" />
                                    @error('no_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>No. Dokumen Berita Acara</label>
                                    <input name="no_berita" type="number" class="form-control @error('uraian_pekerjaan') is-invalid @enderror" value="{{old('uraian_pekerjaan')}}" />

                                </div>

                                <div class="col-md-4">
                                    <label>Tanggal Dokumen SPPBJ</label>
                                    <input name="tanggal_sppbj" type="date" class="form-control @error('tanggal_sppbj') is-invalid @enderror" value="{{old('tanggal_sppbj')}}" />
                                    @error('tanggal_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Dokumen Berita</label>
                                    <input name="tanggal_berita_acara" type="date" class="form-control @error('tanggal_berita_acara') is-invalid @enderror" value="{{old('tanggal_berita_acara')}}" />
                                    @error('tanggal_berita_acara')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Jumlah Harga SPPBJ</label>
                                    <input name="jumlah_harga_sppbj" type="number" class="form-control @error('jumlah_harga_sppbj') is-invalid @enderror" value="{{old('jumlah_harga_sppbj')}}" />
                                    @error('jumlah_harga_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Jumlah Harga Berita Acara</label>
                                    <input name="jumlah_harga_berita" type="number" class="form-control @error('jumlah_harga_berita') is-invalid @enderror" value="{{old('jumlah_harga_berita')}}" />
                                    @error('jumlah_harga_berita')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Tanggal Dokumen SKB</label>
                                    <input name="tanggal_skb" type="date" class="form-control @error('tanggal_skb') is-invalid @enderror" value="{{old('tanggal_skb')}}" />
                                    @error('tanggal_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Jumlah Harga SKB</label>
                                    <input name="jumlah_harga_skb" type="number" class="form-control @error('jumlah_harga_skb') is-invalid @enderror" value="{{old('jumlah_harga_skb')}}" />
                                    @error('jumlah_harga_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
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
                                <div class="col-md-6 search_select_box">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd1" id="" class="form-control  @error('ttd1') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd1') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd1')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Pembuat Verifikator</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd2') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd2')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <input type="submit" class="btn btn-success btn-lg" name="selanjutnya" id="selanjutnya" value="Buat" style="padding: 5px 50px; margin-top: 10px;">
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