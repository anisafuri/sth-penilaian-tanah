<h2 class="page-title">
    Pendaftaran
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="<?php echo base_url(); ?>Pendaftaran/inputPendaftaran" class="btn btn-primary mb-3" id="tambahpendaftaran">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <table class="table table-striped table-bordered" id="tabelpendaftaran">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID PENDAFTARAN</th>
              <th>TANGGAL PENDAFTARAN</th>
              <th>JENIS JASA</th>
              <th>NAMA PEMBERI TUGAS</th>
              <th>NAMA PEMILIK ASET</th>
              <th>PENANGGUNG JAWAB</th>
              <th>TUJUAN PENILAIAN</th>
              <th>DASAR NILAI</th>
              <th>PENDEKATAN PENILAIAN</th>
              <th>TANGGAL PENILAIAN</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($pendaftaran as $d) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $d->id_pendaftaran; ?></td>
              <td><?php echo $d->tgl_pendaftaran; ?></td>
              <td><?php echo $d->jenis_jasa; ?></td>
              <td><?php echo $d->nama_pemberitugas; ?></td>
              <td><?php echo $d->nama_pemilik; ?></td>
              <td><?php echo $d->nama_peg; ?></td>
              <td><?php echo $d->tujuan_penilaian; ?></td>
              <td><?php echo $d->dasar_penilaian; ?></td>
              <td><?php echo $d->pendekatan_penilaian; ?></td>
              <td><?php echo $d->tgl_penilaian; ?></td>
              <td>
                <a href="<?php echo base_url(); ?>Pendaftaran/detailpendaftaran?id=<?php echo $d->id_pendaftaran; ?>" class="btn btn-sm btn-success text-center detail">
                  <li class="fa fa-eye"></li></a>
                <a href="#" data-href="<?php echo base_url(); ?>Pendaftaran/hapuspendaftaran?id=<?php echo $d->id_pendaftaran; ?>" class="btn btn-sm btn-danger text-center hapus">
                  <li class="fa fa-trash"></li></a>
                <a href="<?php echo base_url(); ?>Pendaftaran/cetakpendaftaran?id=<?php echo $d->id_pendaftaran; ?>" target="_blank" class="btn btn-sm btn-primary text-center cetak">
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
<div class="modal modal-blur fade" id="modalhapuspendaftaran" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapuspendaftaran" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapuspendaftaran").modal("show");
    $("#hapuspendaftaran").attr("href",href);
  });

  $('#tabelpendaftaran').DataTable();
});
</script>
