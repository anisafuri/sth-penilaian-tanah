<h2 class="page-title">
    Penilaian
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php if($this->session->userdata('level') == "Penilai"){ ?>
        <a href="<?php echo base_url(); ?>Penilaian/inputpenilaian" class="btn btn-primary mb-3" id="tambahpenilaian">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <?php } ?>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tabelpenilaian">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID PENILAIAN</th>
              <th>TANGGAL PERHITUNGAN</th>
              <th>ID SURVEI</th>
              <th>ID PENDAFTARAN</th>
              <th>TANGGAL PENILAIAN</th>
              <th>NAMA PENILAI</th>
              <th>KETERANGAN</th>
              <th>WORKSHEET TANAH</th>
              <th>DESKRIPSI TANAH</th>
              <th>RINGKASAN PENILAIAN</th>
              <?php if($this->session->userdata('level') == "Penilai"){ ?>
              <th>AKSI</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($penilaian as $n) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $n->id_penilaian; ?></td>
              <td><?php echo $n->tgl_perhitungan_nilai; ?></td>
              <td><?php echo $n->id_survei; ?></td>
              <td><?php echo $n->id_pendaftaran; ?></td>
              <td><?php echo $n->tgl_penilaian; ?></td>
              <td><?php echo $n->nama_peg; ?></td>
              <td><?php echo $n->keterangan_nilai; ?></td>
              <td><?php
                if ($n->worksheet_tanah) {
                  $files = explode(',',$n->worksheet_tanah);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
                if ($n->tanah_deskripsi) {
                  $files = explode(',',$n->tanah_deskripsi);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
              if ($n->ringkasan_penilaian) {
                $files = explode(',',$n->ringkasan_penilaian);
                for ($i=0; $i < count($files); $i++) {
                  echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                }
              }
              ?>
            </td>
            <?php if($this->session->userdata('level') == "Penilai"){ ?>
            <td>
              <a href="<?php echo base_url(); ?>Penilaian/detailpenilaian?id=<?php echo $n->id_penilaian; ?>" class="btn btn-sm btn-success text-center detail">
                  <li class="fa fa-eye"></li></a>
              <a href="#" data-href="<?php echo base_url(); ?>Penilaian/hapuspenilaian?id=<?php echo $n->id_penilaian; ?>" class="btn btn-sm btn-danger text-center hapus">
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
</div>
<div class="modal modal-blur fade" id="modalhapuspenilaian" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapuspenilaian" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapuspenilaian").modal("show");
    $("#hapuspenilaian").attr("href",href);
  });

  $('#tabelpenilaian').DataTable();
});
</script>
