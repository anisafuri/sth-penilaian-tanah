<h2 class="page-title">
    Form Pendaftaran
</h2>
<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formpendaftaran" method="POST" action="<?php echo base_url(); ?>Pendaftaran/simpanpendaftaran" enctype="multipart/form-data">
  <input type="hidden" id="cekTanah">
  <input type="hidden" id="cekLuas">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
      <label class="form-label">ID PENDAFTARAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-barcode"></li>
        </span>
        <input type="text" readonly value="<?php echo $id_pendaftaran;?>" class="form-control" name="id_pendaftaran" id="id_pendaftaran" placeholder="Id Pendaftaran">
      </div>
      <label class="form-label">TANGGAL PENDAFTARAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="tgl_pendaftaran" id="tgl_pendaftaran" placeholder="Tanggal Pendaftaran">
      </div>
      <label class="form-label">JENIS JASA</label>
      <div class="input-icon mb-3">
        <select name="jenis_jasa" class="form-select">
          <option value="">-pilih-</option>
          <option value="PI">PI (Real Properti)</option>
          <option value="PI">PP (Personal Properti)</option>
          <option value="BS">BS (Bisnis)</option>
        </select>
      </div>
      <label class="form-label">PEMBERI TUGAS</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-user"></li>
        </span>
        <input type="hidden" name="id_pemberitugas" id="id_pemberitugas">
        <input type="text" readonly class="form-control" name="nama_pemberitugas" id="nama_pemberitugas" placeholder="Pemberi Tugas">
      </div>
      <label class="form-label">PEMILIK ASET</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-user"></li>
        </span>
        <input type="hidden" name="id_pemilik" id="id_pemilik">
        <input type="text" readonly class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Pemilik Aset">
      </div>
      <label class="form-label">PENANGGUNG JAWAB</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-user"></li>
        </span>
        <input type="hidden" name="id_peg" id="id_peg">
        <input type="text" readonly class="form-control" name="nama_peg" id="nama_peg" placeholder="Penanggung Jawab">
      </div>
      <label class="form-label">TUJUAN PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-list-alt"></li>
        </span>
        <input type="text"  class="form-control" name="tujuan_penilaian" id="tujuan_penilaian" placeholder="Tujuan Penilaian">
      </div>
      <div class="mb-3">
      <div class="form-label">Dasar Nilai</div>
      <div>
      <label class="form-check">
      <input class="form-check-input" type="checkbox" name="dasar_penilaian[]" id="dasar_penilaian" value="Nilai Asuransi"/>Nilai Asuransi<br/>
      </label>
      <label class="form-check">
      <input class="form-check-input" type="checkbox" name="dasar_penilaian[]" id="dasar_penilaian" value="Nilai Likuidasi"  />Nilai Likuidasi<br/>
      </label>
      <label class="form-check">
      <input class="form-check-input" type="checkbox" name="dasar_penilaian[]" id="dasar_penilaian" value="Nilai Pasar" />Nilai Pasar<br/>
      </label>
      <label class="form-check">
      <input class="form-check-input" type="checkbox" name="dasar_penilaian[]" id="dasar_penilaian" value="Nilai Sewa Pasar" />Nilai Sewa Pasar<br/>
      </label>
      <label class="form-check">
      <input class="form-check-input" type="checkbox" name="dasar_penilaian[]" id="dasar_penilaian" value="Nilai Wajar" />Nilai Wajar<br/>
      </label>
      </div>
      </div>
      <label class="form-label">PENDEKATAN PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-list-alt"></li>
        </span>
        <input type="text"  class="form-control" name="pendekatan_penilaian" id="pendekatan_penilaian" placeholder="Pendekatan Penilaian">
      </div>
      <label class="form-label">TANGGAL PENILAIAN</label>
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
        <li class="fa fa-calendar"></li>
        </span>
        <input type="text" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="tgl_penilaian" id="tgl_penilaian" placeholder="Tanggal Penilaian">
      </div>
    </div>
  </div>
