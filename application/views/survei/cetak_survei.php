<style>
table{
  font-family: Arial;
}
</style>

<center>
  <h4 style="font-family: Arial;">SURVEI</h4>


<table style="width:100%">
  <tr>
    <td>
      <table border="0">
        <tr>
          <label class="form-label"><b>Data Survei</b></label>
          <td>ID Survei</td>
          <td>:</td>
          <td><?php echo $survei['id_survei']; ?></td>
        </tr>
        <tr>
          <td>Tanggal Inspeksi</td>
          <td>:</td>
          <td><?php echo $survei['tgl_inspeksi']; ?></td>
        </tr>
        <tr>
          <td>ID pendaftaran</td>
          <td>:</td>
          <td><?php echo $survei['id_pendaftaran']; ?></td>
        </tr>
        <tr>
          <td>Nama Penilai</td>
          <td>:</td>
          <td><?php echo $survei['nama_peg']; ?></td>
        </tr>
        <tr>
          <td>Bentuk Tanah</td>
          <td>:</td>
          <td><?php echo $survei['bentuk_tanah']; ?></td>
        </tr>
        <tr>
          <td>Elevasi</td>
          <td>:</td>
          <td><?php echo $survei['elevasi']; ?></td>
        </tr>
        <tr>
          <td>Batasan Terhadap Tanah</td>
          <td>:</td>
          <td><?php echo $survei['batasan_thd_tanah']; ?></td>
        </tr>
        <tr>
          <td>Peraturan Tata Kota</td>
          <td>:</td>
          <td><?php echo $survei['peraturan_tata_kota']; ?></td>
        </tr>
        <tr>
          <td>Pemenuhan Terhadap Peraturan Tata Kota</td>
          <td>:</td>
          <td><?php echo $survei['pemenuhan_thd_peraturan_tatakota']; ?></td>
        </tr>
      </table>
    </td>
    <td ></td>
    <td>
      <table style="width:100%" border="0">
        <tr>
          <label class="form-label"><b>Data Lingkungan</b></label>
          <td>ID Lingkungan</td>
          <td>:</td>
          <td><?php echo $survei['id_lingkungan']; ?></td>
        </tr>
        <tr>
          <td>Karateristik Lingkungan</td>
          <td>:</td>
          <td><?php echo $survei['karakteristik_lingkungan']; ?></td>
        </tr>
        <tr>
          <td>Kepadatan Pengembangan</td>
          <td>:</td>
          <td><?php echo $survei['kepadatan_pengembangan']; ?></td>
        </tr>
        <tr>
          <td>Pertumbuhan</td>
          <td>:</td>
          <td><?php echo $survei['pertumbuhan']; ?></td>
        </tr>
        <tr>
          <td>Sarana</td>
          <td>:</td>
          <td><?php echo $survei['sarana']; ?></td>
        </tr>
        <tr>
          <td>Prasarana</td>
          <td>:</td>
          <td><?php echo $survei['prasarana']; ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
</br>
<table style="width:100%; border-collapse:collapse" border="1">
  <h4 style="font-family: Arial;">DATA PEMBANDING</h4>
  <tr style="font-weight:bold; text-align:center">
    <td>NO</td>
    <td>NO PEMBANDING</td>
    <td>TANGGAL DATA</td>
    <td>ALAMAT</td>
    <td>LUAS TANAH (m2)</td>
    <td>LEGALITAS</td>
    <td>BENTUK_TANAH</td>
    <td>ELEVASI (m)</td>
    <td>LEBAR JALAN (m)</td>
    <td>JARAK KE ASET (m)</td>
    <td>PERUNTUKAN</td>
    <td>KARAKTERISTIK EKONOMI</td>
    <td>HARGA PENAWARAN</td>
    <td>SUMBER DATA</td>
    <td>PERSON</td>
    <td>TELEPON</td>
    <td>CATATAN</td>
    <td>QTY</td>
  </tr>
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
</table>
</center>
