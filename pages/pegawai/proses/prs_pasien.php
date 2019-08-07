<?php
include "../../../Connection/config.php";

//Proses Ubah
if(isset($_POST['ubahPasien'])) {
  $id   = $_POST['idPasien'];
  $nm   = $_POST['nmPasien'];
  $alm  = $_POST['almPasien'];
  $telp = $_POST['telpPasien'];
  $pass = $_POST['passPasien'];
  $jk   = $_POST['jkPasien'];
  //UPDATE QUERY START
  $query1 = "update pasien set nm_pasien='$nm',alm_pasien='$alm',telp_pasien='$telp',pass_pasien='$pass',jk_pasien='$jk' where id_pasien='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=psn&ubh=success");
  } else {
    header("Location: ../index.php?hal=psn&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapusPasien'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query1 = "delete from pasien where id_pasien='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=psn&hps=success");
  } else {
    header("Location: ../index.php?hal=psn&hps=fail");
  }
  exit;
}
?>
