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
		<div class="card">
			<div class="card-body">
				<a href="/admin/event" class="btn btn-danger mb-3 text-white"><span class="mdi mdi-undo"></span> Kembali</a>
				<h4 class="card-title mb-3"><?= $judul ?></h4>
				<div class="table-responsive">
					<table id="zero_config" class="table table-striped table-bordered">
						<thead>
						<tr>
                            <th>No</th>
							<th>Nama Peserta</th>
							<th>NIM</th>
                            <th>No Ponsel</th>
                            <th>Email</th>
                            <th>Bukti Pembayaran</th>
                            <th>Aksi</th>
						</tr>
						</thead>
						<tbody>
                        <?php 
                        $i = 1;
                        foreach ($peserta as $p ) : ?>
						<tr>
                            <td class="align-middle"><?= $i++ ?></td>
                            <td class="align-middle"><?= $p->nama ?></td>
                            <td class="align-middle"><?= $p->nim ?></td>
                            <td class="align-middle"><?= $p->no_ponsel ?></td>
                            <td class="align-middle"><?= $p->email ?></td>
							<td class="align-middle">
								<a href="" id="tampilBP"
								data-toggle="modal" 
                        		data-target="#imagemodal"
                        		data-buktipembayaran="<?= $p->bukti_pembayaran ?>">
									<img class="card-img-top" height="100" src="/image/<?= $p->bukti_pembayaran ?>">
								</a>
							</td>
							<td class="align-middle">
								<a href="/admin/konfirmasi_peserta/<?= $p->id_peserta ?>" type="button" class="btn <?= $p->status_konfirmasi == 0 ? 'btn-success' : 'btn-danger' ?> text-white"><?= $p->status_konfirmasi == 0 ? 'Konfirmasi' : 'Batalkan konfirmasi' ?></a>
							</td>
                        </tr>
                        <?php endforeach ; ?>                        
						</tbody>
					</table>
				</div>
			</div>
		</div>
			<!-- <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Image preview</h4>
					</div>
					<div class="modal-body">
						<img src="" id="imagepreview" style="width: 400px; height: 264px;" >
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div> -->

			<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Bukti Pembayaran</h2>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div> 
					<div class="modal-body mx-auto">
						<img src="" width="400" height="400" id="previewBP" alt="">
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