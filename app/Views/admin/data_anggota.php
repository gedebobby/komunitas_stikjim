<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
	<?php echo session()->getFlashdata('msg'); ?>
		<!-- <div class="row"> -->
				<!-- <div class="col-12"> -->
				<div class="card">
				<div class="card-body">
				<div class="d-flex mb-3">
				<h5 class="card-title"><?= $judul ?></h5>
				<!-- <button type="button" class="btn btn-success ml-auto text-white" data-toggle="modal" data-target="#tambah-anggota"><i class="mdi mdi-plus"></i> Tambah Anggota</button> -->
				</div>

			<div class="modal fade" id="tambah-anggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="/admin/input_anggota" method="POST">
					<div class="form-group">
						<label for="nama-anggota">Nama Anggota</label>
						<input type="text" name="nama_anggota" class="form-control" id="nama-anggota" placeholder="Masukkan Nama Anggota">
					</div>
                    <div class="form-group">
						<label for="nim-anggota">NIM</label>
						<input type="text" name="nim_anggota" class="form-control" id="nim-anggota" placeholder="Masukkan NIM">
					</div>
					<div class="form-group">
                      <label for="edit-penyelenggara">Komunitas</label>
                      <select class="select2 form-select shadow-none" name="id_komunitas" id="tambah-komunitas-anggota">
                      <option class="font-weight-bold">Pilih Komunitas</option> 
                      <?php foreach ($komunitas as $e ) {
                        echo "<option value='" . $e->id_komunitas ."'>" . $e->nama_komunitas . "</option>";
                      } ?>
                      </select>
                    </div>
					<div class="form-group">
						<label for="no-ponsel">No Ponsel</label>
						<input type="text" name="no_ponsel" class="form-control" id="no-ponsel" placeholder="Masukkan Nomor Telepon">
					</div>
                    <div class="form-group">
						<label for="email-anggota">Email</label>
						<input type="email" name="email" class="form-control" id="email-anggota" placeholder="Masukkan Email">
					</div>
					<input type="password" hidden name="password" value="12345678" id="">
                    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
					</div>
					</form>
                    </div>
                </div>
            </div>

				<div class="table-responsive">
					<table id="zero_config" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIM</th>
							<th>Angkatan</th>
							<th>Komunitas Diikuti</th>
							<th>No. Ponsel</th>
							<th>Email</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach ($anggota as $a) : ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $a->nama ?></td>
							<td><?= $a->nim ?></td>
							<td><?= $a->tahun_angkatan ?></td>
							<td><?= $a->nama_komunitas ?></td>
							<td><?= $a->no_ponsel ?></td>
							<td><?= $a->email ?></td>
							<td>
							<button type="button" class="btn btn-primary" id="btn-edit-anggota" 
									data-toggle="modal" 
									data-target="#edit-anggota"
									data-id_user="<?= $a->id_user ?>" 
									data-nama="<?= $a->nama ?>" 
									data-nim="<?= $a->nim ?>"
									data-id_angkatan="<?= $a->id_angkatan ?>"
									data-noponsel="<?= $a->no_ponsel ?>"
									data-id_komunitas_anggota="<?= $a->id_komunitas ?>"
									data-email="<?= $a->email ?>"
									>Edit</button>
							<a type="button" href="/admin/deleteAnggota/<?= $a->id_user ?>" onClick="return confirm('Apakah anda yakin ingin menghapus ini?')" class="btn btn-danger text-white">Hapus</a>
							</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>

				<div class="modal fade" id="edit-anggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="/admin/edit_anggota" method="POST">
					<input type="hidden" name="id_user" id="id-user">
					<div class="form-group">
						<label for="nama-anggota">Nama Anggota</label>
						<input type="text" name="nama_anggota" required class="form-control" id="edit-nama-anggota" placeholder="Masukkan Nama Anggota">
					</div>
                    <div class="form-group">
						<label for="nim-anggota">NIM</label>
						<input type="text" name="nim_anggota" required class="form-control" id="edit-nim-anggota" placeholder="Masukkan NIM">
					</div>
					<div class="form-group">
                      <label for="edit-penyelenggara">Tahun Angkatan</label>
                      <select class="select2 form-select shadow-none" name="id_angkatan" id="edit-id-angkatan">
                      <option class="font-weight-bold">Pilih Angkatan</option> 
                      <?php foreach ($angkatan as $ang ) {
                        echo "<option value='" . $ang->id_angkatan ."'>" . $ang->tahun_angkatan . "</option>";
                      } ?>
                      </select>
                    </div>					
					<div class="form-group">
						<label for="no-ponsel">No Ponsel</label>
						<input type="text" name="no_ponsel" required class="form-control" id="edit-no-ponsel" placeholder="Masukkan Nomor Telepon">
					</div>
                    <div class="form-group">
						<label for="email-anggota">Email</label>
						<input type="email" name="email" required class="form-control" id="edit-email-anggota" placeholder="Masukkan Email">
					</div>
					<!-- <input type="password" hidden name="password" value="12345678" id=""> -->
                    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
					</div>
					</form>
                    </div>
                </div> 
            </div>
				</div>
				</div>
			</div>
				</div>
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

<!-- <script>
/****************************************
	*       Basic Table                   *
	****************************************/
$("#zero_config").DataTable();
</script> -->

<?= $this->endSection() ?>