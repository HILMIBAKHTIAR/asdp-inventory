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
                    <form action="#" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{old('tanggal')}}" />
                                    @error('tanggal')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Jenis Tranksaksi</label>
                                    <input name="jenis_transaksi" type="text" class="form-control @error('jenis_transaksi') is-invalid @enderror" value="{{old('jenis_transaksi')}}" />
                                    @error('jenis_transaksi')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label>Tahun Anggaran</label>
                                    <input name="tahun_anggaran" type="date" class="form-control @error('tahun_anggaran') is-invalid @enderror" value="{{old('tahun_anggaran')}}">
                                    @error('tahun_anggaran')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <label>Program</label>
                                    <input name="program" type="text" class="form-control @error('program') is-invalid @enderror" value="{{old('program')}}" placeholder="boleh tidak diisi" />
                                    @error('program')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-md-12 search_select_box">
                                    <label>Penangung Jawab</label>
                                    <select name="devisi" id="" class="form-control @error('devisi') is-invalid @enderror" data-live-search=" true">
                                        <option value="SDM & Umum" @if (old('devisi')=='SDM & Umum' ) selected="selected" @endif>SDM & Umum</option>
                                        <option value="Usaha" @if (old('devisi')=='Usaha' ) selected="selected" @endif>Usaha</option>
                                        <option value="Teknik" @if (old('devisi')=='Teknik' ) selected="selected" @endif>Teknik</option>
                                        <option value="Teknik Ketapang" @if (old('devisi')=='Teknik Ketapang' ) selected="selected" @endif>Teknik Ketapang</option>
                                        <option value="Keuangan" @if (old('devisi')=='Keuangan' ) selected="selected" @endif>Keuangan</option>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <!-- form isi   -->

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form isi Bank</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Penerima Dana</label>
                                    <input name="penerima_dana" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('penerima_dana')}}" />
                                </div>
                                <div class="col-md-4">
                                    <label>Nomor Rekening</label>
                                    <input name="nomor_rekening" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('nomor_rekening')}}" />
                                </div>
                                <div class="col-md-4">
                                    <label>Bank</label>
                                    <input name="bank" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{old('bank')}}" />
                                </div>
                            </div>

                            <br>
                            <!-- FORM TTD -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 search_select_box">
                                    <label>General Manager</label>
                                    <select name="ttd1" id="" class="form-control @error('ttd1') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd1') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd1')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 search_select_box">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd2') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd2')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 search_select_box">
                                    <label>Staf SDM & Umum</label>
                                    <select name="ttd3" id="" class="form-control @error('ttd3') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}" {{old('ttd3') == $item->id ? 'selected' : null}}>
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd3')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <center>
                                <input type="submit" class="btn btn-primary" name="selanjutnya" id="selanjutnya" value="Selanjutnya">
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
            $("#tableSpm").append(`<tr>
                                                <td><input name="uraian_kegiatan[]" type="text" class="form-control"></td>
                                                <td><select name="mataanggaran_item_id[]" id="" class="form-control">
                                                        <option value="">-Pilih-</option>

                                                        @foreach($mataanggaran as $item)
                                                        <option value="{{$item->id}}">
                                                            {{$item->nomor}} - {{$item->keterangan}}
                                                        </option>
                                                        @endforeach

                                                    </select></td>
                                                <td><input name="dana[]" type="text" class="form-control"></td>
                                                <td><input name="keterangan[]" type="text" class="form-control"></td>
                                                <td class=""><input href="" class="btn btn-danger mr-2" name="hapus" id="hapus" value="Hapus"></input></td>
                                            </tr>`);
            $("#tableSpm").on('click', '#hapus', function() {
                $(this).closest('tr').remove();
            })
        });
    });
</script>
@endsection