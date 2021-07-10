<?= $this->extend('template/template_frontEnd') ?>

<?= $this->section('content') ?>

<?php if ($siswa['status_ppdb'] == 0) { ?>

    <div class="col-sm-12 ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Biodata Calon peserta didik </b></h3>
                <br>
                <?php if ($siswa['status_pendaftaran'] == 0) { ?>

                    <div class=" alert alert-warning alert-dismissible">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Pembertitahuan!</h5>
                        Lengkapi terlebih dahulu Biodata Anda , Sebelum Di Applay !!!!
                    </div>


                <?php } else { ?>
                    <div class=" alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-circle"></i> Selamat!</h5>
                        Formulir Pendaftaran yang Anda Masukan sudah Tedaftar, Tunggu Info selanjutnya
                    </div>
                <?php } ?>





                <?php

                if (session()->getFlashdata('pesan')) : ?>
                    <?= '<div class="alert jfn alert-success alert-dismissible">' ?>
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
            <div class="row mt-2 ml-1 mr-1">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <b> <i class="fas fa-align-justify mr-1"></i>Pendaftaran</b></h3>
                            <div class="card-tools m-1">
                                <?php if ($siswa['status_pendaftaran'] == 0) { ?>

                                    <button type="button" class="btn btn-tool btn-primary box-solid btn-lg" data-toggle="modal" data-target="#ubahpendaftaran"><i class=" fas fa-pencil-alt mt-2"></i>
                                    </button>



                                <?php } ?>

                            </div>


                        </div>

                        <div class="card-body box-profile">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th><strong><i class="fas fa-table mr-1"></i> NISN</strong></th>
                                        <th><strong><i class="fas fa-table mr-1"></i> No Pendaftaran/Jurusan</strong></th>
                                        <th><strong><i class="fas fa-table mr-1"></i> Tanggal Pendaftaran </strong></th>
                                        <th><strong><i class="fas fa-table mr-1"></i> Jalur Pendaftaran </strong></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-muted">
                                                <?= $siswa['nisn']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-muted">
                                                <?= $siswa['no_pendaftaran']; ?>/ <?= ($siswa['jurusan'] == null) ? ' <p class="text-danger">Wajib Di isi</p> ' : $siswa["jurusan"] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-muted">
                                                <?= $siswa['tgl_pendaftaran']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-muted">
                                                <?= ($siswa['jalur_masuk'] == null) ? ' <p class="text-danger"> Wajib Di Isi  </p>' : $siswa["jalur_masuk"] ?>
                                            </p>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 ml-1 mr-1 ">

                <div class="col-sm-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b><i class="fas fa-image"></i> Foto</b></h3>
                            <div class="card-tools m-1">
                                <?php if ($siswa['status_pendaftaran'] == 0) { ?>

                                    <button type="button" class="btn btn-tool btn-primary box-solid btn-lg" data-toggle="modal" data-target="#foto"><i class=" fas fa-pencil-alt mt-2"></i>
                                    </button>

                                <?php } ?>

                            </div>
                        </div>

                        <div class="card-body box-profile">
                            <!-- <?= $validation->listErrors(); ?> -->
                            <div class="card-body">
                                <?php if ($siswa['foto'] == null) { ?>
                                    <img class=" img-fluid " src="<?= base_url('img/user/blank.PNG')  ?>" width="250px" height="350px" class="img-fluid pad" alt="">
                                <?php } else { ?>
                                    <img class=" img-fluid " src="<?= base_url('img/user/') . '/' . $siswa['foto'] ?>" width="350px" height="250px" alt="">
                                <?php } ?>
                                <br>
                            </div>
                            <div class="form-group text-center">
                                <label>
                                    <?php session()->getFlashdata('errors'); ?>
                                    <h6 class="text-danger"> <?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?> </h6>
                                </label>
                                <label for="nam_lenkap"><?= $siswa['nama_lengkap'] ?></label>
                                <label for="nisn"> <?= $siswa['nisn']; ?></label>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                        <label for="foto" class="ml-3"> Ganti Foto</label>
                        <Input id="preview_gambar" name="foto" type="file" class="form-control p-1 " accept="image/*"></Input>
                    </div> -->
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b> <i class="fas fa-graduation-cap mr-1"></i>Identitas Siswa</b></h3>
                            <div class="card-tools m-1">
                                <?php if ($siswa['status_pendaftaran'] == 0) { ?>


                                    <button type="button" class="btn btn-tool btn-primary box-solid btn-lg" data-toggle="modal" data-target="#ubahidentitas<?= $siswa['id_siswa']; ?>"><i class=" fas fa-pencil-alt mt-2"></i>
                                    </button>

                                <?php } ?>
                            </div>
                            </button>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card-body ">
                                        <strong><i class="fas fa-table mr-1"></i> Nama lengkap</strong>

                                        <?= ($siswa['nama_lengkap'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_lengkap'] . '</p>' ?>

                                        <hr>

                                        <strong><i class="fas fa-table mr-1"></i> Nama Panggilan</strong>
                                        <?= ($siswa['nama_panggilan'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_panggilan'] . '</p>' ?>

                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                                        <?= ($siswa['tempat_lahir'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['tempat_lahir'] . '</p>' ?>

                                        <hr>
                                        <strong><i class="fas fa-table mr-1"></i> Tanggal Lahir</strong>
                                        <?= ($siswa['tgl_lahir'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['tgl_lahir'] . '</p>' ?>
                                        <hr>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- col -->
                                <div class="col-sm-4">
                                    <div class="card-body">



                                        <strong><i class="fas fa-table mr-1"></i> Jenis Kelamin</strong>
                                        <?php if ($siswa['jk'] == 'P')
                                            $jk = 'Perempuan';
                                        elseif ($siswa['jk'] == 'L') {
                                            $jk = 'Laki-Laki';
                                        }
                                        ?>
                                        <?= ($siswa['jk'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $jk . '</p>' ?>
                                        <hr>
                                        <strong><i class="fas fa-table mr-1"></i> NIK</strong>
                                        <?= ($siswa['nik'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nik'] . '</p>' ?>
                                        <hr>

                                        <strong><i class="fas fa-table mr-1"></i> Agama</strong>
                                        <?= ($siswa['agama'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['agama'] . '</p>' ?>
                                        <hr>



                                        <strong><i class="fas fa-table mr-1"></i> No Telphone</strong>

                                        <?= ($siswa['no_telpon'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['no_telpon'] . '</p>' ?>
                                        <hr>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /Col -->
                                <div class="col-sm-4">
                                    <div class="card-body">
                                        <strong><i class="fas fa-table mr-1"></i> Tinggi Badan</strong>
                                        <?= ($siswa['tinggi'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['tinggi'] . '</p>' ?>
                                        <hr>

                                        <strong><i class="fas fa-table mr-1"></i> Berat Badan</strong>
                                        <?= ($siswa['berat'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['berat'] . '</p>' ?>
                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i>Jumlah Saudara</strong>
                                        <?= ($siswa['jml_saudara'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['jml_saudara'] . '</p>' ?>
                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i>Anak Ke</strong>
                                        <?= ($siswa['anak_ke'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['anak_ke'] . '</p>' ?>
                                        <hr>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- col -->
                            </div>
                            <!-- / Row -->
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- iDENTITAS ayah -->
            <div class="card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Identitas Orang Tua</b></h3>
                </div>

                <div class="row mt-2 ml-1 mr-1">
                    <div class="col-sm-12">
                        <div class="card card-primary box-profile">
                            <div class="card-header">
                                <h3 class="card-title"><b><i class="fas fa-male mr-1"></i>Identitas Ayah</b></h3>
                                <div class="card-tools m-1">
                                    <?php if ($siswa['status_pendaftaran'] == 0) { ?>

                                        <button type="button" class="btn btn-tool btn-light box-solid btn-lg" data-toggle="modal" data-target="#identitasAyah"><i class=" fas fa-pencil-alt mt-2 text-secondary"></i>
                                        </button>


                                    <?php } ?>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong><i class="fas fa-table mr-1"></i> NIK Ayah</strong>
                                        <?= ($siswa['nik_ayah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nik_ayah'] . '</p>' ?>


                                        <hr>

                                        <strong><i class="fas fa-table mr-1"></i>Nama Ayah</strong>
                                        <?= ($siswa['nama_ayah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_ayah'] . '</p>' ?>


                                        <hr>


                                    </div>
                                    <div class="col-sm-4">
                                        <strong><i class="fas fa-table mr-1"></i> Pendidikan</strong>
                                        <?= ($siswa['pendidikan_ayah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['pendidikan_ayah'] . '</p>' ?>

                                        <hr>

                                        <strong><i class="fas fa-table mr-1"></i> Pekerjaan</strong>
                                        <?= ($siswa['pekerjaan_ayah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['pekerjaan_ayah'] . '</p>' ?>


                                        <hr>

                                    </div>
                                    <div class="col-sm-4">
                                        <strong><i class="fas fa-table mr-1"></i> Pengahsilan <small>/Bulan</small></strong>
                                        <?= ($siswa['penghasilan_ayah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['penghasilan_ayah'] . '</p>' ?>
                                        <hr>

                                        <strong><i class="fas fa-table mr-1"></i>No Hp .Ayah</strong>
                                        <?= ($siswa['nohp_ayah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nohp_ayah'] . '</p>' ?>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row mt-2 ml-1 mr-1">
                <div class="col-sm-12  ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b> <i class="fas fa-female mr-1"></i>Identitas Ibu</b></h3>
                            <div class="card-tools m-1">
                                <?php if ($siswa['status_pendaftaran'] == 0) { ?>

                                    <button type="button" class="btn btn-tool btn-light box-solid btn-lg" data-toggle="modal" data-target="#identitasIbu"><i class=" fas fa-pencil-alt mt-2 text-secondary"></i>
                                    </button>


                                <?php } ?>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-table mr-1"></i> NIK Ibu</strong>
                                    <?= ($siswa['nik_ibu'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nik_ibu'] . '</p>' ?>


                                    <hr>

                                    <strong><i class="fas fa-table mr-1"></i>Nama Ibu</strong>
                                    <?= ($siswa['nama_ibu'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_ibu'] . '</p>' ?>


                                    <hr>


                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-table mr-1"></i> Pendidikan</strong>
                                    <?= ($siswa['pendidikan_ibu'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['pendidikan_ibu'] . '</p>' ?>

                                    <hr>

                                    <strong><i class="fas fa-table mr-1"></i> Pekerjaan</strong>
                                    <?= ($siswa['pekerjaan_ibu'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['pekerjaan_ibu'] . '</p>' ?>


                                    <hr>

                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-table mr-1"></i> Pengahsilan <small>/Bulan</small></strong>
                                    <?= ($siswa['penghasilan_ibu'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['penghasilan_ibu'] . '</p>' ?>
                                    <hr>

                                    <strong><i class="fas fa-table mr-1"></i>No Hp. Ibu</strong>
                                    <?= ($siswa['nohp_ibu'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nohp_ibu'] . '</p>' ?>
                                    <hr>

                                </div>
                            </div>
                            <!-- div Row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /Row -->
                </div>
            </div>
            <!-- Row Pusat -->
            <!-- Identitas Asal  -->
            <div class="row mt-2 ml-1 mr-1">
                <div class="col-sm-12  ">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b> <i class="fas fas fa-home mr-1"></i>Alamat</b></h3>
                            <div class="card-tools m-1">
                                <?php if ($siswa['status_pendaftaran'] == 0) { ?>

                                    <button type="button" class="btn btn-tool btn-light box-solid btn-lg" data-toggle="modal" data-target="#alamat"><i class=" fas fa-pencil-alt mt-2 text-secondary"></i>
                                    </button>


                                <?php } ?>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-table mr-1"></i> Kecamatan</strong>
                                    <?= ($siswa['nama_kecamatan'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_kecamatan'] . '</p>' ?>
                                    <hr>
                                    <strong><i class="fas fa-table mr-1"></i>Kabupaten</strong>
                                    <?= ($siswa['nama_kabupaten'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_kabupaten'] . '</p>' ?>
                                    <hr>


                                </div>
                                <div class="col-sm-6">

                                    <strong><i class="fas fa-table mr-1"></i> Provinsi</strong>
                                    <?= ($siswa['nama_kecamatan'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_kecamatan'] . '</p>' ?>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
                                    <?= ($siswa['alamat'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['alamat'] . '</p>' ?>
                                    <hr>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /Row -->
                </div>
            </div>
            <!-- Asal  -->
            <div class="row mt-2 ml-1 mr-1">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b> <i class="fas fa-home"></i> Asal Sekolah</b></h3>
                            <div class="card-tools m-1">
                                <?php if ($siswa['status_pendaftaran'] == 0) { ?>


                                    <button type="button" class="btn btn-tool btn-primary box-solid btn-lg" data-toggle="modal" data-target="#ubahAsalSekolah"><i class=" fas fa-pencil-alt mt-2"></i>
                                    </button>

                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- About Me Box -->

                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <strong><i class="fas fa-table mr-1"></i> Nama Sekolah</strong>
                                        <?= ($siswa['nama_sekolah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['nama_sekolah'] . '</p>' ?>
                                        <hr>


                                        <strong><i class="fas fa-table mr-1"></i> Tahun Lulus</strong>
                                        <?= ($siswa['tahun_lulus'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['tahun_lulus'] . '</p>' ?>
                                        <hr>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- col -->


                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <strong><i class="fas fa-table mr-1"></i> NO SKHUN</strong>
                                        <?= ($siswa['no_skhun'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['no_skhun'] . '</p>' ?>
                                        <hr>


                                        <strong><i class="fas fa-table mr-1"></i> NO Ijazah</strong>
                                        <?= ($siswa['no_ijazah'] == null) ? '<p class="text-danger"> Wajib di isi </p>' :  '<p class="text-muted">' . $siswa['no_ijazah'] . '</p>' ?>
                                        <hr>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- col -->
                            </div>
                            <!-- / Row -->
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- ROW MASTER -->

            <div class="row mt-2 ml-1 mr-1">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b> <i class=" fas fa-file-alt mr-1"></i> File Pendukung </b></h3>
                            <div class="card-tools m-1">
                                <?php if ($siswa['status_pendaftaran'] == 0) { ?>


                                    <button type="button" class="btn btn-tool btn-primary box-solid btn-lg" data-toggle="modal" data-target="#tambahFile"><i class=" fas fa-plus mt-2">Add File</i>
                                    </button>

                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body box-profile">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">File</th>
                                        <?php if ($siswa['status_pendaftaran'] == 0) { ?>

                                            <th width="50px">Action</th>


                                        <?php } ?>
                                    </tr>

                                    <?php $no = 1;
                                    foreach ($berkas as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['lampiran']; ?></td>
                                            <td><?= $value['keterangan']; ?></td>
                                            <td><a class="d-flex justify-content-center" href="<?= base_url('berkas') . '/' . $value['berkas']; ?>"><i class="fa fa-file-pdf fa-2x text-danger"></i></a></td>
                                            <?php if ($siswa['status_pendaftaran'] == 0) { ?>


                                                <td>
                                                    <a href="<?= base_url('/Siswa/hapusBerkas') . '/' . $value['id_berkas'] ?> " class=" btn btn-xs btn-flat btn-danger"><i class="fas fa-trash-alt fa-2x"></i></a>
                                                </td>

                                            <?php } ?>
                                        </tr>
                                    <?php  } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($siswa['status_pendaftaran'] == 0) { ?>
                    <div class="col-sm-12">

                        <div class=" text-center pb-5">
                            <button href="" class="btn btn-success btn-flat" data-toggle="modal" data-target="#apply"> <i class="fas fa-check"></i> Apply Pendaftaran </button>
                        </div>

                    </div>
                <?php    } ?>

            </div>
            <!-- ROW MASTER -->
            <div class="row ">
            </div>
        </div>
    </div>


<?php } elseif ($siswa['status_ppdb'] == 1) { ?>
    <div class=" alert alert-success alert-dismissible">

        <h1><i class="icon fas fa-check-circle text-light"></i> Selamat Anda Lulus !</h1>
        <h3>Cetak Bukti kelulusan <a target="_blank" href="<?= base_url('Siswa/bukti_lulus'); ?>">Disini!</a></h3>
    </div>



<?php } else { ?>
    <div class=" alert alert-danger alert-dismissible">
        <h1><i class="icon fas fa-times-circl text-light"></i> Maaf. Anda Belum Keterima </h1>
        <h3>Tetap Semangat Mungkin Jalan Sukses selalu terbuka di sekolah manapun</h3>
    </div>

<?php } ?>
<!-- Moadal APPPLY -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="apply">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Apakah Anda Sudah Yakin Men Apply Pendaftaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> Data yang Sudah Dikirim tidak di ubah lagi, Pastikan data yang anda kirim sudah benar </p>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <a href="<?= base_url('/Siswa/apply/' . $siswa['id_siswa']) ?>" class="btn btn-primary">Kirim</a>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
<?php endforeach; ?>
<!-- /.modal -->

<!-- Moadal Jalur Masuk -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="ubahpendaftaran">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Jalur Masuk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('siswa/ubah/' .  session()->get('id_siswa')) ?>
                        <div class="form-group">
                            <label for="nisn">NISN </label>
                            <input type="text" class="form-control" value="<?= $siswa['nisn'] ?>" name="nisn" placeholder="Masukan Jalur masuk" required autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_pendaftaran"> No Pendaftaran </label>
                            <input type="text" class="form-control" value="<?= $siswa['no_pendaftaran'] ?>" name="no_pendaftaran" placeholder="Masukan Jalur masuk" required autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pendaftaran">Tanggal Pendaftaran </label>
                            <input type="text" class="form-control" value="<?= $siswa['tgl_pendaftaran']; ?>" name="tgl_pendaftaran" placeholder="Masukan Jalur masuk" required autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_jalur_masuk">Jalur Masuk </label>
                            <select name="id_jalur_masuk" class="form-control" id="">
                                <option value=""> Pilih jalur Masuk</option>
                                <?php foreach ($jalur as $key => $value) { ?>
                                    <option value="<?= $value['id_jalur_masuk']; ?>" <?= ($siswa['id_jalur_masuk'] == $value['id_jalur_masuk']) ? 'selected' : '' ?>>
                                        <?= $value['jalur_masuk']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_jurusan">Jurusan </label>
                            <select name="id_jurusan" class="form-control" id="">
                                <option value=""> Pilih Jurusan/option>
                                    <?php foreach ($jurusan as $key => $value) { ?>
                                <option value="<?= $value['id_jurusan']; ?>" <?= ($siswa['id_jurusan'] == $value['id_jurusan']) ? 'selected' : '' ?>>
                                    <?= $value['jurusan']; ?> </option>
                            <?php } ?>
                            </select>
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


<!-- Moadal Foto -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="foto">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Foto </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= form_open_multipart('siswa/ubahFoto/' .  session()->get('id_siswa')) ?>
                        <div class="form-group">
                            <label for="foto"> Ganti Foto </label>
                            <input type="file" id="preview_gambar" class="form-control p-1" name="foto" placeholder="Masukan Jalur masuk" required autofocus accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="foto"> Preview Foto</label>
                            <br>
                            <?php if ($siswa['foto'] == null) { ?>
                                <img class=" img-fluid " id="gambar_load" src="<?= base_url('img/user/blank.PNG')  ?>" style="height: 300px;
                                width: 300px;">
                            <?php } else { ?>
                                <img class=" img-fluid " src="<?= base_url('img/user') . '/' . $siswa['foto'] ?>" id="gambar_load">

                            <?php } ?>
                            <h6 class="text-danger"><small>gambar Max 2048kb</small> </h6>
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


<!-- Moadal Identitas Diri -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="ubahidentitas<?= $siswa['id_siswa']; ?>">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Identitas </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('siswa/ubahidentitas/' .  session()->get('id_siswa')) ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap </label>
                                    <input type="text" class="form-control" value="<?= $siswa['nama_lengkap'] ?>" name="nama_lengkap" placeholder="Masukan Jalur masuk" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Date:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $siswa['tgl_lahir'] ?>" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_panggilan"> Nama Panggilan </label>
                                    <input type="text" class="form-control" value="<?= $siswa['nama_panggilan'] ?>" name="nama_panggilan" placeholder="Masukan Jalur masuk" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir </label>
                                    <input type="text" class="form-control" value="<?= $siswa['tempat_lahir']; ?>" name="tempat_lahir" placeholder="Masukan Jalur masuk" required autofocus>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin </label>
                                    <select name="jk" class="form-control" id="">
                                        <option value=""> Jenis Kelamin </option>
                                        <option value="L" <?= $siswa['jk'] == 'L' ? 'selected' : ''; ?>> Laki Laki</option>
                                        <option value="P" <?= $siswa['jk'] == 'P' ? 'selected' : ''; ?>> Perempuan </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nik"> NIK </label>
                                    <input type="text" class="form-control" name="nik" value="<?= ($siswa['nik'] != null) ? $siswa['nik'] : '' ?>" placeholder="Masukan NIK" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="id_agama">Agama </label>
                                    <select name="id_agama" class="form-control" id="">
                                        <option value=""> Pilih Agama</option>
                                        <?php foreach ($agama as $key => $value) { ?>
                                            <option value="<?= $value['id_agama']; ?>" <?= ($siswa['id_agama'] == $value['id_agama']) ? 'selected' : '' ?>>
                                                <?= $value['agama']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_telpon">Nomer HP</label>
                                    <input type="text" class="form-control" name="no_telpon" placeholder="Masukan Nomor HP" value="<?= ($siswa['no_telpon'] != null) ? $siswa['no_telpon'] : '' ?>" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tinggi">Tinggi Badan </label>
                                    <input type="text" class="form-control" name="tinggi" placeholder="Masukan Tinggi Badan" value="<?= ($siswa['tinggi'] != null) ? $siswa['tinggi'] : '' ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="berat"> Berat Badan </label>
                                    <input type="text" class="form-control" name="berat" placeholder="Masukan Berat Badan" value="<?= ($siswa['berat'] != null) ? $siswa['berat'] : '' ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="jml_saudara">Jumlah Saudara </label>
                                    <input type="text" class="form-control" name="jml_saudara" placeholder="Jumlah Saudara" value="<?= ($siswa['jml_saudara'] != null) ? $siswa['jml_saudara'] : '' ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke">Anak ke </label>
                                    <input type="text" class="form-control" name="anak_ke" placeholder="Anak ke" value="<?= ($siswa['anak_ke'] != null) ? $siswa['anak_ke'] : '' ?>" required autofocus>
                                </div>
                            </div>
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





<!-- Moadal identitasAyah -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="identitasAyah">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Identitas Ayah </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= form_open_multipart('siswa/identitasAyah/' .  session()->get('id_siswa')) ?>
                        <div class="row">
                            <div class="col-sm-6">


                                <div class="form-group">
                                    <label for="nik_ayah">NIK Ayah</label>
                                    <input type="text" class="form-control" name="nik_ayah" placeholder="NIK Ayah" value="<?= ($siswa['nik_ayah'] != null) ? $siswa['nik_ayah'] : '' ?>" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah" value="<?= ($siswa['nama_ayah'] != null) ? $siswa['nama_ayah'] : '' ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="nohp_ayah">Nomer HP</label>
                                    <input type="text" class="form-control" name="nohp_ayah" placeholder="Nomor HP" value="<?= ($siswa['nohp_ayah'] != null) ? $siswa['nohp_ayah'] : '' ?>" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pendidikan_ayah">Pendidkan Ayah </label>
                                    <select name="pendidikan_ayah" class="form-control" id="">
                                        <option value=""> Pilih Pendidikan</option>
                                        <?php foreach ($pendidikan as $key => $value) { ?>
                                            <option value="<?= $value['pendidikan']; ?>" <?= ($siswa['pendidikan_ayah'] == $value['pendidikan']) ? 'selected' : '' ?>>
                                                <?= $value['pendidikan']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah </label>
                                    <select name="pekerjaan_ayah" class="form-control" id="">
                                        <option value=""> Pilih Pekrjaan</option>
                                        <?php foreach ($pekerjaan as $key => $value) { ?>
                                            <option value="<?= $value['pekerjaan']; ?>" <?= ($siswa['pekerjaan_ayah'] == $value['pekerjaan']) ? 'selected' : '' ?>>
                                                <?= $value['pekerjaan']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_ayah">Penghasilan Ayah </label>
                                    <select name="penghasilan_ayah" class="form-control" id="">
                                        <option value=""> Pilih Penghasilan</option>
                                        <?php foreach ($penghasilan as $key => $value) { ?>
                                            <option value="<?= $value['penghasilan']; ?>" <?= ($siswa['penghasilan_ayah'] == $value['penghasilan']) ? 'selected' : '' ?>>
                                                <?= $value['penghasilan']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

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
    </div>
<?php endforeach; ?>
<!-- /.modal -->

<!-- Moadal identitasIbu -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="identitasIbu">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Identitas Ayah </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= form_open_multipart('siswa/identitasIbu/' .  session()->get('id_siswa')) ?>
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="nik_ibu">NIK Ibu</label>
                                    <input type="text" class="form-control" name="nik_ibu" placeholder="NIK Ibu" value="<?= ($siswa['nik_ibu'] != null) ? $siswa['nik_ibu'] : '' ?>" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu" value="<?= ($siswa['nama_ibu'] != null) ? $siswa['nama_ibu'] : '' ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="nohp_ibu">Nomer HP</label>
                                    <input type="text" class="form-control" name="nohp_ibu" placeholder="Nomor HP" value="<?= ($siswa['nohp_ibu'] != null) ? $siswa['nohp_ibu'] : '' ?>" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pendidikan_ibu">Pendidkan Ibu </label>
                                    <select name="pendidikan_ibu" class="form-control" id="">
                                        <option value=""> Pilih Pendidikan</option>
                                        <?php foreach ($pendidikan as $key => $value) { ?>
                                            <option value="<?= $value['pendidikan']; ?>" <?= ($siswa['pendidikan_ibu'] == $value['pendidikan']) ? 'selected' : '' ?>>
                                                <?= $value['pendidikan']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu </label>
                                    <select name="pekerjaan_ibu" class="form-control" id="">
                                        <option value=""> Pilih Pekrjaan</option>
                                        <?php foreach ($pekerjaan as $key => $value) { ?>
                                            <option value="<?= $value['pekerjaan']; ?>" <?= ($siswa['pekerjaan_ibu'] == $value['pekerjaan']) ? 'selected' : '' ?>>
                                                <?= $value['pekerjaan']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_ibu">Penghasilan Ibu </label>
                                    <select name="penghasilan_ibu" class="form-control" id="">
                                        <option value=""> Pilih Penghasilan</option>
                                        <?php foreach ($penghasilan as $key => $value) { ?>
                                            <option value="<?= $value['penghasilan']; ?>" <?= ($siswa['penghasilan_ibu'] == $value['penghasilan']) ? 'selected' : '' ?>>
                                                <?= $value['penghasilan']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

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
    </div>
<?php endforeach; ?>
<!-- /.modal -->



<!-- Moadal Alamat -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="alamat">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Alamat </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('siswa/alamat/' .  session()->get('id_siswa')) ?>
                        <div class="form-group">
                            <label for="id_provinsi">Provinsi </label>
                            <select name="id_provinsi" id="provinsi" class="form-control" id="">
                                <option value=""> Pilih Provinsi</option>
                                <?php foreach ($provinsi as $key => $value) { ?>
                                    <option value="<?= $value['id_provinsi']; ?>" <?= ($siswa['id_provinsi'] == $value['nama_provinsi']) ? 'selected' : '' ?>>
                                        <?= $value['nama_provinsi']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_kabupaten">Kabupaten </label>
                            <select name="id_kabupaten" id="kabupaten" class="form-control">
                                <option value=""> Pilih Kabupaten</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_kecamatan">Kecamatan </label>
                            <select name="id_kecamatan" id="kecamatan" class="form-control">
                                <option value=""> Pilih Kecamatan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" value="<?= ($siswa['alamat'] != null) ? $siswa['alamat'] : '' ?>" required autofocus>
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
    </div>
    </div>
<?php endforeach; ?>
<!-- /.modal -->

<!-- Moadal ASAL Sekolah -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="ubahAsalSekolah">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Asal Sekolah </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= form_open_multipart('siswa/asalSekolah/' .  session()->get('id_siswa')) ?>
                        <div class="form-group">
                            <label for="nama_sekolah">Nama Sekolah</label>
                            <input type="text" class="form-control" name="nama_sekolah" placeholder="Masukan Alamat" value="<?= ($siswa['nama_sekolah'] != null) ? $siswa['nama_sekolah'] : '' ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="tahun_lulus">Alamat</label>
                            <select name="tahun_lulus" class="form-control">
                                <option value=""> Tahun </option>
                                <?php $now = date('Y'); ?>
                                <?php for ($i = 2010; $i <= $now; $i++) : ?>
                                    <option value="<?= $i; ?> " <?= ($siswa['tahun_lulus'] == $i) ? 'selected' : '' ?>> <?= $i; ?> </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_skhun">NO SKHUN</label>
                            <input type="text" class="form-control" name="no_skhun" placeholder="Masukan NO SKHUN" value="<?= ($siswa['no_skhun'] != null) ? $siswa['no_skhun'] : '' ?>" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="no_ijazah">NO IJAZAH</label>
                            <input type="text" class="form-control" name="no_ijazah" placeholder="Masukan NO IJAZAH" value="<?= ($siswa['no_ijazah'] != null) ? $siswa['no_ijazah'] : '' ?>" required autofocus>
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
    </div>
    </div>
<?php endforeach; ?>
<!-- /.modal -->



<!-- Moadal Alamat -->
<?php foreach ($siswa as $key => $value) : ?>
    <div class="container">
        <div class="modal fade" id="tambahFile">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Tambah File </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('siswa/tambahFile/' .  session()->get('id_siswa')) ?>
                        <div class="form-group">
                            <label for="id_lampiran">Format File wajib PDF </label>
                            <select name="id_lampiran" class="form-control">
                                <option value=""> Pilih Berkas</option>
                                <?php foreach ($lampiran as $key => $value) { ?>
                                    <option value="<?= $value['id_lampiran']; ?>">
                                        <?= $value['lampiran']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="berkas">Berkas</label>
                            <input type="file" class="form-control" name="berkas" placeholder="Masukan Alamat" required autofocus accept=".pdf">
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
    </div>
    </div>
<?php endforeach; ?>
<!-- /.modal -->


<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var id_provinsi = $("#provinsi").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('wilayah/dataKabupaten'); ?>/' + id_provinsi,
                success: function(html) {
                    $("#kabupaten").html(html);
                }
            })
        })
    });

    $(document).ready(function() {
        $("#kabupaten").change(function() {
            var id_kabupaten = $("#kabupaten").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('wilayah/dataKecamatan'); ?>/' + id_kabupaten,
                success: function(html) {
                    $("#kecamatan").html(html);
                }
            })
        })
    })
</script>
<?= $this->endsection() ?>