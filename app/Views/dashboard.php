

<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">

            <h2 class="mb-4">Selamat Datang, <?= session()->get('username') ?></h2>
              
            <!-- Pengumuman -->
            <div class="col-md-6 col-lg-2 col-xlg-3 mb-4">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#pengumuman-modal"><i class="mdi mdi-speaker"></i> Buat Pengumuman</button>
            </div>

            <div class="modal fade" id="pengumuman-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Pengumuman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="get">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Isi Pengumuman :</label>
                        <textarea class="form-control" name="pengumuman" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Pengumuman -->

            <!-- Voting -->

            <div class="col-md-6 col-lg-2 col-xlg-3">
            <button type="button" class="btn btn-success btn-lg text-white" data-toggle="modal" data-target="#voting-modal"><i class="mdi mdi-plus"></i> Tambah Vote</button>
            </div>

            <div class="modal fade" id="voting-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Vote</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Isi Pengumuman :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Kirim</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Akhir Voting -->



          <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="/admin/data_komunitas">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-bold text-white">
                  <?= $jmlKomunitas ?>
                  </h1>
                  <h6 class="text-white">Jumlah Komunitas</h6>
                </div>
              </div>
              </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="/admin/data_anggota">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-bold text-white">
                    <?= $jmlAnggota ?>
                  </h1>
                  <h6 class="text-white">Jumlah Anggota</h6>
                </div>
              </div>
              </a>
            </div>
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-collage"></i>
                  </h1>
                  <h6 class="text-white">Widgets</h6>
                </div>
              </div>
            </div> -->
          </div>
          
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>

<?= $this->endSection() ?>



