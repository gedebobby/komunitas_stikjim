    <?= $this->extend('/user/layout/template') ?>

    <?= $this->section('konten') ?>
    <section class="home" id="home">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">SELAMAT DATANG,<br><?= session()->get('nama') ?></h1>
            <p class="lead text-center">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
    </section>

    <section class="event" id="event">
    <div class="event-page">
        <div class="container">
        <div class="judul text-center mb-5">
            <i class="mdi mdi-calendar-multiple calendar"></i>
            <h1>EVENT</h1>
        </div>

        <div class="row">
            <?php foreach ($event as $e ) : ?>
            <div class="col-lg d-flex justify-content-center">
            <div class="card rounded shadow" style="width: 18rem;">
                <img class="card-img-top" height="200" src="/image/<?= $e->gambar ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><?= $e->nama_event ?></h5>
                    <span class="badge rounded-pill bg-info"><?= $e->kategori_event ?></span>
                    
                    <?php 
                    if ($jml_peserta->getJumlahPeserta($e->id_event)->getNumRows() < $e->kuota_peserta) {
                        echo '<span class="badge rounded-pill bg-success">Kuota Tersedia</span>';
                    } else {
                        echo '<span class="badge rounded-pill bg-danger">Kuota Penuh</span>';
                    }
                    ?>
                    
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="" class="btn btn-info" id="detail" 
                        data-toggle="modal" 
                        data-target="#detail-event"
                        data-namaevent="<?= $e->nama_event ?>"
                        data-idevent="<?= $e->id_event ?>"
                        data-penyelenggara="<?= $e->nama_komunitas ?>"
                        data-tanggal="<?= date('d F Y',strtotime($e->tgl_event)) ?>"
                        data-waktu="<?= date('H.i', strtotime($e->waktu_event))  ?>"
                        data-gambar="<?= $e->gambar ?>"
                        data-lokasi="<?= $e->lokasi_event ?>"
                        data-status="<?= $e->status_event ?>"
                        data-kuota="<?= $e->kuota_peserta ?>"
                        data-kategori="<?= $e->kategori_event ?>"
                        data-jmlpeserta="<?= $jml_peserta->getJumlahPeserta($e->id_event)->getNumRows() ?>"
                        data-deskripsi="<?= $e->deskripsi ?>"
                        >Detail Event</a> 
                </div>
                </div>
            </div>
            <?php endforeach; ?>
            
            </div>
        </div>
    </div>
    </div>
    </section>

    <div class="modal fade" id="detail-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mw-100 w-75" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="namaevent"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="" width="500" height="700" id="gambar-event" alt="">
                    </div>
                    <div class="col-md-6">
                        <h4>Diselenggarakan Oleh</h4>
                        <h6 id="penyelenggara"></h6>
                        <!-- ----------------------- -->
                        <h4 class="mt-3">Tanggal & Waktu</h4>
                        <p><i class="mdi mdi-calendar-check"></i> <span id="tanggal"></span></p>
                        <p><i class="mdi mdi-clock"></i> <span id="waktu"></span> WITA</p>
                        <!-- ----------------------- -->
                        <h4>Lokasi</h4>
                        <p><i class="mdi mdi-map-marker"></i> <span id="lokasi"></span></p>
                        <!-- ----------------------- -->
                        <h4 class="mb-3">Kategori <span class="badge rounded-pill bg-info" id="kategori"></span></h4>
                        <!-- ----------------------- -->
                        
                        <h4 class="mb-3">Status <span class="badge rounded-pill" id="status">Selesai</span></h4>                        
                        <!-- ----------------------- -->
                        <h4>Kuota <span class="badge rounded-pill" id="kuota"></span></h4>
                        <!-- ----------------------- -->
                        <h4>Deskripsi</h4>
                        <p id="deskripsi"></p>
                        <a href="" type="button" id="btn-join" class="btn btn-success text-white disabled">Gabung Event</a>
                    </div>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>



    <!-- ------------------------------------------------------------------- -->
    <section class="kegiatan" id="kegiatan">
    <div class="page-kegiatan">
        <div class="container">
            <div class="judul-kegiatan text-center">
                <h1>INFO KEGIATAN</h1>
            </div>

            <div class="page-content text-center">
            <?php foreach ($kegiatan as $kgt ) : ?>
                <h1>PENGUMUMAN :</h1>
                <h2>Jadwal Pertemuan : Setiap <?= $kgt->hari_kegiatan ?></h2>
                    
            <?php $time = strtotime($kgt->waktu_kegiatan)
            ?>  
                <h2>Jam : <?= date('H.i', $time)  ?></h2>
                <h2>Lokasi : <?= $kgt->lokasi_kegiatan ?></h2>
                <h2 class="text-bold mt-5">"<?= $kgt->pengumuman ?>"</h2>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    </section>

    <div class="modal fade" id="infoKegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">INFORMASI KEGIATAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Tanggal & Waktu Kegiatan</h4>
                <p><i class="mdi mdi-calendar-check"></i> Setiap Kamis</p>
                <p><i class="mdi mdi-clock"></i> 16.00 WITA</p>
                <!-- ----------------------- -->
                <h4>Lokasi</h4>
                <p><i class="mdi mdi-map-marker"></i> Mumbul Futsal</p>                
                <!-- ----------------------- -->
                <h4>Pengumuman</h4>
                <p>Untuk hari kamis tanggal 15 November 2021, pertemuan kegiatan ditiadakan</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

 <?= $this->endSection() ?>