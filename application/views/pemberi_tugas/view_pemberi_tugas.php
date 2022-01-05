<h2 class="page-title">
    Data Pemberi Tugas
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="#" class="btn btn-primary mb-3" id="tambahpemberitugas">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <table class="table table-striped table-bordered" id="tabelpemberitugas">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID PEMBERI TUGAS</th>
              <th>KODE INDUSTRI</th>
              <th>NAMA PEMBERI TUGAS</th>
              <th>ALAMAT</th>
              <th>BIDANG USAHA</th>
              <th>PHONE</th>
              <th>FAX</th>
              <th>EMAIL</th>
              <th>NPWP</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($pemberi_tugas as $k) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $k->id_pemberitugas; ?></td>
              <td><?php echo $k->kode_industri; ?></td>
              <td><?php echo $k->nama_pemberitugas; ?></td>
              <td><?php echo $k->alamat_pemberitugas; ?></td>
              <td><?php echo $k->bidang_usaha; ?></td>
              <td><?php echo $k->telp_pemberitugas; ?></td>
              <td><?php echo $k->fax_pemberitugas; ?></td>
              <td><?php echo $k->email_pemberitugas; ?></td>
              <td><?php echo $k->npwp; ?></td>
              <td>
                <a href="#" data-id_pemberitugas="<?php echo $k->id_pemberitugas; ?>" class="btn btn-xs btn-success text-center edit">
                  <li class="fa fa-pencil"></li></a>
                <a href="#" data-href="<?php echo base_url(); ?>Pemberitugas/hapuspemberitugas/<?php echo $k->id_pemberitugas; ?>" class="btn btn-xs btn-danger text-center hapus">
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
<div class="modal modal-blur fade" id="modalpemberitugas" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Pemberi Tugas</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputpemberitugas"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modaleditpemberitugas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Pemberi Tugas</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditpemberitugas"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modalhapuspemberitugas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapuspemberitugas" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $("#tambahpemberitugas").click(function(){
    $("#modalpemberitugas").modal("show");
    $("#loadforminputpemberitugas").load("<?php echo base_url(); ?>Pemberitugas/inputpemberitugas");
  });

  $(".edit").click(function(){
    var id_pemberitugas = $(this).attr("data-id_pemberitugas");
    $("#modaleditpemberitugas").modal("show");
    $("#loadformeditpemberitugas").load("<?php echo base_url(); ?>Pemberitugas/editpemberitugas/" + id_pemberitugas);
  });

  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapuspemberitugas").modal("show");
    $("#hapuspemberitugas").attr("href",href);
  });

  $('#tabelpemberitugas').DataTable();
});
</script>
