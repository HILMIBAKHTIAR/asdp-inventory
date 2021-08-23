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
                        <h1 class="h4 text-gray-900 mb-4">Formulir Surat Pernyataan <br> Kebenaran harga</h1>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('skb.store')}}" method="post" class="skb">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Alamat</label>
                                    <input name="alamat_tujuan" class="form-control @error('alamat_tujuan') is-invalid @enderror" value="{{old('alamat_tujuan')}}"/>
                                    @error('alamat_tujuan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>No Telepon</label>
                                    <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{old('no_telp')}}">
                                    @error('no_telp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    
                                    <label>Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{old('tanggal_surat')}}" />
                                    @error('tanggal_surat')
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
                                <div class="col-md-6">
                                    <label>General/Manager</label>
                                    <select name="ttd1" id="" class="form-control @error('ttd1') is-invalid @enderror">
                                        <option value="">-Pilih-</option>
                                        @foreach ($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('ttd1')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Manager SDM & Umum</label>
                                    <select name="ttd2" id="" class="form-control @error('ttd2') is-invalid @enderror">
                                        <option value="">-Pilih-</option>
                                        @foreach ($karyawan as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->jabatan}} - {{$item->nama_karyawan}}
                                        </option>
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
                                <input type="submit" class="btn btn-success btn-lg" name="selanjutnya" id="selanjutnya" value="Selanjutnya">
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