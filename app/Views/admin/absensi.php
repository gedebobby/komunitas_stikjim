

<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
        <?php echo session()->getFlashdata('msg'); ?> 
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <!-- <div class="row"> -->
          <div class="card">
          <div class="card-body">
          <div class="d-flex mb-3">
          <h2 class="card-title"><?= $judul ?></h2>
            <!-- <a href="/admin/tambah_absensi" class="btn btn-success btn-lg text-white ml-auto"><i class="mdi mdi-plus"></i> Tambah Pertemuan</a> -->
            </div>

            <div class="row">
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <a href="/admin/tambah_absensi">
                <div class="card card-hover">
                  <div class="box bg-success text-center">
                    <h1 class="font-bold text-white">
                    <i class="mdi mdi-plus"></i>
                    </h1>
                    <h6 class="text-white">Absen Anggota</h6>
                  </div>
                </div>
                </a>
              </div>
            <!-- Column -->
              <div class="col-md-6 col-lg-4 col-xlg-3">
              <a href="/admin/rekap_absen">
                <div class="card card-hover">
                  <div class="box bg-cyan text-center">
                    <h1 class="font-bold text-white">
                      <i class="mdi mdi-clipboard-text"></i>
                    </h1>
                    <h6 class="text-white">Rekap Absen</h6>
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
          </div>
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



