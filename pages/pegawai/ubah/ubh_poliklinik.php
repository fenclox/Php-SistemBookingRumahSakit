<?php
  include "../../../Connection/config.php";
  
  $tampil = mysql_query("SELECT * FROM Poliklinik where id_poli='".$_GET['q']."'");
  $r = mysql_fetch_array($tampil);
?>
<div class="form-group">
  <label>Id Poliklinik</label>
  <input name="idPoliklinik" type="text" class="form-control" value="<?php echo $r['id_poli'];?>" readonly="">
</div>
<div class="form-group">
  <label>Nama Poliklinik</label>
  <input name="nmPoliklinik" type="text" class="form-control" value="<?php echo $r['nm_poli'];?>" placeholder="Masukkan Nama Poliklinik" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
</div>