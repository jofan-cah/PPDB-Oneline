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
            <div class="card-tools m-1">
                <button type="button" class="btn btn-tool btn-primary box-solid" data-toggle="modal" data-target="#tambah"><i class=" fas fa-plus mt-2"></i>
                    Tambah
                </button>
            </div>
        </div>

        <!-- Card -->
        <div class="card-body card-primary p-0 justify-content-center text-center">
            <table class="table  table-sm ">
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
                        <th class="text-center"><?= esc($subtitle) ?></th>
                        <th class="text-center"> Email </th>

                        <th class="text-center"> level </th>
                        <th class="text-center"> Foto </th>
                        <th class="text-center" style="width:320px;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($user as $key => $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_user']; ?></td>
                            <td><?= $value['email']; ?></td>

                            <td><?= $value['level']; ?></td>
                            <td><img src="<?= base_url('img/user' . '/' . $value['foto']) ?>" class="img-circle" width="60px"> </td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubah<?= $value['id_user']; ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_user']; ?>"><i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
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
                    <?= form_open_multipart('user/tambah') ?>
                    <div class="form-group">
                        <label for="nama_user">Nama <?= esc($subtitle) ?></label>
                        <input type="text" class="form-control" name="nama_user" placeholder="Masukan Nama User" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan E-mail" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto </label>
                        <input type="file" class="form-control p-1" name="foto" accept="image/*" autofocus>
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
<?php foreach ($user as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="ubah<?= $value['id_user']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Pekerjaan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('user/ubah/' .  $value['id_user']) ?>
                        <div class="form-group">
                            <label for="nama_user">Nama user </label>
                            <input type="text" name="nama_user" class="form-control" value="<?= $value['nama_user']; ?>" placeholder="Masukan Nama user" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail </label>
                            <input type="email" class="form-control" value="<?= $value['email']; ?>" name="email" placeholder="Masukan Pekerjaan" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password </label>
                            <input type="password" class="form-control" value="<?= $value['password']; ?>" name="password" placeholder="Masukan Pekerjaan" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="foto">Ganti foto </label>
                            <input type="file" class="form-control" value="<?= base_url('img/user' . '/' . $value['foto']) ?>" name="foto" accept="image/*" autofocus>
                            <img src="<?= base_url('img/user' . '/' . $value['foto']) ?>" width="100px" alt="">
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
<!-- /.modal -->

<!-- Moadal Hapus -->
<?php foreach ($user as $key => $value) : ?>
    <div class="container">
        <div class="modal fade " id="hapus<?= $value['id_user']; ?>">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus <?= esc($subtitle) ?></h4>
                        <button type="button" class="close btn-danger " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4> Apakah Anda yakin Menghapus <?= $value['nama_user']; ?> </h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('user/hapus/' .  $value['id_user']) ?>" type="submit" class="btn btn-primary">Iya</a>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endsection(); ?>