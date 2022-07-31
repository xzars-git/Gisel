<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/img/manpro.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Masuk ke akun Anda
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url() ?>/assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
</head>
<body class="login-page sidebar-collapse">
<div class="page-header header-filter" style="background-image: url('<?php echo base_url() ?>/assets/img/bg-manpro.png'); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login text-right" style="min-height: 250px;">
            <form class="form" method="post" action="<?php echo base_url() ?>/account/check">
              <div class="card-header card-header-danger text-center">
                <h4 class="card-title">Masuk</h4><div></div>
              </div>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">perm_identity</i>
                    </span>
                  </div>
                  <input type="number" class="form-control" name="nim" placeholder="NIM...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password...">
                </div>
              </div>
              <div class="footer text-center">
                <input type="submit" class="btn btn-danger btn-link btn-wd btn-lg" value="Ayo masuk!">
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php
      use Config\Services;
        $session = Services::session();
        $errors = $session->getFlashdata('errors');
        if (isset($errors)) {
          echo '<div class="alert alert-danger">
          <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
          <ul>';
          foreach ($errors as $error) :
            echo '<li>'.esc($error).'</li>';
          endforeach;
          echo '</ul>
          </div></div>';
        } else {
          echo $session->getFlashdata('msg');
        }
      ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url() ?>/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>/assets/js/plugins/moment.min.js"></script>
</body>
</html>
