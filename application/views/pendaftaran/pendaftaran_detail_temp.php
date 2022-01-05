<?php $no=1;
$totalluas = 0;
$jumlahsertifikat  = 0;
foreach ($tanahtemp as $t){
  $totalluas = $totalluas + $t->luas;
  $jumlahsertifikat = $jumlahsertifikat + $t->qty;
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $t->no_sertifikat; ?></td>
    <td><?php echo $t->hak_tanah; ?></td>
    <td><?php echo $t->kabupaten; ?></td>
    <td><?php echo $t->nama_pemegang_hak; ?></td>
    <td align="right"><?php echo $t->luas; ?></td>
    <td align="center"><?php echo $t->qty; ?></td>
    <td>
      <a href="#" class="btn-sm btn-danger text-center hapus" data-idtanah="<?php echo $t->no_sertifikat; ?>" data-id_pemilik="<?php echo $t->id_pemilik; ?>">
      <li class="fa fa-trash"></li>
      </a>
    </td>
  </tr>
  <?php
  $no++;

} ?>

  <tr>
    <th colspan="5">TOTAL LUAS</th>
    <th style="text-align:right"><p id="totalluas"><?php echo number_format($totalluas, 2); ?></p></th>
    <th></th>
  </tr>

  <tr>
    <th colspan="5">JUMLAH SERTIFIKAT</th>
    <th></th>
    <th style="text-align:center"><p id="totalsertifikat"><?php echo $jumlahsertifikat; ?></p></th>

  </tr>


<script>
  $(function(){
    function loaddatatanah(){
      var id_pemilik = $("#id_pemilik").val();
      $.ajax  ({
        type: 'POST',
        url: '<?php echo base_url(); ?>Pendaftaran/getDatatanahtemp',
        data:{
          id_pemilik: id_pemilik
        },
        cache: false,
        success: function(respond){
          $("#loaddatatanah").html(respond);
        }
        });
    }

    function loadtotalluas(){
      var totalluas = $("#totalluas").text();
      $("#totalluas").text(totalluas);
    }

    function loadjumlahsertifikat(){
      var totalsertifikat = $("#totalsertifikat").text();
      $("#jumlahsertifikat").text(totalsertifikat);
    }

    loadtotalluas();
    loadjumlahsertifikat();
    $(".hapus").click(function(){
      var no_sertifikat = $(this).attr("data-idtanah");
      var id_pemilik = $(this).attr("data-id_pemilik");
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url(); ?>Pendaftaran/hapusTanahtemp',
        data : {
          no_sertifikat : no_sertifikat,
          id_pemilik : id_pemilik
        },
        cache : false,
        success : function(respond){
          if(respond==1){
            swal("Deleted", "Data Berhasil Dihapus", "success");
            loaddatatanah();
          }
        }
      });
    });
  });

</script>
