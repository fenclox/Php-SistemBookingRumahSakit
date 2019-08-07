<?php
  include "../../../Connection/config.php";
  
  $tampil = mysql_query("SELECT * FROM detil_jadwal where id_dtljadwal='".$_GET['q']."'");
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
  <label>Id Detil Jadwal</label>
  <input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text"  name="idDtlJadwal" value="<?php echo $r['id_dtljadwal'];?>" readonly="">
</div>
<div class="form-group">
  <label>Nama Dokter</label>
  <select class="form-control select2" style="width: 100%;" name="idDokter" required="">
    <?php
    $query = mysql_query("select * from dokter ORDER by id_dokter asc");
    while ($row = mysql_fetch_array($query)){
      if($r['id_dokter']==$row['id_dokter']){
        $s='selected';
      } else{
        $s='';
      }
      echo "<option $s value=$row[id_dokter]>$row[id_dokter] - $row[nm_dokter]</option>";
    }
    ?>
  </select>
</div>
<div class="form-group">
  <label>Ruang</label>
  <input name="ruang" type="text" class="form-control" placeholder="Masukkan Ruangan" maxlength="5" required="" style="text-transform: capitalize;" value="<?php echo $r['ruang'];?>">
</div>
<div class="form-group">
  <label>Poliklinik</label>
  <select class="form-control select2" style="width: 100%;" name="idPoliklinik" required="">
    <?php
    $query = mysql_query("select * from poliklinik ORDER by id_poli asc");
    while ($row = mysql_fetch_array($query)){
      if($r['id_poli']==$row['id_poli']){
        $s='selected';
      } else{
        $s='';
      }
      echo "<option $s value=$row[id_poli]>$row[id_poli] - $row[nm_poli]</option>";
    }
    ?>
  </select>
</div>