<?= $this->extend('template/template_backEnd') ?>
<?= $this->section('content'); ?>


<div class="col-sm-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Beranda</b></h3>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <?= '<div class="alert alert-warning alert-dismissible">' ?>
                <?= session()->getFlashdata('pesan'); ?>
                <?= '</div>'  ?>
            <?php endif; ?>

            <?php $errors = session()->getFlashdata('errors'); ?>
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-warning" role="alert">
                    <ul>
                        <?php foreach ($errors as $key) : ?>
                            <li><?= esc($key) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif;  ?>

            <!-- /.card-tools -->
        </div>
        <div class="card-body">
            <?= form_open('admin/saveBeranda') ?>
            <div class="form-group">
                <textarea name='beranda' cols="30" rows="10" id="summernote">
                    <?= $beranda['beranda']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat ml-2"> <i class="fas fa-save"></i> Simpan </button>
            </div>

        </div>
    </div><?= form_close() ?>
</div>
<!-- END ACCORDION & CAROUSEL-->



<?= $this->endsection(); ?>