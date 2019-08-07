<?php
include "../../../Connection/config.php";

  //Proses Tambah
if(isset($_POST['tambahDtlJdw'])){
  $dtl  = $_POST['idDtlJadwal'];
  $jdw  = $_POST['idJadwal'];
  $dok  = $_POST['idDokter'];
  $rg   = $_POST['ruang'];
  $poli = $_POST['idPoliklinik'];

  $querydtl = "insert into detil_jadwal values ('$dtl','$jdw','$dok','$rg','$poli')";

  mysql_query($querydtl);
  mysql_query($queryjdw);
  header('location:../index.php?hal=jdw');
}
//Proses Ubah
else if(isset($_POST['ubahDtlJdw'])) {
  $id   = $_POST['idDtlJadwal'];
  $dok  = $_POST['idDokter'];
  $rg   = $_POST['ruang'];
  $poli = $_POST['idPoliklinik'];
  //UPDATE QUERY START
  $query1 = "update detil_jadwal set id_dokter='$dok',ruang='$rg',id_poli='$poli' where id_dtljadwal='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=dtljdw&ubh=success");
  } else {
    header("Location: ../index.php?hal=dtljdw&ubh=fail");
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