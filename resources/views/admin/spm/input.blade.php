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
                    <form action="{{route('spm.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control" />
                                    <label>Jenis Tranksaksi</label>
                                    <input name="jenis_transaksi" type="text" class="form-control" />
                                    <label>Penangung Jawab</label>
                                    <select name="devisi" id="" class="form-control ">
                                        <option value="SDM & Umum">SDM & Umum</option>
                                        <option value="Usaha">Usaha</option>
                                        <option value="Teknik">Teknik</option>
                                        <option value="Teknik Ketapang">Teknik Ketapang</option>
                                        <option value="Keuangan">Keuangan</option>
                                       
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Tahun Anggaran</label>
                                    <input name="tahun_anggaran" type="date" class="form-control">
                                    <label>Program</label>
                                    <input name="program" type="text" class="form-control" />
                                    <label>Pembebanan Anggaran</label>
                                    <select name="mataanggaran_id" id="" class="form-control ">
                                        <option value="">-Pilih-</option>
                                        @foreach($mataanggaran as $item)
                                        <option value="{{$item->id}}">
                                           {{$item->nomor}} - {{$item->keterangan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <!-- Pengadaan Barang -->
                            {{-- <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Barang/Jasa</h1>
                            </div>
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tableSpm" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Urian Kegiatan</th>
                                                <th>MA</th>
                                                <th>Permohonan Dana</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> --}}

                                        {{-- Refer data dari Sp2bj --}}

                                        {{-- <tbody>
                                            <tr>
                                                <td>{{$sp2bj->nama_pengadaan}}</td>
                                                <td>{{$sp2bj->mataanggaran->nomor}} - {{$sp2bj->mataanggaran->keterangan}}</td>
                                                <td>
                                                    <p style="margin: 4px;">
                                                      Rp.
                                                      {{number_format(
                                                        $sp2bj->barang->map(
                                                          function($el)
                                                          {
                                                            return $el->harga_satuan * $el->jumlah;
                                                          }
                                                        )->sum(), 0,',','.')
                                                      }},00
                                                    </p>
                                                </td>
                                                <td>{{$sp2bj->spesifikasi}}</td>
                                                
                                            </tr> --}}

                                            {{-- data dari Item Spm --}}

                                            {{-- <tr>
                                                <td><input name="uraian_kegiatan[]" type="text" class="form-control"></td>
                                                <td>
                                                    <select name="mataanggaran_item_id[]" id="" class="form-control">
                                                        <option value="">- Pilih -</option>

                                                        @foreach($mataanggaran as $item)
                                                        <option value="{{$item->id}}">
                                                            {{$item->nomor}} - {{$item->keterangan}}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </td>
                                                <td><input name="dana[]" type="text" class="form-control"></td>
                                                <td><input name="keterangan[]" type="text" class="form-control"></td>
                                                <td class=""><input href="" class="btn btn-primary mr-2" name="tambah" id="tambah" value="Tambah"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}

                            <br>
                            {{-- form isi  --}}

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form isi Bank</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Penerima Dana</label>
                                    <input name="penerima_dana" type="text" class="form-control" placeholder="Boleh tidak diisi" />
                                </div>
                                <div class="col-md-4">
                                    <label>Nomor Rekening</label>
                                    <input name="nomor_rekening" type="text" class="form-control" placeholder="Boleh tidak diisi" />
                                </div>
                                <div class="col-md-4">
                                    <label>Bank</label>
                                    <input name="bank" type="text" class="form-control" placeholder="Boleh tidak diisi" />
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
                                    <select name="ttd1" id="" class="form-control ">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd2" id="" class="form-control ">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Staf SDM & Umum</label>
                                    <select name="ttd3" id="" class="form-control @error('ttd1') is-invalid @enderror">
                                        <option value="">-Pilih-</option>

                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach

                                    </select>
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