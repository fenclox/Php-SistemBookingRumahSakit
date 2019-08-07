<?php
include "../../../Connection/config.php";

//Proses Tambah
if(isset($_POST['tambahDokter'])){
  $id   = $_POST['idDokter'];
  $nm   = $_POST['nmDokter'];
  $alm  = $_POST['almDokter'];
  $telp = $_POST['telpDokter'];
  $spl  = $_POST['splDokter'];
  //INSERT QUERY START
  $query1 = "insert into dokter values('$id','$nm','$alm','$telp','$spl')";
  $sql1   = mysql_query($query1);
  if ($sql1) {
      header("Location: ../index.php?hal=dok&tmb=success");
    } else {
      header("Location: ../index.php?hal=dok&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubahDokter'])) {
  $id   = $_POST['idDokter'];
  $nm   = $_POST['nmDokter'];
  $alm  = $_POST['almDokter'];
  $telp = $_POST['telpDokter'];
  $spl  = $_POST['splDokter'];
  //UPDATE QUERY START
  $query1 = "update dokter set nm_dokter='$nm',alm_dokter='$alm',telp_dokter='$telp',spesialis='$spl' where id_dokter='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=dok&ubh=success");
  } else {
    header("Location: ../index.php?hal=dok&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapusDokter'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query1 = "delete from dokter where id_dokter='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=dok&hps=success");
  } else {
    header("Location: ../index.php?hal=dok&hps=fail");
  }
  exit;
}
?>
