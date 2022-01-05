<style>
table{
  font-family: Arial;
}
</style>
<img src="<?php echo base_url(); ?>assets/static/kop surat.jpg" width="1300" height="100" alt="Tabler" class="navbar-brand-image">
<br>
<br>
<br>

<table style="width:50%">
  <tr>
    <td>
      <table border="0">
        <label class="form-label"><b>Kepada Yth:</b></label>
        <br>
        <br>
        <tr>
          <td><?php echo $pengiriman['penerima']; ?></td>
        </tr>
        <tr>
          <td><?php echo $pengiriman['alamat_penerima']; ?></td>
        </tr>
      </table>
    </td>
  </tr>
  </table>
  <br>
  </br>
  <table style="width:50%">
  <tr>
    <td>
      <table border="0">
        <tr>
          <td>UP</td>
          <td>:</td>
          <td><u><?php echo $pengiriman['up']; ?></u></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

  <h3 align="center" style="font-family: Arial;"><u>TANDA TERIMA</u></h3>


  <br>
  </br>
  <table style="width:50%">
    <tr>
      <td>
        <table border="0">
          <tr>
            <td>Dengan Hormat,</td>
          </tr>
          <tr>
            <td><p style="line-height: 4em;">Bersama ini kami kirimkan:</p></td>
          </tr>
        <tr>
          <td>&emsp;<?php echo $pengiriman['isi']; ?></td>
        </tr>
        <tr>
          <td><p style="line-height: 10em;">Terima Kasih</p></td>
        </tr>
        <tr>
          <td >Jakarta, <?php echo $pengiriman['tgl_pengiriman']; ?></td>
        </tr>
        <tr>
          <td >Penerima,</td>
        </tr>
        <tr>
          <td ><p style="line-height: 10em;">Nama Jelas</p></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
