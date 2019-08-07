<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda'  : include 'beranda.php'; break;
          case 'poli'     : include 'data/dt_poliklinik.php'; break;
          case 'dok'      : include 'data/dt_dokter.php'; break;
          case 'psn'      : include 'data/dt_pasien.php'; break;
          case 'jdw'      : include 'data/dt_jadwal.php'; break;
          case 'dtljdw'   : include 'data/dt_dtljadwal.php'; break;
          case 'edtl'     : include 'entri/et_dtl.php'; break;
          case 'lappsn'   : include 'data/dt_lap_pasien.php'; break;
          case 'lapobt'   : include 'data/dt_lap_berobat.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>