<h2 class="page-title">
    Survei
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="<?php echo base_url(); ?>Survei/inputsurvei" class="btn btn-primary mb-3" id="tambahsurvei">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <table class="table table-striped table-bordered" id="tabelsurvei">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID SURVEI</th>
              <th>TANGGAL INSPEKSI</th>
              <th>ID PENDAFTARAN</th>
              <th>ID LINGKUNGAN</th>
              <th>PENILAI / SURVEYOR</th>
              <th>BENTUK TANAH</th>
              <th>ELEVASI (m)</th>
              <th>BATASAN TERHADAP TANAH</th>
              <th>PERATURAN TATA KOTA</th>
              <th>PEMENUHAN TERHADAP PERATURAN TATA KOTA</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($survei as $s) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $s->id_survei; ?></td>
              <td><?php echo $s->tgl_inspeksi; ?></td>
              <td><?php echo $s->id_pendaftaran; ?></td>
              <td><?php echo $s->id_lingkungan; ?></td>
              <td><?php echo $s->nama_peg; ?></td>
              <td><?php echo $s->bentuk_tanah; ?></td>
              <td><?php echo $s->elevasi; ?></td>
              <td><?php echo $s->batasan_thd_tanah; ?></td>
              <td><?php echo $s->peraturan_tata_kota; ?></td>
              <td><?php echo $s->pemenuhan_thd_peraturan_tatakota; ?></td>
              <td>
                <a href="<?php echo base_url(); ?>Survei/detailsurvei/<?php echo $s->id_survei; ?>" class="btn btn-sm btn-success text-center detail">
                  <li class="fa fa-eye"></li></a>
                <a href="#" data-href="<?php echo base_url(); ?>Survei/hapussurvei/<?php echo $s->id_survei; ?>" class="btn btn-sm btn-danger text-center hapus">
                  <li class="fa fa-trash"></li></a>
                <a href="<?php echo base_url(); ?>Survei/cetaksurvei/<?php echo $s->id_survei; ?>" target="_blank" class="btn btn-sm btn-primary text-center cetak">
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
<div class="modal modal-blur fade" id="modalhapussurvei" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapussurvei" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapussurvei").modal("show");
    $("#hapussurvei").attr("href",href);
  });

  $('#tabelsurvei').DataTable();
});
</script>
