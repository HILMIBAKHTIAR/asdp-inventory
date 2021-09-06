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
            th {
                background-color: antiquewhite;
                -webkit-print-color-adjust: exact; 
            }
        }

    </style>

    <style type="text/css" media="print">
        @media print {
            @page {
                transform: scale(1.0);
            }

        }

    </style>

    <div class="print-area">


        <form>

                <p style="font-size: 9.0pt; font-family: FrutigerExt-Normal; color: black; margin:auto;">
                    Daftar Nominatif Karyawan Pt Asdp Indonesia Ferry (Persero) <br>
                    Cabang KETAPANG <br>
                    Bulan : {{date('M-y', strtotime($today))}} <br>
                </p>
            <table class="border1" align="center" cellpadding="0" cellspacing="0" style="width: 1380px; ">
                <thead>
                    <tr>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">NO</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">Nama Karyawan/<br>Nik</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">Tempat/Tgl<br>Lahir</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">Usia<br>(Th)</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">Status<br>Keluarga</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">MKE/TMT Kerja</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">SK.Capeg</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">Jabatan</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">Masa Kerja Jabatan/<br>TMT Jabatan</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">Pendidikan<br>Terakhir</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">No.Induk<br>Kependudukan</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">No.BPJS<br>Ketenagakerjaan</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">No.BPJS<br>Kesehatan</p></th>
                        <th style="background-color: antiquewhite;font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;" class="border1 text-center warna"><p style="margin: 2px;">No.Peserta Wajib Pajak<br>(NPWP)</p></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawan as $i=>$row)
                    <tr>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{++$i}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;">{{$row->nama_karyawan}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->tempat_lahir}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->usia}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->status_keluarga}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->masa_kerja}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">SK. {{$row->sk}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->jabatan}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->masa_jabatan}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->pendidikan}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->nik_ktp}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->no_bpjs_ketenagakerjaan}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->no_bpjs_kesehatan}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->no_npwp}}</p></td>
                    </tr>
                    <tr>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;">{{$row->nik}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{tanggal_indonesia($row->tanggal_lahir)}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{tanggal_indonesia($row->tanggal_masuk_kerja)}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{tanggal_indonesia($row->tanggal_pilih_jabatan)}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p class="text-center" style="margin: 2px;">{{$row->jurusan}}</p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                        <td class="border1" style="font-size: 7.0pt; font-family: FrutigerExt-Normal; color: black;"><p style="margin: 2px;"></p></td>
                    </tr>
                    @endforeach
            </table>

            
        </form>
    </div>

    <div class="container-lg text-center mt-4 mb-4">
        <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary"
            style="margin-right: 4cm;">cetak</button>
        <a href="{{ url('admin/karyawan') }}"class="btn btn-success">Kembali</a>
    </div>

    <script>
        function Cetakan() {
            var x = document.getElementsByName("cetak");
            for (i = 0; i < x.length; i++) {
                x[i].style.visibility = "hidden";
            }
            var css = '@page { size: landscape; }',
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
