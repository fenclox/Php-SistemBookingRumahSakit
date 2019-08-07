<?php
session_start();
require_once("../Connection/config.php");

// Daftar
if(isset($_POST['daftar'])){
  $kd   = $_POST['idpasien'];
  $nm   = $_POST['nmpasien'];
  $alm  = $_POST['almpasien'];
  $telp = $_POST['telppasien'];
  $pass = $_POST['passpasien'];
  $jk   = $_POST['jkpasien'];
  //INSERT QUERY START
  $query = mysql_query("insert into pasien values('".$kd."','".$nm."','".$alm."','".$telp."','".$pass."','".$jk."')");
  if ($query) {
      echo ("<script language='javascript'>
          window.alert('Daftar berhasil')
          window.location.href='index.php';
          </script>");
    } else {
      echo ("<script language='javascript'>
          window.alert('Daftar gagal')
          window.location.href='index.php';
          </script>");
    }
}    
// Login
else if(isset($_POST['login'])){
  $id   = $_POST['id'];
  $pass = $_POST['pass'];
  $level= $_POST['level'];

  if($level == 0){
    $query = mysql_query("SELECT id_pasien, pass_pasien FROM pasien WHERE id_pasien='$id' AND pass_pasien='$pass'");
    $r     = mysql_fetch_array($query);
    if($r){
      $_SESSION['id']=$id;
      header("Location:../pages/pasien/index.php");
    } else {
      ?>
      <script type="text/javascript">
        alert("Login Gagal");
        document.location="../index.php";
      </script>
      <?php
    }
  } else if($level == 1){
    $query = mysql_query("SELECT id_pegawai, pass_pegawai FROM pegawai WHERE id_pegawai='$id' AND pass_pegawai='$pass'");
    $r     = mysql_fetch_array($query);
    if($r){
      $_SESSION['id']=$id;
      header("Location:../pages/pegawai/index.php");
    } else { 
      ?>
      <script type="text/javascript">
        alert("Login Gagal");
        document.location="../index.php";
      </script>
      <?php
    }
  }
}
