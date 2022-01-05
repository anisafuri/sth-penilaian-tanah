<form action="<?php echo base_url() ?>Tanah/simpantanah" class="formTanah" method="POST" enctype="multipart/form-data">
  <div class="form-group mb-3">
    <label class="form-label">NO SERTIFIKAT</label>
    <input type="text" class="form-control" name="no_sertifikat" placeholder="No Sertifikat">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">HAK TANAH</label>
    <input type="text" class="form-control" name="hak_tanah" placeholder="Hak Tanah">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">STATUS SERTIFIKAT</label>
    <input type="text" class="form-control" name="status_sertifikat" placeholder="Status Sertifikat">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">DESA</label>
    <input type="text" class="form-control" name="desa" placeholder="Desa">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">KECAMATAN</label>
    <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">KABUPATEN</label>
    <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">PROVINSI</label>
    <input type="text" class="form-control" name="provinsi" placeholder="Provinsi">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">PEMEGANG HAK</label>
    <input type="text" class="form-control" name="nama_pemegang_hak" placeholder="Pemegang Hak">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">TANGGAL DIKELUARKAN</label>
    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="tgl_dikeluarkan" name="tgl_dikeluarkan" placeholder="Tanggal Dikeluarkan">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">TANGGAL JATUH TEMPO</label>
    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="tgl_jatuh_tempo" placeholder="Tanggal Jatuh Tempo">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">NO GAMBAR SITUASI</label>
    <input type="text" class="form-control" name="no_gambar_situasi" placeholder="No Gambar Situasi">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">TANGGAL GAMBAR SITUASI</label>
    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="tgl_gambar_situasi" placeholder="Tanggal Gambar Situasi">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">Luas (Dalam m2)</label>
    <input type="text" class="form-control" name="luas" placeholder="Luas">
  </div>
  <div class="form-group mb-3">
    <label class="form-label">SERTIFIKAT TANAH</label>
    <input type="file" class="form-control" name="sertipikat_tanah[]" >
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary w-100">
      <li class="fa fa-send"></li>
      &nbsp; Simpan</button>
  </div>
</form>

<script>
// document.addEventListener("DOMContentLoaded", function(){
//   flatpickr(document.getElementById('tgl_dikeluarkan'), {});
// });
// document.addEventListener("DOMContentLoaded", function(){
//   flatpickr(document.getElementById('tgl_jatuh_tempo'), {});
// });
// document.addEventListener("DOMContentLoaded", function(){
//   flatpickr(document.getElementById('tgl_gambar_situasi'), {});
// });

$(function(){
  $('.formTanah').bootstrapValidator({
      fields: {
        no_sertifikat: {
          message: 'No Sertifikat Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'No Sertifikat Harus Diisi !'
            }
          }
        },
        hak_tanah: {
          message: 'Hak Tanah Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Hak Tanah Harus Diisi !'
            }
          }
        },
        status_sertifikat: {
          message: 'Status Sertifikat Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Status Sertifikat Harus Diisi !'
            }
          }
        },
        desa: {
          message: 'Desa Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Desa Harus Diisi !'
            }
          }
        },
        kecamatan: {
          message: 'Kecamatan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kecamatan Harus Diisi !'
            }
          }
        },
        kabupaten: {
          message: 'Kabupaten Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kabupaten Harus Diisi !'
            }
          }
        },
        provinsi: {
          message: 'Provinsi Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Provinsi Harus Diisi !'
            }
          }
        },
        nama_pemegang_hak: {
          message: 'Pemegang Hak Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Pemegang Hak Harus Diisi !'
            }
          }
        },
        tgl_dikeluarkan: {
          message: 'Tanggal Dikeluarkan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Tanggal Dikeluarkan Harus Diisi !'
            }
          }
        },
        tgl_jatuh_tempo: {
          message: 'Tanggal Jatuh Tempo Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Tanggal Jatuh Tempo Harus Diisi !'
            }
          }
        },
        no_gambar_situasi: {
          message: 'No Gambar Situasi Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'No Gambar Situasi Harus Diisi !'
            }
          }
        },
        tgl_gambar_situasi: {
          message: 'Tanggal Gambar Situasi Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Tanggal Gambar Situasi Harus Diisi !'
            }
          }
        },
        luas: {
          message: 'Luas Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Luas Harus Diisi !'
            }
          }
        },
      }
    });
});
</script>
