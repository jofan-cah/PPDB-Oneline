<?= $this->extend('template/template_backEnd') ?>
<?= $this->section('content') ?>


<div class="col-sm-12">
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
            <div class="card-tools m-1">
                <button type="button" class="btn btn-tool btn-primary box-solid" data-toggle="modal" data-target="#tambah"><i class=" fas fa-plus mt-2"></i>
                    Tambah
                </button>
            </div>
        </div>

        <!-- Card -->
        <div class="card-body p-0 justify-content-center text-center">
            <table class="table table-sm ">
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
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px">No</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center"><?= esc($subtitle) ?></th>
                        <th class="text-center" style="width:320px;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($banner as $key => $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['ket']; ?></td>
                            <td class="text-center"><img src="<?= base_url('img/banner') . '/' . $value['banner']; ?>" alt="" width="420px"> </td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubah<?= $value['id_banner']; ?>"> <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_banner']; ?>"> <i class="fas fa-trash">
                                    </i>
                                    Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal tambah -->
<div class=" container">
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah <?= esc($subtitle) ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('banner/tambah') ?>
                    <div class="form-group">
                        <label for="ket">Keterangan <?= esc($subtitle) ?></label>
                        <input type="text" class="form-control" name="ket" placeholder="Masukan keterangan" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="banner"> <?= esc($subtitle) ?></label>
                        <input type="file" id="preview_gambar" class="form-control" name="banner" placeholder="Masukan Banner" accept="image/*">
                    </div>
                    <div class="card-body">
                        <img id="gambar_load" width="250px" height="250px" class="img-fluid pad" alt="">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal  tambah-->
</div>


<!-- Moadal Ubah -->
<?php foreach ($banner as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="ubah<?= $value['id_banner']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Banner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('banner/ubah/' .  $value['id_banner']) ?>
                        <div class="form-group">
                            <label for="ket">Keterangan </label>
                            <input type="text" class="form-control" value="<?= $value['ket']; ?>" name="ket" placeholder="Masukan Pekerjaan" required autofocus>
                        </div>
                        <div class="card-body">
                            <img id="gambar_load" src="<?= base_url('img/banner') . '/' . $value['banner'] ?>" width="250px" height="250px" class="img-fluid pad" alt="">
                        </div>
                        <div class="form-group">
                            <label for="banner"> <?= esc($subtitle) ?></label>
                            <input type="file" id="preview_gambar" class="form-control p-1" name="banner" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
<?php endforeach; ?>

<!-- Moadal Hapus -->
<?php foreach ($banner as $key => $value) : ?>
    <div class="container">
        <div class="modal fade " id="hapus<?= $value['id_banner']; ?>">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus <?= esc($subtitle) ?></h4>
                        <button type="button" class="close btn-danger " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4> Apakah Anda yakin Menghapus <?= $value['ket']; ?> </h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('banner/hapus/' .  $value['id_banner']) ?>" type="submit" class="btn btn-primary">Iya</a>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
<?php endforeach; ?>


<?= $this->Endsection() ?>