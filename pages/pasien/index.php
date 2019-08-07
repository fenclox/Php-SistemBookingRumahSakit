<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda': include 'beranda.php'; break;
          case 'pfl'    : include 'data/dt_profil.php'; break;
          case 'poli'   : include 'data/dt_poliklinik.php'; break;
          case 'dtljdw' : include 'data/dt_dtljadwal.php'; break;
          case 'edft'   : include 'entri/et_dft.php'; break;
          case 'dtldft' : include 'entri/dtl_dft.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>