<?php
  include "../../../Connection/config.php";
  
  $tampil = mysql_query("SELECT * FROM pasien where id_pasien='".$_GET['q']."'");
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
  <label>Id Pasien</label>
  <input name="idPasien" type="text" class="form-control" value="<?php echo $r['id_pasien'] ?>" readonly="">
</div>
<div class="form-group">
  <label>Nama Pasien</label>
  <input name="nmPasien" type="text" class="form-control" value="<?php echo $r['nm_pasien'];?>" placeholder="Masukkan Nama Pasien" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
</div>
<div class="form-group">
  <label>Jenis Kelamin</label><br>
  <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="jkPasien" value="Laki-laki" style="font-weight: normal;" <?php $ob->cek("Laki-laki",$r['jk_pasien'],"radio") ?> > Laki-laki  &emsp;
      <input class="form-check-input" type="radio" name="jkPasien" value="Perempuan" style="font-weight: normal;" <?php $ob->cek("Perempuan",$r['jk_pasien'],"radio") ?> > Perempuan</label>
  </div>
</div>
<div class="form-group">
  <label>Alamat</label>
  <textarea name="almPasien" class="form-control" value="<?php echo $r['alm_pasien'];?>" placeholder="Masukkan Alamat" required=""><?php echo $r['alm_pasien'];?></textarea>
</div>
<div class="form-group">
  <label>Nomor Telepon</label>
  <input name="telpPasien" type="text" class="form-control" value="<?php echo $r['telp_pasien'];?>" placeholder="Masukkan Nomor Telepon" maxlength="15" required="" onkeypress="return isNumberKey(event)">
</div>
<div class="form-group">
  <label>Password</label>
  <input name="passPasien" type="password" class="form-control" value="<?php echo $r['pass_pasien'];?>" placeholder="Masukkan Password" maxlength="12" required="">
</div>