  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Detil Jadwal
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
              <form method="POST" action="proses/prs_detilJdw.php">
                <?php
                    $time = date('ymdHis');
                    $id   = rand(0,9);
                    $kd   = $time.$id;
                  ?>
                <div class="form-group">
                    <label>Id Detil Jadwal</label>
                    <input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" readonly name="idDtlJadwal" value='<?php echo $kd; ?>'>
                </div>
                <div class="form-group">
                    <label>Id Jadwal</label>
                    <input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" readonly name="idJadwal" value='<?php echo $_GET['idjdw']; ?>'>
                </div>
                <div class="form-group">
                  <label>Nama Dokter</label>
                  <select class="form-control select2" style="width: 100%;" name="idDokter" required="">
                    <?php
                    $query = mysql_query("select * from dokter ORDER by id_dokter asc");
                    while ($row = mysql_fetch_array($query)){
                    echo "<option value=$row[id_dokter]>$row[id_dokter] - $row[nm_dokter]</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Ruang</label>
                  <input name="ruang" type="text" class="form-control" placeholder="Masukkan Ruangan" maxlength="5" required="" style="text-transform: capitalize;">
                </div>
                <div class="form-group">
                  <label>Poliklinik</label>
                  <select class="form-control select2" style="width: 100%;" name="idPoliklinik" required="">
                    <?php
                    $query = mysql_query("select * from poliklinik ORDER by id_poli asc");
                    while ($row = mysql_fetch_array($query)){
                    echo "<option value=$row[id_poli]>$row[id_poli] - $row[nm_poli]</option>";
                    }
                    ?>
                  </select>
                </div>
                <input type="hidden" value="<?php echo $_SESSION['idPegawai']; ?>" name="idPegawai">
                  <button name="tambahDtlJdw" type="submit" class="btn btn-primary">Tambah</button>
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