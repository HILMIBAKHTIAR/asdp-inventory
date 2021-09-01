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
            <div class="d-flex justify-content-end">
                <a href="{{route('karyawan.create')}}" class="btn btn-primary"> Tambah</a>
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
                                <a href="{{route('karyawan.show',$row->id)}}" class="btn btn-success mr-2">Show</a>
                                <a href="{{route('karyawan.edit',$row->id)}}" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{route('karyawan.destroy', $row->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="ml-5 btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chart</h6>
        </div>
        <div class="card-body">
            <div class="form-row justify-content-center">
                <div class="panel col-lg-8">
                    <canvas id="userChart" class="rounded shadow"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- chart -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: {!!json_encode($chart -> labels) !!},
            datasets: [{
                label: 'Grafik Umur Karyawan PT.ASDP',
                backgroundColor: {!!json_encode($chart -> colours) !!},
                data: {!!json_encode($chart -> dataset) !!},
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

@endsection