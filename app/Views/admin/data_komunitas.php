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

	<?php echo session()->getFlashdata('msg'); ?>
		<!-- <div class="row"> -->
				<!-- <div class="col-12"> -->
				<div class="card">
				<div class="card-body">
				<div class="d-flex mb-3">
				<h4 class="card-title"><?= $judul ?></h4>
				<button type="button" class="btn btn-success ml-auto text-white" data-toggle="modal" data-target="#tambah-anggota"><i class="mdi mdi-plus"></i> Tambah Komunitas</button>
				</div>

			<div class="modal fade" id="tambah-anggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Komunitas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="/admin/input_komunitas" method="POST">
					<div class="form-group">
						<label for="nama-komunitas">Nama Komunitas</label>
						<input type="text" name="nama_komunitas" required class="form-control" id="nama-komunitas" placeholder="Masukkan Nama Komunitas">
					</div>
					<div class="form-group">
						<label for="nama-koordinator">Nama Koordinator</label>
						<input type="text" name="nama_koordinator" required class="form-control" id="nama-koordinator" placeholder="Masukkan Nama Koordinator">
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
							<th>Nama Komunitas</th>
							<th>Nama Koordinator</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php 
						$i=1;
						foreach ($komunitas as $k ) : ?>
						<tr>
							<td><?= $k->nama_komunitas ?></td>
							<td><?= $k->nama_koordinator ?></td>
							<td>
							<button type="button" class="btn btn-primary" id="btn-edit-komunitas" 
									data-toggle="modal" 
									data-target="#edit-komunitas"
									data-id_komunitas="<?= $k->id_komunitas ?>"
									data-komunitas="<?= $k->nama_komunitas ?>"
									data-koordinator="<?= $k->nama_koordinator ?>"
									>Edit</button>
								<a type="button" href="/admin/deleteKomunitas/<?= $k->id_komunitas ?>" onClick="return confirm('Apakah anda yakin ingin menghapus ini?')" class="btn btn-danger text-white">Hapus</a>
							</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>

				<div class="modal fade" id="edit-komunitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Komunitas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="/admin/edit_komunitas" method="POST">
					<input type="hidden" name="id_komunitas" id="edit-id-komunitas">
					<div class="form-group">
						<label for="edit-komunitas">Nama Komunitas</label>
						<input type="text" name="nama_komunitas" required class="form-control" id="edit-komunitass" placeholder="Masukkan Nama Komunitas">
					</div>
					<div class="form-group">
						<label for="edit-koordinator">Nama Koordinator</label>
						<input type="text" name="nama_koordinator" required class="form-control" id="edit-koordinator" placeholder="Masukkan Nama Koordinator">
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