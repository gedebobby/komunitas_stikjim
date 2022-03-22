

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
          <form action="/admin/add_absensi" method="POST">
          <a href="/admin/tambah_absensi" class="btn btn-danger mb-3 text-white">< Kembali</a>
          <div class="d-flex">
            </div>
            
            <div class="comment-widgets scrollable p-2">
                <div class="d-flex flex-row comment-row mt-0">
                <div class="comment-text w-100">
                <?php foreach ($anggota as $agt) : ?>
                <input type="hidden" name="id_user" value="1">
                    <h3 class="font-medium"><?= $agt->nama ?></h3>
                    <h4 class="font-medium"><?= $agt->nim ?></h4>
                    
                    <div class="comment-footer mt-5">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Hadir</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Tidak Hadir</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                <?php endforeach ?>
                </div>
                </div>
            </div>
            </form>

                 
          
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          
        </div>
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



