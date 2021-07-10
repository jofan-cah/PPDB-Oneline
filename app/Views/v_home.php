<?= $this->extend('template/template_frontEnd') ?>

<?= $this->section('content') ?>
<!-- START ACCORDION & CAROUSEL-->


<div class="row">
    <div class="col-sm-8">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $no_a = 1;
                foreach ($banner as $key => $value) {
                    $a = $no_a++  ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $a++; ?>" class="<?= ($a == 1) ? 'active' : '' ?>"></li>
                <?php } ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $no_b = 1;
                foreach ($banner as $key => $value) {
                    echo $b = $no_b++ ?>
                    <div class="carousel-item <?= ($b == 1) ? 'active' : '' ?>  ">
                        <img class="d-block w-100" height="420px" src="<?= BASE_URL('img/Banner') . '/' . $value['banner'] ?> " alt="<?= $b++; ?>">
                    </div>
                <?php } ?>


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-sm-4">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Estimasi Pendaftaran </b></h3>
            </div>
            <div class="card-body">
                <div class="col-sm-12 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-graduation-cap"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Pendaftaran</span>
                            <span class="info-box-number"><?= $jml_pendaftaran; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-sm-12 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-male"></i></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Laki Laki</span>
                            <span class="info-box-number"><?= $jml_lakilaki; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-sm-12 col-sm-12 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-female"></i></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumplah Perempuan</span>
                            <span class="info-box-number"><?= $jml_perempuan; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-sm-12 col-sm-12 col-12">
                    <a href="<?= base_url('pendaftaran'); ?>" class="btn btn-info btn-flat btn-block"><i class="fas fa-file-alt"></i> Daftar </a>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Beranda</b></h3>


                <!-- /.card-tools -->
            </div>
            <div class="card-body">
                <?= $beranda['beranda'] ?>
            </div>
        </div>
    </div>
    <!-- END ACCORDION & CAROUSEL-->
</div>
<?= $this->endSection() ?>