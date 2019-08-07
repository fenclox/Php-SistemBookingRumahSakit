<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Pasien
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
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Id Pasien</th>
              <th>Nama Pasien</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Nomor Telepon</th>
              <th width='10%'><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Staff -->
            <?php
            $query="SELECT * from pasien order by id_pasien asc";
            $tampil = mysql_query($query);
            $no = 1; // nomor baris
            while ($r = mysql_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[id_pasien]</td>
              <td style='text-transform:capitalize'>$r[nm_pasien]</td>
              <td style='text-transform:capitalize'>$r[jk_pasien]</td>
              <td>$r[alm_pasien]</td>
              <td>$r[telp_pasien]</td>
              <td> "; ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" value='<?php echo $r['id_pasien'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubahPasien"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_pasien'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapusPasien"><i class="glyphicon glyphicon-trash"></i></button>
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
<!--****************** Ubah ******************-->
<div class="modal fade" id="ubahPasien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Pasien</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_pasien.php">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="dub"></span>
              <!-- End Ubah Data -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="ubahPasien" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Hapus ******************-->
<div class="modal fade" id="hapusPasien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Pasien</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_pasien.php">
            <div class="box-body">
              Yakin ingin menghapus data?
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" id="kpsn" name="id" value="">
              <button name="hapusPasien" type="submit" class="btn btn-primary">Hapus</button>
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
function ubahdata(id_pasien){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("dub").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah/ubh_pasien.php?q="+id_pasien+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_pasien){
    document.getElementById('kpsn').value=id_pasien;
}
</script>