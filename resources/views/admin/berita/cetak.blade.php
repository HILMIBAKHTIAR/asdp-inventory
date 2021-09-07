<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Cetak SPPBJ</title> --}}
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

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


            <table width="910" class="border1" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
                <tbody>
                    <tr>
                        <td class="border1" style="width: 208.641px;" rowspan="4"><img
                                src="{{ url('backend/img/asdp.svg') }}" alt=""></td>
                        <td class="border1" align="center"
                            style="width: 872.359px; border-right: 0px; font-size: 14.0pt; font-family: FrutigerExt-Normal; color: black;"
                            rowspan="4"><strong>BUKTI SERAH TERIMA BARANG</strong></td>
                        <td class="border1" style="width: 133px;"><strong>No. Dokumen</strong></td>
                        <td class="border1" style="width: 198px;">:&nbsp;<strong>LOG-102.00.02</strong></td>
                    </tr>
                    <tr>
                        <td class="border1" style="width: 133px;"><strong>Revisi</strong></td>
                        <td class="border1" style="width: 198px;">:&nbsp;<strong>00</strong></td>
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

            <table class="border1" width="910" border="1" align="center" cellpadding="0" cellspacing="0"
                style="width: 1011px;">
                <tbody>
                    <tr class="border1" style="height: 30px;">
                        <td class="border1"
                            style="width: 378.812px; height: 30px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Kepada Yth&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            :&nbsp;{{ $berita->karyawanBerita->jabatan->nama_jabatan }}</td>
                        <td class="border1"
                            style="width: 436.188px; height: 30px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Nomor&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            :&nbsp;SPBJ.{{ $sp2bj->nomor_surat }}/UM/ASDP-KTP/2021</td>
                    </tr>
                    <tr style="height: 111px;">
                        <td class="border1"
                            style="width: 378.812px; height: 111px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Alamat Tujuan&nbsp; &nbsp; &nbsp; :&nbsp;{{ $berita->alamat_tujuan }}</td>
                        <td class="border1"
                            style="width: 436.188px; height: 111px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Tanggal&nbsp; &nbsp; &nbsp; &nbsp;
                            :&nbsp;{{ tanggal_indonesia($berita->tanggal_surat) }}</td>
                    </tr>
                    <tr style="height: 58.5px;">
                        <td class="border1"
                            style="width: 815px; height: 58.5px; font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;"
                            colspan="2">&nbsp;Dasar Pengiriman No. / Kontrak/ SPBJ / Permintaan (jika ada) :</td>
                    </tr>
                </tbody>
            </table>
            <br>

            <table width="910" border="1" align="center" cellpadding="0" cellspacing="0"
                style="width: 1014px; border-color: black;">
                <thead>
                    <tr class="text-center">
                        <th class="border1">No</th>
                        <th class="border1" style="width: 18%;">Nama / Uraian Barang</th>
                        <th class="border1" style="width: 15%;">Jenis / Type / Part Number</th>
                        <th class="border1" style="width: 20%;">Satuan</th>
                        <th class="border1" style="width: 10%;">Jumlah</th>
                        <th colspan="2" style="width: 20%;" class="border1">Harga Barang</th>
                        <th colspan="2" style="width: 20%;" class="border1">Jumlah Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sp2bj->barang as $item)
                        <tr>
                            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;"
                                class="border1 text-center">
                                <p style="margin: 2px;">{{ $loop->iteration }}</p>
                            </td>
                            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;"
                                class="border1 text-center">
                                <p style="margin: 2px;">{{ $item->nama_barang }}</p>
                            </td>
                            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;"
                                class="border1 text-center">
                                <p style="margin: 2px;">{{ $item->spesifikasi }}</p>
                            </td>
                            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;"
                                class="border1 text-center">
                                <p style="margin: 2px;">{{ $item->satuan->nama_satuan }}</p>
                            </td>
                            <td style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;"
                                class="border1 text-center">
                                <p style="margin: 2px;">{{ $item->jumlah }}</p>
                            </td>
                            <td class="right-border"
                                style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                                <p style="margin: 2px;">Rp. </p>
                            </td>
                            <td class="left-border text-end"
                                style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                                <p style="margin: 2px;">{{ number_format($item->harga_satuan, 0, ',', '.') }},00</p>
                            </td>
                            <td class="right-border"
                                style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                                <p style="margin: 2px;">Rp. </p>
                            </td>
                            <td class="left-border text-end"
                                style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                                <p style="margin: 2px;">
                                    {{ number_format($item->harga_satuan * $item->jumlah, 0, ',', '.') }},00</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="7" class="bottom-none text-end"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Jumlah Rp&nbsp;
                        </td>
                        <td class="right-border"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">
                                {{ number_format(
    $sp2bj->barang->map(function ($el) {
            return $el->harga_satuan * $el->jumlah;
        })->sum(),
    0,
    ',',
    '.',
) }}
                                ,00
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="top-bottom-none text-end"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <input id="ppn" onclick="cekPpn()" type="checkbox">&nbsp;PPN 10%&nbsp;
                        </td>
                        <td class="right-border"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p id="ppnAwal" style="margin: 2px; display:none">
                                {{number_format(($subtotal * 10/100),0, ',', '.')}},00
                            </p>
                            <p id="noPpnAwal" style="margin: 2px;">
                                -
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="top-none text-end"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            &nbsp;Total Harga%&nbsp;
                        </td>
                        <td class="right-border"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p style="margin: 2px;">Rp. </p>
                        </td>
                        <td class="left-border text-end"
                            style="font-size: 12.0pt; font-family: FrutigerExt-Normal; color: black;">
                            <p id="totalppn" style="margin: 2px; display:none">
                                {{number_format($subtotal + ($subtotal * 10/100),0, ',', '.')}},00
                            </p>
                            <p id="nototalppn" style="margin: 2px;">
                                {{number_format($subtotal,0, ',', '.')}},00
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>

            <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
                <tbody>
                    <tr>
                        <td style="width: 818.469px;">
                            <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">
                                &nbsp;<strong>CATATAN&nbsp; &nbsp;:</strong></p>
                            <p>&nbsp;</p>
                            <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">)* Kondisi :
                                Baru, Bekas, Baik atau Rusak&nbsp;</p>
                        </td>
                    </tr>
                </tbody>
            </table>


            <br>



            <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
                <tbody>
                    <tr>
                        <td style="width: 255px;">
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Penerima,</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Staf
                                    Umum</span></p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">(<u>{{ $berita->tanda1->nama_karyawan }}</u>)</span>
                            </p>
                        </td>
                        <td style="width: 292.091px;">
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Mengetahui,</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Manager
                                    SDM &amp; Umum</span></p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">(<u>{{ $berita->tanda2->nama_karyawan }}</u>)</span>
                            </p>
                        </td>
                        <td style="width: 270.909px;">
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Pengirim,</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Staf SDM
                                    &amp; Umum</span></p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span>
                            </p>
                            <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US"
                                    style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">(<u>{{ $berita->tanda3->nama_karyawan }}</u>)</span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <div class="container-lg text-center mt-4 mb-4">
        <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary"
            style="margin-right: 4cm;">cetak</button>
        <a href="{{ url('admin/spm/create') }}" name="Selanjutnya" class="btn btn-success">Selanjutnya</a>
    </div>

    <script>
        function cekPpn() {
          var checkBox = document.getElementById("ppn");
          var ppnAwal = document.getElementById("ppnAwal");
          var noPpnAwal = document.getElementById("noPpnAwal");
          var totalppn = document.getElementById("totalppn");
          var nototalppn = document.getElementById("nototalppn");
          if (checkBox.checked == true){
            ppnAwal.style.display = "block";
            totalppn.style.display = "block";
            noPpnAwal.style.display = "none";
            nototalppn.style.display = "none";
          } else {
            ppnAwal.style.display = "none";
            totalppn.style.display = "none";
            noPpnAwal.style.display = "block";
            nototalppn.style.display = "block";
          }
        }
    </script>

    <script>
        function Cetakan() {
            var x = document.getElementsByName("cetak");
            for (i = 0; i < x.length; i++) {
                x[i].style.visibility = "hidden";
            }
            var css = '@page { size: portrait; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet){
            style.styleSheet.cssText = css;
            } else {
            style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);
            window.print();
            alert("Jangan di tekan tombol Selanjutnya sebelum dokumen selesai tercetak!");
            for (i = 0; i < x.length; i++) {
                x[i].style.visibility = "visible";
            }
        }
    </script>


</body>

</html>
