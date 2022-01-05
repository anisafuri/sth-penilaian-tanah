<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale-0">
	<title>Laporan Pengiriman</title>
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
    LAPORAN PENGIRIMAN<br>
    PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>
  </h4>
  <br>
  <table align="center">
    <tr>
      <th>NO</th>
      <th>ID PENGIRIMAN</th>
      <th>TANGGAL PENGIRIMAN</th>
      <th>PENGIRIM</th>
      <th>PENERIMA</th>
      <th>ALAMAT PENERIMA</th>
      <th>UP</th>
      <th>ISI</th>
      <th>FINAL REPORT</th>
    </tr>
    <?php $no = 1;
    foreach($laporanpengiriman as $m){
      ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $m->id_pengiriman; ?></td>
        <td align="center"><?php echo $m->tgl_pengiriman; ?></td>
        <td align="center"><?php echo $m->nama_peg; ?></td>
        <td align="center"><?php echo $m->penerima; ?></td>
        <td align="center"><?php echo $m->alamat_penerima; ?></td>
        <td align="center"><?php echo $m->up; ?></td>
        <td align="center"><?php echo $m->isi; ?></td>
        <td><?php
        if ($m->final_report) {
          $files = explode(',',$m->final_report);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
        ?>
      </td>
      </tr>
      <?php $no++;
    } ?>
  </table>
</body>
</html>
