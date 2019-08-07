<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Beranda
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="callout callout-danger">
      <!--h4>Tip!</h4-->
      <?php
      $kd = $_SESSION['id'];
      include "../../connection/config.php";
      $sql = "select nm_pasien from pasien where id_pasien='".$kd."'";
      $query = mysql_query($sql);
      while($data = mysql_fetch_array($query)){
      echo "<p>Selamat datang, ".$data['nm_pasien']."</p>";
      }
      ?>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->