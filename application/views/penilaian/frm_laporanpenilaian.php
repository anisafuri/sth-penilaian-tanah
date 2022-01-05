<h2 class="page-title">
    Laporan Penilaian
</h2>
<div class="row mt-3">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>Penilaian/cetaklaporanpenilaian" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-calendar"></li>
              </span>
              <input type="date" class="form-control" name="dari" id="dari" placeholder="dari">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <li class="fa fa-calendar"></li>
              </span>
              <input type="date" class="form-control" name="sampai" id="sampai" placeholder="sampai">
            </div>
          </div>
        </div>
        <label class="form-label">NAMA PENILAI</label>
        <div class="input-icon mb-3">
          <select name="id_peg" id="id_peg" class="form-control" required>
            <option value="" selected disabled>-Pilih-</option>
            <?php
              foreach ($pegawai as $key => $value) { ?>
                <option value="<?=$value->id_peg?>"><?=$value->nama_peg?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-md-6">
              <button type="submit" name="submit" class="btn btn-primary w-100">CETAK</button>
            </div>
            <div class="col-md-6">
              <button type="export" name="export" class="btn btn-success w-100">EXPORT EXCEL</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function(){
  flatpickr(document.getElementById('dari'), {});
  flatpickr(document.getElementById('sampai'), {});
});
</script>
