<form action="<?php echo base_url() ?>Pemberitugas/simpanpemberitugas" class="formPemberitugas" method="POST" >
  <div class="form-group mb-3">
    <label class="form-label">ID PEMBERI TUGAS</label>
    <input type="text" class="form-control" name="id_pemberitugas" placeholder="Id Pemberi Tugas">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">KODE INDUSTRI</label>
    <input type="text" class="form-control" name="kode_industri" placeholder="Kode Industri">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">NAMA PEMBERI TUGAS</label>
    <input type="text" class="form-control" name="nama_pemberitugas" placeholder="Nama Pemberi Tugas">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">ALAMAT</label>
    <textarea class="form-control" name="alamat_pemberitugas" rows="6" placeholder=""></textarea>
  </div>
  <div class="form-group mb-3">
    <label class="form-label">BIDANG USAHA</label>
    <input type="text" class="form-control" name="bidang_usaha" placeholder="Bidang Usaha">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">PHONE</label>
    <input type="text" class="form-control" name="telp_pemberitugas" placeholder="Phone">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">FAX</label>
    <input type="text" class="form-control" name="fax_pemberitugas" placeholder="Fax">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">EMAIL</label>
    <input type="text" class="form-control" name="email_pemberitugas" placeholder="Email">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">NPWP</label>
    <input type="text" class="form-control" name="npwp" placeholder="NPWP">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary w-100">
      <li class="fa fa-send"></li>
      &nbsp; Simpan</button>
  </div>
</form>

<script>
$(function(){
  $('.formPemberitugas').bootstrapValidator({
      fields: {
        id_pemberitugas: {
          message: 'Id Pemberi Tugas Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Id Pemberi Tugas Harus Diisi !'
            }
          }
        },
        $kode_industri: {
          message: 'Kode Industri Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Industri Harus Diisi !'
            }
          }
        },
        nama_pemberitugas: {
          message: 'Nama Pemberi Tugas Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Pemberi Tugas Harus Diisi !'
            }
          }
        },
        alamat_pemberitugas: {
          message: 'Alamat Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Alamat Harus Diisi !'
            }
          }
        },
        bidang_usaha: {
          message: 'Bidang Usaha Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Bidang Usaha Harus Diisi !'
            }
          }
        },
        telp_pemberitugas: {
          message: 'Phone Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Phone Harus Diisi !'
            }
          }
        },
        fax_pemberitugas: {
          message: 'Fax Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Fax Harus Diisi !'
            }
          }
        },
        email_pemberitugas: {
          message: 'Email Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Email Harus Diisi !'
            }
          }
        },
        $npwp: {
          message: 'NPWP Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'NPWP Harus Diisi !'
            }
          }
        },
      }
    });
});
</script>
