<h2 class="page-title">
    Form Ganti Password
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form action="<?php echo base_url() ?>Auth/gantipassword_act" class="formAuth" method="POST" >

  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="form-group mb-3">
            <input type="hidden" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" name="username">
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
          </div>
        </div>
      </div>
    </div>
</form>
<script>
$(function(){
  $('.formAuth').bootstrapValidator({
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
