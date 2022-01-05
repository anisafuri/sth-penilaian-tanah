<h2 class="page-title">
    Data Tanah
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="#" class="btn btn-primary mb-3" id="tambahtanah">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="tabeltanah">
            <thead>
              <tr>
                <th>NO</th>
                <th>NO SERTIFIKAT</th>
                <th>HAK TANAH</th>
                <th>WILAYAH</th>
                <th>PEMEGANG HAK</th>
                <th>TANGGAL DIKELUARKAN</th>
                <th>TANGGAL JATUH TEMPO</th>
                <th>NO GAMBAR SITUASI</th>
                <th>TANGGAL GAMBAR SITUASI</th>
                <th>LUAS (Dalam m2)</th>
                <th>SERTIPIKAT TANAH</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach($tanah as $t) {
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $t->no_sertifikat; ?></td>
                <td><?php echo $t->hak_tanah; ?></td>
                <td><?php echo $t->kabupaten; ?></td>
                <td><?php echo $t->nama_pemegang_hak; ?></td>
                <td><?php echo $t->tgl_dikeluarkan; ?></td>
                <td><?php echo $t->tgl_jatuh_tempo; ?></td>
                <td><?php echo $t->no_gambar_situasi; ?></td>
                <td><?php echo $t->tgl_gambar_situasi; ?></td>
                <td><?php echo $t->luas; ?></td>
                <td><?php
                    if ($t->sertipikat_tanah) {
                      $files = explode(',',$t->sertipikat_tanah);
                      for ($i=0; $i < count($files); $i++) {
                        echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                      }
                    }
                  ?>
                </td>
                <td>
                  <a href="#" data-no_sertifikat="<?php echo base_url(); ?>Tanah/edittanah?id=<?php echo $t->no_sertifikat; ?>" class="btn btn-xs btn-success text-center edit">
                    <li class="fa fa-pencil"></li></a>
                  <a href="#" data-href="<?php echo base_url(); ?>Tanah/hapustanah?id=<?php echo $t->no_sertifikat; ?>" class="btn btn-xs btn-danger text-center hapus">
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
</div>
<div class="modal modal-blur fade" id="modaltanah" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Tanah</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputtanah"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modaledittanah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Tanah</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformedittanah"></div>
          </div>
        </div>
      </div>
    </div>
<div class="modal modal-blur fade" id="modalhapustanah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapustanah" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $("#tambahtanah").click(function(){
    $("#modaltanah").modal("show");
    $("#loadforminputtanah").load("<?php echo base_url(); ?>Tanah/inputtanah");
  });

  $(".edit").click(function(){
    var no_sertifikat = $(this).attr("data-no_sertifikat");
    $("#modaledittanah").modal("show");
    $("#loadformedittanah").load("<?php echo base_url(); ?>Tanah/edittanah/" + no_sertifikat);
  });

  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapustanah").modal("show");
    $("#hapustanah").attr("href",href);
  });

  $('#tabeltanah').DataTable();
});
</script>
