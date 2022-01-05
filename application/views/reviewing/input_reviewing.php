<h2 class="page-title">
    Form Reviewing
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formreviewing" method="POST" action="<?php echo base_url(); ?>Reviewing/simpanreviewing" enctype="multipart/form-data">
  <input type="hidden" name="id_owner_penilaian" id="id_owner_penilaian">
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
      <label class="form-label">ID REVIEWING</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" class="form-control" name="id_reviewing" id="id_reviewing" placeholder="ID Reviewing">
      </div>
      <label class="form-label">NAMA REVIEWER</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-user"></li>
      </span>
      <input type="hidden" value="<?php echo $this->session->userdata('id_peg'); ?>" name="id_peg" id="id_peg">
      <input type="text" readonly value="<?php echo $this->session->userdata('id_peg') . " - " . $this->session->userdata('nama_peg'); ?>" class="form-control" name="nama_peg" id="nama_peg">
      </div>
      <label class="form-label">TANGGAL REVIEWING</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" readonly class="form-control" name="tgl_reviewing" id="tgl_reviewing" placeholder="Tanggal Reviewing">
      </div>
      <label class="form-label">ID PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" readonly class="form-control" name="id_penilaian" id="id_penilaian" placeholder="ID Penilaian">
      </div>
      <label class="form-label">STATUS REVIEWING</label>
      <div class="input-icon mb-3">
        <input type="radio" name="status_reviewing" id="status_reviewing" value="OK"> OK
        <input type="radio" name="status_reviewing" id="status_reviewing" value="Revisi"> Revisi
      </div>
      <label class="form-label">KOMENTAR</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-sticky-note"></li>
        </span>
          <input type="text" class="form-control" name="komentar" id="komentar" placeholder="Komentar">
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
                    <a href="#" class="btn-sm btn-primary pilih" data-idpenilaian="<?php echo $n->id_penilaian; ?>"
                    data-idpeg="<?php echo $n->id_peg; ?>">pilih</a>
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
  flatpickr(document.getElementById('tgl_reviewing'), {});
});

$("#formreviewing").submit(function(){
  var id_reviewing = $("#id_reviewing").val();
  var id_peg = $("#id_peg").val();
  var tgl_reviewing = $("#tgl_reviewing").val();
  var id_penilaian = $("#id_penilaian").val();
  var status_reviewing = $("#status_reviewing").val();
  var komentar = $("#komentar").val();

  if (id_reviewing == ""){
    swal("Opps!", "ID Reviewing Harus Diisi!", "warning");
    return false;
  }else if (id_peg == ""){
    swal("Opps!", "Nama Reviewer Harus Diisi!", "warning");
    return false;
  }else if (tgl_reviewing == ""){
    swal("Opps!", "Tanggal Reviewing Harus Diisi!", "warning");
    return false;
  }else if (id_penilaian == ""){
    swal("Opps!", "ID Penilaian Harus Diisi!", "warning");
    return false;
  }else if (status_reviewing == ""){
    swal("Opps!", "Status Reviewing Harus Diisi!", "warning");
    return false;
  }else if (komentar == ""){
    swal("Opps!", "Komentar Harus Diisi!", "warning");
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
  var id_peg = $(this).attr("data-idpeg");
  $("#id_penilaian").val(id_penilaian);
  $("#id_owner_penilaian").val(id_peg);
  $("#modalpenilaian").modal("hide");
});

</script>
