<h2 class="page-title">
    Data Survei
</h2>


<input type="hidden" id="cekPembanding">
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <tr>
            <th>ID Survei</th>
            <th><?php echo $survei['id_survei']; ?></th>
          </tr>
          <tr>
            <th>Tanggal Inspeksi</th>
            <th><?php echo $survei['tgl_inspeksi']; ?></th>
          </tr>
          <tr>
            <th>ID Pendaftaran</th>
            <th><?php echo $survei['id_pendaftaran']; ?></th>
          </tr>
          <tr>
            <th>Nama Penilai</th>
            <th><?php echo $survei['nama_peg']; ?></th>
          </tr>
          <tr>
            <th>bentuk_tanah</th>
            <th><?php echo $survei['bentuk_tanah']; ?></th>
          </tr>
          <tr>
            <th>Elevasi</th>
            <th><?php echo $survei['elevasi']; ?></th>
          </tr>
          <tr>
            <th>Batasan Terhadap Tanah</th>
            <th><?php echo $survei['batasan_thd_tanah']; ?></th>
          </tr>
          <tr>
            <th>Peraturan Tata Kota</th>
            <th><?php echo $survei['peraturan_tata_kota']; ?></th>
          </tr>
          <tr>
            <th>Pemenuhan Terhadap Peraturan Tata Kota</th>
            <th><?php echo $survei['pemenuhan_thd_peraturan_tatakota']; ?></th>
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
          <th>ID Lingkungan</th>
          <th><?php echo $survei['id_lingkungan']; ?></th>
        </tr>
        <tr>
          <th>Karakteristik Lingkungan</th>
          <th><?php echo $survei['karakteristik_lingkungan']; ?></th>
        </tr>
        <tr>
          <th>Kepadatan Pengembangan</th>
          <th><?php echo $survei['kepadatan_pengembangan']; ?></th>
        </tr>
        <tr>
          <th>Pertumbuhan</th>
          <th><?php echo $survei['pertumbuhan']; ?></th>
        </tr>
        <tr>
          <th>Sarana</th>
          <th><?php echo $survei['sarana']; ?></th>
        </tr>
        <tr>
          <th>Prasarana</th>
          <th><?php echo $survei['prasarana']; ?></th>
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
        <h4 class="card-title">Data Pembanding</h4>
      </div>
        <div class="card-body">
          <div class="row">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr style="font-weight:bold; text-align:center">
                  <th>NO</th>
                  <th>NO PEMBANDING</th>
                  <th>TANGGAL DATA</th>
                  <th>ALAMAT</th>
                  <th>LUAS TANAH (m2)</th>
                  <th>LEGALITAS</th>
                  <th>BENTUK_TANAH</th>
                  <th>ELEVASI (m)</th>
                  <th>LEBAR JALAN (m)</th>
                  <th>JARAK KE ASET (m)</th>
                  <th>PERUNTUKAN</th>
                  <th>KARAKTERISTIK EKONOMI</th>
                  <th>HARGA PENAWARAN</th>
                  <th>SUMBER DATA</th>
                  <th>PERSON</th>
                  <th>TELEPON</th>
                  <th>CATATAN</th>
                  <th>QTY</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $jumlahpembanding  = 0;
                foreach($detailsurvei as $d){
                  $jumlahpembanding = $jumlahpembanding + $d->qty;
                  ?>
                  <tr>
                    <td align="center"><?php echo $no;?></td>
                    <td><?php echo $d->no_pembanding; ?></td>
                    <td align="center"><?php echo $d->tgl_data; ?></td>
                    <td><?php echo $d->alamat_pembanding; ?></td>
                    <td align="center"><?php echo $d->luas_tanah_pembanding; ?></td>
                    <td align="center"><?php echo $d->legalitas_pembanding; ?></td>
                    <td align="center"><?php echo $d->bentuk_tanah_pembanding; ?></td>
                    <td align="center"><?php echo $d->elevasi_pembanding; ?></td>
                    <td align="center"><?php echo $d->lebar_jalan_pembanding; ?></td>
                    <td align="center"><?php echo $d->jarak_ke_tanah_dinilai; ?></td>
                    <td align="center"><?php echo $d->peruntukan_pembanding; ?></td>
                    <td align="center"><?php echo $d->karakteristik_ekonomi; ?></td>
                    <td align="center"><?php echo number_format($d->harga_penawaran_transaksi, '0', '', '.'); ?></td>
                    <td align="center"><?php echo $d->sumber_data; ?></td>
                    <td align="center"><?php echo $d->person; ?></td>
                    <td align="center"><?php echo $d->telepon; ?></td>
                    <td align="center"><?php echo $d->catatan; ?></td>
                    <td align="center"><?php echo $d->qty; ?></td>
                  </tr>
                  <?php $no++;
                } ?>
                <tr>
                  <td style="font-weight:bold; font-size:16" colspan="17" align="right">JUMLAH PEMBANDING:</td>
                  <td style="font-weight:bold; align="center""><?php echo number_format($jumlahpembanding); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
