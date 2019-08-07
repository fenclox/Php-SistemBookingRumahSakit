<?php
  include "../../../Connection/config.php";
  
  $tampil = mysql_query("SELECT * FROM jadwal where id_jadwal='".$_GET['q']."'");
  $r = mysql_fetch_array($tampil);
  //Fungsi Cek\
  class selected{
    function cek($val,$sel,$tipe){
      if($val==$sel){
        switch($tipe){
        case 'select' :echo "selected"; break;
        case 'radio' :echo "checked"; break;
        }
      }else{
      
    }
    }
  }
  $ob = new selected();
?>
<div class="form-group">
  <label>Id Jadwal</label>
  <input name="idJadwal" type="text" class="form-control" value="<?php echo $r['id_jadwal'] ?>" readonly="">
</div>
<div class="form-group">
  <label>Hari</label>
  <select name="hari" class="form-control select" style="width: 100%;" required="">
    <option <?php $ob->cek("Senin",$r['hari'],"select") ?> value="Senin">Senin</option>
    <option <?php $ob->cek("Selasa",$r['hari'],"select") ?> value="Selasa">Selasa</option>
    <option <?php $ob->cek("Rabu",$r['hari'],"select") ?> value="Rabu">Rabu</option>
    <option <?php $ob->cek("Kamis",$r['hari'],"select") ?> value="Kamis">Kamis</option>
    <option <?php $ob->cek("Jum'at",$r['hari'],"select") ?> value="Jum'at">Jum'at</option>
    <option <?php $ob->cek("Sabtu",$r['hari'],"select") ?> value="Sabtu">Sabtu</option>
    <option <?php $ob->cek("Minggu",$r['hari'],"select") ?> value="Minggu">Minggu</option>
  </select>
</div>
 