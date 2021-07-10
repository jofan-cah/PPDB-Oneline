<?= $this->extend('template/template_backEnd') ?>

<?= $this->section('content') ?>

<div class="col-sm">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Daftar <?= esc($subtitle) ?></h3>

            <!-- <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div> -->


        </div>

        <!-- Card -->
        <div class="card-body card-primary p-0 justify-content-center text-center">
            <table class="table table-striped projects " id="example1">
                <?php $pesan =  session()->getFlashdata('pesan');
                if ($pesan) : ?>
                    <?= '<div class="alert alert-success alert-dismissible">' ?>
                    <?= session()->getFlashdata('pesan'); ?>
                    <?= '</div>'  ?>
                <?php endif; ?>
                <?php $pesan =  session()->getFlashdata('diterima');
                if ($pesan) : ?>
                    <?= '<div class="alert alert-success alert-dismissible">' ?>
                    <?= session()->getFlashdata('diterima'); ?>
                    <?= '</div>'  ?>
                <?php endif; ?>
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
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px">No</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">No Pendaftaran</th>
                        <th class="text-center">No NISN</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jalur</th>
                        <th class="text-center" style="width:320px;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($ppdb as $key => $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td> <img alt="Avatar" class=" img-thumbnail img-size-64 " src="<?= base_url('img/user' . '/' . $value['foto']) ?>"></td>
                            <td><?= $value['tahun']; ?></td>
                            <td><?= $value['no_pendaftaran']; ?></td>
                            <td><?= $value['nisn']; ?></td>
                            <td><?= $value['nama_lengkap']; ?></td>
                            <td><label class="badge badge-warning"><?= $value['jalur_masuk']; ?></label></td>

                            <td>
                                <a href="<?= base_url('/Ppdb/detail') . '/' . $value['id_siswa'] ?>" class="btn btn-flat btn-primary">Lihat</a>


                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endsection() ?>