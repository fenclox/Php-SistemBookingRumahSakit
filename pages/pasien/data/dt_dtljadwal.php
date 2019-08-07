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
            $query="select a.*, b.*, c.nm_dokter, d.nm_poli from detil_jadwal a, jadwal b, dokter c, poliklinik d where a.id_jadwal=b.id_jadwal && a.id_dokter=c.id_dokter && a.id_poli=d.id_poli  group by id_dtljadwal order by a.id_dtljadwal asc";
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
                <a title='Daftar' class='btn btn-success' href='index.php?hal=edft&iddtljdw=<?php echo $r['id_dtljadwal'];?>' ><i class='glyphicon glyphicon-arrow-right'></i></a>
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