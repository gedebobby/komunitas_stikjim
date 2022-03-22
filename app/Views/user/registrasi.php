<?= $this->extend('/user/layout/template') ?>
<?= $this->section('konten') ?>

<div class="container form-regis">
    <h2 class="text-center mb-4">REGISTRASI EVENT</h2>
    <div class="card border pt-2 col-6 mx-auto">
    <?php 
    if($validasi->hasError('bukti_pembayaran')) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
        $validasi->getError('bukti_pembayaran') .
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
    ?>
        <form class="form-horizontal" action="/user/inputPeserta" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <!-- <h4 class="card-title">Personal Info</h4> -->
            <div class="form-group">
                <input type="hidden" name="id_user" value="<?= session()->get('id_user') ?>"/>
                <input type="hidden" name="id_event" value="<?= $id_event ?>"/>
                <!-- --- -->
                <label for="nama" class="text-end control-label col-form-label">Nama</label>
                <input type="text" class="form-control" id="nama" value="<?= session()->get('nama') ?>" disabled/>
                <!-- --- -->
                <label for="nim" class="text-end control-label col-form-label">NIM</label>
                <input type="text" class="form-control" id="nim" value="<?= session()->get('nim') ?>" disabled/>
                <!-- --- -->
                <label for="email" class="text-end control-label col-form-label">Email</label>
                <input type="email" class="form-control" id="email" value="<?= session()->get('email') ?>" disabled/>
                <!-- --- -->
                <label for="notelp" class="text-end control-label col-form-label">No Telepon</label>
                <input type="text" class="form-control" id="notelp" value="<?= session()->get('no_ponsel') ?>" disabled/>
                <!-- --- -->
                <label class="text-end control-label col-form-label" for="bukti-pembayaran">Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_pembayaran" id="bukti-pembayaran">
                <small class="text-danger">Masukkan foto bukti pembayaran/lewati jika event gratis</small> 
                
            </div>            
            <div class="float-right mb-4">
                <button type="submit" class="btn btn-lg btn-primary">
                    Daftar
                </button>
            </div>
            </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>