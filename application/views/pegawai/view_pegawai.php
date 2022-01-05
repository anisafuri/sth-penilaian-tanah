<h2 class="page-title">
    Data Pengguna
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="#" class="btn btn-primary mb-3" id="tambahpegawai">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tabelpegawai">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID PEGAWAI</th>
              <th>NAMA PEGAWAI</th>
              <th>USERNAME</th>
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
              <td><?php echo $p->level; ?></td>
              <td><?php echo $p->alamat_peg; ?></td>
              <td><?php echo $p->telp_peg; ?></td>
              <td><?php echo $p->email_peg; ?></td>
              <td><?php echo $p->izin_profesi; ?></td>
              <td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $p->foto_peg; ?>"></td>
              <td>
                <a href="#" data-id_peg="<?php echo $p->id_peg; ?>" class="btn btn-xs btn-success text-center edit">
                  <li class="fa fa-pencil"></li></a>
                <a href="#" data-href="<?php echo base_url(); ?>Pegawai/hapuspegawai/<?php echo $p->id_peg; ?>" class="btn btn-xs btn-danger text-center hapus">
                  <li class="fa fa-trash"></li></a>
                <a href="#" data-id_peg="<?php echo $p->id_peg; ?>" class="btn btn-sm btn-warning text-center reset">
                  Reset Pass</a>
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
<div class="modal modal-blur fade" id="modalpegawai" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Data Pegawai</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputpegawai"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modaleditpegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Pegawai</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditpegawai"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modalhapuspegawai" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapuspegawai" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalresetpasspegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Reset Password Pegawai</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformresetpasspegawai"></div>
          </div>
        </div>
      </div>
    </div>
<script>
$(function() {
  $("#tambahpegawai").click(function(){
    $("#modalpegawai").modal("show");
    $("#loadforminputpegawai").load("<?php echo base_url(); ?>Pegawai/inputpegawai");
  });

  $(".edit").click(function(){
    var id_peg = $(this).attr("data-id_peg");
    $("#modaleditpegawai").modal("show");
    $("#loadformeditpegawai").load("<?php echo base_url(); ?>Pegawai/editpegawai/" + id_peg);
  });

  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapuspegawai").modal("show");
    $("#hapuspegawai").attr("href",href);
  });

  $(".reset").click(function(){
    var id_peg = $(this).attr("data-id_peg");
    $("#modalresetpasspegawai").modal("show");
    $("#loadformresetpasspegawai").load("<?php echo base_url(); ?>Pegawai/resetpasspegawai/" + id_peg);
  });

  $('#tabelpegawai').DataTable();
});
</script>
