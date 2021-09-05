@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if(session()->get('sukses'))
            <div class="alert alert-success">
                {{session()->get('sukses')}}
            </div>
            @endif

            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                
            <div class="form-row mt-4">
                <div class="col-md-2 justify-content-start">
                    <a href="{{url('/admin/karyawan/cetak')}}" class="btn btn-warning"> Cetak Data Karyawan</a>
                </div>

                <div class="col-md-7 ">
                    <a class="btn btn-success" href="{{ url('admin/file-export') }}">Export Excel</a>
                </div>

                
                <div class="col-md-3 text-right">
                    @can('sdm-create')
                    <a href="{{route('karyawan.create')}}" class="btn btn-primary"> Tambah</a>
                    @endcan
                </div>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>tempat lahir</th>
                            <th>tanggal lahir</th>
                            <th>Usia</th>
                            <th>Status Keluarga</th>
                            <th>Tanggal Masuk Kerja</th>
                            <th>Masa Kerja</th>
                            <th>SK. Capeg</th>
                            <th>Jabatan</th>
                            <th>Tanggal Dipilih Jabatan</th>
                            <th>Masa Jabatan</th>
                            <th>Pendidikan</th>
                            <th>Nik KTP</th>
                            <th>Nomor BPJS Ketenagakerjaan</th>
                            <th>Nomor BPJS Kesehatan</th>
                            <th>Nomor NPWP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i=>$row)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->nama_karyawan}}</td>
                            <td>{{$row->nik}}</td>
                            <td>{{$row->tempat_lahir}}</td>
                            <td>{{$row->tanggal_lahir}}</td>
                            <td>{{$row->usia}}</td>
                            <td>{{$row->status_keluarga}}</td>
                            <td>{{$row->tanggal_masuk_kerja}}</td>
                            <td>{{$row->masa_kerja}}</td>
                            <td>{{$row->sk}}</td>
                            <td>{{$row->jabatan}}</td>
                            <td>{{$row->tanggal_pilih_jabatan}}</td>
                            <td>{{$row->masa_jabatan}}</td>
                            <td>{{$row->pendidikan}}</td>
                            <td>{{$row->nik_ktp}}</td>
                            <td>{{$row->no_bpjs_ketenagakerjaan}}</td>
                            <td>{{$row->no_bpjs_kesehatan}}</td>
                            <td>{{$row->no_npwp}}</td>

                            <td class="d-flex">
                                @can('sdm-show')    
                                <a href="{{route('karyawan.show',$row->id)}}" class="btn btn-success mr-2">Show</a>
                                @endcan
                                @can('sdm-edit')    
                                <a href="{{route('karyawan.edit',$row->id)}}" class="btn btn-primary mr-2">Edit</a>
                                @endcan
                                @can('sdm-delete')    
                                <form action="{{route('karyawan.destroy', $row->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="ml-5 btn btn-danger" type="submit">Hapus</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-row justify-content-center">
                <div class="panel col-lg-10">
                    <h4 class="text-center">Grafik Usia Karyawan PT.ASDP</h4>
                    <canvas id="usia" class="rounded shadow"></canvas>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row justify-content-center">
                <div class="panel col-lg-10">
                    <h4 class="text-center">Grafik Masa Kerja Karyawan PT.ASDP</h4>
                    <canvas id="masakerja" class="rounded shadow"></canvas>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row justify-content-center">
                <div class="panel col-lg-10">
                    <h4 class="text-center">Grafik Masa Jabatan Karyawan PT.ASDP</h4>
                    <canvas id="masajabatan" class="rounded shadow"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
{{-- chart usia --}}
<script>
    var ctx = document.getElementById('usia').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: {!!json_encode($grafikUsia -> labels) !!},
            datasets: [{
                label: 'Usia',
                backgroundColor: {!!json_encode($grafikUsia -> warnaGrafikUsia) !!},
                data: {!!json_encode($grafikUsia -> dataset) !!},
            }, ]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {
                            if (value % 1 === 0) {
                                return value;
                            }
                        }
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>

{{-- chart masa kerja --}}
<script>
    var ctx = document.getElementById('masakerja').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: {!!json_encode($grafikMasaKerja -> labels) !!},
            datasets: [{
                label: 'Grafik Masa Kerja Karyawan PT.ASDP',
                backgroundColor: {!!json_encode($grafikMasaKerja -> warnaGrafikMasaKerja) !!},
                data: {!!json_encode($grafikMasaKerja -> dataset) !!},
            }, ]
        },
        // Configuration options go here
        options: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>

{{-- chart masa Jabatan --}}
<script>
    var ctx = document.getElementById('masajabatan').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',
        // The data for our dataset
        data: {
            labels: {!!json_encode($grafikMasaJabatan -> labels) !!},
            datasets: [{
                label: 'Grafik Masa Kerja Karyawan PT.ASDP',
                backgroundColor: {!!json_encode($grafikMasaJabatan -> warnaGrafikMasaJabatan) !!},
                data: {!!json_encode($grafikMasaJabatan -> dataset) !!},
            }, ]
        },
        // Configuration options go here
        options: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>

@endsection