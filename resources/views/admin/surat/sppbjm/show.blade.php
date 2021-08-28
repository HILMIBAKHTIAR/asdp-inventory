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

        .top-none {
            border: 1px solid black;
            border-top: none;
            border-collapse: collapse;
        }

        .bottom-none {
            border: 1px solid black;
            border-bottom: none;
            border-collapse: collapse;
        }

        .top-bottom-none {
            border: 1px solid black;
            border-top: none;
            border-bottom: none;
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


            <table class="border1" width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
                <tbody>
                    <tr>
                        <td class="border1" style="width: 208.641px;" rowspan="4"><img src="{{ url('backend/img/asdp.svg') }}" alt=""></td>
                        <td class="border1" align="center" style="width: 872.359px; border-right: 0px;" rowspan="4">
                            <strong>FORMULIR PERMINTAAN PENGADAAN BARANG/JASA (SPPB/J)</strong>
                        </td>
                        <td class="border1" style="width: 133px;"><strong>No. Dokumen</strong></td>
                        <td class="border1" style="width: 198px;">:&nbsp;<strong>PBJ-101.00.02</strong></td>
                    </tr>
                    <tr>
                        <td class="border1" style="width: 133px;"><strong>Revisi</strong></td>
                        <td class="border1" style="width: 198px;">:&nbsp;<strong>05</strong></td>
                    </tr>
                    <tr>
                        <td class="border1" style="width: 133px;"><strong>Berlaku Efektif</strong></td>
                        <td class="border1" style="width: 198px;">:&nbsp;<strong>4 September 2021</strong></td>
                    </tr>
                    <tr>
                        <td class="border1" style="width: 133px;"><strong>Halaman</strong>
                        </td>
                        <td class="border1" style="width: 198px;">:&nbsp;<strong>1 dari 1</strong></td>
                    </tr>
                </tbody>
            </table>

            <table class="mt-1" width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1014px; border-color: black;">
                <tbody>
                    <tr style="height: 23px;">
                        <td class="right-border" style="width: 273.719px; height: 23px;"><strong>Kepada</strong></td>
                        <td class="left-border" style="width: 474.281px; height: 23px;"><strong>&nbsp;General Cabang
                                Ketapang</strong></td>
                        <td class="border1" style="width: 313px; height: 23px;"><strong>No.SPPB/J :
                                {{ $data_sppbjm->nomor_surat }}/UM/ASDP-KTP/<?= date('Y') ?></strong></td>
                    </tr>

                    <tr style="height: 23px;">
                        <td class="right-border" style="width: 273.719px; height: 23px;"><strong>Dari</strong></td>
                        <td class="left-border" style="width: 474.281px; height: 23px;">
                            <strong>&nbsp;{{ $data_sppbjm->karyawan->jabatan }}</strong>
                        </td>
                        <td class="border1" style="width: 313px; height: 23px;">
                            <strong>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                {{ tanggal_indonesia($data_sppbjm->tanggal_surat) }}</strong>
                        </td>
                    </tr>

                    <tr style="height: 23px;">
                        <td class="right-border" style="width: 273.719px; height: 23px;"><strong>Klasifikasi</strong>
                        </td>
                        <td class="left-border" style="width: 787.281px; height: 23px;" colspan="2"><strong>&nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox"> Normal&nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; <input type="checkbox"> Emergency&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox">
                                Urgent</strong></td>
                    </tr>

                    <tr style="height: 23px;">
                        <td class="right-border" style="width: 273.719px; height: 23px;"><strong>Dasar Pelimpahan*
                                (*Jika ada)</strong></td>
                        <td class="left-border" style="width: 787.281px; height: 23px;" colspan="2">&nbsp;</td>
                    </tr>

                    <tr style="height: 23.5px;">
                        <td class="right-border" style="width: 273.719px; height: 23.5px;"><strong>Nama
                                Pengadaan</strong></td>
                        <td class="left-border" style="width: 787.281px; height: 23.5px;" colspan="2">
                            <strong>&nbsp;{{ $data_sppbjm->nama_pengadaan }}</strong>
                        </td>
                    </tr>

                    <tr style="height: 23px;">
                        <td class="right-border" style="width: 273.719px; height: 23px;"><strong>Mata Anggaran</strong>
                        </td>
                        <td class="left-border" style="width: 787.281px; height: 23px;" colspan="2">
                            <strong>&nbsp;{{ $data_sppbjm->mataanggaran->nomor }} -
                                ({{ $data_sppbjm->mataanggaran->keterangan }})</strong>
                        </td>
                    </tr>

                    <tr style="height: 23px;">
                        <td class="right-border" style="width: 273.719px; height: 23px;"><strong>Tanggal
                                Dibutuhkan</strong></td>
                        <td class="left-border" style="width: 787.281px; height: 23px;" colspan="2">
                            <strong>&nbsp;{{ $data_sppbjm->bulan_dibutuhkan }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table width="910" align="center" cellpadding="0" cellspacing="0" style="width: 1014px; border-color: black; margin-top: 1px;">
                <thead>
                    <tr class="text-center">
                        <th class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">No
                        </th>
                        <th class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            Jumlah
                        </th>
                        <th class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            Satuan
                        </th>
                        <th class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            Nama Barang
                        </th>
                        <th class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            Spesifikasi
                        </th>
                        <th colspan="2" class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">Harga Satuan
                        </th>
                        <th colspan="2" class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">Jumlah
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data_sppbjm->barangSp2bj as $item)
                    <tr>
                        <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1">
                            <p align="center" style="margin: 2px;">{{ $loop->iteration }}</p>
                        </td>
                        <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1">
                            <p style="margin: 2px;">{{ $item->jumlah }}</p>
                        </td>
                        <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1">
                            <p style="margin: 2px;">{{ $item->satuan }}</p>
                        </td>
                        <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1">
                            <p style="margin: 2px;">{{ $item->nama_barang }}</p>
                        </td>
                        <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1">
                            <p style="margin: 2px;">{{ $item->spesifikasi }}</p>
                        </td>
                        <td class="right-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">{{ number_format($item->harga_satuan, 0, ',', '.') }},00</p>
                        </td>
                        <td class="right-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">
                                {{ number_format($item->harga_satuan * $item->jumlah, 0, ',', '.') }},00
                            </p>
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="7" class="bottom-none text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Jumlah Rp&nbsp;
                        </td>
                        <td class="right-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">
                                {{number_format($subtotal,0, ',', '.')}},00
                            </p>
                        </td>
                    </tr>

                    <tr>

                        <td colspan="7" class="top-bottom-none text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <input id="ppn" onclick="cekPpn()" type="checkbox"> &nbsp;PPN 10%&nbsp;
                        </td>

                        <td class="right-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p id="ppnAwal" style="margin: 2px; display:none">
                                {{number_format(($subtotal * 10/100),0, ',', '.')}},00
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="top-none text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Total Harga%&nbsp;
                        </td>
                        <td class="right-border" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p id="totalppn" style="margin: 2px; display:none">
                                {{number_format($subtotal + ($subtotal * 10/100),0, ',', '.')}},00
                            </p>
                        </td>
                    </tr>

                </tbody>
            </table>


            <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1014px; margin-top: 2px;">
                <tbody>
                    <tr>
                        <td class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" style="width: 613.266px;"><strong>Catatan Peminta Barang &amp; Jasa :
                                {{ $data_sppbjm->catatan_peminta }}</strong></td>
                        <td class="border1" style="width: 394.734px;">
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">Tgl&nbsp;
                                {{ tanggal_indonesia($data_sppbjm->tanggal_surat) }}
                            </p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                Peminta Barang/Jasa</p>
                            <p>&nbsp;</p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                ( {{ $data_sppbjm->tanda1->nama_karyawan }} )</p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                Manager SDM &amp; Umum</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" style="width: 613.266px;"><strong>Catatan : {{ $data_sppbjm->catatan }}</strong></td>
                        <td class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" style="width: 394.734px;">
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">Tgl&nbsp;
                                {{ tanggal_indonesia($data_sppbjm->tanggal_surat) }}
                            </p>
                            <p>&nbsp;</p>
                            <p align='center'>( {{ $data_sppbjm->tanda2->nama_karyawan }} )</p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                General Manager Cabang Ketapang</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="border1" style="width: 613.266px; font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <strong>Catatan Ketersediaan Anggaran : {{ $data_sppbjm->catatan_anggaran }}</strong>
                        </td>
                        <td class="border1" style="width: 394.734px;">
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">Tgl&nbsp;
                                {{ tanggal_indonesia($data_sppbjm->tanggal_surat) }}
                            </p>
                            <p>&nbsp;</p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                ( {{ $data_sppbjm->tanda3->nama_karyawan }} )</p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                Manager Keuangan</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="border1" style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" width: 613.266px;"><strong>Catatan Ketersediaan Stok :
                                {{ $data_sppbjm->catatan_stok }}</strong>
                        </td>
                        <td class="border1" style="width: 394.734px;">
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">Tgl&nbsp;
                                {{ tanggal_indonesia($data_sppbjm->tanggal_surat) }}
                            </p>
                            <p>&nbsp;</p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                ( {{ $data_sppbjm->tanda4->nama_karyawan }} )</p>
                            <p style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;" align='center'>
                                Manager SDM &amp; Umum</p>
                        </td>
                    </tr>
                </tbody>
            </table>


        </form>
    </div>

    <div class="container-lg text-center mt-4 mb-4">
        <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button>
        <a href="{{url('admin/sppbjm/')}}" class="btn btn-success">
            Kembali
        </a>
    </div>



    <script>
        function cekPpn() {
          var checkBox = document.getElementById("ppn");
          var ppnAwal = document.getElementById("ppnAwal");
          var totalppn = document.getElementById("totalppn");
          if (checkBox.checked == true){
            ppnAwal.style.display = "block";
            totalppn.style.display = "block";
          } else {
            ppnAwal.style.display = "none";
            totalppn.style.display = "none";
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

    {{-- js boostrap 5.1 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>


</body>
{{-- js boostrap 5.1 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</html>