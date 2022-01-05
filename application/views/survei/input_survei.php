<h2 class="page-title">
    Form Survei
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formsurvei" method="POST" action="<?php echo base_url(); ?>Survei/simpansurvei">
<input type="hidden" id="cekPembanding">
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" class="form-control" name="id_survei" id="id_survei" placeholder="ID Survei">
      </div>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="tgl_inspeksi" id="tgl_inspeksi" placeholder="Tanggal Inspeksi">
      </div>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          <li class="fa fa-barcode"></li>
        </span>
        <input type="text" readonly class="form-control" name="id_pendaftaran" id="id_pendaftaran" placeholder="ID Pendaftaran">
      </div>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-user"></li>
      </span>
      <input type="hidden" value="<?php echo $this->session->userdata('id_peg'); ?>" name="id_peg" id="id_peg">
      <input type="text" readonly value="<?php echo $this->session->userdata('id_peg') . " - " . $this->session->userdata('nama_peg'); ?>" class="form-control" name="nama_peg" id="nama_peg">
      </div>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-list-alt"></li>
      </span>
      <input type="text" class="form-control" name="bentuk_tanah" id="bentuk_tanah" placeholder="Bentuk Tanah">
      </div>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-list-alt"></li>
      </span>
      <input type="text" class="form-control" name="elevasi" id="elevasi" placeholder="Elevasi (m)">
      </div>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-list-alt"></li>
      </span>
      <input type="text" class="form-control" name="batasan_thd_tanah" id="batasan_thd_tanah" placeholder="Batasan Terhadap Tanah">
      </div>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-list-alt"></li>
      </span>
      <input type="text" class="form-control" name="peraturan_tata_kota" id="peraturan_tata_kota" placeholder="Peraturan Tata Kota">
      </div>
      <div class="input-icon mb-3">
      <span class="input-icon-addon">
        <li class="fa fa-list-alt"></li>
      </span>
      <input type="text" class="form-control" name="pemenuhan_thd_peraturan_tatakota" id="pemenuhan_thd_peraturan_tatakota" placeholder="Pemenuhan Terhadap Peraturan Tata Kota">
      </div>
      </div>
    </div>
  </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
          <h4 class="card-title">Data Lingkungan</h4>
          </div>
          <div class="card-body">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-barcode"></li>
              </span>
              <input type="text" class="form-control" name="id_lingkungan" id="id_lingkungan" placeholder="Id Lingkungan">
            </div>
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-list-alt"></li>
              </span>
              <input type="text" class="form-control" name="karakteristik_lingkungan" id="karakteristik_lingkungan" placeholder="Karakteristik Lingkungan">
            </div>
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-list-alt"></li>
              </span>
              <input type="text" class="form-control" name="kepadatan_pengembangan" id="kepadatan_pengembangan" placeholder="Kepadatan Pengembangan">
            </div>
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-list-alt"></li>
              </span>
              <input type="text" class="form-control" name="pertumbuhan" id="pertumbuhan" placeholder="Pertumbuhan">
            </div>
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-list-alt"></li>
              </span>
              <input type="text" class="form-control" name="sarana" id="sarana" placeholder="Sarana">
            </div>
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-list-alt"></li>
              </span>
              <input type="text" class="form-control" name="prasarana" id="prasarana" placeholder="Prasarana">
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Pembanding</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <li class="fa fa-barcode"></li>
                    </span>
                    <input type="text" class="form-control" name="no_pembanding" id="no_pembanding" placeholder="No Pembanding">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <li class="fa fa-copy"></li>
                    </span>
                    <input type="text" class="form-control" name="tgl_data" id="tgl_data" placeholder="Tanggal Data">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <li class="fa fa-map"></li>
                    </span>
                    <input type="text" class="form-control" name="alamat_pembanding" id="alamat_pembanding" placeholder="Alamat">
                  </div>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="luas_tanah_pembanding" id="luas_tanah_pembanding" placeholder="Luas (m2)">
                </div>
                <div class="col-md-4">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <li class="fa fa-copy"></li>
                    </span>
                    <input type="text" class="form-control" name="legalitas_pembanding" id="legalitas_pembanding" placeholder="Legalitas">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <li class="fa fa-list-alt"></li>
                    </span>
                    <input type="text" class="form-control" name="bentuk_tanah_pembanding" id="bentuk_tanah_pembanding" placeholder="Bentuk Tanah">
                  </div>
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="elevasi_pembanding" id="elevasi_pembanding" placeholder="Elevasi (m)">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="lebar_jalan_pembanding" id="lebar_jalan_pembanding" placeholder="Lebar Jalan (m)">
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="jarak_ke_tanah_dinilai" id="jarak_ke_tanah_dinilai" placeholder="Jarak (m)">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="peruntukan_pembanding" id="peruntukan_pembanding" placeholder="Peruntukan">
                </div>
                <div class="col-md-3">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <li class="fa fa-list-alt"></li>
                    </span>
                    <input type="text" class="form-control" name="karakteristik_ekonomi" id="karakteristik_ekonomi" placeholder="Karakteristik Ekonomi">
                  </div>
                </div>
                <div class="col-md-3">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <li class="fa fa-usd"></li>
                  </span>
                  <input type="text" class="form-control" name="harga_penawaran_transaksi" id="harga_penawaran_transaksi" placeholder="Harga Penawaran">
                </div>
              </div>
              <div class="col-md-2">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <li class="fa fa-list-alt"></li>
                  </span>
                  <input type="text" class="form-control" name="sumber_data" id="sumber_data" placeholder="Sumber Data">
                </div>
              </div>
              <div class="col-md-2">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <li class="fa fa-user"></li>
                  </span>
                  <input type="text" class="form-control" name="person" id="person" placeholder="Person">
                </div>
              </div>
              <div class="col-md-2">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <li class="fa fa-phone"></li>
                  </span>
                  <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telephone">
                </div>
              </div>
              <div class="col-md-2">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <li class="fa fa-sticky-note"></li>
                  </span>
                  <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan">
                </div>
              </div>
              <div class="col-md-1">
                  <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty">
              </div>
              <div class="col-md-1">
              <a href="#" class="btn btn-primary w100" id="tambahpembanding"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="30" height="30"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <line x1="12" y1="11" x2="12" y2="17" /><line x1="9" y1="14" x2="15" y2="14" /></svg></a>
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NO PEMBANDING</th>
                  <th>TANGGAL DATA</th>
                  <th>ALAMAT</th>
                  <th>LUAS TANAH (m2)</th>
                  <th>LEGALITAS</th>
                  <th>BENTUK_TANAH</th>
                  <th>ELEVASI (m)</th>
                  <th>LEBAR JALAN (m)</th>
                  <th>JARAK KE ASET (m)</th>
                  <th>PERUNTUKAN</th>
                  <th>KARAKTERISTIK EKONOMI</th>
                  <th>HARGA PENAWARAN</th>
                  <th>SUMBER DATA</th>
                  <th>PERSON</th>
                  <th>TELEPON</th>
                  <th>CATATAN</th>
                  <th>QTY</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody id="loaddatapembanding">

              </tbody>

            </table>
          </div>
          </div>
          <div class="row mt-3">
          <button type="submit" class="btn btn-primary w100"><i class="fa fa-send mr-2"></i>SIMPAN</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="modal modal-blur fade" id="modalpendaftaran" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data Pendaftaran</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered" id="tabelpendaftaran">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID PENDAFTARAN</th>
                  <th>TANGGAL PENDAFTARAN</th>
                  <th>NAMA PEMBERI TUGAS</th>
                  <th>NAMA PEMILIK ASET</th>
                  <th>TUJUAN PENILAIAN</th>
                  <th>DASAR PENILAIAN</th>
                  <th>PENDEKATAN PENILAIAN</th>
                  <th>TANGGAL PENILAIAN</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($pendaftaran as $d) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $d->id_pendaftaran; ?></td>
                  <td><?php echo $d->tgl_pendaftaran; ?></td>
                  <td><?php echo $d->nama_pemberitugas; ?></td>
                  <td><?php echo $d->nama_pemilik; ?></td>
                  <td><?php echo $d->tujuan_penilaian; ?></td>
                  <td><?php echo $d->dasar_penilaian; ?></td>
                  <td><?php echo $d->pendekatan_penilaian; ?></td>
                  <td><?php echo $d->tgl_penilaian; ?></td>
                  <td>
                    <a href="#" class="btn-sm btn-primary pilih" data-idpendaftaran="<?php echo $d->id_pendaftaran; ?>">pilih</a>
                  </td>
                </tr>
                <?php $no++;
              } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
