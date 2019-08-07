<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Detil Jadwal
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
        <table id="example4" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Id Detil Jadwal</th>
              <th>Id Jadwal</th>
              <th>Nama Dokter</th>
              <th>Hari</th>
              <th>Pukul</th>
              <th>Ruang</th>
              <th>Poliklinik</th>
              <th width='15%'><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Staff -->
            <?php
            $query="select a.*, b.*, c.nm_dokter, d.nm_poli from detil_jadwal a, jadwal b, dokter c, poliklinik d where a.id_jadwal=b.id_jadwal && a.id_dokter=c.id_dokter && a.id_poli=d.id_poli  group by id_dtljadwal order by a.id_dtljadwal desc";
            $tampil = mysql_query($query);
            $no = 1; // nomor baris
            while ($r = mysql_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[id_dtljadwal]</td>
              <td>$r[id_jadwal]</td>
              <td style='text-transform:capitalize'>$r[nm_dokter]</td>
              <td>$r[hari]</td>
              <td>$r[jam]</td>
              <td style='text-transform:capitalize'>$r[ruang]</td>
              <td style='text-transform:capitalize'>$r[nm_poli]</td>
              <td width='10%'> "; ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" value='<?php echo $r['id_dtljadwal'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubahDtlJadwal"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_dtljadwal'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapusDtlJadwal"><i class="glyphicon glyphicon-trash"></i></button>
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
<div class="modal fade" id="ubahDtlJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Detil Jadwal</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_detiljdw.php">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="dub"></span>
              <!-- End Ubah Data -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="ubahDtlJdw" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Hapus ******************-->
<div class="modal fade" id="hapusDtlJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Detil Jadwal</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_detiljdw.php">
            <div class="box-body">
              Yakin ingin menghapus data?
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" id="kd" name="id" value="">
              <button name="hapusDtlJdw" type="submit" class="btn btn-primary">Hapus</button>
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
function ubahdata(id_dtljadwal){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("dub").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah/ubh_dtljadwal.php?q="+id_dtljadwal+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_dtljadwal){
    document.getElementById('kd').value=id_dtljadwal;
}
</script>