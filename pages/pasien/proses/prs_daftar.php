<?php
include "../../../Connection/config.php";
 date_default_timezone_set('Asia/Jakarta');
  //Proses Tambah
if(isset($_POST['daftar'])){
  $dtgl = $_POST['tanggal'];
  $tgl  = str_replace("/","-","$dtgl") ;

  $time = date('Hisymd');
  $no   = rand(0,9);
  $id   = $time.$no;
  //daftar
  $dtl  = $_POST['idDtlJadwal'];
  $psn  = $_POST['id'];
    
  //no antrian
  $query = mysql_query("SELECT max(no_antrian) as maxNO FROM daftar where tgl_daftar='$tgl' and id_dtljadwal='$dtl' ");
  $r = mysql_fetch_array($query);
  $idMax = $r['maxNO'];

 //setelah membaca id terbesar
  $NoUrut = (int) substr($idMax,0,2);
  $NoUrut++;
  $noUrut = sprintf('%02s', $NoUrut);
  $q = mysql_query("insert into daftar values ('$id','$noUrut',curdate(),'$tgl','$psn','$dtl')") or die (mysql_error());

  header("location:../index.php?hal=dtldft&iddft=$id");
}
//Proses Ubah
else if(isset($_POST['ubahDtlJdw'])) {
  $id   = $_POST['idDtlJadwal'];
  $hr   = $_POST['hari'];
  $dr   = $_POST['from'];
  $sm   = $_POST['to'];
  $jam  = $dr.' - '.$sm;
  $rg   = $_POST['ruang'];
  //UPDATE QUERY START
  $query1 = "update jadwal set hari='$hr',jam='$jam',ruang='$rg' where id_jadwal='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=jdw&ubh=success");
  } else {
    header("Location: ../index.php?hal=jdw&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapusDtlJdw'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query1 = "delete from detil_jadwal where id_dtljadwal='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=dtljdw&hps=success");
  } else {
    header("Location: ../index.php?hal=dtljdw&hps=fail");
  }
}
?>