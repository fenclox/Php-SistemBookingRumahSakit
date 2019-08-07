<?php
include "../../../Connection/config.php";

//Proses Tambah
if(isset($_POST['tambahPoliklinik'])){
  $id   = $_POST['idPoliklinik'];
  $nm   = $_POST['nmPoliklinik'];
  //INSERT QUERY START
  $query1 = "insert into poliklinik values('$id','$nm')";
  $sql1   = mysql_query($query1);
  if ($sql1) {
      header("Location: ../index.php?hal=poli&tmb=success");
    } else {
      header("Location: ../index.php?hal=poli&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubahPoliklinik'])) {
  $id   = $_POST['idPoliklinik'];
  $nm   = $_POST['nmPoliklinik'];
  //UPDATE QUERY START
  $query1 = "update poliklinik set nm_poli='$nm' where id_poli='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=poli&ubh=success");
  } else {
    header("Location: ../index.php?hal=poli&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapusPoliklinik'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query1 = "delete from poliklinik where id_poli='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=poli&hps=success");
  } else {
    header("Location: ../index.php?hal=poli&hps=fail");
  }
  exit;
}
?>
