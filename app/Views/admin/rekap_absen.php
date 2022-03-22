

<?= $this->extend('/admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="page-wrapper">

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
        <?php  echo session()->getFlashdata('msg'); ?>
        
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <!-- <div class="row"> -->
          <div class="card">
          <div class="card-body">
          <form action="/admin/rekap_absen" method="POST">
          <button type="submit" class="btn btn-lg btn-success text-white float-right"><i class="mdi mdi-magnify"></i> Cari Absen</button>
          <div class="d-flex">
            </div>
            
            <div class="row mb-4 mb-5">
                <div class="col-4">
                <a href="/admin/absensi" class="btn btn-danger mb-3 text-white"><span class="mdi mdi-undo"></span> Kembali</a>
                <h4>Pilih Tanggal Pertemuan</h4>
                <input type="date" class="form-control" name="tgl_pertemuan">
                </div>
            </div>

            <div class="table-responsive">
            <h5>Rekap Tanggal <?= $tgl ?></h5>
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>NIM</th>
                    <th>Kehadiran</th>
                    <th>Aksi</th>
                </tr>
                </thead> 
                <tbody>
                <?php $i =1;
                foreach ($rekap as $rkp ) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $rkp->nama ?></td>
                        <td><?= $rkp->nim ?></td>
                        <td>
                        <?php if ($rkp->keterangan == 1) {
                            echo 'Hadir';
                        } else {
                            echo 'Tidak Hadir';
                        }?>
                        </td>
                        <td>
                        <button type="button" class="btn btn-primary" id="btn-edit-absen" 
                            data-toggle="modal" 
                            data-target="#edit-rekapAbsen"
                            data-id_absen="<?= $rkp->id_absen ?>"
                            data-nama_anggota="<?= $rkp->nama ?>"
                            data-nim_anggota="<?= $rkp->nim ?>"
                            data-keterangan="<?= $rkp->keterangan ?>"
                            >Edit
                        </button>
                        </td>
                    </tr>
                <?php endforeach ?>          
                </tbody>
            </table>
          </form>
				</div>
        </div>
        </div>

        <div class="modal fade" id="edit-rekapAbsen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Absensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                    </button>
                </div>
                <div class="modal-body">
                <form action="/admin/edit_absen" method="POST">
                <input type="hidden" name="id_absen" id="edit-id-absen">
                <div class="form-group">
                    <label for="username-edit">Nama</label>
                    <input type="text" name="tahun_angkatan" disabled class="form-control" id="nama-absen-edit">
                </div>
                <div class="form-group">
                    <label for="username-edit">NIM</label>
                    <input type="text" name="tahun_angkatan" disabled class="form-control" id="nim-absen-edit">
                </div>
                <div class="form-group">
                      <label for="edit-penyelenggara">Keterangan</label>
                      <select class="select2 form-select shadow-none" name="keterangan" id="keterangan-absen-edit">
                      <!-- <option class="font-weight-bold">Pilih Angkatan</option> -->
                      <option value="1">Hadir</option>
                      <option value="0">Tidak Hadir</option>
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



