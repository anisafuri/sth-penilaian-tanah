<h2 class="page-title">
    Form Draft Laporan
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formdraft" method="POST" action="<?php echo base_url(); ?>Draft/simpandraft" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
      <label class="form-label">ID DRAFT</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" class="form-control" name="id_draft" id="id_draft" placeholder="ID Draft">
      </div>
      <label class="form-label">TANGGAL DRAFT</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" readonly class="form-control" name="tgl_draft" id="tgl_draft" placeholder="Tanggal Draft">
      </div>
      <label class="form-label">ID PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" readonly class="form-control" name="id_penilaian" id="id_penilaian" placeholder="ID Penilaian">
      </div>
      <label class="form-label">ID PENDAFTARAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
          <input type="text" readonly class="form-control" name="id_pendaftaran" id="id_pendaftaran" placeholder="ID Pendaftaran">
      </div>
      <label class="form-label">JENDELA</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="jendela" id="jendela">
      </div>
      <label class="form-label">COVERING LETTER</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-word"></li>
        </span>
          <input type="file" class="form-control" name="covering_letter" id="covering_letter">
      </div>
      <label class="form-label">PERNYATAAN PENILAI</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="pernyataan_penilai" id="pernyataan_penilai">
      </div>
      <label class="form-label">ASUMSI</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="asumsi" id="asumsi">
      </div>
      <label class="form-label">TINJAUAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-word"></li>
        </span>
          <input type="file" class="form-control" name="tinjauan" id="tinjauan">
      </div>
      <label class="form-label">GAMBAR SITUASI</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="gambar_situasi" id="gambar_situasi">
      </div>
      <label class="form-label">FOTO-FOTO</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="foto_foto" id="foto_foto">
      </div>
      <label class="form-label">PETA LOKASI</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-excel"></li>
        </span>
          <input type="file" class="form-control" name="peta_lokasi" id="peta_lokasi">
      </div>
      <label class="form-label">PENGUPLOAD</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-user"></li>
      </span>
      <input type="hidden" value="<?php echo $this->session->userdata('id_peg'); ?>" name="id_peg" id="id_peg">
      <input type="text" readonly value="<?php echo $this->session->userdata('id_peg') . " - " . $this->session->userdata('nama_peg'); ?>" class="form-control" name="nama_peg" id="nama_peg">
      </div>
      <div class="row mt-3">
        <button type="submit" class="btn btn-primary w100"><i class="fa fa-send mr-2"></i>SIMPAN</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
    <div class="modal modal-blur fade" id="modalpenilaian" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Data Penilaian</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-striped table-bordered" id="tabelpenilaian">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID PENILAIAN</th>
                      <th>TANGGAL PERHITUNGAN</th>
                      <th>ID SURVEI</th>
                      <th>ID PENDAFTARAN</th>
                      <th>TANGGAL PENILAIAN</th>
                      <th>NAMA PENILAI</th>
                      <th>KETERANGAN</th>
                      <th>WORKSHEET TANAH</th>
                      <th>DESKRIPSI TANAH</th>
                      <th>RINGKASAN PENILAIAN</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($penilaian as $n) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $n->id_penilaian; ?></td>
                      <td><?php echo $n->tgl_perhitungan_nilai; ?></td>
                      <td><?php echo $n->id_survei; ?></td>
                      <td><?php echo $n->id_pendaftaran; ?></td>
                      <td><?php echo $n->tgl_penilaian; ?></td>
                      <td><?php echo $n->nama_peg; ?></td>
                      <td><?php echo $n->keterangan_nilai; ?></td>
                      <td><?php
                        if ($n->worksheet_tanah) {
                          $files = explode(',',$n->worksheet_tanah);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                        if ($n->tanah_deskripsi) {
                          $files = explode(',',$n->tanah_deskripsi);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                      if ($n->ringkasan_penilaian) {
                        $files = explode(',',$n->ringkasan_penilaian);
                        for ($i=0; $i < count($files); $i++) {
                          echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                        }
                      }
                      ?>
                    </td>
                      <td>
                        <a href="#" class="btn-sm btn-primary pilih" data-idpenilaian="<?php echo $n->id_penilaian; ?>" data-idpendaftaran="<?php echo $n->id_pendaftaran; ?>" data-worksheettanah="<?php echo $n->worksheet_tanah; ?>" data-tanahdeskripsi="<?php echo $n->tanah_deskripsi; ?>">pilih</a>
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
  flatpickr(document.getElementById('tgl_draft'), {});
});


