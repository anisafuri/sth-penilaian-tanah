<h2 class="page-title">
    Data Penilaian
</h2>


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <tr>
            <th>ID Penilaian</th>
            <th><?php echo $penilaian['id_penilaian']; ?></th>
          </tr>
          <tr>
            <th>Tanggal Perhitungan</th>
            <th><?php echo $penilaian['tgl_perhitungan_nilai']; ?></th>
          </tr>
          <tr>
            <th>ID Survei</th>
            <th><?php echo $penilaian['id_survei']; ?></th>
          </tr>
          <tr>
            <th>ID Pendaftaran</th>
            <th><?php echo $penilaian['id_pendaftaran']; ?></th>
          </tr>
          <tr>
            <th>ID Pemberi Tugas</th>
            <th><?php echo $penilaian['id_pemberitugas']; ?></th>
          </tr>
          <tr>
            <th>ID Pemilik Aset</th>
            <th><?php echo $penilaian['id_pemilik']; ?></th>
          </tr>
          <tr>
            <th>Tanggal Penilaian</th>
            <th><?php echo $penilaian['tgl_penilaian']; ?></th>
          </tr>
          <tr>
            <th>Nama Penilai</th>
            <th><?php echo $penilaian['nama_peg']; ?></th>
          </tr>
          <tr>
            <th>Keterangan Nilai</th>
            <th><?php echo $penilaian['keterangan_nilai']; ?></th>
          </tr>
          <tr>
            <th>Worksheet Tanah</th>
            <th><?php
              if ($penilaian['worksheet_tanah']) {
                $files = explode(',',$penilaian['worksheet_tanah']);
                for ($i=0; $i < count($files); $i++) {
                  echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                }
              }
            ?></th>
          </tr>
          <tr>
            <th>Deskripsi Tanah</th>
            <th><?php
              if ($penilaian['tanah_deskripsi']) {
                $files = explode(',',$penilaian['tanah_deskripsi']);
                for ($i=0; $i < count($files); $i++) {
                  echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                }
              }
            ?></th>
          </tr>
          <tr>
            <th>Ringkasan Penilaian</th>
            <th><?php
            if ($penilaian['ringkasan_penilaian']) {
              $files = explode(',',$penilaian['ringkasan_penilaian']);
              for ($i=0; $i < count($files); $i++) {
                echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
              }
            }
            ?></th>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
