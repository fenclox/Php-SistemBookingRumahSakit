<?php
  include "../../../Connection/config.php";
  
  $tampil = mysql_query("SELECT * FROM dokter where id_dokter='".$_GET['q']."'");
  $r = mysql_fetch_array($tampil);
?>
<div class="form-group">
  <label>Id Dokter</label>
  <input name="idDokter" type="text" class="form-control" value="<?php echo $r['id_dokter'];?>" readonly="">
</div>
<div class="form-group">
  <label>Nama Dokter</label>
  <input name="nmDokter" type="text" class="form-control" value="<?php echo $r['nm_dokter'];?>" placeholder="Masukkan Nama Pasien" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
</div>
<div class="form-group">
  <label>Alamat</label>
  <textarea name="almDokter" class="form-control" value="<?php echo $r['alm_dokter'];?>" placeholder="Masukkan Alamat" required=""><?php echo $r['alm_dokter'];?></textarea>
</div>
<div class="form-group">
  <label>Nomor Telepon</label>
  <input name="telpDokter" type="text" class="form-control" value="<?php echo $r['telp_dokter'];?>" placeholder="Masukkan Nomor Telepon" maxlength="15" required="" onkeypress="return isNumberKey(event)">
</div>
<div class="form-group">
  <label>Spesialis</label>
  <input name="splDokter" type="text" class="form-control" value="<?php echo $r['spesialis'];?>" placeholder="Masukkan Spesialis" maxlength="30" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
</div>
<div class="form-group">
  <label>Password</label>
  <input name="passDokter" type="password" class="form-control" value="<?php echo $r['pass_dokter'];?>" placeholder="Masukkan Password" maxlength="12" required="">
</div>