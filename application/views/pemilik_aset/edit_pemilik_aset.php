<form action="<?php echo base_url() ?>Pemilikaset/updatepemilikaset" class="formPemilikaset" method="POST" >
  <div class="form-group mb-3">
    <label class="form-label">ID PEMILIK ASET</label>
    <input type="text"readonly value="<?php echo $pemilik_aset['id_pemilik']; ?>" class="form-control" name="id_pemilik" placeholder="Id Pemilik Aset">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">NAMA PEMBERI TUGAS</label>
    <input type="text" value="<?php echo $pemilik_aset['nama_pemilik']; ?>" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik Aset">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">ALAMAT</label>
    <input type="text" value="<?php echo $pemilik_aset['alamat_pemilik']; ?>" class="form-control" name="alamat_pemilik" rows="6" placeholder="">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">PHONE</label>
    <input type="text" value="<?php echo $pemilik_aset['telp_pemilik']; ?>" class="form-control" name="telp_pemilik" placeholder="Phone">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary w-100">
      <li class="fa fa-send"></li>
      &nbsp; Update</button>
  </div>
</form>

<script>
$(function(){
  $('.formPemilikaset').bootstrapValidator({
      fields: {
        id_pemilik: {
          message: 'Id Pemilik Aset Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Id Pemilik Aset Harus Diisi !'
            }
          }
        },
        nama_pemilik: {
          message: 'Nama Pemilik Aset Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Pemilik Aset Harus Diisi !'
            }
          }
        },
        alamat_pemilik: {
          message: 'Alamat Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Alamat Harus Diisi !'
            }
          }
        },
        telp_pemilik: {
          message: 'Phone Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Phone Harus Diisi !'
            }
          }
        },
      }
    });
});
</script>
