<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale-0">
	<title>Laporan Reviewing</title>
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
    LAPORAN REVIEWING<br>
    PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>
  </h4>
  <br>
  <table>
    <tr>
      <th>NO</th>
      <th>ID REVIEWING</th>
      <th>REVIEWER</th>
      <th>TANGGAL REVIEW</th>
      <th>ID PENILAIAN</th>
      <th>STATUS REVIEWING</th>
      <th>KOMENTAR</th>
    </tr>
    <?php $no = 1;
    foreach($laporanreviewing as $r){
      ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $r->id_reviewing; ?></td>
        <td align="center"><?php echo $r->nama_peg; ?></td>
        <td align="center"><?php echo $r->tgl_reviewing; ?></td>
        <td align="center"><?php echo $r->id_penilaian; ?></td>
        <td align="center"><?php echo $r->status_reviewing; ?></td>
        <td align="center"><?php echo $r->komentar; ?></td>
      </tr>
      <?php $no++;
    } ?>
  </table>
</body>
</html>
