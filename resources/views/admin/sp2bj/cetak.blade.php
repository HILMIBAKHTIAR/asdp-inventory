<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <title>Cetak SPPBJ</title> --}}
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body data-new-gr-c-s-check-loaded="14.1024.0" data-gr-ext-installed="">

  <style>
    @media print {
      body * {
        visibility: hidden;
      }

      .print-area * {
        visibility: visible;
      }
    }
  </style>

  <style type="text/css" media="print">
    @media print {
      @page {
        margin-top: 0;
        margin-bottom: 0;
      }

      body {
        padding-top: 60px;
        padding-bottom: 60px;
      }
    }
  </style>

  <div class="print-area">


    <form>


      <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
          <tr>
            <td style="width: 208.641px;" rowspan="4"><img src="{{url('backend/img/asdp.svg')}}" alt=""></td>
            <td align="center" style="width: 872.359px; border-right: 0px;" rowspan="4"><strong>FORMULIR PERMINTAAN PENGADAAN BARANG/JASA (SPPB/J)</strong></td>
            <td style="width: 133px;"><strong>No. Dokumen</strong></td>
            <td style="width: 198px;">:&nbsp;<strong>PBJ-101.00.02</strong></td>
          </tr>
          <tr>
            <td style="width: 133px;"><strong>Revisi</strong></td>
            <td style="width: 198px;">:&nbsp;<strong>05</strong></td>
          </tr>
          <tr>
            <td style="width: 133px;"><strong>Berlaku Efektif</strong></td>
            <td style="width: 198px;">:&nbsp;<strong>4 September 2021</strong></td>
          </tr>
          <tr>
            <td style="width: 133px;"><strong>Halaman</strong></td>
            <td style="width: 198px;">:&nbsp;<strong>1 dari 1</strong></td>
          </tr>
        </tbody>
      </table>

      <br>

      <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1014px; border-color: black;">
        <tbody>
          <tr style="height: 23px;">
            <td style="width: 213.719px; height: 23px;"><strong>Kepada</strong></td>
            <td style="width: 474.281px; height: 23px;"><strong>&nbsp;General Cabang Ketapang</strong></td>
            <td style="width: 313px; height: 23px;"><strong>No.SPPB/J : 213/UM/ASDP-KTP/2021</strong></td>
          </tr>

          <tr style="height: 23px;">
            <td style="width: 213.719px; height: 23px;"><strong>Dari</strong></td>
            <td style="width: 474.281px; height: 23px;"><strong>&nbsp;{{$sp2bj->dari}}</strong></td>
            <td style="width: 313px; height: 23px;"><strong>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= date('d-F-Y') ?></strong></td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 213.719px; height: 23px;"><strong>Klasifikasi</strong></td>
            <td style="width: 787.281px; height: 23px;" colspan="2"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox"> Normal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox"> Emergency&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox"> Urgent</strong></td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 213.719px; height: 23px;"><strong>Dasar Pelimpahan* (*Jika ada)</strong></td>
            <td style="width: 787.281px; height: 23px;" colspan="2">&nbsp;</td>
          </tr>
          <tr style="height: 23.5px;">
            <td style="width: 213.719px; height: 23.5px;"><strong>Nama Pengadaan</strong></td>
            <td style="width: 787.281px; height: 23.5px;" colspan="2"><strong>&nbsp;{{$sp2bj->nama_pengadaan}}</strong></td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 213.719px; height: 23px;"><strong>Mata Anggaran</strong></td>
            <td style="width: 787.281px; height: 23px;" colspan="2"><strong>&nbsp;{{$sp2bj->mata_anggaran}}</strong></td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 213.719px; height: 23px;"><strong>Tanggal Dibutuhkan</strong></td>
            <td style="width: 787.281px; height: 23px;" colspan="2"><strong>&nbsp;{{$sp2bj->tanggal_dibutuhkan}}</strong></td>
          </tr>
        </tbody>
      </table>

      <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1014px; border-color: black;">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sp2bj->barang as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->jumlah}}</td>
            <td>{{$item->satuan}}</td>
            <td>{{$item->nama_barang}}</td>
            <td>{{$item->spesifikasi}}</td>
            <td>{{$item->harga_satuan}}</td>
            <td>{{$item->harga_satuan * $item->jumlah}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="6" class="text-end">
              &nbsp;Jumlah Rp&nbsp;
            </td>
            <td>{{$sp2bj->barang->map(function($el){
                return $el->harga_satuan * $el->jumlah;
              })->sum()}}</td>
          </tr>
        </tbody>
      </table>


      <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1012px;">
        <tbody>
          <tr>
            <td style="width: 613.266px;"><strong>Catatan Peminta Barang &amp; Jasa :</strong></td>
            <td style="width: 394.734px;">
              <p>Tgl&nbsp; <?= date('d-F-Y') ?></p>
              <p align='center'>Peminta Barang/Jasa</p>
              <p>&nbsp;</p>
              <p align='center'>( OKE SANTIKA )</p>
              <p align='center'>Manager SDM &amp; Umum</p>
            </td>
          </tr>
          <tr>
            <td style="width: 613.266px;"><strong>Catatan :</strong></td>
            <td style="width: 394.734px;">
              <p>Tgl&nbsp; <?= date('d-F-Y') ?></p>
              <p>&nbsp;</p>
              <p align='center'>( SUHARTO )</p>
              <p align='center'>General Manager Cabang Ketapang</p>
            </td>
          </tr>
          <tr>
            <td style="width: 613.266px;"><strong>Catatan Ketersediaan Anggaran :</strong></td>
            <td style="width: 394.734px;">
              <p>Tgl&nbsp; <?= date('d-F-Y') ?></p>
              <p>&nbsp;</p>
              <p align='center'>( ANDHIE ARIESTIANO)</p>
              <p align='center'>Manager Keuangan</p>
            </td>
          </tr>
          <tr>
            <td style="width: 613.266px;"><strong>Catatan Ketersediaan Stok :</strong></td>
            <td style="width: 394.734px;">
              <p>Tgl&nbsp; <?= date('d-F-Y') ?></p>
              <p>&nbsp;</p>
              <p align='center'>( OKE SANTIKA )</p>
              <p align='center'>Manager SDM &amp; Umum</p>
            </td>
          </tr>
        </tbody>
      </table>


    </form>
  </div>

  <div class="container-lg text-center mt-4 mb-4">
    <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button>
    <button name="Selanjutnya" class="btn btn-success">Selanjutnya</button>
  </div>

  <script>
    function Cetakan() {
      var x = document.getElementsByName("cetak");
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "hidden";
      }
      window.print();
      alert("Jangan di tekan tombol Selanjutnya sebelum dokumen selesai tercetak!");
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "visible";
      }
    }
  </script>


</body>

</html>