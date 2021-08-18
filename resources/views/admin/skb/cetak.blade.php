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
      </style>

</head>
<body data-new-gr-c-s-check-loaded="14.1024.0" data-gr-ext-installed="">

  <style>
    @media print{
      body *{
        visibility: hidden;
      }

      .print-area * {
        visibility: visible;
      }
    }
  </style>

<style type="text/css" media="print">
  @media print
  {
     @page {
       margin-top: 0;
       margin-bottom: 0;
     }
     body  {
       padding-top: 60px;
       padding-bottom: 60px ;
     }
  } 
</style>

  <div class="print-area">

  
    <form>

      <table width="910" border="1" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
        <tr>
        <td class="border1" style="width: 208.641px;" rowspan="4"><img src="{{url('backend/img/asdp.svg')}}" alt="" /></td>
        <td class="border1" style="width: 872.359px; border-right: 0px; font-size: 14.0pt; font-family: FrutigerExt-Normal; color: black;" rowspan="4" align="center"><strong>FORMULIR SURAT PERNYATAAN KEBENARAN HARGA</strong></td>
        <td class="border1" style="width: 133px;"><strong>No. Dokumen</strong></td>
        <td class="border1" style="width: 198px;">:&nbsp;<strong>PBJ-101.00.19</strong></td>
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
        <td class="border1" style="width: 133px;"><strong>Halaman</strong></td>
        <td class="border1" style="width: 198px;">:&nbsp;<strong>1 dari 1</strong></td>
        </tr>
        </tbody>
        </table >

        <p>&nbsp;</p>

        <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody align="center">
        <tr style="height: 39.2074px;">
        <td style="width: 1362.67px; height: 39.2074px;">
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">SURAT PENYATAAN KEBENARAN HARGA</p>
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">DENGAN NILAI DIBAWAH Rp. 25 Juta</p>
        </td>
        </tr>
        </tbody>
        </table>

        <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
        <tbody>
        <tr style="height: 223.29px;">
        <td style="width: 1362.67px; height: 223.29px;">
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Saya yang bertanda tangan dibawah ini :</p>
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sp2bj->karyawan->nama_karyawan}}</p>
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sp2bj->karyawan->jabatan}}</p>
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Nik&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sp2bj->karyawan->nik}} </p>
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Selanjutnya dinyatakan sebagai &rdquo;Pembuat Pernyataan&rdquo;</p>
        <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Dengan ini menyatakan dengan sebenar-benarnya hal-hal sebagai berikut :</p>
        <ol>
        <li style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Bahwa Pemberi Pernyataan menyatakan dengan sesungguhnya dan sejujur-jujurnya bahwa harga yang tertera di bawah ini benar adanya dan dapat dikonfirmasi di {{$skb->alamat_tujuan}} dengan telepon : {{$skb->no_telp}}</li>
        </ol>
        </td>
        </tr>
        </tbody>
        </table>

        <table width="910" border="1" align="center" cellpadding="0" cellspacing="0" style="width: 1014px; border-color: black;">
        <thead>
          <tr class="text-center">
            <th class="border1">No</th>
            <th class="border1">Jumlah</th>
            <th class="border1">Satuan</th>
            <th class="border1">Nama Barang</th>
            <th class="border1">Spesifikasi</th>
            <th class="border1">Harga Satuan</th>
            <th class="border1">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sp2bj->barang as $item)
          <tr>
            <td class="border1"><p align="center" style="margin: 4px;">{{$loop->iteration}}</p></td>
            <td class="border1"><p style="margin: 4px;">{{$item->jumlah}}</p></td>
            <td class="border1"><p style="margin: 4px;">{{$item->satuan}}</p></td>
            <td class="border1"><p style="margin: 4px;">{{$item->nama_barang}}</p></td>
            <td class="border1"><p style="margin: 4px;">{{$item->spesifikasi}}</p></td>
            <td class="border1"><p style="margin: 4px;">Rp. {{ number_format($item->harga_satuan, 0,',','.') }},00</p></td>
            <td class="border1"><p style="margin: 4px;">Rp. {{ number_format($item->harga_satuan * $item->jumlah ,0,',','.') }},00</p></td>
          </tr>
          @endforeach
          <tr>
            <td colspan="6" class="border1 text-end">
              &nbsp;Jumlah Rp&nbsp;
            </td>
            <td>
              <p style="margin: 4px;">
                Rp. 
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
          </tr>
        </tbody>
      </table>

        <br>

        <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
          <tbody>
            <tr>
              <td style="width: 1360.67px;">
                <p style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp; &nbsp; &nbsp; 2. Demikian Surat Pernyataan ini di buat&nbsp; untuk digunakan untuk pendukung pengadaan dan dijamin kebenarannya dan siap untuk dibuktikan&nbsp;kebenarannya.</p>
              </td>
            </tr>
          </tbody>
        </table>
        
        <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
          <tbody>
          <tr>
          <td style="width: 741px;">&nbsp;</td>
          <td style="width: 615.559px;">
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Ketapang, <?= date('d-m-Y')?></span></p>
          </td>
          </tr>
          </tbody>
          </table>

          <table width="910" border="0" align="center" cellpadding="0" cellspacing="0" style="width: 1011px;">
          <tbody>
          <tr>
          <td style="width: 740.958px;">
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Mengetahui :</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">General Manager</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;"><u>{{$skb->tanda1->nama_karyawan}}</u></span></p>
          </td>
          <td style="width: 616.042px;">
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">Mengetahui :</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">General Manager</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;">&nbsp;</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US">&nbsp;</span></p>
          <p style="margin: 0cm; text-align: center;" align="center"><span lang="EN-US" style="font-size: 11.0pt; font-family: FrutigerExt-Normal; color: black;"><u>{{$skb->tanda2->nama_karyawan}}</u></span></p>
          </td>
          </tr>
          </tbody>
          </table>
      
  </form>
</div>

<div class="container-lg text-center mt-4 mb-4 pt-4">
  <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button>
  <a href="{{url('admin/berita/create')}}" name="Selanjutnya" class="btn btn-success">Selanjutnya</a>
</div>

<script>
function Cetakan()
    {
    var x = document.getElementsByName("cetak");
    for(i = 0; i < x.length ; i++)
    {
            x[i].style.visibility = "hidden";
    }
    window.print();
    alert("Jangan di tekan tombol Selanjutnya sebelum dokumen selesai tercetak!");
    for(i = 0; i < x.length ; i++)
    {
            x[i].style.visibility = "visible";
    }
    }
</script>


</body>
</html>