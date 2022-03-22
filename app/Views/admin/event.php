

<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
        <?php echo session()->getFlashdata('msg'); ?> 
        <?php if($validasi->hasError('nama_event')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('nama_event') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } elseif ($validasi->hasError('tgl_event')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'. 
          $validasi->getError('tgl_event') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } elseif ($validasi->hasError('id_komunitas')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('id_komunitas') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } elseif ($validasi->hasError('waktu_event')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('waktu_event') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } elseif ($validasi->hasError('kategori_event')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('kategori_event') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } elseif ($validasi->hasError('gambar')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('gambar') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } elseif ($validasi->hasError('lokasi_event')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('lokasi_event') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } elseif ($validasi->hasError('deskripsi_event')) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
          $validasi->getError('deskripsi_event') .
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
        } 
        ?>
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <!-- <div class="row"> -->
          <div class="card">
          <div class="card-body">
          <div class="d-flex mb-3">
          <h4 class="card-title"><?= $judul ?></h4>
            <button type="button" class="btn btn-success btn-lg text-white ml-auto" data-toggle="modal" data-target="#voting-modal"><i class="mdi mdi-plus"></i> Tambah Event</button>
            </div>

            <div class="modal fade" id="voting-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="/admin/input_event" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama_event">Nama Event</label>
                      <input type="text" name="nama_event" class="form-control" id="nama_event" placeholder="Masukkan Nama Event">
                    </div>
                    <div class="form-group">
                      <label for="penyelenggara">Penyelenggara</label>
                      <select class="select2 form-select shadow-none" name="id_komunitas" id="penyelenggara">
                      <option class="font-weight-bold">Pilih Penyelenggara</option> 
                      <?php foreach ($komunitas as $e ) {
                        echo "<option value='" . $e->id_komunitas ."'>" . $e->nama_komunitas . "</option>";
                      } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tgl_event">Tanggal</label>
                      <input type="date" name="tgl_event" class="form-control" id="tgl_event" placeholder="Masukkan Tanggal Event">
                    </div>
                    <div class="form-group">
                      <label for="waktu_event">Jam</label>
                      <input type="time" name="waktu_event" class="form-control" id="waktu_event" placeholder="Masukkan Nama Event">
                    </div>
                    <div class="form-group">
                      <label for="kategori_event">Kategori</label>
                      <select class="select2 form-select shadow-none" name="kategori_event" id="kategori_event">
                      <option class="font-weight-bold">Pilih Kategori</option> 
                      <option value="Lomba">Lomba</option>
                      <option value="Seminar">Seminar</option>
                      <option value="Kegiatan Sosial">Kegiatan Sosial</option>
                      <option value="Family Gathering">Family Gathering</option>
                      </select>
                    </div>
                    <input type="hidden" name="status_event" value="1">
                    <div class="form-group">
                      <label for="kuota_peserta">Lokasi</label>
                      <input type="number" name="kuota_peserta" class="form-control" id="kuota_peserta" placeholder="Masukkan Kuota Peserta">
                    </div>
                    <div class="form-group">
                      <label for="gambar">Gambar</label><br>
                      <input type="file" name="gambar" id="gambar"><br>
                      <small class="text-danger">jpg/jpeg/png</small>
                    </div>
                    <div class="form-group">
                      <label for="lokasi_event">Lokasi</label>
                      <input type="text" name="lokasi_event" class="form-control" id="lokasi_event" placeholder="Masukkan Lokasi Event">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea class="form-control" name="deskripsi_event" id="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                    </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            

            <!-- Akhir Voting -->

            <div class="table-responsive">
					<table id="zero_config" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>Gambar</th>
							<th>Nama Event</th>
							<th>Tgl Event</th>
							<th>Jam</th>
							<th>Kategori</th>
							<th>Kuota Peserta</th>
							<th>Deskripsi</th>
              <th>Penyelenggara</th>
							<th>Lokasi</th>
							<th>Aksi</th>
						</tr>
						</thead> 
						<tbody>
            <?php foreach ($event as $key ) : ?>
						<tr>
							<td><img class="card-img-top" height="100" src="/image/<?= $key->gambar ?>" alt="Card image cap"></td>
							<td class="align-middle"><?= $key->nama_event ?></td>
							<td class="align-middle"><?= $key->tgl_event ?></td>
							<td class="align-middle"><?= $key->waktu_event ?></td>
							<td class="align-middle"><?= $key->kategori_event ?></td>
							<td class="align-middle"><?= $key->kuota_peserta ?></td>
							<td class="align-middle"><?= $key->deskripsi ?></td>
							<td class="align-middle"><?= $key->nama_komunitas ?></td>
							<td class="align-middle"><?= $key->lokasi_event ?></td>
							<td class="align-middle">
              <button type="button" class="btn btn-primary" id="btn-edit-event" 
									data-toggle="modal" 
									data-target="#edit-event"
									data-id_event="<?= $key->id_event ?>" 
									data-nama_event="<?= $key->nama_event ?>" 
									data-tgl_event="<?= $key->tgl_event ?>" 
									data-waktu_event="<?= $key->waktu_event ?>" 
									data-kategori_event="<?= $key->kategori_event ?>" 
									data-deskripsi="<?= $key->deskripsi ?>" 
									data-gambar="<?= $key->gambar ?>" 
									data-id_komunitas="<?= $key->id_komunitas ?>" 
									data-lokasi_event="<?= $key->lokasi_event ?>" 
									>Edit</button>
								<a href="/admin/delete_event/<?= $key->id_event ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus ini?')" class="btn btn-danger text-white">Hapus</a>
                <a href="/admin/listpeserta/<?= $key->id_event ?>" type="button" class="btn btn-success text-white">Lihat Peserta</a>
							</td>
						</tr>
            <?php endforeach; ?>
						</tbody>
					</table>
				</div>
        </div>
        </div>

        <div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="/admin/edit_event" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_event" id="id-event">
                    <div class="form-group">
                      <label for="nama-event">Nama Event</label>
                      <input type="text" name="nama_event" class="form-control" id="nama-event" placeholder="Masukkan Nama Event">
                    </div>
                    <div class="form-group">
                      <label for="edit-penyelenggara">Penyelenggara</label>
                      <select class="select2 form-select shadow-none" name="id_komunitas" id="edit-komunitas">
                      <option class="font-weight-bold">Pilih Penyelenggara</option> 
                      <?php foreach ($komunitas as $e ) {
                        echo "<option value='" . $e->id_komunitas ."'>" . $e->nama_komunitas . "</option>";
                      } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tgl-event">Tanggal</label>
                      <input type="date" name="tgl_event" class="form-control" id="tgl-event" placeholder="Masukkan Tanggal Event">
                    </div>
                    <div class="form-group">
                      <label for="waktu-event">Jam</label>
                      <input type="time" name="waktu_event" class="form-control" id="waktu-event" placeholder="Masukkan Nama Event">
                    </div>
                    <div class="form-group">
                      <label for="kategori_event">Kategori</label>
                      <select class="select2 form-select shadow-none" name="kategori_event" id="kategori-event">
                      <option class="font-weight-bold">Pilih Kategori</option> 
                      <option value="Lomba">Lomba</option>
                      <option value="Seminar">Seminar</option>
                      <option value="Kegiatan Sosial">Kegiatan Sosial</option>
                      <option value="Family Gathering">Family Gathering</option>
                      </select>
                    </div>
                    <input type="hidden" name="gambarlama" id="editgambarlama">
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="gambar" name="gambar" id="edit-gambar">
                        <label class="custom-file-label" for="edit-gambar" id="edit-gambar-tampil"></label>
                        <small class="text-danger">jpg/jpeg</small>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lokasi-event">Lokasi</label>
                      <input type="text" name="lokasi_event" class="form-control" id="lokasi-event" placeholder="Masukkan Lokasi Event">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea class="form-control" name="deskripsi_event" id="deskripsi-event" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                    </div>
                    </form>
                    </div>
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



