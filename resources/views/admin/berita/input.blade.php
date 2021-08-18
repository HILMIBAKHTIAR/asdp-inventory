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
                        <h1 class="h4 text-gray-900 mb-2">Bukti Serah Terima Barang</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('berita.store')}}" method="post" class="berita">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Kepada Yth</label>
                                    <select name="karyawan_berita_id" id="" class="form-control" required>
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                    <input name="alamat_tujuan" type="text" class="form-control">
                                </div>
                            </div>

                            <br>
                            <!-- Pengadaan Barang -->
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Tabel Barang/Jasa</h1>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-md-11">
                                    <h6 class="text-gray-900 mb-2">Jika barang tidak sesuai silahkkan edit kembali</h6>
                                </div>
                                <div class="col-md-1 text-right">
                                    
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis/Spesifikasi</th>
                                                <th>Satuan</th>
                                                <th>Jumlah Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sp2bj->barang as $item)
                                            <tr>
                                                <td class="text-center"><p>{{$loop->iteration}}</p></td>
                                                <td><p style="margin: 4px;">{{$item->nama_barang}}</p></td>
                                                <td><p style="margin: 4px;">{{$item->spesifikasi}}</p></td>
                                                <td><p style="margin: 4px;">{{$item->satuan}}</p></td>
                                                <td><p style="margin: 4px;">{{$item->jumlah}}</p></td>
                                                <td><p class="text-right" style="margin: 4px;">Rp. {{number_format($item->harga_satuan, 0,',','.')}},00</p></td>
                                                <td><p class="text-right" style="margin: 4px;">Rp. {{number_format($item->harga_satuan * $item->jumlah ,0,',','.') }},00</p></td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="6" class="text-end">
                                                  &nbsp;Jumlah Rp&nbsp;
                                                </td>
                                                <td>
                                                  <p class="text-right" style="margin: 4px;">
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
                                                </tr>
                                                <div class="text-left mb-4">
                                                <a class="btn btn-primary" href="{{route('berita.edit',$item->sppbj_id)}}">Edit</a>
                                                </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- FORM TTD -->
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Staf Umum</label>
                                    <select name="ttd1" id="" class="form-control" required>
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Manager SDM/Umum</label>
                                    <select name="ttd2" id="" class="form-control" required>
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
                                    <select name="ttd3" id="" class="form-control" required>
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
@endsection