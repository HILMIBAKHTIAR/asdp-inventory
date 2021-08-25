@extends('admin.layout.master')

@section('content')

<div class="container-fluid">
    <!-- Content Row -->
    <div class="row d-flex justify-content-center ">
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pembuatan Surat</h6>
                </div>

                <div class="card-body mt-5" style="height: 40rem">

                    <div class="form-row mt-3 mb-3"> 
                        {{-- Sppbj --}}
                        <div class="link col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3 text-center">
                                                Surat Permintaan Pengadaan Barang/Jasa
                                            </div>
                                            <div class="text-center mt-2">
                                                <a href="" class="tombol btn btn-success mt-4">Buat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Skb --}}
                        <div class="link col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3 text-center">
                                                Surat Kebenaran Harga
                                            </div>
                                            <div class="text-center mt-2">
                                                <a href="" class="tombol btn btn-warning mt-4">Buat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Berita --}}
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3 text-center">
                                                Surat Bukti Serah Terima Barang
                                            </div>
                                            <div class="text-center mt-2">
                                                <a href="" class="tombol btn btn-danger mt-4">Buat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-row mt-3 mb-3">

                        <div class="col-xl-2 col-md-6 mb-4">
                        </div>
                        {{-- SPM --}}
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3 text-center">
                                                Surat Perintah Membayar
                                            </div>
                                            <div class="text-center mt-2">
                                                <a href="" class="tombol btn btn-info mt-4">Buat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Verifikasi SPM --}}
                            

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3 text-center">
                                                Verifikasi Surat Perintah Membayar
                                            </div>
                                            <div class="text-center mt-2">
                                                <a href="" class="tombol btn btn-primary mt-4">Buat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-6 mb-4">
                        </div>

                    </div>
                        
                </div>




            </div>
        </div>
    </div>
</div>


@endsection