</div>
</div>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Tanah</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-barcode"></li>
              </span>
              <input type="text" readonly class="form-control" name="no_sertifikat" id="no_sertifikat" placeholder="No Sertifikat Tanah">
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-copy"></li>
              </span>
              <input type="text" readonly class="form-control" name="hak_tanah" id="hak_tanah" placeholder="Hak Tanah">
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-map"></li>
              </span>
              <input type="text" readonly class="form-control" name="kabupaten" id="kabupaten" placeholder="Wilayah">
            </div>
          </div>
          <div class="col-md-3">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-user"></li>
              </span>
              <input type="text" readonly class="form-control" name="nama_pemegang_hak" id="nama_pemegang_hak" placeholder="Nama Pemegang Hak">
            </div>
          </div>
          <div class="col-md-1">
              <input type="text" readonly class="form-control" name="luas" id="luas" placeholder="luas">
          </div>
          <div class="col-md-1">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-check-square-o"></li>
              </span>
              <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty">
            </div>
          </div>
        <div class="col-md-1">
        <a href="#" class="btn btn-primary w100" id="tambahtanah"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="30" height="30"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" />
          <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
          <line x1="12" y1="11" x2="12" y2="17" /><line x1="9" y1="14" x2="15" y2="14" /></svg></a>
      </div>
    </div>
    <div class="row">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>NO SERTIFIKAT</th>
            <th>HAK TANAH</th>
            <th>WILAYAH</th>
            <th>NAMA PEMEGANG HAK</th>
            <th>LUAS</th>
            <th>QTY</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody id="loaddatatanah">

        </tbody>

      </table>
    </div>
    <div class="row mt-3">
    <button type="submit" class="btn btn-primary w100"><i class="fa fa-send mr-2"></i>DAFTAR</button>
    </div>
  </div>
</div>
</div>
</div>
</form>
<div class="modal modal-blur fade" id="modalpemberitugas" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data Pemberi Tugas</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered" id="tabelpemberitugas">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID PEMBERI TUGAS</th>
                  <th>KODE INDUSTRI</th>
                  <th>NAMA PEMBERI TUGAS</th>
                  <th>ALAMAT</th>
                  <th>BIDANG USAHA</th>
                  <th>PHONE</th>
                  <th>FAX</th>
                  <th>EMAIL</th>
                  <th>NPWP</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($pemberi_tugas as $k) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $k->id_pemberitugas; ?></td>
                  <td><?php echo $k->kode_industri; ?></td>
                  <td><?php echo $k->nama_pemberitugas; ?></td>
                  <td><?php echo $k->alamat_pemberitugas; ?></td>
                  <td><?php echo $k->bidang_usaha; ?></td>
                  <td><?php echo $k->telp_pemberitugas; ?></td>
                  <td><?php echo $k->fax_pemberitugas; ?></td>
                  <td><?php echo $k->email_pemberitugas; ?></td>
                  <td><?php echo $k->npwp; ?></td>
                  <td>
                    <a href="#" class="btn-sm btn-primary pilih" data-idpemberitugas="<?php echo $k->id_pemberitugas; ?>" data-namapemberitugas="<?php echo $k->nama_pemberitugas; ?>">pilih</a>
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
    <div class="modal modal-blur fade" id="modalpemilikaset" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Data Pemilik Aset</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-striped table-bordered" id="tabelpemilikaset">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID PEMILIK ASET</th>
                      <th>NAMA PEMILIK ASET</th>
                      <th>ALAMAT</th>
                      <th>PHONE</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($pemilik_aset as $a) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $a->id_pemilik; ?></td>
                      <td><?php echo $a->nama_pemilik; ?></td>
                      <td><?php echo $a->alamat_pemilik; ?></td>
                      <td><?php echo $a->telp_pemilik; ?></td>
                      <td>
                        <a href="#" class="btn-sm btn-primary pilihpemilik" data-idpemilik="<?php echo $a->id_pemilik; ?>" data-namapemilik="<?php echo $a->nama_pemilik; ?>">pilih</a>
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
      <div class="modal modal-blur fade" id="modalpegawai" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Data Pegawai</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped table-bordered" id="tabelpegawai">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>ID PEGAWAI</th>
                          <th>NAMA PEGAWAI</th>
                          <th>USERNAME</th>
                          <th>PASSWORD</th>
                          <th>LEVEL</th>
                          <th>ALAMAT PEGAWAI</th>
                          <th>TELP PEGAWAI</th>
                          <th>EMAIL PEGAWAI</th>
                          <th>IZIN PROFESI</th>
                          <th>FOTO PEGAWAI</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pegawai as $p) {
                        ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $p->id_peg; ?></td>
                          <td><?php echo $p->nama_peg; ?></td>
                          <td><?php echo $p->username; ?></td>
                          <td><?php echo $p->password; ?></td>
                          <td><?php echo $p->level; ?></td>
                          <td><?php echo $p->alamat_peg; ?></td>
                          <td><?php echo $p->telp_peg; ?></td>
                          <td><?php echo $p->email_peg; ?></td>
                          <td><?php echo $p->izin_profesi; ?></td>
                          <td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $p->foto_peg; ?>" width="40" height="60" ></td>
                          <td>
                              <a href="#" class="btn-sm btn-primary pilihpegawai" data-idpeg="<?php echo $p->id_peg; ?>" data-namapeg="<?php echo $p->nama_peg; ?>">pilih</a>
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
            <div class="modal modal-blur fade" id="modaltanah" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-full-width" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Data Tanah</h5>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-striped table-bordered" id="tabeltanah">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>NO SERTIFIKAT</th>
                                <th>HAK TANAH</th>
                                <th>WILAYAH</th>
                                <th>PEMEGANG HAK</th>
                                <th>TANGGAL DIKELUARKAN</th>
                                <th>TANGGAL JATUH TEMPO</th>
                                <th>NO GAMBAR SITUASI</th>
                                <th>TANGGAL GAMBAR SITUASI</th>
                                <th>LUAS</th>
                                <th>SERTIFIKAT</th>
                                <th>AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              foreach($tanah as $t) {
                              ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $t->no_sertifikat; ?></td>
                                <td><?php echo $t->hak_tanah; ?></td>
                                <td><?php echo $t->kabupaten; ?></td>
                                <td><?php echo $t->nama_pemegang_hak; ?></td>
                                <td><?php echo $t->tgl_dikeluarkan; ?></td>
                                <td><?php echo $t->tgl_jatuh_tempo; ?></td>
                                <td><?php echo $t->no_gambar_situasi; ?></td>
                                <td><?php echo $t->tgl_gambar_situasi; ?></td>
                                <td><?php echo $t->luas; ?></td>
                                <!-- <td><?php echo $t->sertifikat_tanah; ?></td> -->
                                <td>
                                <?php
                                  if ($t->sertipikat_tanah) {
                                    $files = explode(',',$t->sertipikat_tanah);
                                    for ($i=0; $i < count($files); $i++) {
                                      echo '<a href="'.base_url("assets/upload/").$files[$i].'" download> '.$files[$i].' </a><br>';
                                    }
                                  }
                                ?>
                              </td>
                                <td>
                                    <a href="#" class="btn-sm btn-primary pilihtanah" data-idtanah="<?php echo $t->no_sertifikat; ?>"
                                      data-haktanah="<?php echo $t->hak_tanah; ?>" data-kabupaten="<?php echo $t->kabupaten; ?>"
                                      data-namapemeganghak="<?php echo $t->nama_pemegang_hak; ?>" data-luas="<?php echo $t->luas; ?>"
                                      data-sertifikattanah="<?php echo $t->sertipikat_tanah; ?>">pilih</a>
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
  flatpickr(document.getElementById('tgl_pendaftaran'), {});
});

