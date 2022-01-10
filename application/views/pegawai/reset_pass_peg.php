<form action="<?php echo base_url() ?>Pegawai/resetpasspegawai_act" class="formresetPass" method="POST" >
  <div class="form-group mb-3">
    <input type="hidden" value="<?php echo $pegawai['username']; ?>" class="form-control" name="username">
    <input type="hidden" value="<?php echo $pegawai['id_peg']; ?>" class="form-control" name="id_peg">
    <label class="form-label">Masukkan Password Baru</label>
    <input type="password" class="form-control" name="password_baru">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">Konfirmasi Password Baru</label>
    <input type="password" class="form-control" name="ulangi_password">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary w-100">
    <li class="fa fa-send"></li>
    &nbsp; Simpan</button>
  </div>
</form>
<script>
$(function(){
  $('.formresetPass').bootstrapValidator({
      fields: {
        password_baru: {
          message: 'Password Baru Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Password Baru Harus Diisi !'
            },
            identical: {
              field: 'ulangi_password',
              message: 'Samakan Password dengan Confirm Password'
            }
          }
        },
        ulangi_password: {
          message: 'Ulangi Password Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Confirm Password Tidak Sama'
            },
            identical: {
              field: 'password_baru',
              message: 'Password Tidak Sama'
            }
          }
        },

      }
    });
});
</script>
