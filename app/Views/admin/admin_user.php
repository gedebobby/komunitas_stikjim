<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- <div class="page-breadcrumb">
		<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">Judul</h4>
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
	</div> -->
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">

	<?php  echo session()->getFlashdata('msg'); ?>
	<?php if($validasi->hasError('username')) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
		$validasi->getError('username') .
		'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	} elseif ($validasi->hasError('role')) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
		$validasi->getError('role') .
		'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	}; ?> 

		<!-- <div class="row"> -->
				<!-- <div class="col-12"> -->
				<div class="card">
				<div class="card-body">
				<div class="d-flex mb-3">
				<h4 class="card-title"><?= $judul ?></h4>
				<button type="button" class="btn btn-success ml-auto text-white" data-toggle="modal" data-target="#tambah-admin"><i class="mdi mdi-plus"></i> Tambah Admin</button>
				</div>

			<div class="modal fade" id="tambah-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="/admin/input_admin" method="POST">
					<div class="form-group">
						<label for="username">Username/NIM</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username/NIM">
					</div>
                    <input type="hidden" name="password" value="12345678">
					<div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" id="role">
                        <option class="font-weight-bold" value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="koordinator">Koordinator</option>
                        </select>
                    </div>
					<div class="form-group">
                      <label for="penyelenggara">Pilih Komunitas</label>
                      <select class="select2 form-select shadow-none" name="id_komunitas" id="komunitas">
                      <option class="font-weight-bold">Pilih Komunitas</option> 
                      <?php foreach ($komunitas as $e ) {
                        echo "<option value='" . $e->id_komunitas ."'>" . $e->nama_komunitas . "</option>";
                      } ?>
                      </select>
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

				<div class="table-responsive">
					<table id="zero_config" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>Username/NIM</th>
							<th>Role</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
                        <?php foreach ($admin as $adm) : ?>
						<tr>
							<td><?= $adm->username ?></td>
							<td><span class="badge rounded-pill bg-success text-capitalize"><?= $adm->role ?></span></td>
							<td>
								<button type="button" class="btn btn-primary" id="btn-edit-admin" 
									data-toggle="modal" 
									data-target="#edit-admin"
									data-id_admin="<?= $adm->id_admin ?>"
									data-username="<?= $adm->username ?>"
									data-role="<?= $adm->role ?>"
									>Edit</button>
								<a type="button" href="/admin/deleteAdmin/<?= $adm->id_admin ?>" onClick="return confirm('Apakah yakin ingin menghapus ini?')" class="btn btn-danger text-white">Hapus</a>
							</td>
						</tr>
                        <?php endforeach ?> 
						</tbody>
					</table>


				<div class="modal fade" id="edit-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="/admin/editAdmin" method="POST">
					<input type="hidden" name="id_admin" id="id_admin">
					<div class="form-group">
						<label for="username-edit">Username/NIM</label>
						<input type="text" name="username" class="form-control" id="username-edit" placeholder="Masukkan Username/NIM">
					</div>
                    <!-- <input type="hidden" name="password" value="12345678"> -->
					<div class="form-group">
                        <label for="role-edit">Role</label>
                        <select name="role" class="form-control" id="role-edit">
                        <option class="font-weight-bold">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="koordinator">Koordinator</option>
                        </select>
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