document.addEventListener("DOMContentLoaded", function(){
  flatpickr(document.getElementById('tgl_penilaian'), {});
});

function cekTanah(){
  $.ajax  ({
    type: 'POST',
    url: '<?php echo base_url(); ?>Pendaftaran/cekTanah',
    cache: false,
    success: function(respond){
      $("#cekTanah").val(respond);
    }
  });
}

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

cekTanah();
loaddatatanah();


$("#formpendaftaran").submit(function(){
  var id_pendaftaran = $("#id_pendaftaran").val();
  var tgl_pendaftaran = $("#tgl_pendaftaran").val();
  var jenis_jasa = $("#jenis_jasa").val();
  var id_pemberitugas = $("#id_pemberitugas").val();
  var id_pemilik = $("#id_pemilik").val();
  var id_peg = $("#id_peg").val();
  var tujuan_penilaian = $("#tujuan_penilaian").val();
  var dasar_penilaian = [];
  $(':checkbox:checked').each(function(i){
    dasar_penilaian[i] = $(this).val();
  });
  var pendekatan_penilaian = $("#pendekatan_penilaian").val();
  var tgl_penilaian = $("#tgl_penilaian").val();
  var no_sertifikat = $("#no_sertifikat").val();


  if (id_pendaftaran == ""){
    swal("Opps!", "Id Pendaftaran Harus Diisi!", "warning");
    return false;
  }else if (tgl_pendaftaran == ""){
    swal("Opps!", "Tanggal Pendaftaran Harus Diisi!", "warning");
    return false;
  }else if (jenis_jasa == ""){
    swal("Opps!", "Jenis Jasa Harus Diisi!", "warning");
    return false;
  }else if (id_pemberitugas == ""){
    swal("Opps!", "Pemberi Tugas Harus Diisi!", "warning");
    return false;
  }else if (id_pemilik == ""){
    swal("Opps!", "Pemilik Aset Harus Diisi!", "warning");
    return false;
  }else if (id_peg == ""){
    swal("Opps!", "Penanggung Jawab Harus Diisi!", "warning");
    return false;
  }else if (tujuan_penilaian == ""){
    swal("Opps!", "Tujuan Penilaian Harus Diisi!", "warning");
    return false;
  }else if (dasar_penilaian.length == 0){
  swal("Opps!", "Dasar Nilai Harus Diisi, Klik Checkbox minimal 1!", "warning");
  return false;
  }else if (pendekatan_penilaian == ""){
    swal("Opps!", "Pendekatan Penilaian Harus Diisi!", "warning");
    return false;
  }else if (tgl_penilaian == ""){
    swal("Opps!", "Tanggal Penilaian Harus Diisi!", "warning");
    return false;
  }else if (no_sertifikat == ""){
    swal("Opps!", "No Sertifikat Harus Diisi!", "warning");
    return false;
  }else{
    return true;
  }
});

