<style>
table{
  font-family: Arial;
}
</style>

<center>
  <img src="<?php echo base_url(); ?>assets/static/kop surat.jpg" width="1300" height="100" alt="Tabler" class="navbar-brand-image">
  <br>
  <br>
  <br>
  <h4 style="font-family: Arial;">BUKTI PENDAFTARAN</h4>


<table style="width:100%">

  <tr>
    <td>
      <table border="0">
        <tr>
          <label class="form-label"><b>Data Pendaftaran</b></label>
          <td>ID Pendaftaran</td>
          <td>:</td>
          <td><?php echo $pendaftaran['id_pendaftaran']; ?></td>
        </tr>
        <tr>
          <td>Tanggal Pendaftaran</td>
          <td>:</td>
          <td><?php echo $pendaftaran['tgl_pendaftaran']; ?></td>
        </tr>
        <tr>
          <td>Jenis Jasa</td>
          <td>:</td>
          <td><?php echo $pendaftaran['jenis_jasa']; ?></td>
        </tr>
        <tr>
          <td>Tujuan Penilaian</td>
          <td>:</td>
          <td><?php echo $pendaftaran['tujuan_penilaian']; ?></td>
        </tr>
        <tr>
          <td>Dasar Nilai</td>
          <td>:</td>
          <td><?php echo $pendaftaran['dasar_penilaian']; ?></td>
        </tr>
        <tr>
          <td>Pendekatan Penilaian</td>
          <td>:</td>
          <td><?php echo $pendaftaran['pendekatan_penilaian']; ?></td>
        </tr>
        <tr>
          <td>Tanggal Penilaian</td>
          <td>:</td>
          <td><?php echo $pendaftaran['tgl_penilaian']; ?></td>
        </tr>
        <tr>
          <td>Penanggung Jawab</td>
          <td>:</td>
          <td><?php echo $pendaftaran['nama_peg']; ?></td>
        </tr>
      </table>
    </td>

    <td>
      <table style="width:100%" border="0">
        <tr>
          <label class="form-label"><b>Data Pemberi Tugas</b></label>
          <td>ID Pemberi Tugas</td>
          <td>:</td>
          <td><?php echo $pendaftaran['id_pemberitugas']; ?></td>
        </tr>
        <tr>
          <td>Nama Pemberi Tugas</td>
          <td>:</td>
          <td><?php echo $pendaftaran['nama_pemberitugas']; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?php echo $pendaftaran['alamat_pemberitugas']; ?></td>
        </tr>
        <tr>
          <td>Bidang Usaha</td>
          <td>:</td>
          <td><?php echo $pendaftaran['bidang_usaha']; ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><?php echo $pendaftaran['telp_pemberitugas']; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $pendaftaran['email_pemberitugas']; ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
</br>
<table style="width:100%">
  <tr>
    <td>
      <table border="0">
        <tr>
          <label class="form-label"><b>Data Pemilik Aset</b></label>
          <td>ID Pemilik Aset</td>
          <td>:</td>
          <td><?php echo $pendaftaran['id_pemilik']; ?></td>
        </tr>
        <tr>
          <td>Nama Pemilik Aset</td>
          <td>:</td>
          <td><?php echo $pendaftaran['nama_pemilik']; ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
</br>
<table style="width:100%; border-collapse:collapse" border="1">
  <h4 style="font-family: Arial;">DATA TANAH</h4>
  <tr style="font-weight:bold; text-align:center">
    <td>NO</td>
    <td>NO SERTIFIKAT</td>
    <td>HAK TANAH</td>
    <td>STATUS SERTIFIKAT</td>
    <td>DESA</td>
    <td>KECAMATAN</td>
    <td>KABUPATEN</td>
    <td>PROVINSI</td>
    <td>NAMA PEMEGANG HAK</td>
    <td>TANGGAL DIKELUARKAN</td>
    <td>TANGGAL JATUH TEMPO</td>
    <td>NO GAMBAR SITUASI</td>
    <td>TANGGAL GAMBAR SITUASI</td>
    <td>LUAS</td>
  </tr>
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
    </tr>
    <?php $no++;
  } ?>
  <tr>
    <td style="font-weight:bold; font-size:16" colspan="13" align="right">TOTAL LUAS:</td>
    <td style="font-weight:bold; align="right""><?php echo number_format($totalluas, 2); ?></td>
  </tr>
</table>
</center>
