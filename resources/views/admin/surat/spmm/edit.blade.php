@extends('admin.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{url('admin/spmm')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-footer">

                    <!-- judul form-->

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Formulir Perintah Membayar</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('spmm.update',$data_spmm->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Nomor Surat</label>
                                    <input name="nomor_surat_spm" type="number" class="form-control @error('nomor_surat_spm') is-invalid @enderror" value="{{$data_spmm->nomor_surat_spm}}" />
                                    @error('nomor_surat_spm')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                    <label>Jenis Transaksi</label>
                                    <input name="jenis_transaksi" type="text" class="form-control @error('jenis_transaksi') is-invalid @enderror" value="{{$data_spmm->jenis_transaksi}}" />
                                    @error('jenis_transaksi')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror




                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Surat</label>
                                    <input name="tanggal_surat" type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{$data_spmm->tanggal_surat}}">
                                    @error('tanggal_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                    <label>Program</label>
                                    <input name="program" type="text" class="form-control @error('program') is-invalid @enderror" value="{{$data_spmm->program}}" placeholder="boleh tidak diisi" />
                                    @error('program')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror


                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Tahun Anggaran</label>
                                    <input name="tahun_anggaran" type="date" class="form-control @error('tahun_anggaran') is-invalid @enderror" value="{{$data_spmm->tahun_anggaran}}" />
                                    @error('tahun_anggaran')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Penangung Jawab</label>
                                    <select name="devisi" id="" class="form-control @error('devisi') is-invalid @enderror" data-live-search=" true">
                                        @foreach([
                                        "SDM & Umum" => "SDM & Umum",
                                        "Usaha" => "Usaha",
                                        "Teknik" => "Teknik",
                                        "Teknik Ketapang" => "Teknik Ketapang",
                                        "Keuangan" => "Keuangan"
                                        ] AS $item => $itemDevisi)
                                        <option value="{{ $item }}" {{ old("devisi", $data_spmm->devisi) == $item ? "selected" : "" }}>{{ $itemDevisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 search_select_box">
                                    <label>Pembebanan Anggaran</label>
                                    <select name="pembebanan_anggaran" id="" class="form-control @error('pembebanan_anggaran') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($mataanggaran as $item)
                                        <option value={{$item->id}} @if($item->id==$data_spmm->pembebanan_anggaran)
                                            selected
                                            @endif

                                            >
                                            {{$item->nomor}} - {{$item->keterangan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mb-4 mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Form Uraian Kegiatan</h1>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <label>Uraian Kegiatan</label>
                                    <input name="uraian_kegiatan" type="text" class="form-control @error('uraian_kegiatan') is-invalid @enderror" value="{{$data_spmm->uraian_kegiatan}}" />
                                    @error('uraian_kegiatan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 search_select_box">
                                    <label>Mata Anggaran</label>
                                    <select name="mataanggaran_id" id="" class="form-control @error('mataanggaran_id') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($mataanggaran as $item)
                                        <option value={{$item->id}} @if($item->id==$data_spmm->mataanggaran_id)
                                            selected
                                            @endif

                                            >
                                            {{$item->nomor}} - {{$item->keterangan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('mataanggaran_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label>Permohonan Dana</label>
                                    <input name="permohonan_dana" type="text" class="form-control @error('permohonan_dana') is-invalid @enderror" value="{{$data_spmm->permohonan_dana}}" />
                                    @error('permohonan_dana')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label>Keterangan</label>
                                    <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{$data_spmm->keterangan}}" placeholder="Boleh tidak diisi" />
                                    @error('keterangan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
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
                                    <input name="penerima_dana" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{$data_spmm->penerima_dana}}" />
                                </div>
                                <div class="col-md-4">
                                    <label>Nomor Rekening</label>
                                    <input name="nomor_rekening" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{$data_spmm->nomor_rekening}}" />
                                </div>
                                <div class="col-md-4">
                                    <label>Bank</label>
                                    <input name="bank" type="text" class="form-control" placeholder="Boleh tidak diisi" value="{{$data_spmm->bank}}" />
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
                                        <option value={{$item->id}} @if($item->id==$data_spmm->ttd1)
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
                                <div class="col-md-4 search_select_box">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$data_spmm->ttd2)
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
                                <div class="col-md-4 search_select_box">
                                    <label>Staf SDM & Umum</label>
                                    <select name="ttd3" id="" class="form-control @error('ttd3') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$data_spmm->ttd3)
                                            selected
                                            @endif

                                            >
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd3')
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