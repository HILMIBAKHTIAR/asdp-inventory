<table class="table table-hover">
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Nik</th>
    </tr>
    <tr>
        <td>{{ $model->id }}</td>
        <td>{{ $model->nama_karyawan }}</td>
        <td>{{ $model->jabatan }}</td>
        <td>{{ $model->nik }}</td>
    </tr>
</table>