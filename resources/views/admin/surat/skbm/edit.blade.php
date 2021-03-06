@extends('admin.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="mb-2 d-flex justify-content-start">
        <a href="{{url('admin/skbm')}}" class="btn btn-success"> Kembali</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-footer">

                    <!-- judul form-->

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Formulir Surat Pernyataan <br> Kebenaran Harga</h1>
                    </div>

                    {{-- Modal --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input name="nama_barang" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis/Spesifikasi</label>
                                        <input name="spesifikasi" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select class="form-control" name="satuan_id" required>
                                            @foreach($satuan as $item)
                                            <option value="{{$item->id}} ">
                                                {{$item->nama_satuan}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <input name="jumlah" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Barang (Rp)</label>
                                        <input name="harga_satuan" type="text" class="form-control" required>
                                        @error('harga_satuan')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary simpan">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- isi form input -->
                    <input type="hidden" name="skbm_id" value="{{$id}}">
                    <form action="{{route('skbm.update', $skbm->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">

                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>Dari/Peminta</label>
                                    <select name="karyawan_id" id="" class="form-control @error('karyawan_id') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$skbm->karyawan_id)
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
                                </div>

                                <div class="col-md-6">
                                    <label>Alamat</label>
                                    <input name="alamat_tujuan" class="form-control @error('alamat_tujuan') is-invalid @enderror" value="{{$skbm->alamat_tujuan}}" />
                                    @error('alamat_tujuan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>No Telepon</label>
                                    <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{$skbm->no_telp}}">
                                    @error('no_telp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">

                                    <label>Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{$skbm->tanggal_surat}}" />
                                    @error('tanggal_surat')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mt-2 mb-3 text-right">
                                <div class="col-md-9">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah </button>
                                </div>
                            </div>

                            <br>

                            <!-- Pengadaan Barang -->
                            <div class="form-group">
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($skbm->barangSkbm as $item)
                                            <input type="hidden" name="id[]" value="{{$item->id}}">
                                            <tr>
                                                <td class="text-center">
                                                    <p>{{$loop->iteration}}</p>
                                                </td>
                                                <td><input name="nama_barang[]" type="text" value="{{$item->nama_barang}}" class="form-control @error('nama_barang.*') is-invalid @enderror">
                                                    @error('nama_barang.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input name="spesifikasi[]" type="" value="{{$item->spesifikasi}}" class="form-control @error('spesifikasi.*') is-invalid @enderror"></td>
                                                @error('nama_barang.*')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                                <td>
                                                    <select name="satuan_id[]" id="" class="form-control @error('satuan_id') is-invalid @enderror" data-live-search=" true">  
                                                        @foreach($satuan as $itemSatuan)
                                                            <option value={{$itemSatuan->id}} @if($itemSatuan->id == $item->satuan->id)
                                                                selected
                                                                @endif

                                                                >
                                                                {{$itemSatuan->nama_satuan}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input name="jumlah[]" type="text" value="{{$item->jumlah}}" class="form-control @error('jumlah.*') is-invalid @enderror">
                                                    @error('jumlah.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input name="harga_satuan[]" type="text" value="{{$item->harga_satuan}}" class="form-control @error('harga_satuan.*') is-invalid @enderror">
                                                    @error('harga_satuan.*')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input class="btn btn-danger mr-2 hapus" type="button" name="hapus" data-id="{{$item->id}}" value="Hapus"></td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- FORM TTD -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 search_select_box">
                                    <label>General/Manager</label>
                                    <select name="ttd1" id="" class="form-control @error('ttd1') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach ($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$skbm->ttd1)
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
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror" data-live-search=" true">
                                        <option value="">-Pilih-</option>
                                        @foreach ($karyawan as $item)
                                        <option value={{$item->id}} @if($item->id==$skbm->ttd2)
                                            selected
                                            @endif

                                            >
                                            {{$item->jabatan->nama_jabatan}} - {{$item->nama_karyawan}}
                                            @endforeach
                                    </select>
                                    @error('ttd2')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <center>
                                <button type="submit" class="btn btn-success btn-lg">Update</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    $('.simpan').on('click', function() {
        $.ajax({
            url: '{{url("admin/skbm/tambah")}}',
            method: 'post',
            data: {
                _token: '{{csrf_token()}}',
                skbm_id: $('input[name=skbm_id]').val(),
                jumlah: $('input[name=jumlah]').val(),
                satuan_id: $('select[name=satuan_id]').val(),
                nama_barang: $('input[name=nama_barang]').val(),
                spesifikasi: $('input[name=spesifikasi]').val(),
                harga_satuan: $('input[name=harga_satuan]').val()
            },
            dataType: 'json',
            success() {
                alert('Data Berhasil Ditambahkan');
                window.location.reload();
            }
        });
    });

    $('.hapus').on('click', function() {
        $.ajax({
            url: '{{url("/")}}' + '/admin/skbm/' + $(this).data('id') + '/hapus',
            dataType: 'json',
            success() {
                alert('Data Berhasil Dihapus');
                window.location.reload();
            }
        });
    });
</script>

<!-- /.container-fluid -->
@endsection