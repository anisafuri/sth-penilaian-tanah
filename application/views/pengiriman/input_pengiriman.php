<h2 class="page-title">
    Form Pengiriman
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formpengiriman" method="POST" action="<?php echo base_url(); ?>Pengiriman/simpanpengiriman" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
      <label class="form-label">ID PENGIRIMAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" class="form-control" name="id_pengiriman" id="id_pengiriman" placeholder="ID Pengiriman">
      </div>
      <label class="form-label">TANGGAL PENGIRIMAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" readonly class="form-control" name="tgl_pengiriman" id="tgl_pengiriman" placeholder="Tanggal Pengiriman">
      </div>
      <label class="form-label">NAMA PENGIRIM</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-user"></li>
      </span>
      <input type="hidden" name="id_peg" id="id_peg">
      <input type="text" class="form-control" name="nama_peg" id="nama_peg" placeholder="Nama Pengirim">
      </div>
      <label class="form-label">PENERIMA</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-user"></li>
      </span>
      <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Penerima">
      </div>
      <label class="form-label">ALAMAT PENERIMA</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-envelope"></li>
      </span>
      <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima" placeholder="Alamat Penerima">
      </div>
      <label class="form-label">UP</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-user"></li>
      </span>
      <input type="text" class="form-control" name="up" id="up" placeholder="UP">
      </div>
      <label class="form-label">ISI</label>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-sticky-note"></li>
      </span>
      <input type="text" class="form-control" name="isi" id="isi" placeholder="isi">
      </div>
      <label class="form-label">FINAL REPORT</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-file"></li>
        </span>
          <input type="hidden" name="id_report" id="id_report">
          <input type="text" class="form-control" name="final_report" id="final_report">
      </div>
      <div class="row mt-3">
        <button type="submit" class="btn btn-primary w100"><i class="fa fa-send mr-2"></i>SIMPAN</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<div class="modal modal-blur fade" id="modalfinal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data Final Laporan</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered" id="tabelfinal">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID REPORT</th>
                  <th>ID DRAFT</th>
                  <th>TANGGAL REPORT</th>
                  <th>FINAL REPORT</th>
                  <th>PENGUPLOAD</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($laporan_final as $f) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $f->id_report; ?></td>
                  <td><?php echo $f->id_draft; ?></td>
                  <td><?php echo $f->tgl_report; ?></td>
                  <td><?php
                    if ($f->final_report) {
                      $files = explode(',',$f->final_report);
                      for ($i=0; $i < count($files); $i++) {
                        echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                      }
                    }
                  ?>
                  </td>
                  <td><?php echo $f->nama_peg; ?></td>
                  <td>
                  <a href="#" class="btn-sm btn-primary pilihreport" data-idreport="<?php echo $f->id_report; ?>" data-finalreport="<?php echo $f->final_report; ?>">pilih</a>
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
<div class="modal modal-blur fade" id="modalpegawai" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data Pegawai</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered" id="tabelpegawai">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID PEGAWAI</th>
                  <th>NAMA PEGAWAI</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>LEVEL</th>
                  <th>ALAMAT PEGAWAI</th>
                  <th>TELP PEGAWAI</th>
                  <th>EMAIL PEGAWAI</th>
                  <th>IZIN PROFESI</th>
                  <th>FOTO PEGAWAI</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($pegawai as $p) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $p->id_peg; ?></td>
                  <td><?php echo $p->nama_peg; ?></td>
                  <td><?php echo $p->username; ?></td>
                  <td><?php echo $p->password; ?></td>
                  <td><?php echo $p->level; ?></td>
                  <td><?php echo $p->alamat_peg; ?></td>
                  <td><?php echo $p->telp_peg; ?></td>
                  <td><?php echo $p->email_peg; ?></td>
                  <td><?php echo $p->izin_profesi; ?></td>
                  <td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $p->foto_peg; ?>"></td>
                  <td>
                    <a href="#" class="btn-sm btn-primary pilih" data-idpeg="<?php echo $p->id_peg; ?>" data-namapeg="<?php echo $p->nama_peg; ?>">pilih</a>
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
  flatpickr(document.getElementById('tgl_pengiriman'), {});
});

$("#formpengiriman").submit(function(){
  var id_pengiriman = $("#id_pengiriman").val();
  var tgl_pengiriman = $("#tgl_pengiriman").val();
  var id_peg = $("#id_peg").val();
  var penerima = $("#penerima").val();
  var alamat_penerima = $("#alamat_penerima").val();
  var up = $("#up").val();
  var isi = $("#isi").val();
  var id_report = $("#id_report").val();

  if (id_pengiriman == ""){
    swal("Opps!", "ID Pengiriman Harus Diisi!", "warning");
    return false;
  }else if (tgl_pengiriman == ""){
    swal("Opps!", "Tanggal Pengiriman Harus Diisi!", "warning");
    return false;
  }else if (id_peg == ""){
    swal("Opps!", "ID Pegawai Harus Diisi!", "warning");
    return false;
  }else if (penerima == ""){
    swal("Opps!", "Penerima Harus Diisi!", "warning");
    return false;
  }else if (alamat_penerima == ""){
    swal("Opps!", "Alamat Penerima Harus Diisi!", "warning");
    return false;
  }else if (up == ""){
    swal("Opps!", "UP Harus Diisi!", "warning");
    return false;
  }else if (isi == ""){
    swal("Opps!", "Isi Harus Diisi!", "warning");
    return false;
  }else if (id_report == ""){
    swal("Opps!", "ID Report Harus Diisi!", "warning");
    return false;
  }else{
    return true;
  }
});

$("#nama_peg").click(function(){
  $("#modalpegawai").modal("show");
});
$("#tabelpegawai").DataTable();

$(".pilih").click(function(){
  var id_peg = $(this).attr("data-idpeg");
  var nama_peg = $(this).attr("data-namapeg");
  $("#id_peg").val(id_peg);
  $("#nama_peg").val(nama_peg);
  $("#modalpegawai").modal("hide");
});

$("#final_report").click(function(){
  $("#modalfinal").modal("show");
});
$("#tabelfinal").DataTable();

$(".pilihreport").click(function(){
  var id_report = $(this).attr("data-idreport");
  var final_report = $(this).attr("data-finalreport");
  $("#id_report").val(id_report);
  $("#final_report").val(final_report);
  $("#modalfinal").modal("hide");
});

</script>
