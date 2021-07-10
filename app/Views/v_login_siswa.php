<?= $this->extend('template/template_frontEnd') ?>
<?= $this->section('content') ?>
<div class="row">

</div>

<div class="row">
    <div class="col-sm-5">
        <div class="text-center">
            <img class="img-fluid pad" width="300px" src="<?= base_url() ?>/img/logo/log1.jpg" alt="">
        </div>
    </div>
    <div class="col-sm-7">
        <?= form_open_multipart('Auth/cek_loginSiswa') ?>
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= esc($subtitle) ?> </h3>
            </div>
            <div class="col-sm-12">
                <?php $pesan =  session()->getFlashdata('pesan');
                if ($pesan) : ?>
                    <?= '<div class="alert alert-success alert-dismissible">' ?>
                    <?= session()->getFlashdata('pesan'); ?>
                    <?= '</div>'  ?>
                <?php endif; ?>
                <?php $errors = session()->getFlashdata('errors'); ?>
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key) : ?>
                                <li><?= esc($key) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif;  ?>
            </div>
            <div class="card-body">
                <div class="col-sm-12 col-sm-12 col-12">
                    <div class="form-group">
                        <p class="text-danger"> *| Lakukan Pendaftaran Sebelum Login</p>
                        <p class="text-danger"> *| Gunakan NISN Sebagai Password</p>
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input name="nisn" type="text" id="validationServer03" placeholder="Masukan NISN" autofocus class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''  ?>" type="text">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nisn')  ?>
                        </div>
                        <p class="text-danger"> </p>
                    </div>
                </div>
                <div class="col-sm-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" id="validationServer03" placeholder="Masukan Password" autofocus class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''  ?>" type="text">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password')  ?>
                        </div>
                        <p class="text-danger"> </p>
                    </div>
                </div>

                <div class="col-sm-12 col-sm-12 col-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info btn-flat btn-block"> Masuk </button>
                            </div>
                            <div class="col-sm-6">
                                <a href="<?= base_url('pendaftaran'); ?>" class="btn btn-info btn-flat btn-block"> Daftar </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= form_close() ?>
<?= $this->endsection(); ?>