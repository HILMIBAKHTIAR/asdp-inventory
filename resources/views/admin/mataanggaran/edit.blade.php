@extends('admin.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-6">
            <div class="card mb-4 ">
                <div class="card-footer">

                    <!-- judul form-->

                    <div class=" text-start">
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Mata Anggaran</h6>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('mataanggaran.update',$data->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Nomor</label>
                                    <input type="text" name="nomor" value="{{$data->nomor}}" class="form-control" />
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" value="{{$data->keterangan}}" class="form-control">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Update
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection