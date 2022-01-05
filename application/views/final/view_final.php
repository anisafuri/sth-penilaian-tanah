<h2 class="page-title">
    Laporan Final
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php if($this->session->userdata('level') == "Produksi" || $this->session->userdata('level') == "Admin"){ ?>
        <a href="<?php echo base_url(); ?>Final_Laporan/inputfinal" class="btn btn-primary mb-3" id="tambahfinal">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <?php } ?>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <table class="table table-striped table-bordered" id="tabelfinal">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID REPORT</th>
              <th>ID DRAFT</th>
              <th>TANGGAL REPORT</th>
              <th>FINAL REPORT</th>
              <th>PENGUPLOAD</th>
              <?php if($this->session->userdata('level') == "Produksi" || $this->session->userdata('level') == "Admin"){ ?>
              <th>AKSI</th>
              <?php } ?>
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
              <?php if($this->session->userdata('level') == "Produksi" || $this->session->userdata('level') == "Admin"){ ?>
              <td>
              <a href="#" data-href="<?php echo base_url(); ?>Final_Laporan/hapusfinal?id=<?php echo $f->id_report; ?>" class="btn btn-sm btn-danger text-center hapus">
                  <li class="fa fa-trash"></li></a>

              </td>
            <?php } ?>
            </tr>
            <?php $no++;
          } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalhapusfinal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapusfinal" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapusfinal").modal("show");
    $("#hapusfinal").attr("href",href);
  });

  $('#tabelfinal').DataTable();
});
</script>
