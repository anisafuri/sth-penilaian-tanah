<form action="<?php echo base_url() ?>Pegawai/simpanpegawai" class="formPegawai" method="POST" enctype="multipart/form-data">
  <div class="form-group mb-3">
    <label class="form-label">ID PEGAWAI</label>
    <input type="text" class="form-control" name="id_peg" placeholder="Id Pegawai">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">NAMA PEGAWAI</label>
    <input type="text" class="form-control" name="nama_peg" placeholder="Nama Pegawai">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">USERNAME</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">PASSWORD</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">LEVEL</label>
    <select name="level" class="form-select">
      <option value="">-Pilih-</option>
      <option value="Admin">Admin</option>
      <option value="Penilai">Penilai</option>
      <option value="Reviewer">Reviewer</option>
      <option value="Penanggung Jawab">Penanggung Jawab</option>
      <option value="Produksi">Produksi</option>
      <option value="Kurir">Kurir</option>
      <option value="Sekretaris">Sekretaris</option>
    </select>
  </div>
  <div class="form-group mb-3">
    <label class="form-label">ALAMAT PEGAWAI</label>
    <input type="text" class="form-control" name="alamat_peg" placeholder="Alamat Pegawai">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">TELP PEGAWAI</label>
    <input type="text" class="form-control" name="telp_peg" placeholder="Telp">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">EMAIL PEGAWAI</label>
    <input type="text" class="form-control" name="email_peg" placeholder="Email Pegawai">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">IZIN PROFESI</label>
    <input type="text" class="form-control" name="izin_profesi" placeholder="Izin Profesi">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">FOTO PEGAWAI</label>
    <input type="file" class="form-control" name="foto_peg" >
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary w-100">
      <li class="fa fa-send"></li>
      &nbsp; Simpan</button>
  </div>
</form>

<script>
$(function(){
  $('.formPegawai').bootstrapValidator({
      fields: {
        id_peg: {
          message: 'Id Pegawai Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Id Pegawai Harus Diisi !'
            }
          }
        },
        nama_peg: {
          message: 'Nama Pegawai Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Pegawai Harus Diisi !'
            }
          }
        },
        username: {
          message: 'Username Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Username Harus Diisi !'
            }
          }
        },
        password: {
          message: 'Password Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Password Harus Diisi !'
            }
          }
        },
        level: {
          message: 'Level Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Level Harus Diisi !'
            }
          }
        },
        alamat_peg: {
          message: 'Alamat Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Alamat Harus Diisi !'
            }
          }
        },
        telp_peg: {
          message: 'Telp Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Telp Harus Diisi !'
            }
          }
        },
        email_peg: {
          message: 'Email Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Email Harus Diisi !'
            }
          }
        },
      }
    });
});
</script>
