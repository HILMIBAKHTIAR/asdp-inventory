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
    .border1 {
      border: 1px solid black;
      border-collapse: collapse;
    }

    .no-bottom-border {
      border: 1px solid black;
      border-bottom: none;
      border-top: none;
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


      <table width="910" class="border1" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
          <tr>
            <td class="border1" style="width: 208.641px;" rowspan="4"><img src="{{url('backend/img/asdp.svg')}}" alt=""></td>
            <td class="border1" align="center" style="width: 872.359px; border-right: 0px; font-size: 14.0pt; font-family: FrutigerExt-Normal; color: black;" rowspan="4"><strong>FORMULIR VERIFIKASI PEMBELIAN TUNAI UNIT KERJA</strong></td>
            <td class="border1" style="width: 133px;"><strong>No. Dokumen</strong></td>
            <td class="border1" style="width: 198px;">:&nbsp;<strong>KP-104.00.03</strong></td>
          </tr>
          <tr>
            <td class="border1" style="width: 133px;"><strong>Revisi</strong></td>
            <td class="border1" style="width: 198px;">:&nbsp;<strong>02</strong></td>
          </tr>
          <tr>
            <td class="border1" style="width: 133px;"><strong>Berlaku Efektif</strong></td>
            <td class="border1" style="width: 198px;">:&nbsp;<strong>4 September 2021</strong></td>
          </tr>
          <tr>
            <td class="border1" style="width: 133px;"><strong>Halaman</strong></td>
            <td class="border1" style="width: 198px;">:&nbsp;<strong>1 dari 1</strong></td>
          </tr>
        </tbody>
      </table>


      <br>


      <table width="910" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
          <tr>
            <td class="text-center" style="width: 1293.58px;"><strong style="font-size: 14.0pt; font-family: FrutigerExt-Normal; color: black;">FORMULIR VERIFIKASI PEMBELIAN TUNAI UNIT KERJA</strong></td>
          </tr>
        </tbody>
      </table>

      <p>&nbsp;</p>

      <table width="910" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
          <tr>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 249px;">Nama</td>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 1043.74px;">:&nbsp;{{$verspm->karyawan->nama_karyawan}}</td>
          </tr>
          <tr>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 249px;">Jenis Pekerjaan</td>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 1043.74px;">:&nbsp;REIMBURSEMENT </td>
          </tr>
          <tr>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 249px;">Uraian Pekerjaan</td>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 1043.74px;">: {{$verspm->uraian_pekerjaan}}</td>
          </tr>
          <tr>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 249px;">Anggaran Tahun</td>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 1043.74px;">: {{ date('Y', strtotime($verspm->tahun_anggaran)) }}</td>
          </tr>
          <tr>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 249px;">Penanggung Jawab Anggaran</td>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 1043.74px;">: Divisi {{$spm->devisi}}</td>
          </tr>
          <tr>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 249px;">Verifikator</td>
            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 1043.74px;">:&nbsp;{{$verspm->veri->nama_karyawan}}</td>
          </tr>
        </tbody>
      </table>

      <br>

      <table width="910" class="border1" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
          <tr style="height: 23.2695px;">
            <td class="border1 text-center" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 15px; height: 23.2695px; margin: 4px;">No</td>
            <td class="border1 text-center" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 317px; height: 23.2695px; margin: 4px;">Jenis Dokumen</td>
            <td class="border1 text-center" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 270px; height: 23.2695px; margin: 4px;">&nbsp;Nomor Dokumen</td>
            <td class="border1 text-center" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 289.051px; height: 23.2695px; margin: 4px;">&nbsp;Tanggal Dokumen</td>
            <td class="border1 text-center" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 284.949px; height: 23.2695px; margin: 4px;">&nbsp;Total Harga</td>
            <td class="border1 text-center" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 421px; height: 23.2695px; margin: 4px;">&nbsp;Keterangan</td>
          </tr>
          <tr style="height: 23px;">
            <td class="no-bottom-border text-center" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 15px; height: 23px;">
              <p style="margin: 12px;">1</p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 25%; height: 23px;">
              <p style="margin: 12px;">Dokumen Yang mendasari Biaya</p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 25%; height: 23px;">
              <p style="margin: 12px;">SPPBJ.{{$sp2bj->nomor_surat}}/UM/ASDP-KTP/<?= date('Y') ?></p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 267.051px; height: 23px;">
              <p style="margin: 12px;">{{tanggal_indonesia($sp2bj->tanggal_surat)}}</p>
            </td>
            <td class="no-bottom-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 284.949px; height: 23px;">
              <p style="margin: 12px;">Rp.
                {{number_format(
        $sp2bj->barang->map(
          function($el)
          {
            return $el->harga_satuan * $el->jumlah;
          }
        )->sum(), 0,',','.')
      }},00
              </p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 421px; height: 23px;">
              <p style="margin: 12px;"></p>
            </td>
          </tr>
          <tr>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px;">2</p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px;">BUKTI PENERIMAAN BARANG/JASA (BPB/J)</p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px;"></p>&nbsp;&nbsp;&nbsp;SPBJ.{{$sp2bj->nomor_surat}}/UM/ASDP-KTP/<?= date('Y') ?>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px;">{{tanggal_indonesia($berita->tanggal_surat)}}</p>
            </td>
            <td class="no-bottom-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 284.949px; height: 23px;">
              <p style="margin: 12px;">Rp.
                {{number_format(
        $sp2bj->barang->map(
          function($el)
          {
            return $el->harga_satuan * $el->jumlah;
          }
        )->sum(), 0,',','.')
      }},00
              </p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px"></p>
            </td>
          </tr>
          <tr>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px;">3</p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px;">SURAT PERNYATAAN KEBENARAN HARGA <br>
                <small style="font-size: 10.0pt;">Di Tanda Tangani oleh penanggung jawab dan mengetahui pimpinan unit terkait</small>
              </p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px;"></p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              @if (isset($skb->tanggal_surat))
              <p style="margin: 12px;">
                {{tanggal_indonesia($skb->tanggal_surat)}}
              </p>
              @else
              <p style="margin: 12px;"></p> 
              @endif
            </td>
            <td class="no-bottom-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 284.949px; height: 23px;">
              <p style="margin: 12px;">Rp.
                {{number_format(
        $sp2bj->barang->map(
          function($el)
          {
            return $el->harga_satuan * $el->jumlah;
          }
        )->sum(), 0,',','.')
      }},00
              </p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px;">
              <p style="margin: 12px"></p>
            </td>
          </tr>
          <tr>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px; height: 5cm;">
              <p style="margin: 12px;"></p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px; height: 5cm;">
              <p style="margin: 12px;"></p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px; height: 5cm;">
              <p style="margin: 12px;"></p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px; height: 5cm;">
              <p style="margin: 12px;"></p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px; height: 5cm;">
              <p style="margin: 12px"></p>
            </td>
            <td class="no-bottom-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; margin-bottom:60px; height: 5cm;">
              <p style="margin: 12px"></p>
            </td>
          </tr>
          <tr style="height: 23px;">
            <td class="border1 text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 15px; height: 23px;" colspan="4">
              <p style="margin: 12px;"></p>
            </td>
            <td class="border1 text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black; width: 284.949px; height: 23px;">
              <p style="margin: 12px;">
                
              </p>
            </td>
            <td class="border1" style="width: 421px; height: 23px;">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <br><br>
      <table width="910" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
          <tr>
            <td style="font-size: 14.0pt; font-family: FrutigerExt-Normal; color: black; width: 622.938px;">KETAPANG, {{tanggal_indonesia($verspm->tanggal_surat)}}</td>
            <td style="width: 651.062px;">&nbsp;</td>
          </tr>
          <tr>
            <td style="width: 622.938px;">
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Diperiksa,</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Manager SDM &amp; UMUM</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{$verspm->tanda1->nama_karyawan}}</span></p>
            </td>
            <td style="width: 651.062px;">
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Pembuat,</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Verifikator</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{$verspm->tanda2->nama_karyawan}}</span></p>
            </td>
          </tr>
        </tbody>
      </table>


      <br>

    </form>
  </div>

  <div class="container-lg text-center mt-4 mb-4">
    <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button>
    <a href="{{url('admin/sp2bj/create')}}" name="Selanjutnya" class="btn btn-success">Selesai</a>
  </div>

  <script>
    function Cetakan() {
      var x = document.getElementsByName("cetak");
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "hidden";
      }
      window.print();
      alert("Jangan di tekan tombol Selesai sebelum dokumen selesai tercetak!");
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "visible";
      }
    }
  </script>


</body>

</html>