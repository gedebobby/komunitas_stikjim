<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title><?= $judul ?></title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="<?= base_url('matrix') ?>/assets/images/favicon.png"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="<?= base_url('matrix') ?>/dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    body {
        background-color: #50b0ef;
    }

    .kotak-form {
        width: 400px;
        background-color: #fff;
        padding: 3rem 2rem;
        margin-top: 100px;
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

    }

    
    </style>

  </head>

  <body>
    <div class="container d-flex justify-content-center align-item-center">
    <div class="kotak-form">
    <div class="auth-box my-auto border-secondary">
          <div>
            <div class="text-center pt-3 pb-3">
              <span class="db"
                ><img src="/img/stikom-bali.png" alt="logo" width="100"
              /></span>
            </div>
            <?php  echo session()->getFlashdata('msg'); ?>
            <!-- Form -->
            <form class="form-horizontal mt-3" method="POST" action="/auth/LoginAdmin">
              <div class="row pb-4">
                <div class="col-12">
                  <div class="input-group mb-3">
                    <input
                      type="text"
                      name="username"
                      class="form-control form-control-lg <?= ($validasi->hasError('username')) ? 'is-invalid' : '' ; ?>"
                      placeholder="NIM"
                      aria-label="NIM"
                      aria-describedby="basic-addon1"
                      value="<?= old('username') ?>"
                      autofocus
                    />
                    <div class="invalid-feedback">
                      <?= $validasi->getError('username') ?>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input
                      type="password"
                      name="password"
                      class="form-control form-control-lg <?= ($validasi->hasError('password')) ? 'is-invalid' : '' ; ?>"
                      placeholder="Password"
                      aria-label="Password"
                      aria-describedby="basic-addon1"
                      value="<?= old('password') ?>"
                    />
                    <div class="invalid-feedback">
                      <?= $validasi->getError('password') ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3 d-grid">
                      <button class="btn btn-block btn-lg btn-info" type="submit">Login</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    </div>

    
















      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url('matrix') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('matrix') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $(".preloader").fadeOut();
    </script>
  </body>
</html>
