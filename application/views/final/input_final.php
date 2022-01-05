<h2 class="page-title">
    Form Laporan Final
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formfinal" method="POST" action="<?php echo base_url(); ?>Final_Laporan/simpanfinal" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
      <label class="form-label">ID REPORT</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" class="form-control" name="id_report" id="id_report" placeholder="ID Report">
      </div>
      <label class="form-label">ID DRAFT</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" class="form-control" name="id_draft" id="id_draft" placeholder="ID Draft">
      </div>
      <label class="form-label">TANGGAL REPORT</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" readonly class="form-control" name="tgl_report" id="tgl_report" placeholder="Tanggal Report">
      </div>
      <label class="form-label">FINAL REPORT</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file-pdf"></li>
        </span>
          <input type="file" class="form-control" name="final_report" id="final_report">
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
    <div class="modal modal-blur fade" id="modaldraft" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Data Draft Laporan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tabeldraft">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID DRAFT</th>
                      <th>TANGGAL DRAFT</th>
                      <th>ID PENILAIAN</th>
                      <th>ID PENDAFTARAN</th>
                      <th>JENDELA</th>
                      <th>COVERING LETTER</th>
                      <th>PERNYATAAN PENILAI</th>
                      <th>ASUMSI</th>
                      <th>TINJAUAN</th>
                      <th>DESKRIPSI TANAH</th>
                      <th>WORKSHEET TANAH</th>
                      <th>GAMBAR SITUASI</th>
                      <th>FOTO - FOTO</th>
                      <th>PETA LOKASI</th>
                      <th>PENGUPLOAD</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($draft_laporan as $b) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $b->id_draft; ?></td>
                      <td><?php echo $b->tgl_draft; ?></td>
                      <td><?php echo $b->id_penilaian; ?></td>
                      <td><?php echo $b->id_pendaftaran; ?></td>
                      <td><?php
                        if ($b->jendela) {
                          $files = explode(',',$b->jendela);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                        if ($b->covering_letter) {
                          $files = explode(',',$b->covering_letter);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                        if ($b->pernyataan_penilai) {
                          $files = explode(',',$b->pernyataan_penilai);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                        if ($b->asumsi) {
                          $files = explode(',',$b->asumsi);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                        if ($b->tinjauan) {
                          $files = explode(',',$b->tinjauan);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                        if ($b->tanah_deskripsi) {
                          $files = explode(',',$b->tanah_deskripsi);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                        if ($b->worksheet_tanah) {
                          $files = explode(',',$b->worksheet_tanah);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                      </td>
                      <td><?php
                      if ($b->gambar_situasi) {
                        $files = explode(',',$b->gambar_situasi);
                        for ($i=0; $i < count($files); $i++) {
                          echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                        }
                      }
                      ?>
                    </td>
                    <td><?php
                    if ($b->foto_foto) {
                      $files = explode(',',$b->foto_foto);
                      for ($i=0; $i < count($files); $i++) {
                        echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                      }
                    }
                    ?>
                  </td>
                  <td><?php
                  if ($b->peta_lokasi) {
                    $files = explode(',',$b->peta_lokasi);
                    for ($i=0; $i < count($files); $i++) {
                      echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                    }
                  }
                  ?>
                </td>
                <td><?php echo $b->nama_peg; ?></td>
                    <td>
                      <a href="#" class="btn-sm btn-primary pilih" data-iddraft="<?php echo $b->id_draft; ?>">pilih</a>
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
        </div>
<script>
document.addEventListener("DOMContentLoaded", function(){
  flatpickr(document.getElementById('tgl_report'), {});
});

$("#formfinal").submit(function(){
  var id_report = $("#id_report").val();
  var id_draft = $("#id_draft").val();
  var tgl_report = $("#tgl_report").val();
  var final_report = $("#final_report").val();
  var id_peg = $("#id_peg").val();

  if (id_report == ""){
    swal("Opps!", "ID Report Harus Diisi!", "warning");
    return false;
  }else if (id_draft == ""){
    swal("Opps!", "ID Draft Harus Diisi!", "warning");
    return false;
  }else if (tgl_report == ""){
    swal("Opps!", "Tanggal Report Harus Diisi!", "warning");
    return false;
  }else if (final_report == ""){
    swal("Opps!", "Final Report Harus Diisi!", "warning");
    return false;
  }else if (id_peg == ""){
    swal("Opps!", "Nama Pengupload Harus Diisi!", "warning");
    return false;
  }else{
    return true;
  }
});

$("#id_draft").click(function(){
  $("#modaldraft").modal("show");
});
$("#tabeldraft").DataTable();

$(".pilih").click(function(){
  var id_draft = $(this).attr("data-iddraft");
  $("#id_draft").val(id_draft);
  $("#modaldraft").modal("hide");
});

</script>
