<?php
include "../../../Connection/config.php";

//Proses Tambah
if(isset($_POST['tambahJadwal'])){
  $id   = $_POST['idJadwal'];
  $hr   = $_POST['hari'];
  $dr   = $_POST['from'];
  $sm   = $_POST['to'];
  $jam  = $dr.' - '.$sm;
  $pgw  = $_POST['kdp'];
  //INSERT QUERY START
  $query1 = mysql_query("insert into jadwal values ('$id','$hr','$jam','$pgw')");
  if ($query1) {
      header("Location: ../index.php?hal=jdw&tmb=success");
    } else {
      header("Location: ../index.php?hal=jdw&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubahJadwal'])) {
  $id   = $_POST['idJadwal'];
  $hr   = $_POST['hari'];
  $dr   = $_POST['from'];
  $sm   = $_POST['to'];
  $jam  = $dr.' - '.$sm;
  //UPDATE QUERY START
  $query1 = "update jadwal set hari='$hr',jam='$jam' where id_jadwal='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=jdw&ubh=success");
  } else { mysql_error();
    echo '<pre>'; print_r ($_POST); echo '</pre>';
    //header("Location: ../index.php?hal=jdw&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapusJadwal'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query1 = "delete from jadwal where id_jadwal='$id'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../index.php?hal=jdw&hps=success");
  } else {
    header("Location: ../index.php?hal=jdw&hps=fail");
  }
}
?>