<script>
document.addEventListener("DOMContentLoaded", function(){
  flatpickr(document.getElementById('tgl_inspeksi'), {});
});
document.addEventListener("DOMContentLoaded", function(){
  flatpickr(document.getElementById('tgl_data'), {});
});

function cekPembanding(){
  $.ajax  ({
    type: 'POST',
    url: '<?php echo base_url(); ?>Survei/cekPembanding',
    cache: false,
    success: function(respond){
      $("#cekPembanding").val(respond);
    }
  });
}

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

cekPembanding();
loaddatapembanding();
$("#formsurvei").submit(function(){
  var id_survei = $("#id_survei").val();
  var tgl_inspeksi = $("#tgl_inspeksi").val();
  var id_pendaftaran = $("#id_pendaftaran").val();
  var id_peg = $("#id_peg").val();
  var bentuk_tanah = $("#bentuk_tanah").val();
  var elevasi = $("#elevasi").val();
  var batasan_thd_tanah = $("#batasan_thd_tanah").val();
  var peraturan_tata_kota = $("#bahasa").val();
  var pemenuhan_thd_peraturan_tatakota = $("#pemenuhan_thd_peraturan_tatakota").val();
  var id_lingkungan = $("#id_lingkungan").val();
  var karakteristik_lingkungan = $("#karakteristik_lingkungan").val();
  var kepadatan_pengembangan = $("#kepadatan_pengembangan").val();
  var pertumbuhan = $("#pertumbuhan").val();
  var sarana = $("#sarana").val();
  var prasarana = $("#prasarana").val();

  if (id_survei == ""){
    swal("Opps!", "Id Survei Harus Diisi!", "warning");
    return false;
  }else if (tgl_inspeksi == ""){
    swal("Opps!", "Tanggal Inspeksi Harus Diisi!", "warning");
    return false;
  }else if (id_pendaftaran == ""){
    swal("Opps!", "Id Pendaftaran Harus Diisi!", "warning");
    return false;
  }else if (id_peg == ""){
    swal("Opps!", "Id Pegawai Harus Diisi!", "warning");
    return false;
  }else if (bentuk_tanah == ""){
    swal("Opps!", "Bentuk Tanah Harus Diisi!", "warning");
    return false;
  }else if (elevasi == ""){
    swal("Opps!", "Elevasi Harus Diisi!", "warning");
    return false;
  }else if (batasan_thd_tanah == ""){
    swal("Opps!", "Batasan Terhadap Tanah Harus Diisi!", "warning");
    return false;
  }else if (peraturan_tata_kota == ""){
    swal("Opps!", "Peraturan Tata Kota Harus Diisi!", "warning");
    return false;
  }else if (pemenuhan_thd_peraturan_tatakota == ""){
    swal("Opps!", "Pemenuhan Terhadap Peraturan Tata Kota Harus Diisi!", "warning");
    return false;
  }else if (id_lingkungan == ""){
    swal("Opps!", "ID Lingkungan Harus Diisi!", "warning");
    return false;
  }else if (karakteristik_lingkungan == ""){
    swal("Opps!", "Karakteristik Lingkungan Harus Diisi!", "warning");
    return false;
  }else if (kepadatan_pengembangan == ""){
    swal("Opps!", "Kepadatan Pengembangan Harus Diisi!", "warning");
    return false;
  }else if (pertumbuhan == ""){
    swal("Opps!", "Pertumbuhan Harus Diisi!", "warning");
    return false;
  }else if (sarana == ""){
    swal("Opps!", "Sarana Harus Diisi!", "warning");
    return false;
  }else if (prasarana == ""){
    swal("Opps!", "Prasarana Harus Diisi!", "warning");
    return false;
  }else{
    return true;
  }
});

