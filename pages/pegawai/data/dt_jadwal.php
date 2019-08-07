<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Jadwal
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title"><button type="button" class="btn btn-success" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahJadwalModal"><i class="glyphicon glyphicon-plus"></i></button></h3>
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
        <table id="example3" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Id Jadwal</th>
              <th>Hari</th>
              <th>Pukul</th>
              <th width='15%'><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Staff -->
            <?php
            $query="SELECT * from jadwal order by id_Jadwal asc";
            $tampil = mysql_query($query);
            $no = 1; // nomor baris
            while ($r = mysql_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[id_jadwal]</td>
              <td style='text-transform:capitalize'>$r[hari]</td>
              <td>$r[jam]</td>
              <td> "; ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" value='<?php echo $r['id_jadwal'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubahJadwal"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_jadwal'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapusJadwal"><i class="glyphicon glyphicon-trash"></i></button>&nbsp;
                <a title='Buat Detil' class='btn btn-primary' href='index.php?hal=edtl&&idjdw=<?php echo $r['id_jadwal'];?>' ><i class='glyphicon glyphicon-arrow-right'></i></a>
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
<div class="modal fade" id="tambahJadwalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Jadwal</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
        <!-- form start -->
        <form role="form" method="POST" action="proses/prs_jadwal.php">
          <div class="box-body">
            <div class="form-group">
              <?php
                $query1 = "SELECT max(right(id_jadwal,3)) as maxNO FROM jadwal";
                $hasil = mysql_query($query1);
                $row = mysql_fetch_array($hasil);
                $idMax = $row['maxNO'];

               //setelah membaca id terbesar, buat no urut dari karakter ke 2, 4 digit ke kanan
                $NoUrut = (int) substr($idMax, 1, 3);
                $NoUrut++;
                $idj = 'J'.sprintf('%03s', $NoUrut);
              ?>
              <label>Id Jadwal</label>
              <input name="idJadwal" type="text" class="form-control" value="<?php echo $idj ?>" readonly="">
            </div>
            <div class="form-group">
              <label>Hari</label>
              <select name="hari" class="form-control select" style="width: 100%;" required="">
                <option value="">-- Pilih hari --</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jum'at">Jum'at</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Pukul</label>
              <input id="input-slider1" type="hidden" name="from" value="00:00">
              <input id="input-slider2" type="hidden" name="to" value="00:00">
              <div id="time-range">
                <p style="text-align: center"><span class="slider-time">00:00 </span> - <span class="slider-time2">00:00 </span>

                </p>
                <div class="sliders_step1">
                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"></div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="kdp" value="<?php echo $_SESSION['idpegawai'];?>">
          <!-- /.box-body -->
          <div class="box-footer">
            <button name="tambahJadwal" type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
        </form>
        <script src="../../style/js/stopExecutionOnTimeout.js"></script>
        <script src="../../style/js/jquery.min.js"></script>
        <script src="../../style/js/jquery-ui.min.js"></script>
        <!-- /.box -->
    </div>
  </div>
</div>
<!--****************** Ubah ******************-->
<div class="modal fade" id="ubahJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Jadwal</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_jadwal.php">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="dub"></span>
              <div class="form-group">
                <label>Pukul</label>
                <input id="input-slider3" type="hidden" name="from" value="00:00">
                <input id="input-slider4" type="hidden" name="to" value="00:00">
                <div id="time-range">
                  <p style="text-align: center"><span class="slider-time3">00:00 </span> - <span class="slider-time4">00:00 </span>

                  </p>
                  <div class="sliders_step1">
                      <div id="slider-range2" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"></div>
                  </div>
                </div>
              </div>
              <!-- End Ubah Data -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="ubahJadwal" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Hapus ******************-->
<div class="modal fade" id="hapusJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Jadwal</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses/prs_jadwal.php">
            <div class="box-body">
              Yakin ingin menghapus data?
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" id="kjdw" name="id" value="">
              <button name="hapusJadwal" type="submit" class="btn btn-primary">Hapus</button>
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
function ubahdata(id_jadwal){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("dub").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah/ubh_jadwal.php?q="+id_jadwal+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_jadwal){
    document.getElementById('kjdw').value=id_jadwal;
}
</script>
 <!--////////////////////////////////////////// Slider Tambah//////////////////////////////////////////-->
 <script>$("#slider-range").slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        slide: function (e, ui) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if (hours1.length == 1) hours1 = '0' + hours1;
            if (minutes1.length == 1) minutes1 = '0' + minutes1;
            if (minutes1 == 0) minutes1 = '00';

            $('.slider-time').html(hours1 + '.' + minutes1);
            $('#input-slider1').val(hours1 + '.' + minutes1)

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if (hours2.length == 1) hours2 = '0' + hours2;
            if (minutes2.length == 1) minutes2 = '0' + minutes2;
            if (minutes2 == 0) minutes2 = '00';

            $('.slider-time2').html(hours2 + '.' + minutes2);
            $('#input-slider2').val(hours2 + '.' + minutes2);
        }
    });
    //# sourceURL=pen.js
    </script>
    <!--////////////////////////////////////////// Slider Ubah //////////////////////////////////////////-->
 <script>$("#slider-range2").slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        slide: function (e, ui) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if (hours1.length == 1) hours1 = '0' + hours1;
            if (minutes1.length == 1) minutes1 = '0' + minutes1;
            if (minutes1 == 0) minutes1 = '00';

            $('.slider-time3').html(hours1 + '.' + minutes1);
            $('#input-slider3').val(hours1 + '.' + minutes1)

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if (hours2.length == 1) hours2 = '0' + hours2;
            if (minutes2.length == 1) minutes2 = '0' + minutes2;
            if (minutes2 == 0) minutes2 = '00';

            $('.slider-time4').html(hours2 + '.' + minutes2);
            $('#input-slider4').val(hours2 + '.' + minutes2);
        }
    });
    //# sourceURL=pen.js
    </script>
 