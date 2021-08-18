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

                    <!-- isi form input -->
                    <form action="{{route('berita.update',$data_barang->id)}}" method="post" class="berita">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis/Spesifikasi</th>
                                        <th>Satuan</th>
                                        <th>Jumlah Barang</th>
                                        <th>Harga Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_barang->barang as $item)    
                                    <tr>
                                        <td class="text-center"><p>{{$loop->iteration}}</p></td>
                                        <td><input name="nama_barang[]" type="text" value="{{$item->nama_barang}}" class="form-control @error('jumlah.*') is-invalid @enderror"></td>
                                        <td><input name="spesifikasi[]" type="" value="{{$item->spesifikasi}}" class="form-control @error('jumlah.*') is-invalid @enderror"></td>
                                        <td>
                                            <select name="satuan[]" type="text"  class="form-control @error('jumlah.*') is-invalid @enderror">
                                                @foreach ($data_barang->barang as $item)
                                                <option value="{{$item->satuan}}" 
                                                    @if ($item->satuan == $data_barang->barang)
                                                        selected 
                                                    @endif>{{$item->satuan}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input name="jumlah[]" type="text" value="{{$item->jumlah}}" class="form-control @error('jumlah.*') is-invalid @enderror"></td>
                                        <td><input name="harga_satuan[]" type="text" value="{{$item->harga_satuan}}" class="form-control @error('jumlah.*') is-invalid @enderror"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<!-- /.container-fluid -->
@endsection