$("#nama_pemberitugas").click(function(){
  $("#modalpemberitugas").modal("show");
});
$("#tabelpemberitugas").DataTable();

$(".pilih").click(function(){
  var id_pemberitugas = $(this).attr("data-idpemberitugas");
  var nama_pemberitugas = $(this).attr("data-namapemberitugas");
  $("#id_pemberitugas").val(id_pemberitugas);
  $("#nama_pemberitugas").val(nama_pemberitugas);
  $("#modalpemberitugas").modal("hide");
});

$("#nama_pemilik").click(function(){
  $("#modalpemilikaset").modal("show");
});
$("#tabelpemilikaset").DataTable();

$(".pilihpemilik").click(function(){
  var id_pemilik = $(this).attr("data-idpemilik");
  var nama_pemilik = $(this).attr("data-namapemilik");
  $("#id_pemilik").val(id_pemilik);
  $("#nama_pemilik").val(nama_pemilik);
  $("#modalpemilikaset").modal("hide");
});



$("#nama_peg").click(function(){
  $("#modalpegawai").modal("show");
});
$("#tabelpegawai").DataTable();

$(".pilihpegawai").click(function(){
  var id_peg = $(this).attr("data-idpeg");
  var nama_peg = $(this).attr("data-namapeg");
  $("#id_peg").val(id_peg);
  $("#nama_peg").val(nama_peg);
  $("#modalpegawai").modal("hide");
});

$("#no_sertifikat").click(function(){
  $("#modaltanah").modal("show");
});
$("#tabeltanah").DataTable();

$(".pilihtanah").click(function(){
  var no_sertifikat = $(this).attr("data-idtanah");
  var hak_tanah = $(this).attr("data-haktanah");
  var kabupaten = $(this).attr("data-kabupaten");
  var nama_pemegang_hak = $(this).attr("data-namapemeganghak");
  var luas = $(this).attr("data-luas");
  $("#no_sertifikat").val(no_sertifikat);
  $("#hak_tanah").val(hak_tanah);
  $("#kabupaten").val(kabupaten);
  $("#nama_pemegang_hak").val(nama_pemegang_hak);
  $("#luas").val(luas);
  $("#modaltanah").modal("hide");
});

$("#tambahtanah").click(function(){
  var no_sertifikat = $("#no_sertifikat").val();
  var hak_tanah = $("#hak_tanah").val();
  var kabupaten = $("#kabupaten").val();
  var nama_pemegang_hak = $("#nama_pemegang_hak").val();
  var luas = $("#luas").val();
  var qty = $("#qty").val();
  var id_pemilik = $("#id_pemilik").val();

  if(no_sertifikat == ""){
    swal("Oops !", "No Sertifikat Harus Diisi !", "warning");
  }else if(id_pemilik == "" ){
    swal("Oops !", "Id Pemilik Harus Diisi !", "warning");
  }else if(qty == "" || qty == 0){
    swal("Oops !", "Qty Harus Diisi !", "warning");
  }else{
    $.ajax({
      type : 'POST',
      url : '<?php echo base_url(); ?>Pendaftaran/simpantanahtemp',
      data : {
        no_sertifikat : no_sertifikat,
        hak_tanah : hak_tanah,
        kabupaten : kabupaten,
        nama_pemegang_hak : nama_pemegang_hak,
        luas : luas,
        qty : qty,
        id_pemilik : id_pemilik
      },
      cache : false,
      success : function(respond){
        if(respond == 1){
          swal("Oops !", "Data Sudah Ada !", "warning");
        } else {
          loaddatatanah();
        }
      }
    });
  }
});



</script>
