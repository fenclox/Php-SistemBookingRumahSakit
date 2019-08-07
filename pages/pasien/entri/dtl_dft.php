  <?php
  $id   = $_GET['iddft'];
  $sql = mysql_query("select a.*, b.*, c.nm_poli, d.ruang from daftar a, pasien b, poliklinik c, detil_jadwal d where id_daftar='$id' and a.id_pasien=b.id_pasien");
  $r = mysql_fetch_array($sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detil Pendaftaran
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- ////////////////////////////////////////////// -->
          <div class="box box-danger">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="col-md-6">
              <table class="table table-striped">
              <form method="post" action="cetak/pendaftaran.php">
                <tr>
                  <td><b>ID Daftar</b></td>
                  <td>
                    <b><?php echo $r['id_daftar']?></b>
                  </td>
                </tr>
                <tr>
                  <td><b>No. Antrian</b></td>
                  <td>
                    <b><?php echo $r['no_antrian']?></b>
                  </td>
                </tr>
                <tr>
                  <td><b>Tanggal Ber-obat</b></td>
                  <td>
                    <b><?php echo $r['tgl_berobat']?></b>
                  </td>
                </tr>
                <tr>
                  <td><b>Poliklinik</b></td>
                  <td style="text-transform: capitalize;">
                    <b><?php echo $r['nm_poli']?></b>
                  </td>
                </tr>
                <tr>
                  <td><b>Ruang</b></td>
                  <td style="text-transform: capitalize;">
                    <b><?php echo $r['ruang']?></b>
                  </td>
                </tr>
                <tr>
                  <td><b>Tanggal Daftar</b></td>
                  <td>
                    <b><?php echo $r['tgl_daftar']?></b>
                  </td>
                </tr>
                <input type="hidden" name="iddft" value="<?php echo $r['id_daftar']?>">
                <tr>
                  <td colspan="2"><input type="submit" value="Cetak" class="btn btn-primary"></td>
                </tr>
              </form>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- ////////////////////////////////////////////// -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->