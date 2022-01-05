<h2 class="page-title">
    Draft Laporan
</h2>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php if($this->session->userdata('level') == "Penilai" || $this->session->userdata('level') == "Admin"){ ?>
        <a href="<?php echo base_url(); ?>Draft/inputdraft" class="btn btn-primary mb-3" id="tambahdraft">
          <li class="fa fa-plus"></li>
          &nbsp;Tambah Data
        </a>
        <?php } ?>
        <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tabeldraft">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID DRAFT</th>
              <th>TANGGAL DRAFT</th>
              <th>ID PENILAIAN</th>
              <th>ID PENDAFTARAN</th>
              <th>JENDELA</th>
              <th>COVERING LETTER</th>
              <th>PERNYATAAN PENILAI</th>
              <th>ASUMSI</th>
              <th>TINJAUAN</th>
              <th>DESKRIPSI TANAH</th>
              <th>WORKSHEET TANAH</th>
              <th>GAMBAR SITUASI</th>
              <th>FOTO - FOTO</th>
              <th>PETA LOKASI</th>
              <th>PENGUPLOAD</th>
              <?php if($this->session->userdata('level') == "Penilai" || $this->session->userdata('level') == "Admin"){ ?>
              <th>AKSI</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($draft_laporan as $b) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $b->id_draft; ?></td>
              <td><?php echo $b->tgl_draft; ?></td>
              <td><?php echo $b->id_penilaian; ?></td>
              <td><?php echo $b->id_pendaftaran; ?></td>
              <td><?php
                if ($b->jendela) {
                  $files = explode(',',$b->jendela);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
                if ($b->covering_letter) {
                  $files = explode(',',$b->covering_letter);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
                if ($b->pernyataan_penilai) {
                  $files = explode(',',$b->pernyataan_penilai);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
                if ($b->asumsi) {
                  $files = explode(',',$b->asumsi);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
                if ($b->tinjauan) {
                  $files = explode(',',$b->tinjauan);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
                if ($b->tanah_deskripsi) {
                  $files = explode(',',$b->tanah_deskripsi);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
                if ($b->worksheet_tanah) {
                  $files = explode(',',$b->worksheet_tanah);
                  for ($i=0; $i < count($files); $i++) {
                    echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                  }
                }
              ?>
              </td>
              <td><?php
              if ($b->gambar_situasi) {
                $files = explode(',',$b->gambar_situasi);
                for ($i=0; $i < count($files); $i++) {
                  echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                }
              }
              ?>
            </td>
            <td><?php
            if ($b->foto_foto) {
              $files = explode(',',$b->foto_foto);
              for ($i=0; $i < count($files); $i++) {
                echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
              }
            }
            ?>
          </td>
          <td><?php
          if ($b->peta_lokasi) {
            $files = explode(',',$b->peta_lokasi);
            for ($i=0; $i < count($files); $i++) {
              echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
            }
          }
          ?>
        </td>
        <td><?php echo $b->nama_peg; ?></td>
            <?php if($this->session->userdata('level') == "Penilai" || $this->session->userdata('level') == "Admin"){ ?>
            <td>
              <a href="#" data-href="<?php echo base_url(); ?>Draft/hapusdraft?id=<?php echo $b->id_draft; ?>" class="btn btn-sm btn-danger text-center hapus">
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
<div class="modal modal-blur fade" id="modalhapusdraft" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Anda Yakin?</div>
          <div>Jika Dihapus, Anda Akan Kehilangan Data Ini</div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Batal</button>
      <a href="#" id="hapusdraft" class="btn btn-danger text-center">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $(".hapus").click(function(){
    var href = $(this).attr("data-href");
    $("#modalhapusdraft").modal("show");
    $("#hapusdraft").attr("href",href);
  });

  $('#tabeldraft').DataTable();
});
</script>
