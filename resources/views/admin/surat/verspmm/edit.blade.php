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
                    <form action="{{route('verspmm.update', $data_verspmm->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>Nama</label>
                                    <select name="karyawan_id" id="" class="form-control @error('karyawan_id') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$data_verspmm->karyawan_id)
                                            selected
                                            @endif

                                            >
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Uraian Pekerjaan</label>
                                    <input name="uraian_pekerjaan" value="{{ $data_verspmm->uraian_pekerjaan }}" type="text" class="form-control @error('uraian_pekerjaan') is-invalid @enderror" value="{{old('uraian_pekerjaan')}}" />
                                    @error('uraian_pekerjaan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tahun Anggaran</label>
                                    <input type="date" class="form-control" name="tahun_anggaran" value="{{ $data_verspmm->tahun_anggaran }}" class="form-control @error('tahun_anggaran') is-invalid @enderror" value="{{old('tahun_anggaran')}}">
                                    @error('tahun_anggaran')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="col-md-6 search_select_box">
                                    <label>Penangung Jawab Anggaran</label>
                                    <select name="devisi" id="" class="form-control @error('devisi') is-invalid @enderror" data-live-search=" true">
                                        @foreach([
                                        "SDM & Umum" => "SDM & Umum",
                                        "Usaha" => "Usaha",
                                        "Teknik" => "Teknik",
                                        "Teknik Ketapang" => "Teknik Ketapang",
                                        "Keuangan" => "Keuangan"
                                        ] AS $item => $itemDevisi)
                                        <option value="{{ $item }}" {{ old("devisi", $data_verspmm->devisi) == $item ? "selected" : "" }}>{{ $itemDevisi }}</option>
                                        @endforeach
                                        <!-- {{-- <option value="SDM & Umum" @if (old('devisi')=='SDM & Umum' ) selected="selected" @endif>SDM & Umum</option>
                                        <option value="Usaha" @if (old('devisi')=='Usaha' ) selected="selected" @endif>Usaha</option>
                                        <option value="Teknik" @if (old('devisi')=='Teknik' ) selected="selected" @endif>Teknik</option>
                                        <option value="Teknik Ketapang" @if (old('devisi')=='Teknik Ketapang' ) selected="selected" @endif>Teknik Ketapang</option>
                                        <option value="Keuangan" @if (old('devisi')=='Keuangan' ) selected="selected" @endif>Keuangan</option> --}} -->
                                    </select>

                                    <label>Verifikator</label>
                                    <select name="verifikator" id="" class="form-control @error('verifikator') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$data_verspmm->verifikator)
                                            selected
                                            @endif

                                            >
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Surat Dibuat</label>
                                    <input name="tanggal_surat" value="{{ $data_verspmm->tanggal_surat }}" type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{old('tanggal_surat')}}" />
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
                                    <label>NO. Dokumen SPPBJ</label>
                                    <input name="no_sppbj" value="{{ $data_verspmm->no_sppbj }}" type="number" class="form-control @error('no_sppbj') is-invalid @enderror" value="{{old('no_sppbj')}}" />
                                    @error('no_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                    <label>NO. Dokumen Berita Acara</label>
                                    <input name="no_berita" value="{{ $data_verspmm->no_berita }}" type="number" class="form-control @error('no_berita') is-invalid @enderror" value="{{old('no_berita')}}" />
                                    @error('no_berita')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal Dokumen SPPBJ</label>
                                    <input name="tanggal_sppbj" value="{{ $data_verspmm->tanggal_sppbj }}" type="date" class="form-control @error('tanggal_sppbj') is-invalid @enderror" value="{{old('tanggal_sppbj')}}" />
                                    @error('jumlah_harga_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Tanggal Dokumen Berita</label>
                                    <input name="tanggal_berita_acara" value="{{ $data_verspmm->tanggal_berita_acara }}" type="date" class="form-control @error('tanggal_berita_acara') is-invalid @enderror" value="{{old('tanggal_berita_acara')}}" />
                                    @error('jumlah_harga_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Jumlah Harga SPPBJ</label>
                                    <input name="jumlah_harga_sppbj" value="{{ $data_verspmm->jumlah_harga_sppbj }}" type="number" class="form-control @error('jumlah_harga_sppbj') is-invalid @enderror" value="{{old('jumlah_harga_sppbj')}}" />
                                    @error('jumlah_harga_sppbj')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Jumlah Harga Berita Acara</label>
                                    <input name="jumlah_harga_berita" value="{{ $data_verspmm->jumlah_harga_berita }}" type="number" class="form-control @error('jumlah_harga_berita') is-invalid @enderror" value="{{old('jumlah_harga_berita')}}" />
                                    @error('jumlah_harga_berita')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Tanggal Dokumen SKB</label>
                                    <input name="tanggal_skb" value="{{ $data_verspmm->tanggal_skb }}" type="date" class="form-control @error('tanggal_skb') is-invalid @enderror" value="{{old('tanggal_skb')}}" />
                                    @error('tanggal_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Jumlah Harga SKB</label>
                                    <input name="jumlah_harga_skb" value="{{ $data_verspmm->jumlah_harga_skb }}" type="number" class="form-control @error('jumlah_harga_skb') is-invalid @enderror" value="{{old('jumlah_harga_skb')}}" />
                                    @error('jumlah_harga_skb')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>

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
                                        <option value={{$item->id}} @if($item->id==$data_verspmm->ttd1)
                                            selected
                                            @endif

                                            >
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
                                        <option value={{$item->id}} @if($item->id==$data_verspmm->ttd2)
                                            selected
                                            @endif

                                            >
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

                        <div class="text-center">
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