<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale-0">
	<title>Laporan Pendaftaran</title>
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
    LAPORAN PENDAFTARAN<br>
    PERIODE <?php echo $dari; ?>s/d <?php echo $sampai; ?>
  </h4>
  <br>
  <table>
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
    </tr>
    <?php $no = 1;
    foreach($laporanpend as $d){
      ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $d->id_pendaftaran; ?></td>
        <td align="center"><?php echo $d->tgl_pendaftaran; ?></td>
        <td align="center"><?php echo $d->jenis_jasa; ?></td>
        <td align="center"><?php echo $d->nama_pemberitugas; ?></td>
        <td align="center"><?php echo $d->nama_pemilik; ?></td>
        <td align="center"><?php echo $d->nama_peg; ?></td>
        <td align="center"><?php echo $d->tujuan_penilaian; ?></td>
        <td align="center"><?php echo $d->dasar_penilaian; ?></td>
        <td align="center"><?php echo $d->pendekatan_penilaian; ?></td>
        <td align="center"><?php echo $d->tgl_penilaian; ?></td>
      </tr>
      <?php $no++;
    } ?>
  </table>
</body>
</html>
