

<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
        <?php if($validasi->hasError('tgl_pertemuan')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('tgl_pertemuan') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>';
            }; ?> 
        
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <!-- <div class="row"> -->
          <div class="card">
          <div class="card-body">
          <form action="/admin/add_absensi" method="POST">
          <button type="submit" class="btn btn-lg btn-success text-white float-right"><i class="mdi mdi-content-save"></i> Simpan Absen</button>
          <div class="d-flex">
            </div>
            
            <div class="row mb-4">
                <div class="col-4">
                <a href="/admin/absensi" class="btn btn-danger mb-3 text-white"><span class="mdi mdi-undo"></span> Kembali</a>
                <h4>Tanggal Pertemuan</h4>
                <input type="date" class="form-control" name="tgl_pertemuan" placeholder="Last name" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>

            <div class="table-responsive">
					<table id="zero_config" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Anggota</th>
							<th>Kehadiran</th>
						</tr>
						</thead> 
						<tbody>
            <?php 
            $i = 1;
            foreach ($anggota as $agt) :
            ?>
              <tr>
                  <td><?= $i++?></td>
                  <td><?= $agt->nama ?></td>
                  <input type="hidden" name="id_user[<?= $agt->id_user ?>]" value="<?= $agt->id_user ?>">
                  <td>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="keterangan[<?= $agt->id_user ?>]" id="hadir<?= $agt->id_user ?>" required value="1">
                    <label class="form-check-label" for="hadir<?= $agt->id_user ?>">Hadir</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="keterangan[<?= $agt->id_user ?>]" id="absen<?= $agt->id_user ?>" required value="0">
                    <label class="form-check-label" for="absen<?= $agt->id_user ?>">Tidak Hadir</label>
                  </div>
                  </td>
              </tr>
            <?php endforeach ?>
						</tbody>
					</table>
          </form>
				</div>
        </div>
        </div>

        <div class="modal fade" id="edit-tahunAngkatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Tahun Angkatan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span> 
							</button>
						</div>
						<div class="modal-body">
						<form action="/admin/editTahunAngkatan" method="POST">
						<input type="hidden" name="id_angkatan" id="edit-id-angkatan">
						<div class="form-group">
							<label for="username-edit">Tahun Angkatan</label>
							<input type="text" name="tahun_angkatan" class="form-control" id="angkatan-edit" placeholder="Masukkan Tahun Angkatan">
						</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
						</div>
						</form>
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



