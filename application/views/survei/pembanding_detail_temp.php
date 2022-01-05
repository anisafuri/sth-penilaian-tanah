<?php $no=1;
$jumlahpembanding  = 0;
foreach ($pembanding_temp as $b){
  $jumlahpembanding = $jumlahpembanding + $b->qty;
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $b->no_pembanding; ?></td>
    <td><?php echo $b->tgl_data; ?></td>
    <td><?php echo $b->alamat_pembanding; ?></td>
    <td><?php echo $b->luas_tanah_pembanding; ?></td>
    <td><?php echo $b->legalitas_pembanding; ?></td>
    <td><?php echo $b->bentuk_tanah_pembanding; ?></td>
    <td><?php echo $b->elevasi_pembanding; ?></td>
    <td><?php echo $b->lebar_jalan_pembanding; ?></td>
    <td><?php echo $b->jarak_ke_tanah_dinilai; ?></td>
    <td><?php echo $b->peruntukan_pembanding; ?></td>
    <td><?php echo $b->karakteristik_ekonomi; ?></td>
    <td><?php echo $b->harga_penawaran_transaksi; ?></td>
    <td><?php echo $b->sumber_data; ?></td>
    <td><?php echo $b->person; ?></td>
    <td><?php echo $b->telepon; ?></td>
    <td><?php echo $b->catatan; ?></td>
    <td align="center"><?php echo $b->qty; ?></td>
    <td>
      <a href="#" class="btn-sm btn-danger text-center hapus" data-nopembanding="<?php echo $b->no_pembanding; ?>" data-id_peg="<?php echo $b->id_peg; ?>">
      <li class="fa fa-trash"></li>
      </a>
    </td>
  </tr>
  <?php
  $no++;

} ?>

  <tr>
    <th colspan="16">JUMLAH PEMBANDING</th>
    <th></th>
    <th style="text-align:center"><p id="total"><?php echo $jumlahpembanding; ?></p></th>

  </tr>


<script>
  $(function(){
    function loaddatapembanding(){
      var id_peg = $("#id_peg").val();
      $.ajax  ({
        type: 'POST',
        url: '<?php echo base_url(); ?>Survei/getDatapembandingtemp',
        data:{
          id_peg: id_peg
        },
        cache: false,
        success: function(respond){
          $("#loaddatapembanding").html(respond);
        }
        });
    }

      function loadjumlahpembanding(){
      var total = $("#total").text();
      $("#jumlahpembanding").text(total);
    }

    loadjumlahpembanding();
    $(".hapus").click(function(){
      var no_pembanding = $(this).attr("data-nopembanding");
      var id_peg = $(this).attr("data-id_peg");
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url(); ?>Survei/hapusPembandingtemp',
        data : {
          no_pembanding : no_pembanding,
          id_peg : id_peg
        },
        cache : false,
        success : function(respond){
          if(respond==1){
            swal("Deleted", "Data Berhasil Dihapus", "success");
            loaddatapembanding();
          }
        }
      });
    });
  });

</script>
