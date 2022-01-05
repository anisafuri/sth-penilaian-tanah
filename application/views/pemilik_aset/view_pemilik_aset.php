<h2 class="page-title">
    Data Pemilik Aset
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="#" class="btn btn-primary mb-3" id="tambahpemilikaset">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <table class="table table-striped table-bordered" id="tabelpemilikaset">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID PEMILIK ASET</th>
              <th>NAMA PEMILIK ASET</th>
              <th>ALAMAT</th>
              <th>PHONE</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($pemilik_aset as $a) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $a->id_pemilik; ?></td>
              <td><?php echo $a->nama_pemilik; ?></td>
              <td><?php echo $a->alamat_pemilik; ?></td>
              <td><?php echo $a->telp_pemilik; ?></td>
              <td>
                <a href="#" data-id_pemilikaset="<?php echo $a->id_pemilik; ?>" class="btn btn-xs btn-success text-center edit">
                  <li class="fa fa-pencil"></li></a>
                <a href="#" data-href="<?php echo base_url(); ?>Pemilikaset/hapuspemilikaset/<?php echo $a->id_pemilik; ?>" class="btn btn-xs btn-danger text-center hapus">
                  <li class="fa fa-trash"></li></a>
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
<div class="modal modal-blur fade" id="modalpemilikaset" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Pemilik Aset</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputpemilikaset"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modaleditpemilikaset" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Pemilik Aset</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditpemilikaset"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modalhapuspemilikaset" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapuspemilikaset" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $("#tambahpemilikaset").click(function(){
    $("#modalpemilikaset").modal("show");
    $("#loadforminputpemilikaset").load("<?php echo base_url(); ?>Pemilikaset/inputpemilikaset");
  });

  $(".edit").click(function(){
    var id_pemilik = $(this).attr("data-id_pemilikaset");
    $("#modaleditpemilikaset").modal("show");
    $("#loadformeditpemilikaset").load("<?php echo base_url(); ?>Pemilikaset/editpemilikaset/" + id_pemilik);
  });

  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapuspemilikaset").modal("show");
    $("#hapuspemilikaset").attr("href",href);
  });

  $('#tabelpemilikaset').DataTable();
});
</script>
