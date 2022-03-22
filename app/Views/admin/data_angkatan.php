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
    <?php if($validasi->hasError('tahun_angkatan')) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
		$validasi->getError('tahun_angkatan') .
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
				<button type="button" class="btn btn-success ml-auto text-white" data-toggle="modal" data-target="#tambah-tahun-angkatan"><i class="mdi mdi-plus"></i> Tambah Tahun Angkatan</button>
				</div>

			<div class="modal fade" id="tambah-tahun-angkatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Angkatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="/admin/input_tahun_angkatan" method="POST">
					<div class="form-group">
						<label for="username">Tahun Angkatan</label>
						<input type="text" name="tahun_angkatan" class="form-control" id="tahun_angkatan" placeholder="Masukkan Tahun Angkatan">
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
							<th>No</th>
							<th>Tahun Angkatan</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
                        <?php $i=1;
                        foreach ($angkatan as $ang) : ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $ang->tahun_angkatan ?></td>
							<td>
								<button type="button" class="btn btn-primary" id="btn-edit-tahun-angkatan" 
									data-toggle="modal" 
									data-target="#edit-tahunAngkatan"
									data-id_angkatan="<?= $ang->id_angkatan ?>"
									data-tahun_angkatan="<?= $ang->tahun_angkatan ?>"
									>Edit</button>
								<a type="button" href="/admin/deleteAngkatan/<?= $ang->id_angkatan ?>" onClick="return confirm('Apakah yakin ingin menghapus ini?')" class="btn btn-danger text-white">Hapus</a>
							</td>
						</tr>
                        <?php endforeach ?> 
						</tbody>
					</table>


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