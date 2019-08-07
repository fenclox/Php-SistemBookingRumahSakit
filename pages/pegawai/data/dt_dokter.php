<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Dokter
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title"><button type="button" class="btn btn-success" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahDokterModal"><i class="glyphicon glyphicon-plus"></i></button></h3>
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
              <th>Id Dokter</th>
              <th>Nama Dokter</th>
              <th>Spesialis</th>
              <th>Alamat</th>
              <th>Nomor Telepon</th>
              <th width='10%'><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Staff -->
            <?php
            $query="SELECT * from dokter order by id_dokter asc";
            $tampil = mysql_query($query);
            $no = 1; // nomor baris
            while ($r = mysql_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[id_dokter]</td>
              <td style='text-transform:capitalize'>$r[nm_dokter]</td>
              <td style='text-transform:capitalize'>$r[spesialis]</td>
              <td>$r[alm_dokter]</td>
              <td>$r[telp_dokter]</td>
              <td> "; ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" value='<?php echo $r['id_dokter'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubahDokter"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_dokter'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapusDokter"><i class="glyphicon glyphicon-trash"></i></button>
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
<div class="modal fade" id="tambahDokterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Dokter</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
        <!-- form start -->
        <form role="form" method="POST" action="proses/prs_dokter.php">
          <div class="box-body">
            <div class="form-group">
              <?php
                $query1 = "SELECT max(id_dokter) as maxNO FROM dokter";
                $hasil = mysql_query($query1);
                $row = mysql_fetch_array($hasil);
                $idMax = $row['maxNO'];

               //setelah membaca id terbesar, buat no urut dari karakter ke 2, 4 digit ke kanan
                $NoUrut = (int) substr($idMax, 1, 4);
                $NoUrut++;
                $idDokter = sprintf('%04s', $NoUrut);
              ?>
              <label>Id Dokter</label>
              <input name="idDokter" type="text" class="form-control" value="<?php echo $idDokter ?>" readonly="">
            </div>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input name="nmDokter" type="text" class="form-control" placeholder="Masukkan Nama Lengkap" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="almDokter" class="form-control" placeholder="Masukkan Alamat" required=""></textarea>
            </div>
            <div class="form-group">
              <label>Nomor Telepon</label>
              <input name="telpDokter" type="text" class="form-control" placeholder="Masukkan Nomor Telepon" maxlength="15" required="" onkeypress="return isNumberKey(event)">
            </div>
            <div class="form-group">
              <label>Spesialis</label>
              <input name="splDokter" type="text" class="form-control" placeholder="Masukkan Spesialis Dokter" maxlength="30" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="tambahDokter" type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div>
        </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Ubah ******************-->
<div class="modal fade" id="ubahDokter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Dokter</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_dokter.php">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="dub"></span>
              <!-- End Ubah Data -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="ubahDokter" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Hapus ******************-->
<div class="modal fade" id="hapusDokter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Dokter</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_dokter.php">
            <div class="box-body">
              Yakin ingin menghapus data?
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" id="kdok" name="id" value="">
              <button name="hapusDokter" type="submit" class="btn btn-primary">Hapus</button>
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
function ubahdata(id_dokter){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("dub").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah/ubh_dokter.php?q="+id_dokter+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_dokter){
    document.getElementById('kdok').value=id_dokter;
}
</script>
