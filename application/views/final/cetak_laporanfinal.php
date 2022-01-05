<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale-0">
	<title>Laporan Penilaian Final</title>
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
    LAPORAN PENILAIAN FINAL<br>
    PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>
  </h4>
  <br>
  <table align="center">
    <tr>
      <th>NO</th>
      <th>ID REPORT</th>
      <th>ID DRAFT</th>
      <th>TANGGAL REPORT</th>
      <th>FINAL REPORT</th>
      <th>PENGUPLOAD</th>
    </tr>
    <?php
    $no = 1;
    foreach($laporanfinal as $f) {
    ?>
    <tr>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $f->id_report; ?></td>
        <td align="center"><?php echo $f->id_draft; ?></td>
        <td align="center"><?php echo $f->tgl_report; ?></td>
        <td><?php
          if ($f->final_report) {
            $files = explode(',',$f->final_report);
            for ($i=0; $i < count($files); $i++) {
              echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
            }
          }
        ?>
        </td>
        <td align="center"><?php echo $f->nama_peg; ?></td>
      </tr>
      <?php $no++;
      } ?>
    </table>
  </body>
</html>
