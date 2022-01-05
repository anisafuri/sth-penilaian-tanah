<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale-0">
	<title>Laporan Draft Penilaian</title>
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
    LAPORAN DRAFT PENILAIAN<br>
    PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>
  </h4>
  <br>
  <table>
    <tr>
      <th>NO</th>
      <th>ID DRAFT</th>
      <th>TANGGAL DRAFT</th>
      <th>ID PENILAIAN</th>
      <th>ID PENDAFTARAN</th>
      <th>JENDELA</th>
      <th>COVERING LETTER</th>
      <th>PERNYATAAN PENILAI</th>
      <th>ASUMSI</th>
      <th>TINJAUAN</th>
      <th>DESKRIPSI TANAH</th>
      <th>WORKSHEET TANAH</th>
      <th>GAMBAR SITUASI</th>
      <th>FOTO - FOTO</th>
      <th>PETA LOKASI</th>
      <th>PENGUPLOAD</th>
    </tr>
    <?php
    $no = 1;
    foreach($laporandraft as $b) {
    ?>
    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td align="center"><?php echo $b->id_draft; ?></td>
      <td align="center"><?php echo $b->tgl_draft; ?></td>
      <td align="center"><?php echo $b->id_penilaian; ?></td>
      <td align="center"><?php echo $b->id_pendaftaran; ?></td>
      <td><?php
        if ($b->jendela) {
          $files = explode(',',$b->jendela);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
      ?>
      </td>
      <td><?php
        if ($b->covering_letter) {
          $files = explode(',',$b->covering_letter);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
      ?>
      </td>
      <td><?php
        if ($b->pernyataan_penilai) {
          $files = explode(',',$b->pernyataan_penilai);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
      ?>
      </td>
      <td><?php
        if ($b->asumsi) {
          $files = explode(',',$b->asumsi);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
      ?>
      </td>
      <td><?php
        if ($b->tinjauan) {
          $files = explode(',',$b->tinjauan);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
      ?>
      </td>
      <td><?php
        if ($b->tanah_deskripsi) {
          $files = explode(',',$b->tanah_deskripsi);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
      ?>
      </td>
      <td><?php
        if ($b->worksheet_tanah) {
          $files = explode(',',$b->worksheet_tanah);
          for ($i=0; $i < count($files); $i++) {
            echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
          }
        }
      ?>
      </td>
      <td><?php
      if ($b->gambar_situasi) {
        $files = explode(',',$b->gambar_situasi);
        for ($i=0; $i < count($files); $i++) {
          echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
        }
      }
      ?>
    </td>
    <td><?php
    if ($b->foto_foto) {
      $files = explode(',',$b->foto_foto);
      for ($i=0; $i < count($files); $i++) {
        echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
      }
    }
    ?>
  </td>
  <td><?php
  if ($b->peta_lokasi) {
    $files = explode(',',$b->peta_lokasi);
    for ($i=0; $i < count($files); $i++) {
      echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
    }
  }
  ?>
  </td>
  <td align="center"><?php echo $b->nama_peg; ?></td>
  </tr>
  <?php $no++;
  } ?>
  </table>
</body>
</html>
