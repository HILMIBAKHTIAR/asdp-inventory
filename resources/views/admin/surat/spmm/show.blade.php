<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <title>Cetak SPPBJ</title> --}}
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  {{-- boostrap5.1 --}}
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
    .right-border {
            border: 1px solid black;
            border-right: none;
            border-collapse: collapse;
        }

        .left-border {
            border: 1px solid black;
            border-left: none;
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

      #ppn {
        visibility: hidden;
      }

      #inputPpn {
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
            <td class="border1" align="center" style="width: 872.359px; border-right: 0px; font-size: 14.0pt; font-family: FrutigerExt-Normal; color: black;" rowspan="4"><strong>FORM SURAT PERINTAH MEMBAYAR (SPM)</strong></td>
            <td class="border1" style="width: 133px;"><strong>No. Dokumen</strong></td>
            <td class="border1" style="width: 198px;">:&nbsp;<strong>KP-104.00.01</strong></td>
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
      <br><br><br>
      <table width="910" align="center" cellpadding="0" cellspacing="2" style="width: 960px;">
        <tbody>
          <tr style="height: 23px;">
            <td style="width: 228.93px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Nomor</td>
            <td style="width: 845.07px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">: SPM.{{$data_spmm->nomor_surat_spm}}/UM/ASDP-KTP/2021</td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 228.93px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Tanggal</td>
            <td style="width: 845.07px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">: {{tanggal_indonesia($data_spmm->tanggal_surat)}}</td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 228.93px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Jenis Transaksi</td>
            <td style="width: 845.07px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">: {{$data_spmm->jenis_transaksi}}</td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 228.93px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Program</td>
            <td style="width: 845.07px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">: {{$data_spmm->program}}</td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 228.93px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Tahun Anggaran</td>
            <td style="width: 845.07px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">: {{ date('Y', strtotime($data_spmm->tahun_anggaran)) }}</td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 228.93px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Penanggung Jawab Unit Fungsi</td>
            <td style="width: 845.07px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">:&nbsp;{{$data_spmm->devisi}}</td>
          </tr>
          <tr style="height: 23.293px;">
            <td style="width: 228.93px; height: 23.293px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Pembebanan Anggaran</td>
            <td style="width: 845.07px; height: 23.293px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">: {{$data_spmm->pa->nomor}} - {{$data_spmm->pa->keterangan}}</td>
          </tr>
        </tbody>
      </table>

      <br>

      <table width="910" border="1" align="center" cellpadding="0" cellspacing="0" style="width: 960px; border-color: black;">
        <thead>
          <tr class="text-center">
            <th class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black; width:10%;">No</th>
            <th class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;" style="width: 18%;">Uraian Kegiatan</th>
            <th class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;" style="width: 15%;">Mata Anggaran</th>
            <th class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;" style="width: 20%;">Permohonan Dana</th>
            <th class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;" style="width: 20%;">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center" class="no-bottom-border" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp; 1 &nbsp;</td>
            <td class="no-bottom-border" style="width: 20%; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">
              <p style="margin: 4px">{{$data_spmm->uraian_kegiatan}}</p>
            </td>
            <td class="no-bottom-border" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;{{$data_spmm->mataanggaran->nomor}}&nbsp;</td>
            <td class="no-bottom-border" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;
              <p style="margin: 4px;">
              Rp.{{number_format($data_spmm->permohonan_dana)}},00
              </p>&nbsp;
            </td>
            <td class="no-bottom-border" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;{{$data_spmm->keterangan}}&nbsp;</td>
          </tr>

          <tr>
            <td class="no-bottom-border" style="height: 7cm;">&nbsp;</td>
            <td class="no-bottom-border" style="height: 7cm;">&nbsp;</td>
            <td class="no-bottom-border" style="height: 7cm;">&nbsp;</td>
            <td class="no-bottom-border" style="height: 7cm;">&nbsp;</td>
            <td class="no-bottom-border" style="height: 7cm;">&nbsp;</td>
          </tr>

          {{-- {{$nomor=2}}
          @foreach ($itemspm as $i)
          <tr>
            <td class="border1 text-center">{{$nomor++}}</td>
            <td class="border1" style="width: 20%; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{$i->uraian_kegiatan}}</td>
            <td class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{$i->mataanggaran->nomor}}</td>
            <td class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Rp. {{number_format($i->dana, 0,',','.')}},00</td>
            <td class="border1" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{$i->keterangan}}</td>
          </tr>
          @endforeach --}}


          <tr>

            <td class="right-border">
              <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black; margin:4px;" id="inputPpn"><input id="ppn" onclick="cekPpn()" type="checkbox">&nbsp; PPN 10% &nbsp;</p>
            </td>

            <td colspan="2" class="text-end left-border">
              <strong style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black; margin:4px;"> &nbsp;Jumlah&nbsp; </strong>
            </td>

            <td style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;" colspan="2" class="border1">
              <p id="ppnAwal" style="margin: 4px; display:none;">
                Rp.{{number_format($data_spmm->permohonan_dana + ($data_spmm->permohonan_dana * 10/100))}},00
              </p>
              <p id="noPpnAwal" style="margin: 4px;">
                Rp.{{number_format($data_spmm->permohonan_dana)}},00
              </p>
            </td>
          </tr>
        </tbody>
      </table>

      <br>

      <table width="910" align="center" cellpadding="0" cellspacing="2" style="width: 960px;">
        <tbody>
          <tr style="height: 23px;">
            <td style="width: 229.711px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Terbilang</td>
            <td style="width: 847.289px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">
              <i id="terbilangPpn" style="text-transform: capitalize; display:none;">
                :&nbsp; {{terbilang($data_spmm->permohonan_dana + ($data_spmm->permohonan_dana * 10/100)) }} rupiah
              </i>
              <i id="noTerbilangPpn" style="text-transform: capitalize;">
                :&nbsp; {{terbilang($data_spmm->permohonan_dana) }} rupiah
              </i>
            </td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 229.711px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Penerima Dana</td>
            <td style="width: 847.289px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">:&nbsp;{{$data_spmm->penerima_dana}}</td>
          </tr>
          <tr style="height: 23.543px;">
            <td style="width: 229.711px; height: 23.543px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Nomor Rek</td>
            <td style="width: 847.289px; height: 23.543px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">:&nbsp;{{$data_spmm->nomor_rekening}}</td>
          </tr>
          <tr style="height: 23px;">
            <td style="width: 229.711px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Bank</td>
            <td style="width: 847.289px; height: 23px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">:&nbsp;{{$data_spmm->bank}}</td>
          </tr>
        </tbody>
      </table>

      <br><br>

      <table width="910" align="center" cellpadding="0" cellspacing="2" style="width: 960px;">
        <tbody>
          <tr>
            <td style="width: 339px;">
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{tanggal_indonesia($data_spmm->tanggal_surat)}}</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Menyetujui,</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">General Manager</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><strong><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;"><u>{{$data_spmm->tanda1->nama_karyawan}}</u></span></strong></p>
            </td>
            <td style="width: 424px;">
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{tanggal_indonesia($data_spmm->tanggal_surat)}}</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Menyetujui,</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Manager SDM &amp; Umum</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><strong><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;"><u>{{$data_spmm->tanda2->nama_karyawan}}</u></span></strong></p>
            </td>
            <td style="width: 311.805px;">
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">{{tanggal_indonesia($data_spmm->tanggal_surat)}}</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Pembuat,</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Staf SDM &amp; Umum</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span></p>
              <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;"><strong><u>{{$data_spmm->tanda3->nama_karyawan}}</u></strong></span></p>
            </td>
          </tr>
        </tbody>
      </table>

      <br>

    </form>
  </div>

  <div class="container-lg text-center mt-4 mb-4">
    <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button>
    <a href="{{url('admin/spmm')}}" name="Kembali" class="btn btn-success">Kembali</a>

  </div>

  <script>
    function cekPpn() {
      var checkBox = document.getElementById("ppn");
      var ppnAwal = document.getElementById("ppnAwal");
      var noPpnAwal = document.getElementById("noPpnAwal");
      var terbilangPpn = document.getElementById("terbilangPpn");
      var noTerbilangPpn = document.getElementById("noTerbilangPpn");
      if (checkBox.checked == true){
        ppnAwal.style.display = "block";
        terbilangPpn.style.display = "block";
        noPpnAwal.style.display = "none";
        noTerbilangPpn.style.display = "none";
      } else {
        ppnAwal.style.display = "none";
        terbilangPpn.style.display = "none";
        noPpnAwal.style.display = "block";
        noTerbilangPpn.style.display = "block";
      }
    }
  </script>

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
{{-- js boostrap 5.1 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</html>