<h2 class="page-title">
    Form Penilaian
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formpenilaian" method="POST" action="<?php echo base_url(); ?>Penilaian/simpanpenilaian" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <label for="id_reviewer" class="form-label">Reviewer</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <select name="id_reviewer" id="id_reviewer" class="form-control" required>
          <option value="" selected disabled>Pilih Reviewer</option>
          <?php
            foreach ($pegawai as $key => $value) { ?>
              <option value="<?=$value->id_peg?>"><?=$value->nama_peg?></option>
          <?php } ?>
        </select>
      </div>
      <label class="form-label">ID PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" class="form-control" name="id_penilaian" id="id_penilaian" placeholder="ID Penilaian">
      </div>
      <label class="form-label">TANGGAL PERHITUNGAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" readonly class="form-control" name="tgl_perhitungan_nilai" id="tgl_perhitungan_nilai" placeholder="Tanggal Perhitungan">
      </div>
      <label class="form-label">ID SURVEI</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" readonly class="form-control" name="id_survei" id="id_survei" placeholder="ID Survei">
      </div>
      <label class="form-label">ID PENDAFTARAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
          <input type="text" readonly class="form-control" name="id_pendaftaran" id="id_pendaftaran" placeholder="ID Pendaftaran">
      </div>
      <label class="form-label">TANGGAL PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <!-- <input type="hidden" name="id_pendaftaran" id="id_pendaftaran"> -->
        <input type="text" class="form-control" name="tgl_penilaian" id="tgl_penilaian" placeholder="Tanggal Penilaian">
      </div>
      <label class="form-label">NAMA PENILAI</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-user"></li>
      </span>
      <input type="hidden" value="<?php echo $this->session->userdata('id_peg'); ?>" name="id_peg" id="id_peg">
      <input type="text" readonly value="<?php echo $this->session->userdata('id_peg') . " - " . $this->session->userdata('nama_peg'); ?>" class="form-control" name="nama_peg" id="nama_peg">
      </div>
      <label class="form-label">KETERANGAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-sticky-note"></li>
        </span>
          <input type="text" class="form-control" name="keterangan_nilai" id="keterangan_nilai" placeholder="Keterangan Nilai">
      </div>
      <label class="form-label">WORKSHEET TANAH</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="worksheet_tanah" id="worksheet_tanah">
      </div>
      <label class="form-label">DESKRIPSI TANAH</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="tanah_deskripsi" id="tanah_deskripsi">
      </div>
      <label class="form-label">RINGKASAN PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-pdf"></li>
        </span>
          <input type="file" class="form-control" name="ringkasan_penilaian" id="ringkasan_penilaian">
      </div>
      <div class="row mt-3">
        <button type="submit" class="btn btn-primary w100"><i class="fa fa-send mr-2"></i>SIMPAN</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<div class="modal modal-blur fade" id="modalpendaftaran" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data Pendaftaran</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered" id="tabelpendaftaran">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID PENDAFTARAN</th>
                  <th>TANGGAL PENDAFTARAN</th>
                  <th>JENIS JASA</th>
                  <th>NAMA PEMBERI TUGAS</th>
                  <th>NAMA PEMILIK ASET</th>
                  <th>PENANGGUNG JAWAB</th>
                  <th>TUJUAN PENILAIAN</th>
                  <th>DASAR NILAI</th>
                  <th>PENDEKATAN PENILAIAN</th>
                  <th>TANGGAL PENILAIAN</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($pendaftaran as $d) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $d->id_pendaftaran; ?></td>
                  <td><?php echo $d->tgl_pendaftaran; ?></td>
                  <td><?php echo $d->jenis_jasa; ?></td>
                  <td><?php echo $d->nama_pemberitugas; ?></td>
                  <td><?php echo $d->nama_pemilik; ?></td>
                  <td><?php echo $d->nama_peg; ?></td>
                  <td><?php echo $d->tujuan_penilaian; ?></td>
                  <td><?php echo $d->dasar_penilaian; ?></td>
                  <td><?php echo $d->pendekatan_penilaian; ?></td>
                  <td><?php echo $d->tgl_penilaian; ?></td>
                  <td>
                    <a href="#" class="btn-sm btn-primary pilih" data-idpendaftaran="<?php echo $d->id_pendaftaran; ?>" data-tglpenilaian="<?php echo $d->tgl_penilaian; ?>">pilih</a>
                  </td>
                </tr>
                <?php $no++;
              } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="modal modal-blur fade" id="modalsurvei" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Data Survei</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-striped table-bordered" id="tabelsurvei">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID SURVEI</th>
                      <th>TANGGAL INSPEKSI</th>
                      <th>ID PENDAFTARAN</th>
                      <th>ID LINGKUNGAN</th>
                      <th>PENILAI / SURVEYOR</th>
                      <th>BENTUK TANAH</th>
                      <th>ELEVASI (m)</th>
                      <th>BATASAN TERHADAP TANAH</th>
                      <th>PERATURAN TATA KOTA</th>
                      <th>PEMENUHAN TERHADAP PERATURAN TATA KOTA</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($survei as $s) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $s->id_survei; ?></td>
                      <td><?php echo $s->tgl_inspeksi; ?></td>
                      <td><?php echo $s->id_pendaftaran; ?></td>
                      <td><?php echo $s->id_lingkungan; ?></td>
                      <td><?php echo $s->nama_peg; ?></td>
                      <td><?php echo $s->bentuk_tanah; ?></td>
                      <td><?php echo $s->elevasi; ?></td>
                      <td><?php echo $s->batasan_thd_tanah; ?></td>
                      <td><?php echo $s->peraturan_tata_kota; ?></td>
                      <td><?php echo $s->pemenuhan_thd_peraturan_tatakota; ?></td>
                      <td>
                        <a href="#" class="btn-sm btn-primary pilihsurvei" data-idsurvei="<?php echo $s->id_survei; ?>">pilih</a>
                      </td>
                    </tr>
                    <?php $no++;
                  } ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