$("#id_pendaftaran").click(function(){
  $("#modalpendaftaran").modal("show");
});
$("#tabelpendaftaran").DataTable();

$(".pilih").click(function(){
  var id_pendaftaran = $(this).attr("data-idpendaftaran");
  $("#id_pendaftaran").val(id_pendaftaran);
  $("#modalpendaftaran").modal("hide");
});

$("#tambahpembanding").click(function(){
  var no_pembanding = $("#no_pembanding").val();
  var tgl_data = $("#tgl_data").val();
  var alamat_pembanding = $("#alamat_pembanding").val();
  var luas_tanah_pembanding = $("#luas_tanah_pembanding").val();
  var legalitas_pembanding = $("#legalitas_pembanding").val();
  var bentuk_tanah_pembanding = $("#bentuk_tanah_pembanding").val();
  var elevasi_pembanding = $("#elevasi_pembanding").val();
  var lebar_jalan_pembanding = $("#lebar_jalan_pembanding").val();
  var jarak_ke_tanah_dinilai = $("#jarak_ke_tanah_dinilai").val();
  var peruntukan_pembanding = $("#peruntukan_pembanding").val();
  var karakteristik_ekonomi = $("#karakteristik_ekonomi").val();
  var harga_penawaran_transaksi = $("#harga_penawaran_transaksi").val();
  var sumber_data = $("#sumber_data").val();
  var person = $("#person").val();
  var telepon = $("#telepon").val();
  var catatan = $("#catatan").val();
  var qty = $("#qty").val();
  var id_peg = $("#id_peg").val();

  if(no_pembanding == ""){
    swal("Oops !", "No Pembanding Harus Diisi !", "warning");
  }else if(qty == "" || qty == 0){
    swal("Oops !", "Qty Harus Diisi !", "warning");
  }else{
    $.ajax({
      type : 'POST',
      url : '<?php echo base_url(); ?>Survei/simpanpembandingtemp',
      data : {
        no_pembanding : no_pembanding,
        tgl_data : tgl_data,
        alamat_pembanding : alamat_pembanding,
        luas_tanah_pembanding : luas_tanah_pembanding,
        legalitas_pembanding : legalitas_pembanding,
        bentuk_tanah_pembanding : bentuk_tanah_pembanding,
        elevasi_pembanding : elevasi_pembanding,
        lebar_jalan_pembanding : lebar_jalan_pembanding,
        jarak_ke_tanah_dinilai : jarak_ke_tanah_dinilai,
        peruntukan_pembanding : peruntukan_pembanding,
        karakteristik_ekonomi : karakteristik_ekonomi,
        harga_penawaran_transaksi : harga_penawaran_transaksi,
        sumber_data : sumber_data,
        person : person,
        telepon : telepon,
        catatan : catatan,
        qty : qty,
        id_peg : id_peg
      },
      cache : false,
      success : function(respond){
        if(respond == 1){
          swal("Oops !", "Data Sudah Ada !", "warning");
        } else {
          loaddatapembanding();
        }
      }
    });
  }
});


</script>
