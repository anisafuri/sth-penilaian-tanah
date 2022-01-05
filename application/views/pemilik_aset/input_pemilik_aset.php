<form action="<?php echo base_url() ?>Pemilikaset/simpanpemilikaset" class="formPemilikaset" method="POST" >
  <div class="form-group mb-3">
    <label class="form-label">ID PEMILIK ASET</label>
    <input type="text" class="form-control" name="id_pemilik" placeholder="Id Pemilik Aset">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">NAMA PEMILIK ASET</label>
    <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik Aset">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">ALAMAT</label>
    <textarea class="form-control" name="alamat_pemilik" rows="6" placeholder=""></textarea>
  </div>
  <div class="form-group mb-3">
    <label class="form-label">PHONE</label>
    <input type="text" class="form-control" name="telp_pemilik" placeholder="Phone">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary w-100">
      <li class="fa fa-send"></li>
      &nbsp; Simpan</button>
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
