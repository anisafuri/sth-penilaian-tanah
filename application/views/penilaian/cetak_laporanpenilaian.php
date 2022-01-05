<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale-0">
	<title>Laporan Penilaian</title>
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
    LAPORAN PENILAIAN<br>
    PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>
  </h4>
  <br>
  <table>
    <tr>
      <th>NO</th>
      <th>ID PENILAIAN</th>
      <th>TANGGAL PERHITUNGAN</th>
      <th>ID SURVEI</th>
      <th>ID PENDAFTARAN</th>
      <th>TANGGAL PENILAIAN</th>
      <th>NAMA PENILAI</th>
      <th>KETERANGAN</th>
      <th>WORKSHEET TANAH</th>
      <th>DESKRIPSI TANAH</th>
      <th>RINGKASAN PENILAIAN</th>
    </tr>
    <?php $no = 1;
    foreach($laporanpenilaian as $n){
      ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $n->id_penilaian; ?></td>
        <td align="center"><?php echo $n->tgl_perhitungan_nilai; ?></td>
        <td align="center"><?php echo $n->id_survei; ?></td>
        <td align="center"><?php echo $n->id_pendaftaran; ?></td>
        <td align="center"><?php echo $n->tgl_penilaian; ?></td>
        <td align="center"><?php echo $n->nama_peg; ?></td>
        <td align="center"><?php echo $n->keterangan_nilai; ?></td>
        <td align="center"><?php
          if ($n->worksheet_tanah) {
            $files = explode(',',$n->worksheet_tanah);
            for ($i=0; $i < count($files); $i++) {
              echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
            }
          }
        ?>
        </td>
        <td align="center"><?php
          if ($n->tanah_deskripsi) {
            $files = explode(',',$n->tanah_deskripsi);
            for ($i=0; $i < count($files); $i++) {
              echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
            }
          }
        ?>
        </td>
        <td align="center"><?php
        if ($n->ringkasan_penilaian) {
          $files = explode(',',$n->ringkasan_penilaian);
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
