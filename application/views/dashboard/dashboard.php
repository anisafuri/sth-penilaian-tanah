<h2 class="page-title">
    Dashboard
</h2>
<div class="alert alert-success" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
  Selamat Datang <b><?php echo $this->session->userdata('nama_peg'); ?></b> Sebagai <b><?php echo ucwords ($this->session->userdata('level')); ?></b>
</div>
<div class="row">
  <div class="col-md-6 col-xl-6">
    <div class="card card-sm">
      <div class="card-body d-flex align-items-center">
        <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
          </span>
            <div class="mr-3">
              <div class="font-weight-medium">
                <?php echo $jmlklien; ?> Klien
              </div>
            <div class="text-muted">Data Klien</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-6">
      <div class="card card-sm">
        <div class="card-body d-flex align-items-center">
          <span class="bg-blue text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" /><path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h2" /></svg>
            </span>
              <div class="mr-3">
                <div class="font-weight-medium">
                  <?php echo $jmlpenilaian; ?> Penilaian
                </div>
              <div class="text-muted">Penilaian</div>
            </div>
          </div>
        </div>
      </div>
    </div>
