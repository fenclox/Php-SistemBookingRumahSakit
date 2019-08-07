<?php 
//GENERATE ID BARANG
  //cari id terbesar
  include "../Connection/config.php";
    $query1 = mysql_query("SELECT max(id_pasien) as maxNO FROM pasien");
    $row = mysql_fetch_array($query1);
    $idMax = $row['maxNO'];
    $idMax++;
   //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
    $idps = sprintf('%06s', $idMax);
  //.sprintf('%04s', $NoUrut) diformat menjadi 4 digit string
  //END GENERATE ID BARANG
?>
<!-- Daftar -->
<div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pendaftaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="float: right;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="proses.php">
          <div class="form-group">
            <label>ID Pasien</label>
            <input name="idpasien" type="text" class="form-control" value="<?php echo $idps; ?>" readonly="">
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input name="nmpasien" type="text" class="form-control" placeholder="Masukkan Nama Lengkap" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="jkpasien" value="Laki-laki" checked=""> <label style="font-weight: normal;">Laki-laki</label> </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label"> &emsp;
                <input class="form-check-input" type="radio" name="jkpasien" value="Perempuan"> <label style="font-weight: normal;">Perempuan</label> </label>
            </div>
          </div>
          <div class="form-group" style="margin-top: -20px">
            <label>Alamat</label>
            <textarea name="almpasien" id="styled" class="form-control" placeholder="Masukkan Alamat Lengkap" required=""></textarea>
          </div>
          <div class="form-group">
            <label>No. Hp/Telp</label>
            <input name="telppasien" type="text" class="form-control" placeholder="Masukkan Nomor Hp/Telepon" maxlength="50" required="" onkeypress="return isNumberKey(event)">
          </div>
          <div class="form-group">
            <label>Password</label><img  style="margin-left: 10px; height: 20px;" src="img/view.png" onmouseover="mouseoverPassDaftar();" onmouseout="mouseoutPassDaftar();" />
            <input name="passpasien" id="passDaftar" type="password" class="form-control" placeholder="Masukkan Password" maxlength="12" required="">
          </div>
      </div>
      <div class="modal-footer">
        <button name="daftar" type="submit" class="btn btn-md btn-primary">Daftar</button>
      </div>
        </form>
    </div>
  </div>
</div>