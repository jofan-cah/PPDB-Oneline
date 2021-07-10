<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header p-5">
                        <div class="row">
                            <div class="col-sm2">
                                <img src="<?= base_url('img/logo') . '/' . $setting['logo'] ?>" class="" height="100px" width="100px" alt="">
                            </div>
                            <div class="col-sm-10">
                                <?= $setting['nama_sekolah']; ?>
                                <h6><?= $setting['alamat']; ?></h6>
                                <small>
                                    <h6><?= $setting['email']; ?><?= $setting['no_telpon']; ?></h6>

                                </small>
                            </div>
                        </div>
                        <small class="float-right">Date: <?= date('d-M-Y'); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->

            <div class="row">
                <div class="col-12 table-responsive">
                    <div class="text-center">
                        <h3>Surat Bukti Lulus</h3>
                        <hr>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pendaftaran</th>
                                <th> NISN </th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th>1</th>
                                <th><?= $siswa['no_pendaftaran'] ?></th>
                                <th><?= $siswa['nisn'] ?></th>
                                <th><img class="img-thumbnail" width="96px" height="120px" src="<?= base_url('img/user') . '/' . $siswa['foto'] ?>" alt=""></th>
                                <th><?= $siswa['nama_lengkap'] ?></th>
                                <th><?= $siswa['nama_sekolah']; ?></th>
                                <th><?= $siswa['jurusan']; ?></th>
                            </tr>


                        </tbody>
                    </table>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>

        <p>Silahkan Bawa Surat bukti kelulusan ke sekolah dari tanggal 01 Agustus 2021 - 30 Agustus 2021</p>
        <br>
        <small>*Patuhui protokol Kesehatan</small>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>