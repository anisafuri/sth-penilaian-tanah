<h2 class="page-title">
    Pengiriman
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="<?php echo base_url(); ?>Pengiriman/inputpengiriman" class="btn btn-primary mb-3" id="tambahpengiriman">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <table class="table table-striped table-bordered" id="tabelpengiriman">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID PENGIRIMAN</th>
              <th>TANGGAL PENGIRIMAN</th>
              <th>PENGIRIM</th>
              <th>PENERIMA</th>
              <th>ALAMAT PENERIMA</th>
              <th>UP</th>
              <th>ISI</th>
              <th>FINAL REPORT</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($pengiriman as $m) {

            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $m->id_pengiriman; ?></td>
              <td><?php echo $m->tgl_pengiriman; ?></td>
              <td><?php echo $m->nama_peg; ?></td>
              <td><?php echo $m->penerima; ?></td>
              <td><?php echo $m->alamat_penerima; ?></td>
              <td><?php echo $m->up; ?></td>
              <td><?php echo $m->isi; ?></td>
              <td><?php
              if ($m->final_report) {
                $files = explode(',',$m->final_report);
                for ($i=0; $i < count($files); $i++) {
                  echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                }
              }
              ?>
            </td>
            <td>
              <a href="#" data-href="<?php echo base_url(); ?>Pengiriman/hapuspengiriman?id=<?php echo $m->id_pengiriman; ?>" class="btn btn-sm btn-danger text-center hapus">
                  <li class="fa fa-trash"></li></a>
              <a href="<?php echo base_url(); ?>Pengiriman/cetakpengiriman?id=<?php echo $m->id_pengiriman; ?>" target="_blank" class="btn btn-sm btn-primary text-center cetak">
                  <li class="fa fa-print"></li></a>
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
<div class="modal modal-blur fade" id="modalhapuspengiriman" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapuspengiriman" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapuspengiriman").modal("show");
    $("#hapuspengiriman").attr("href",href);
  });

  $('#tabelpengiriman').DataTable();
});
</script>
