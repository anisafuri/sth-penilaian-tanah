
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.14
* @link https://tabler.io
* Copyright 2018-2020 The Tabler Authors
* Copyright 2018-2020 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>STH-Penilaian Tanah | Login</title>
    <!-- CSS files -->
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/dist/css/demo.min.css" rel="stylesheet"/>
    <style>
      body {
      	display: none;
      }
    </style>
  </head>
  <body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
      <div class="container-tight py-6">
        <div class="text-center mb-4">
          <a href="."><img src="<?php echo base_url(); ?>assets/static/logo sth.png" height="40" alt=""></a><br><br>
          <h2 >SISTEM INFORMASI - PENILAIAN TANAH</h2>

        </div>
        <form class="card card-md" action="<?php echo base_url(); ?>auth/ceklogin" method="POST" autocomplete="off">
          <div class="card-body">
            <h1 class="card-title text-center mb-4">Silahkan Login</h1>
            <h4><?php echo $this->session->flashdata('msg'); ?></h4>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off">

              </div>
            </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>

      </div>
    </div>
    <!-- Libs JS -->
    <script src="<?php echo base_url(); ?>assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tabler Core -->
    <script src="<?php echo base_url(); ?>assets/dist/js/tabler.min.js"></script>
    <script>
      document.body.style.display = "block"
    </script>
  </body>
</html>
