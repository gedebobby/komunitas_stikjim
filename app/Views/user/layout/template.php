<!DOCTYPE html>
<html dir="ltr" lang="en">
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
    <link rel="stylesheet" type="text/css" href="<?= base_url('matrix') ?>/assets/extra-libs/multicheck/multicheck.css" />
	  <link href="<?= base_url('matrix') ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <link href="<?= base_url('matrix') ?>/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url('matrix') ?>/dist/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      
    <![endif]-->
  </head>

  <body> 
    
  <div class="header-nav">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dk">
      <div class="container">
          <a class="navbar-brand text-white" href="/user">Komunitas STIKJIM</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-auto">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#event">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kegiatan">Kegiatan</a>
                    </li>
                </ul>
                <li class="nav-item dropdown">
                    <a
                    class="
                        nav-link
                        dropdown-toggle
                        text-muted
                        waves-effect waves-dark
                        pro-pic
                    "
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <img
                        src="<?= base_url('matrix') ?>/assets/images/users/1.jpg"
                        alt="user"
                        class="rounded-circle"
                        width="31"
                    />
                    </a>
                    <ul
                    class="dropdown-menu dropdown-menu-end user-dd animated"
                    aria-labelledby="navbarDropdown"
                    >
                    <a class="dropdown-item" href="javascript:void(0)"
                        ><i class="mdi mdi-ticket"></i> List Event</a
                    >
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/auth/logout"
                        ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                    >
                    </ul>
                </li>
            </div>
            </div>
        </div>    
    </nav>
    </div>


    <?= $this->renderSection('konten') ?>

    <footer class="text-center">
        Copyright 2021 - BOBBY & OKA
    </footer>
        
  
  




<!-- All Jquery -->
    
    <!-- ============================================================== -->
    <script src="<?= base_url('matrix') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('matrix') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> 
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--Wave Effects -->
    <script src="<?= base_url('matrix') ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('matrix') ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('matrix') ?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url('matrix') ?>/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url('matrix') ?>/dist/js/pages/chart/chart-page-init.js"></script>

    <script src="<?= base_url('matrix') ?>/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= base_url('matrix') ?>/assets/extra-libs/DataTables/datatables.min.js"></script>

    <script>
         $(document).ready(function(){
            $(document).on('click', '#detail', function(){
                var NamaEvent = $(this).data('namaevent');
                var idevent = $(this).data('idevent');
                var penyelenggara = $(this).data('penyelenggara');
                var tanggal = $(this).data('tanggal');
                var waktu = $(this).data('waktu');
                var lokasi = $(this).data('lokasi');
                var kategori = $(this).data('kategori');
                var status = $(this).data('status');
                var jmlpeserta = $(this).data('jmlpeserta');
                var kuota = $(this).data('kuota');
                var gambar = $(this).data('gambar');
                var deskripsi = $(this).data('deskripsi');

                var now = new Date();

                $('#namaevent').text(NamaEvent);
                $('#penyelenggara').text(penyelenggara);
                $('#waktu').text(waktu);
                $('#tanggal').text(tanggal);
                $('#lokasi').text(lokasi);
                $('#kategori').text(kategori);                
                $('#deskripsi').text(deskripsi);
                $("#gambar-event").attr("src", "/image/" + gambar);
                $("#btn-join").attr("href", "/user/registrasi/" + idevent);
                
                if (jmlpeserta < kuota) {
                    $('#kuota').text("Tersedia");
                    $('#kuota').removeClass('bg-danger'); 
                    $('#kuota').addClass('bg-success');
                    $('#btn-join').removeClass('disabled');
                } else {
                    $('#kuota').text("Penuh");
                    $('#kuota').removeClass('bg-success');
                    $('#kuota').addClass('bg-danger');
                    $('#btn-join').addClass('disabled');
                }

                // if (tanggal < ) {
                //     $('#status').text("Segera");
                //     $('#status').addClass('bg-warning');
                // } else {
                //     $('#status').text("Selesai");
                //     $('#status').addClass('bg-danger');
                // }

                console.log(now);               
            });
        });
    </script>

  </body>
</html>  