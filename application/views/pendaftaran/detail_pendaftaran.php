<h2 class="page-title">
    Data Pendaftaran
</h2>


<input type="hidden" id="cekTanah">
<input type="hidden" id="cekLuas">
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <tr>
            <th>ID Pendaftaran</th>
            <th><?php echo $pendaftaran['id_pendaftaran']; ?></th>
          </tr>
          <tr>
            <th>Tanggal Pendaftaran</th>
            <th><?php echo $pendaftaran['tgl_pendaftaran']; ?></th>
          </tr>
          <tr>
            <th>Jenis Jasa</th>
            <th><?php echo $pendaftaran['jenis_jasa']; ?></th>
          </tr>
          <tr>
            <th>Tujuan Penilaian</th>
            <th><?php echo $pendaftaran['tujuan_penilaian']; ?></th>
          </tr>
          <tr>
            <th>Dasar Nilai</th>
            <th><?php echo $pendaftaran['dasar_penilaian']; ?></th>
          </tr>
          <tr>
            <th>Pendekatan Penilaian</th>
            <th><?php echo $pendaftaran['pendekatan_penilaian']; ?></th>
          </tr>
          <tr>
            <th>Tanggal Penilaian</th>
            <th><?php echo $pendaftaran['tgl_penilaian']; ?></th>
          </tr>
          <tr>
            <th>Penanggung Jawab</th>
            <th><?php echo $pendaftaran['nama_peg']; ?></th>
          </tr>
        </table>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th>ID Pemilik Aset</th>
          <th><?php echo $pendaftaran['id_pemilik']; ?></th>
        </tr>
        <tr>
          <th>Nama Pemilik Aset</th>
          <th><?php echo $pendaftaran['nama_pemilik']; ?></th>
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-striped" >
        <tr>
          <th>ID Pemberi Tugas</th>
          <th><?php echo $pendaftaran['id_pemberitugas']; ?></th>
        </tr>
        <tr>
          <th>Nama Pemberi Tugas</th>
          <th><?php echo $pendaftaran['nama_pemberitugas']; ?></th>
        </tr>
        <tr>
          <th>Alamat</th>
          <th><?php echo $pendaftaran['alamat_pemberitugas']; ?></th>
        </tr>
        <tr>
          <th>Bidang Usaha</th>
          <th><?php echo $pendaftaran['bidang_usaha']; ?></th>
        </tr>
        <tr>
          <th>Telepon</th>
          <th><?php echo $pendaftaran['telp_pemberitugas']; ?></th>
        </tr>
        <tr>
          <th>Email</th>
          <th><?php echo $pendaftaran['email_pemberitugas']; ?></th>
        </tr>
      </table>
    </div>
  </div>
</div>
</div>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Tanah</h4>
      </div>
        <div class="card-body">
          <div class="row">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr style="font-weight:bold; text-align:center">
                  <th>NO</th>
                  <th>NO SERTIFIKAT</th>
                  <th>HAK TANAH</th>
                  <th>STATUS SERTIFIKAT</th>
                  <th>DESA</th>
                  <th>KECAMATAN</th>
                  <th>KABUPATEN</th>
                  <th>PROVINSI</th>
                  <th>NAMA PEMEGANG HAK</th>
                  <th>TANGGAL DIKELUARKAN</th>
                  <th>TANGGAL JATUH TEMPO</th>
                  <th>NO GAMBAR SITUASI</th>
                  <th>TANGGAL GAMBAR SITUASI</th>
                  <th>LUAS</th>
                  <th>SERTIPIKAT</TH>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $totalluas = 0;
                foreach($detailpendaftaran as $d){
                  $totalluas = $totalluas + $d->luas;
                  ?>
                  <tr>
                    <td align="center"><?php echo $no; ?></td>
                    <td><?php echo $d->no_sertifikat; ?></td>
                    <td align="center"><?php echo $d->hak_tanah; ?></td>
                    <td align="center"><?php echo $d->status_sertifikat; ?></td>
                    <td align="center"><?php echo $d->desa; ?></td>
                    <td align="center"><?php echo $d->kecamatan; ?></td>
                    <td align="center"><?php echo $d->kabupaten; ?></td>
                    <td align="center"><?php echo $d->provinsi; ?></td>
                    <td align="center"><?php echo $d->nama_pemegang_hak; ?></td>
                    <td align="center"><?php echo $d->tgl_dikeluarkan; ?></td>
                    <td align="center"><?php echo $d->tgl_jatuh_tempo; ?></td>
                    <td align="center"><?php echo $d->no_gambar_situasi; ?></td>
                    <td align="center"><?php echo $d->tgl_gambar_situasi; ?></td>
                    <td align="right"><?php echo number_format($d->luas, 2); ?></td>
                    <td><?php
                        if ($d->sertipikat_tanah) {
                          $files = explode(',',$d->sertipikat_tanah);
                          for ($i=0; $i < count($files); $i++) {
                            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                          }
                        }
                      ?>
                    </td>
                  </tr>
                  <?php $no++;
                } ?>
                <tr>
                  <td style="font-weight:bold; font-size:16" colspan="13" align="right">TOTAL LUAS:</td>
                  <td style="font-weight:bold; align="right"><?php echo number_format($totalluas, 2); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
