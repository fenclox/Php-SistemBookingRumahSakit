<?php
  session_start();
  //Mendapatkan Session
  ob_start();
  include('../../../connection/config.php');
  
  $id  = $_POST['iddft'];
  
  // Menampilkan data
  $sql=mysql_query("select a.*, b.*, c.nm_poli, d.ruang from daftar a, pasien b, poliklinik c, detil_jadwal d where id_daftar='$id' and a.id_pasien=b.id_pasien");
  $r=mysql_fetch_array($sql);

  //Report
  require ("../../../html2pdf/html2pdf.class.php");
  $content = ob_get_clean();
  $content.= "
  <table align='center'>
  <tr>
    <td style='width:120px'><img align='center' src='../../../images/logo.png' width='80' heigth='80'></td>
    <td><h3 align='center'>RUMAH SAKIT DAAN MOGOT</h3></td>
  </tr>
  </table><br><hr>

  <style>
  td{
    text-align='left'; 
    font-size:15px; 
    font-weight:800;
    font-family:verdana;
    padding:7px;
  }
  </style>
  
  <br>
  <table>
    <tr>
      <td>ID Daftar</td>
      <td>:</td>
      <td>$r[id_daftar]</td>
    </tr>
    <tr>
      <td>Nama Pasien</td>
      <td>:</td>
      <td style='text-transform:capitalize'>$r[nm_pasien]</td>
    </tr>
    <tr>
      <td>No. Antrian</td>
      <td>:</td>
      <td>$r[no_antrian]</td>
    </tr>
    <tr>
      <td>Tgl. Ber-obat</td>
      <td>:</td>
      <td>$r[tgl_berobat]</td>
    </tr>
    <tr>
      <td>Poliklinik</td>
      <td>:</td>
      <td style='text-transform:capitalize'>$r[nm_poli]</td>
    </tr>
    <tr>
      <td>Ruang</td>
      <td>:</td>
      <td style='text-transform:capitalize'>$r[ruang]</td>
    </tr>
    <tr>
      <td>Tgl. Daftar</td>
      <td>:</td>
      <td>$r[tgl_daftar]</td>
    </tr>
  </table><br><br>";

  $filename="RS DaanMogot - Daftar Berobat.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

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

