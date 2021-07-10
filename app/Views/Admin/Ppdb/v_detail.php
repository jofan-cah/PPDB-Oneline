<?= $this->extend('template/template_backEnd') ?>

<?= $this->section('content') ?>


<div class="col-sm-12 ">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Biodata Calon peserta didik </b></h3>

            <div class="card-tools m-1">
                <a type="button" href="<?= base_url('/Ppdb/Masuk'); ?>" class="btn btn-tool btn-primary box-solid btn-lg"><i class="fa fa-forward mt-2"> </i> Kembali
                </a>
            </div>
        </div>
        <div class="row mt-2 ml-1 mr-1">
            <div class="col-sm-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> <b> <i class="fas fa-align-justify mr-1"></i>Pendaftaran</b></h3>



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