<script>
document.addEventListener("DOMContentLoaded", function(){
  flatpickr(document.getElementById('tgl_perhitungan_nilai'), {});
});
document.addEventListener("DOMContentLoaded", function(){
  flatpickr(document.getElementById('tgl_penilaian'), {});
});

$("#formpenilaian").submit(function(){
  var id_penilaian = $("#id_penilaian").val();
  var tgl_perhitungan_nilai = $("#tgl_perhitungan_nilai").val();
  var id_survei = $("#id_survei").val();
  var id_pendaftaran = $("#id_pendaftaran").val();
  var tgl_penilaian = $("#tgl_penilaian").val();
  var id_peg = $("#id_peg").val();
  var keterangan_nilai = $("#keterangan_nilai").val();
  var worksheet_tanah = $("#worksheet_tanah").val();
  var tanah_deskripsi = $("#tanah_deskripsi").val();
  var ringkasan_penilaian = $("#ringkasan_penilaian").val();


  if (id_penilaian == ""){
    swal("Opps!", "ID Penilaian Harus Diisi!", "warning");
    return false;
  }else if (tgl_perhitungan_nilai == ""){
    swal("Opps!", "Tanggal Perhitungan Harus Diisi!", "warning");
    return false;
  }else if (id_survei == ""){
    swal("Opps!", "ID Survei Harus Diisi!", "warning");
    return false;
  }else if (id_pendaftaran == ""){
    swal("Opps!", "ID Pendaftaran Harus Diisi!", "warning");
    return false;
  }else if (tgl_penilaian == ""){
    swal("Opps!", "Tanggal Penilaian Harus Diisi!", "warning");
    return false;
  }else if (id_peg == ""){
    swal("Opps!", "Id Pegawai Harus Diisi!", "warning");
    return false;
  }else if (keterangan_nilai == ""){
    swal("Opps!", "Keterangan Nilai Harus Diisi!", "warning");
    return false;
  }else if (worksheet_tanah == ""){
    swal("Opps!", "Worksheet Tanah Harus Diisi!", "warning");
    return false;
  }else if (tanah_deskripsi == ""){
    swal("Opps!", "Deskripsi Tanah Harus Diisi!", "warning");
    return false;
  }else if (ringkasan_penilaian == ""){
    swal("Opps!", "Ringkasan Penilaian Harus Diisi!", "warning");
    return false;
  }else{
    return true;
  }
});

$("#id_survei").click(function(){
  $("#modalsurvei").modal("show");
});
$("#tabelsurvei").DataTable();

$(".pilihsurvei").click(function(){
  var id_survei = $(this).attr("data-idsurvei");
  $("#id_survei").val(id_survei);
  $("#modalsurvei").modal("hide");
});

$("#id_pendaftaran").click(function(){
  $("#modalpendaftaran").modal("show");
});
$("#tabelpendaftaran").DataTable();

// $(".pilih").click(function(){
//   var id_pendaftaran = $(this).attr("data-idpendaftaran");
//   $("#id_pendaftaran").val(id_pendaftaran);
//   $("#modalpendaftaran").modal("hide");
// });

$("#tgl_penilaian").click(function(){
  $("#modalpendaftaran").modal("show");
});
$("#tabelpendaftaran").DataTable();

$(".pilih").click(function(){
  var id_pendaftaran = $(this).attr("data-idpendaftaran");
  var tgl_penilaian = $(this).attr("data-tglpenilaian");
  $("#id_pendaftaran").val(id_pendaftaran);
  $("#tgl_penilaian").val(tgl_penilaian);
  $("#modalpendaftaran").modal("hide");
});

</script>
