<h2 class="page-title">
    Reviewing
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php if($this->session->userdata('level') == "Reviewer"){ ?>
        <a href="<?php echo base_url(); ?>Reviewing/inputreviewing" class="btn btn-primary mb-3" id="tambahreviewing">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <?php } ?>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <table class="table table-striped table-bordered" id="tabelreviewing">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID REVIEWING</th>
              <th>REVIEWER</th>
              <th>TANGGAL REVIEW</th>
              <th>ID PENILAIAN</th>
              <th>STATUS REVIEWING</th>
              <th>KOMENTAR</th>
              <?php if($this->session->userdata('level') == "Reviewer"){ ?>
              <th>AKSI</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($reviewing as $r) {
              if ($r->status_reviewing == "Revisi"){
                $warna = "bg-red";
              }else{
                $warna = "bg-green";
              }
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $r->id_reviewing; ?></td>
              <td><?php echo $r->nama_peg; ?></td>
              <td><?php echo $r->tgl_reviewing; ?></td>
              <td><?php echo $r->id_penilaian; ?></td>
              <td><span class="badge <?php echo $warna; ?>"><?php echo $r->status_reviewing; ?></span></td>
              <td><?php echo $r->komentar; ?></td>
              <?php if($this->session->userdata('level') == "Reviewer"){ ?>
            <td>
              <a href="<?php echo base_url(); ?>Reviewing/detailreviewing?id=<?php echo $r->id_reviewing; ?>" class="btn btn-sm btn-success text-center detail">
                  <li class="fa fa-eye"></li></a>
              <a href="#" data-href="<?php echo base_url(); ?>Reviewing/hapusreviewing?id=<?php echo $r->id_reviewing; ?>" class="btn btn-sm btn-danger text-center hapus">
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
<div class="modal modal-blur fade" id="modalhapusreviewing" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapusreviewing" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapusreviewing").modal("show");
    $("#hapusreviewing").attr("href",href);
  });

  $('#tabelreviewing').DataTable();
});
</script>
