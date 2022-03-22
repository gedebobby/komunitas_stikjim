

<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <?php echo session()->getFlashdata('msg'); ?> 
          <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">INFO KEGIATAN</h4>
                </div>
                <div class="comment-widgets scrollable p-2">
                  <!-- Comment Row -->
                  <?php foreach( $kegiatan as $k ) :?>
                  <div class="d-flex flex-row comment-row mt-0">
                    <!-- <div class="p-2">
                      <img
                        src="../assets/images/users/1.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div> -->                    
                    <div class="comment-text w-100">
                      <h3 class="font-medium"><?= $k->nama_komunitas ?></h3>
                      <span class="mb-3 d-block"
                        >
                        <p><i class="mdi mdi-calendar"></i> <?= $k->hari_kegiatan ?></p>
                        <p><i class="mdi mdi-clock"></i> <?= $k->waktu_kegiatan ?> WITA</p>
                        <p><i class="mdi mdi-map-marker"></i> <?= $k->lokasi_kegiatan ?></p>
                        <p><i class="mdi mdi-speaker-wireless"></i> <?= $k->pengumuman ?></p>
                      </span>
                      <div class="comment-footer">
                        <button type="button" id="btn-edit-kegiatan" class="btn btn-success btn-sm text-white" data-toggle="modal"
                          data-target="#modal-kegiatan"
                          data-id_kegiatan="<?= $k->id_kegiatan ?>"
                          data-hari_kegiatan="<?= $k->hari_kegiatan ?>"
                          data-waktu_kegiatan="<?= $k->waktu_kegiatan ?>"
                          data-lokasi_kegiatan="<?= $k->lokasi_kegiatan ?>"
                          data-pengumuman="<?= $k->pengumuman ?>"
                          
                          ><i class="mdi mdi-pencil"></i> Edit Kegiatan</button>
                      </div>
                    </div>
                  </div>
                  <?php endforeach ; ?>
                </div>
              </div>


              <!-- Lokasi -->
              <div class="modal fade" id="modal-kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info Kegiatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="/admin/edit_kegiatan" method="POST">
                    <input type="hidden" name="id_kegiatan" id="id-kegiatan">
                    <div class="form-group">
                        <label for="hari_kegiatan">Setiap Hari :</label>
                        <select name="hari_kegiatan" class="form-control" id="hari-kegiatan">
                        <option class="font-weight-bold" value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="waktu-kegiatan">Waktu :</label>
                        <input type="time" name="waktu_kegiatan" class="form-control" id="waktu-kegiatan" placeholder="Masukkan lokasi kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="lokasi-kegiatan">Lokasi :</label>
                        <input type="text" name="lokasi_kegiatan" class="form-control" id="lokasi-kegiatan" placeholder="Masukkan lokasi kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="lokasi-kegiatan">Isi Pengumuman :</label>
                        <textarea class="form-control" name="pengumuman_kegiatan" id="pengumuman-kegiatan" rows="3"></textarea>
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
              <!-- ---------- -->
          
          
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



