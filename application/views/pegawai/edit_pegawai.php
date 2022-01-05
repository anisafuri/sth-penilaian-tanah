<form action="<?php echo base_url() ?>Pegawai/updatepegawai" class="formPegawai" method="POST" enctype="multipart/form-data" >
  <div class="form-group mb-3">
    <label class="form-label">ID PEGAWAI</label>
    <input type="text" readonly value="<?php echo $pegawai['id_peg']; ?>" class="form-control" name="id_peg" placeholder="Id Pegawai">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">NAMA PEGAWAI</label>
    <input type="text" value="<?php echo $pegawai['nama_peg']; ?>" class="form-control" name="nama_peg" placeholder="Nama Pegawai">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">USERNAME</label>
    <input type="text" value="<?php echo $pegawai['username']; ?>" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">LEVEL</label>
    <select name="level" class="form-select">
      <option value="">No Selected</option>
      <option <?php if ($pegawai['level'] == "Admin"){echo "selected"; } ?> value="Admin">Admin</option>
      <option <?php if ($pegawai['level'] == "Penilai"){echo "selected"; } ?> value="Penilai">Penilai</option>
      <option <?php if ($pegawai['level'] == "Reviewer"){echo "selected"; } ?> value="Reviewer">Reviewer</option>
      <option <?php if ($pegawai['level'] == "Penanggung Jawab"){echo "selected"; } ?> value="Penanggung Jawab">Penanggung jawab</option>
      <option <?php if ($pegawai['level'] == "Produksi"){echo "selected"; } ?> value="Produksi">Produksi</option>
      <option <?php if ($pegawai['level'] == "Kurir"){echo "selected"; } ?> value="Kurir">Kurir</option>
      <option <?php if ($pegawai['level'] == "Sekretaris"){echo "selected"; } ?> value="Sekretaris">Sekretaris</option>
    </select>
  </div>
  <div class="form-group mb-3">
    <label class="form-label">ALAMAT PEGAWAI</label>
    <input type="text" value="<?php echo $pegawai['alamat_peg']; ?>" class="form-control" name="alamat_peg" placeholder="Alamat Pegawai">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">TELP PEGAWAI</label>
    <input type="text" value="<?php echo $pegawai['telp_peg']; ?>" class="form-control" name="telp_peg" placeholder="Telp">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">EMAIL PEGAWAI</label>
    <input type="text" value="<?php echo $pegawai['email_peg']; ?>" class="form-control" name="email_peg" placeholder="Email">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">IZIN PROFESI</label>
    <input type="text" value="<?php echo $pegawai['izin_profesi']; ?>" class="form-control" name="izin_profesi" placeholder="Izin Profesi">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">FOTO PEGAWAI</label>
      <?php
      if($pegawai['foto_peg']==''){?>
        <small>(Foto Belum Ada)</small>
      <?php }else{ ?>
      <input type="hidden" name="old_pict" value="<?php echo $pegawai['foto_peg']; ?>">
      <img src="<?php echo base_url(); ?>assets/upload/<?php echo $pegawai['foto_peg']; ?>">
      <?php }?>
      <div style="margin-bottom:15px"></div>
      <input type="file" class="form-control" name="foto_peg">
      <small>(Biarkan Kosong Jika Tidak Diganti)</small>
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
