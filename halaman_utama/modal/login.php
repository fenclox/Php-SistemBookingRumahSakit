<!-- Daftar -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="float: right;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="proses.php">
          <div class="form-group">
            <label>ID </label>
            <input name="id" type="text" class="form-control" placeholder="Masukkan ID " maxlength="10" required="">
          </div>
          <div class="form-group">
            <label>Password</label><img  style="margin-left: 10px; height: 20px;" src="img/view.png" onmouseover="mouseoverPassLogin();" onmouseout="mouseoutPassLogin();" />
            <input name="pass" id="passLogin" type="password" class="form-control" placeholder="Masukkan Password" maxlength="12" required="">
          </div>
          <div class="form-group">
            <label>Level</label>
              <select name="level" class="form-control" required="" style="font-size:12px;font-family:Tahoma,sans-serif;">
                <option value="">Level</option>
                <option value="0">Pasien</option>
                <option value="1">Pegawai</option>
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button name="login" type="submit" class="btn btn-md btn-primary">Login</button>
      </div>
        </form>
    </div>
  </div>
</div>