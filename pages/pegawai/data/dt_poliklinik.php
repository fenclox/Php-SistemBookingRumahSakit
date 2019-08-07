<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Poliklinik
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title"><button type="button" class="btn btn-success" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahPoliklinikModal"><i class="glyphicon glyphicon-plus"></i></button></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
            <?php
            if (isset($_GET['tmb'])) {
            if($_GET['tmb']=="success") {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Menambahkan Data!
            </div>
            <?php } else { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal Menambahkan Data!</h4>
            </div>
            <?php }
            } else if (isset($_GET['ubh'])) {
            if($_GET['ubh']=="success") {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Mengubah Data!</h4>
            </div>
            <?php } else { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal Mengubah Data!</h4>
            </div>
            <?php }
            } else if (isset($_GET['hps'])) {
            if($_GET['hps']=="success") {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Menghapus Data!</h4>
            </div>
            <?php } else { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal Menghapus Data!</h4>
            </div>
            <?php }
            }
            ?>
          </div>
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Id Poliklinik</th>
              <th>Nama Poliklinik</th>
              <th width='10%'><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Staff -->
            <?php
            $query="SELECT * from Poliklinik order by id_poli asc";
            $tampil = mysql_query($query);
            $no = 1; // nomor baris
            while ($r = mysql_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[id_poli]</td>
              <td style='text-transform:capitalize'>$r[nm_poli]</td>
              <td> "; ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" value='<?php echo $r['id_poli'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubahPoliklinik"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_poli'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapusPoliklinik"><i class="glyphicon glyphicon-trash"></i></button>
              </td>
            </tr>
            <?php
            $no++;}
            ?>
            <!-- End Data Cabang -->
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--////////////////////////////////////////// Modals //////////////////////////////////////////-->
  <!--****************** Tambah ******************-->
<div class="modal fade" id="tambahPoliklinikModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Poliklinik</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
        <!-- form start -->
        <form role="form" method="POST" action="proses/prs_poliklinik.php">
          <div class="box-body">
            <div class="form-group">
              <?php
                $query1 = mysql_query("SELECT max(id_poli) as maxNO FROM poliklinik");
                $row = mysql_fetch_array($query1);
                $idMax = $row['maxNO'];

               //setelah membaca id terbesar, buat no urut dari karakter ke 2, 4 digit ke kanan
                $NoUrut = (int) substr($idMax, 1, 2);
                $NoUrut++;
                $idPoliklinik = sprintf('%02s', $NoUrut);
              ?>
              <label>Id Poliklinik</label>
              <input name="idPoliklinik" type="text" class="form-control" value="<?php echo $idPoliklinik ?>" readonly="">
            </div>
            <div class="form-group">
              <label>Nama Poliklinik</label>
              <input name="nmPoliklinik" type="text" class="form-control" placeholder="Masukkan Nama Poliklinik" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="tambahPoliklinik" type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div>
        </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Ubah ******************-->
<div class="modal fade" id="ubahPoliklinik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Poliklinik</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_poliklinik.php">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="dub"></span>
              <!-- End Ubah Data -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="ubahPoliklinik" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Hapus ******************-->
<div class="modal fade" id="hapusPoliklinik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Poliklinik</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_poliklinik.php">
            <div class="box-body">
              Yakin ingin menghapus data?
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" id="id" name="id" value="">
              <button name="hapusPoliklinik" type="submit" class="btn btn-primary">Hapus</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
  <!--////////////////////////////////////////// End Modals //////////////////////////////////////////-->
<!-- Ubah & hapus data -->
<script>
function ubahdata(id_poli){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("dub").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah/ubh_poliklinik.php?q="+id_poli+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_poli){
    document.getElementById('id').value=id_poli;
}
</script>
