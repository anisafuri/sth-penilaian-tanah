<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale-0">
	<title>Laporan Survei</title>
  <style>
    body{
      font-family: Tahoma;
    }
    table,
    th,
    td{
      border-collapse: collapse;
      border: 2px solid black;
    }
    table,
    th,
    td{
      padding: 5px;
    }

    th{
      font-size: 14px;
      background-color: #2972ba;
      color: white;
    }
  </style>
</head>

<body>
  <h4 align="center">
    <img src="<?php echo base_url(); ?>assets/static/kop surat.jpg" width="1300" height="100" alt="Tabler" class="navbar-brand-image">
    <br>
    <br>
    <br>
    LAPORAN SURVEI<br>
    PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>
  </h4>
  <br>
  <table>
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
    </tr>
    <?php $no = 1;
    foreach($laporansrv as $d){
      ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $d->id_survei; ?></td>
        <td align="center"><?php echo $d->tgl_inspeksi; ?></td>
        <td align="center"><?php echo $d->id_pendaftaran; ?></td>
        <td align="center"><?php echo $d->id_lingkungan; ?></td>
        <td align="center"><?php echo $d->nama_peg; ?></td>
        <td align="center"><?php echo $d->bentuk_tanah; ?></td>
        <td align="center"><?php echo $d->elevasi; ?></td>
        <td align="center"><?php echo $d->batasan_thd_tanah; ?></td>
        <td align="center"><?php echo $d->peraturan_tata_kota; ?></td>
        <td align="center"><?php echo $d->pemenuhan_thd_peraturan_tatakota; ?></td>
      </tr>
      <?php $no++;
    } ?>
  </table>
</body>
</html>
