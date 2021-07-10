<?= $this->extend('template/template_backEnd') ?>

<?= $this->section('content') ?>



<div class="col-lg-4 col-3">
    <!-- small box -->
    <div class="small-box bg-gradient-orange">
        <div class="inner">
            <h3><?= $total_jurusan; ?></h3>

            <p>Jurusan</p>
        </div>
        <div class="icon">
            <i class="fas fa-people-arrows"></i>
        </div>
        <a href="<?= base_url('jurusan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-gradient-blue">
        <div class="inner">
            <h3><?= $total_pekerjaan; ?></h3>

            <p>Pekerjaan</p>
        </div>
        <div class="icon">
            <i class="fas fa-file"></i>
        </div>
        <a href="<?= base_url('pekerjaan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-gradient-success">
        <div class="inner">
            <h3><?= $total_pendidikan; ?></h3>

            <p>Pendidikan </p>
        </div>
        <div class="icon">
            <i class="fas fa-school"></i>
        </div>
        <a href="<?= base_url('pendidikan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-gradient-orange">
        <div class="inner">
            <h3><?= $total_penghasilan; ?></h3>

            <p>Penghasilan</p>
        </div>
        <div class="icon">
            <i class="fas fa-wallet"></i>
        </div>
        <a href="<?= base_url('penghasilan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-3">
    <!-- small box -->
    <div class="small-box bg-gradient-blue">
        <div class="inner">
            <h3><?= $total_agama; ?></h3>

            <p>Agama</p>
        </div>
        <div class="icon">
            <i class="fas fa-pray"></i>
        </div>
        <a href=" <?= base_url('agama') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-gradient-success">
        <div class="inner">
            <h3><?= $total_user; ?></h3>

            <p>User </p>
        </div>
        <div class="icon">
            <i class="fas fa-user"></i>
        </div>
        <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>



<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-gradient-orange">
        <div class="inner">
            <h3><?= $total_pendaftaranMasuk; ?></h3>

            <p>Pendaftaran Masuk</p>
        </div>
        <div class="icon">
            <i class="fas fas fa-download"></i>
        </div>
        <a href="<?= base_url('Ppdb/Masuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-gradient-blue">
        <div class="inner">
            <h3><?= $total_pendaftaranDiterima; ?></h3>

            <p>Pendaftaran Diterima</p>
        </div>
        <div class="icon">
            <i class="  fas fa-check-circle"></i>
        </div>
        <a href="<?= base_url('/ppdb/listDiterima') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-gradient-success">
        <div class="inner">
            <h3><?= $total_pendaftaranDitolak; ?></h3>

            <p>Pendaftaran Ditolak</p>
        </div>
        <div class="icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <a href="<?= base_url('/ppdb/listDitolak') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>



<?= $this->endsection() ?>