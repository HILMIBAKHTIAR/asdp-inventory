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
                        <h1 class="h4 text-gray-900 mb-4">Bukti Serah Terima Barang</h1>
                    </div>


                    <div class="form-row mt-2 mb-3 text-right">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah </button>
                        </div>
                    </div>


                    <!-- Modal -->
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
                                        <select name="satuan[]" type="text" class="form-control">
                                            <option value="roll">roll</option>
                                            <option value="pcs">pcs</option>
                                            <option value="unit">unit</option>
                                            <option value="Pack">Pack</option>
                                            <option value="Set">Set</option>
                                            <option value="Batang">Batang</option>
                                            <option value="Lusin">Lusin</option>
                                            <option value="Botol">Botol</option>
                                            <option value="Kotak">Kotak</option>
                                            <option value="Gross">Gross</option>
                                            <option value="Rim">Rim</option>
                                            <option value="Kodi">Kodi</option>
                                            <option value="Dus">Dus</option>
                                            <option value="Bal">Bal</option>
                                            <option value="Ls">Ls</option>
                                            <option value="Meter">Meter</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Cm">Cm</option>
                                            <option value="M2">M2</option>
                                            <option value="M3">M3</option>
                                            <option value="Liter">Liter</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Ton">Ton</option>
                                            <option value="Ons">Ons</option>
                                            <option value="Lembar">Lembar</option>
                                            <option value="Orang">Orang</option>
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

                    <input type="hidden" name="sppbj_id" value="{{$id}}">
                    <form action="{{route('berita.update',$data_barang->id)}}" method="post" class="berita">
                        @method('PATCH')
                        @csrf
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
                                        @foreach ($data_barang->barang as $item)
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
                                                <select name="satuan[]" type="text" class="form-control">
                                                    @foreach([
                                                        "roll" => "roll",
                                                        "pcs" => "pcs",
                                                        "unit" => "unit",
                                                        "Pack" => "Pack",
                                                        "Set" => "Set",
                                                        "Batang" => "Batang",
                                                        "Botol" => "Botol",
                                                        "Kotak" => "Kotak",
                                                        "Gross" => "Gross",
                                                        "Rim" => "Rim",
                                                        "Kodi" => "Kodi",
                                                        "Dus" => "Dus",
                                                        "Bal" => "Bal",
                                                        "Ls" => "Ls",
                                                        "Meter" => "Meter",
                                                        "Gram" => "Gram",
                                                        "Cm" => "Cm",
                                                        "M2" => "M2",
                                                        "M3" => "M3",
                                                        "Liter" => "Liter",
                                                        "Kg" => "Kg",
                                                        "Ton" => "Ton",
                                                        "Ons" => "Ons",
                                                        "Lembar" => "Lembar",
                                                        "Orang" => "Orang",
                                                        ] AS $i => $satuans)
                                                        <option value="{{ $i }}" {{ old("satuan", $item->satuan) == $i ? "selected" : "" }}>{{ $satuans }}</option>
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
            url: '{{url("admin/berita/tambah")}}',
            method: 'post',
            data: {
                _token: '{{csrf_token()}}',
                sppbj_id: $('input[name=sppbj_id]').val(),
                jumlah: $('input[name=jumlah]').val(),
                satuan: $('input[name=satuan]').val(),
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
            url: '{{url("/")}}' + '/admin/berita/' + $(this).data('id') + '/hapus',
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