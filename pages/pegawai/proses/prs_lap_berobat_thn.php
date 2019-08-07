<?php
  session_start(); //Mendapatkan Session
  include('../../../connection/config.php');
  $tahun = $_POST['tahun'];

  date_default_timezone_set('Asia/Jakarta');
  function tglIndonesia($str){
        $tr   = trim($str);
        $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
        return $str;
    }

  ob_start();
  //Report
  require ("../../../html2pdf/html2pdf.class.php");
  $content = ob_get_clean();

  $content.= "
  <style>
  p.kop{
    margin-left:45px;
  }
  </style>
  <table class='kop'>
  <tr>
    <td align='center' width='100'><img src='../../../images/logo.png' width='80' height='80'></td>
    <td width='635'>
      <h4 align='center'>RUMAH SAKIT DAAN MOGOT</h4>
      <p class='kop'> Jalan Daan Mogot No.59, Sukarasa, Kecamatan Tangerang, Sukarasa, Kec. Tangerang, Kota Tangerang, Banten 15111</p>
    </td>
  </tr>
  </table> <br>
  <hr> <br>
  <h4 align='center'>Data Ber-obat</h4>
  <h5  align='center'>Tahun: $tahun</h5>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
      <tr bgcolor='#CCCCCC'>
        <th style='width: 50px; height: 20px'>#</th>
        <th style='width: 150px;'>ID Daftar</th>
        <th style='width: 390px;'>Nama Pasien</th>
        <th style='width: 150px;'>Tanggal Ber-obat</th>
      </tr>";
      // Menampilkan data
      $query = mysql_query("SELECT a.*, b.nm_pasien
                FROM daftar a 
                JOIN pasien b ON a.id_pasien=b.id_pasien
                WHERE YEAR(a.tgl_berobat)='$tahun'");
      $no = 1; // nomor baris
      while ($r = mysql_fetch_array($query)) {
      $content.="<tr bgcolor='#FFFFFF'>
        <td>$no</td>
        <td>$r[id_daftar]</td>
        <td style='text-transform:capitalize'>$r[nm_pasien]</td>
        <td style='text-align:center'>$r[tgl_berobat]</td>
      </tr>";
      $no++;
      }
    $content.="</table></p><br><br>";

  $filename="Laporan Pasien ".date('d-m-y').".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

  ob_end_clean();
  // conversion HTML => PDF
  try
  {
    $html2pdf = new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->pdf->IncludeJS('print(TRUE)');
    $html2pdf->Output($filename);
  }
  catch(HTML2PDF_exception $e) { echo $e; }
?>

