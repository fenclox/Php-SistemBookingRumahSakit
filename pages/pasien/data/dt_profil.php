  <?php
  $id = $_SESSION['id'];
  $sql = mysql_query("select * from pasien where id_pasien='$id'");
  $r = mysql_fetch_array($sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- ////////////////////////////////////////////// -->
        <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-10">
                    <?php if (isset($_GET['er'])){
                      switch($_GET['er']){
                        case '0' : ?>
                          <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal, password baru tidak sesuai</h4>
                          </div> <?php break;
                        case '1' : ?>
                          <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal, password yang dimasukkan salah</h4>
                          </div>   <?php break;
                        case 's' : ?>
                          <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil mengubah password</h4>
                          </div>  <?php break;
                      }
                    }
                    ?>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn bg-navy" data-toggle="modal" data-target="#ubah">Ubah kata sandi</button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="glyphicon glyphicon-user margin-r-5"></i> Nama Lengkap</strong>
              <p class="text-muted" style="text-transform: capitalize;">&emsp;&ensp;&nbsp;<?php echo $r['nm_pasien']?> - <?php echo $r['id_pasien']?></p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
              <p class="text-muted">&emsp;&ensp;&nbsp;<?php echo $r['alm_pasien']?></p>
              <hr>
              <strong><i class="glyphicon glyphicon-earphone margin-r-5"></i> Nomor Telepon</strong>
              <p class="text-muted">&emsp;&ensp;&nbsp;<?php echo $r['telp_pasien']?></p>
              <hr>
              <strong><i class="fa fa-intersex margin-r-5"></i> Jenis Kelamin</strong>
              <p class="text-muted">&emsp;&ensp;&nbsp;<?php echo $r['jk_pasien']?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- ////////////////////////////////////////////// -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal Ubah-->
<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ubah kata sandi</h4>
            </div>
            <div class="modal-body">
                <!-- Ubah Data -->
                <form role="form" method="post" action="proses/prs_profil.php">
                    <div class="form-group">
                        <label>Kata sandi lama</label>
                        <input class="form-control" type="password" name="lama" placeholder="Kata sandi lama" required="">
                    </div>
                    <div class="form-group">
                        <label>Kata sandi baru</label>
                        <input class="form-control" type="password" name="baru" placeholder="Kata sandi baru" required="">
                    </div>
                    <div class="form-group">
                        <label>Ulangi kata sandi baru</label>
                        <input class="form-control" type="password" name="baru1" placeholder="Kata sandi baru" required="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                    </div>
                </form>
                <!-- End Ubah Data -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ubah-->
