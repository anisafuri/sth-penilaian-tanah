<h2 class="page-title">
    Laporan Reviewing
</h2>
<div class="row mt-3">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>Reviewing/cetaklaporanreviewing" method="POST">
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
