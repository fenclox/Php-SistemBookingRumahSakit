<?php
include "../../../Connection/config.php";
session_start();
$p1=mysql_fetch_array(mysql_query("select pass_pasien as 'pass' from pasien where id_pasien='".$_SESSION['idpasien']."'"));
if($_POST['lama']==$p1['pass']){
  if($_POST['baru']==$_POST['baru1']){
    $ubah=mysql_query("update pasien set pass_pasien='".$_POST['baru']."' where id_pasien='".$_SESSION['idpasien']."'");
    if($ubah){
      header("Location: ../index.php?hal=pfl&er=s");
    }
  }else{
    header("Location: ../index.php?hal=pfl&er=0");
  }
}else{
  header("Location: ../index.php?hal=pfl&er=1");
}
?>
