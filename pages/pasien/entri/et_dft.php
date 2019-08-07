<?php
  $kd   = $_GET['iddtljdw'];
  $query = mysql_query("select a.*, b.nm_dokter, c.nm_poli, d.jam, d.hari from detil_jadwal a, dokter b, poliklinik c, jadwal d where a.id_dtljadwal='$kd' && a.id_dokter=b.id_dokter && a.id_poli=c.id_poli && a.id_jadwal=d.id_jadwal");
  $r = mysql_fetch_array($query)
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar 
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-danger">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
              <!-- FORM ENTRY -->
              <div class="row">
              <div class="col-md-6">
              <form method="post" action="proses/prs_daftar.php">
                <div class="form-group">
                    <label>Id Detil Jadwal</label>
                    <input class="form-control" type="text" readonly name="idDtlJadwal" value='<?php echo $r['id_dtljadwal']; ?>'>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tanggal" class="form-control pull-right" id="datepicker" required="" value="">
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label>Nama Dokter</label>
                  <input name="idDokter" type="text" class="form-control" style="text-transform: capitalize;" value='<?php echo $r['nm_dokter']; ?>' readonly>
                </div>
                <div class="form-group">
                  <label>Hari</label>
                  <input name="pukul" type="text" class="form-control" style="text-transform: capitalize;" value='<?php echo $r['hari']; ?>' readonly>
                </div>
                <div class="form-group">
                  <label>Pukul</label>
                  <input name="pukul" type="text" class="form-control" style="text-transform: capitalize;" value='<?php echo $r['jam']; ?>' readonly>
                </div>
                <div class="form-group">
                  <label>Ruang</label>
                  <input name="ruang" type="text" class="form-control" style="text-transform: capitalize;" value='<?php echo $r['ruang']; ?>' readonly>
                </div>
                <div class="form-group">
                  <label>Poliklinik</label>
                  <input name="idPoliklinik" type="text" class="form-control" style="text-transform: capitalize;" value='<?php echo $r['nm_poli']; ?>' readonly>
                </div>
                  <button type="submit" title='Daftar' class='btn btn-success' name="daftar">Daftar</button>
                  <input name="id" type="hidden" value="<?php echo $_SESSION['id']?>">
              </form>
              </div>
              </div>
              <!-- END FORM ENTRY -->
          </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>