$("#formdraft").submit(function(){
  var id_draft = $("#id_draft").val();
  var tgl_draft = $("#tgl_draft").val();
  var id_penilaian = $("#id_penilaian").val();
  var jendela = $("#jendela").val();
  var covering_letter = $("#covering_letter").val();
  var pernyataan_penilai = $("#pernyataan_penilai").val();
  var asumsi = $("#asumsi").val();
  var tinjauan = $("#tinjauan").val();
  var gambar_situasi = $("#gambar_situasi").val();
  var foto_foto = $("#foto_foto").val();
  var peta_lokasi = $("#peta_lokasi").val();
  var id_peg = $("#id_peg").val();

  if (id_draft == ""){
    swal("Opps!", "ID Draft Harus Diisi!", "warning");
    return false;
  }else if (tgl_draft == ""){
    swal("Opps!", "Tanggal Draft Harus Diisi!", "warning");
    return false;
  }else if (id_penilaian == ""){
    swal("Opps!", "ID Penilaian Harus Diisi!", "warning");
    return false;
  }else if (jendela == ""){
    swal("Opps!", "Jendela Harus Diisi!", "warning");
    return false;
  }else if (covering_letter == ""){
    swal("Opps!", "Covering Letter Harus Diisi!", "warning");
    return false;
  }else if (pernyataan_penilai == ""){
    swal("Opps!", "Pernyataan Penilai Harus Diisi!", "warning");
    return false;
  }else if (asumsi == ""){
    swal("Opps!", "Asumsi Harus Diisi!", "warning");
    return false;
  }else if (tinjauan == ""){
    swal("Opps!", "Tinjauan Harus Diisi!", "warning");
    return false;
  }else if (gambar_situasi == ""){
    swal("Opps!", "Gambar Situasi Harus Diisi!", "warning");
    return false;
  }else if (foto_foto == ""){
    swal("Opps!", "Foto-Foto Harus Diisi!", "warning");
    return false;
  }else if (peta_lokasi == ""){
    swal("Opps!", "Peta Lokasi Harus Diisi!", "warning");
    return false;
  }else if (id_peg == ""){
    swal("Opps!", "Nama Pengupload Harus Diisi!", "warning");
    return false;
  }else{
    return true;
  }
});


$("#id_penilaian").click(function(){
  $("#modalpenilaian").modal("show");
});
$("#tabelpenilaian").DataTable();

$(".pilih").click(function(){
  var id_penilaian = $(this).attr("data-idpenilaian");
  var id_pendaftaran = $(this).attr("data-idpendaftaran");
  $("#id_penilaian").val(id_penilaian);
  $("#id_pendaftaran").val(id_pendaftaran);
  $("#modalpenilaian").modal("hide");
});

$("#tanah_deskripsi").click(function(){
  $("#modalpenilaian").modal("show");
});
$("#tabelpenilaian").DataTable();

$(".pilih").click(function(){
  var tanah_deskripsi = $(this).attr("data-tanahdeskripsi");
  $("#tanah_deskripsi").val(tanah_deksripsi);
  $("#modalpenilaian").modal("hide");
});

$("#worksheet_tanah").click(function(){
  $("#modalpenilaian").modal("show");
});

$("#tabelpenilaian").DataTable();

$(".pilih").click(function(){
  var worksheet_tanah = $(this).attr("data-worksheettanah");
  $("#worksheet_tanah").val(worksheet_tanah);
  $("#modalpenilaian").modal("hide");
});

</script>
