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
                                <img src="<?= base_url('img/logo') . '/' . $setting['logo'] ?>" class="img-thumbnail" height="100px" width="100px" alt="">
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
                        <h3>Laporan Kelulusan Siswa Tahun <?= $tahun ?></h3>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pendaftaran</th>
                                <th> NISN </th>
                                <th>Nama</th>
                                <th>Tempat/Tanggal Lahir</th>
                                <th>Jalur Penerimaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($siswa as $key => $value) { ?>


                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['no_pendaftaran']; ?></td>
                                    <td><?= $value['nisn']; ?></td>
                                    <td><?= $value['nama_lengkap']; ?></td>
                                    <td><?= $value['tempat_lahir']; ?>/<?= $value['tgl_lahir']; ?></td>
                                    <td><?= $value['jalur_masuk']; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>