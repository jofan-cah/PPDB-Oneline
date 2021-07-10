<?= $this->extend('template/template_backEnd') ?>
<?= $this->section('content'); ?>

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


<div class="col-sm-4 text-center">
    <?= form_open_multipart('admin/ubah')  ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Logo </h3>
        </div>
        <div class="card-body">
            <img id="gambar_load" src="<?= base_url('img/logo/') . '/' . $setting['logo'] ?>" width="250px" height="250px" class="img-fluid pad" alt="">
        </div>
        <div class="form-group">
            <label for="logo"> Ganti Logo</label>
            <Input id="preview_gambar" name="logo" type="file" class="form-control p-1" accept="image/*"></Input>
        </div>
    </div>
</div>

<div class="col-sm-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <label class="card-title">Data Sekolah</label>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="nama_sekolah"> Nama Sekolah</label>
                        <Input name="nama_sekolah" class="form-control" type="text" value="<?= $setting['nama_sekolah'] ?>"></Input>
                    </div>
                    <div class="form-group">
                        <label for="email"> Email Sekolah</label>
                        <Input name="email" class="form-control" type="text" value="<?= $setting['email'] ?>"></Input>
                    </div>
                    <div class="form-group">
                        <label for="web"> Web </label>
                        <Input name="web" class="form-control" type="text" value="<?= $setting['web'] ?>"></Input>
                    </div>
                    <div class="form-group">
                        <label for="no_telpon"> No Telphone </label>
                        <Input name="no_telpon" class="form-control" type="text" value="<?= $setting['no_telpon'] ?>"></Input>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="alamat"> Alamat Sekolah</label>
                        <Input name="alamat" class="form-control input-lg" type="text" value="<?= $setting['alamat'] ?>"></Input>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan"> Kecamatan</label>
                        <Input name="kecamatan" class="form-control" type="text" value="<?= $setting['kecamatan'] ?>"></Input>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten"> Kabupaten</label>
                        <Input name="kabupaten" class="form-control" type="text" value="<?= $setting['kabupaten'] ?>"></Input>
                    </div>
                    <div class="form-group">
                        <label for="Provinsi"> Provinsi</label>
                        <Input name="Provinsi" class="form-control" type="text" value="<?= $setting['Provinsi'] ?>"></Input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="4"> <?= $setting['deskripsi'] ?></textarea>
                    </div>
                    <div class="card-body" style="margin-top: -15px;">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"> Simpan </i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>
<?= $this->endsection(); ?>