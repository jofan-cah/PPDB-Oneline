<?= $this->extend('template/template_frontEnd') ?>
<?= $this->section('content') ?>
<div class="row">

</div>
<?php if (!isset($ta['status']) != 1) { ?>
    <div class="row">
        <div class="col-sm-5">
            <img class="img-fluid pad" width="420px" src="<?= base_url() ?>/img/logo/pendaftaran.png" alt="">
        </div>
        <div class="col-sm-7">
            <?= form_open_multipart('pendaftaran/simpanPendaftaran');

            ?>
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pendaftaran </h3>

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
                    <!-- //<?= $validation->listErrors(); ?> -->
                    <div class="row">
                        <div class="col-sm-6  ">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input name="nisn" id="validationServer03" placeholder="Masukan NISN" autofocus class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''  ?>" type="text">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nisn')  ?>
                                </div>
                                <p class="text-danger"> </p>
                            </div>
                        </div>
                        <div class="col-sm-6  ">
                            <div class="form-group">
                                <label for="id_jalur_masuk">Jalur</label>
                                <select name="id_jalur_masuk" class="form-control <?= ($validation->hasError('id_jalur_masuk')) ? 'is-invalid' : ''  ?>" id="">
                                    <option value=""> Pilih jalur Masuk</option>
                                    <?php foreach ($jalur as $key => $value) { ?>
                                        <option value="<?= $value['id_jalur_masuk']; ?>">
                                            <?= $value['jalur_masuk']; ?> </option>
                                    <?php } ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('id_jalur_masuk')  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama lengkap</label>
                                <input name="nama_lengkap" id="validationServer03" placeholder="Masukan NISN" autofocus class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''  ?>" type="text">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_lengkap')  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="nama_panggilan">Nama Panggilan</label>
                                <input name="nama_panggilan" id="validationServer03" placeholder="Masukan Nama Panggilan" autofocus class="form-control <?= ($validation->hasError('nama_panggilan')) ? 'is-invalid' : ''  ?>" type="text">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_panggilan')  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : ''  ?>" id="">
                                    <option value=""> Jenis Kelamin </option>
                                    <option value="L"> Laki Laki </option>
                                    <option value="P"> Perempuan </option>

                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('jk')  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="jalur">Tempat Lahir</label>
                                <input name="tempat_lahir" id="validationServer03" placeholder="Masukan Tempat Lahir" autofocus class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''  ?>" type="text">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tempat_lahir')  ?>
                                </div>
                            </div>
                        </div>

                        <div class=" col-sm-4 col-4">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <select name="tanggal" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''  ?>" id="">
                                    <option value=""> Tanggal </option>
                                    <?php $now = date('d'); ?>
                                    <?php for ($i = 1; $i <= 31; $i++) : ?>
                                        <option value="<?= $i; ?>"> <?= $i; ?> </option>
                                    <?php endfor; ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tanggal')  ?>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-4 col-4">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" class="form-control  <?= ($validation->hasError('bulan')) ? 'is-invalid' : ''  ?>" id="">
                                    <option value=""> Bulan </option>
                                    <?php $now = date('m'); ?>
                                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                                        <option value="<?= $i; ?>"> <?= $i; ?> </option>
                                    <?php endfor; ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('bulan')  ?>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-4 col-4">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select name="tahun" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''  ?>" id="">
                                    <option value=""> Tahun </option>
                                    <?php $now = date('Y'); ?>
                                    <?php for ($i = 1990; $i <= $now; $i++) : ?>
                                        <option value="<?= $i; ?>"> <?= $i; ?> </option>
                                    <?php endfor; ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('bulan')  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="id_jurusan">Jurusan</label>
                                <select name="id_jurusan" class="form-control <?= ($validation->hasError('id_jurusan')) ? 'is-invalid' : ''  ?>">
                                    <option value=""> Pilih jurusan</option>
                                    <?php foreach ($jurusan as $key => $value) { ?>
                                        <option value="<?= $value['id_jurusan']; ?>">
                                            <?= $value['jurusan']; ?> </option>
                                    <?php } ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('id_jurusan')  ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-sm-12 col-12">
                            <button type="submit" class="btn btn-info btn-flat btn-block"><i class="fas fa-save"></i> Submit </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } else { ?>
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Pemberitahu'an!</h5>
            Maaf, pendaftaran Sudah di tutup !!!!
        </div>
    </div>
<?php }; ?>
<?= form_close() ?>
<?= $this->endsection(); ?>