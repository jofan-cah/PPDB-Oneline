<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | <?= esc($subtitle) ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">


    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <h4 class="mt-1"><?= esc($title) ?></h4>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('admin'); ?>" class="brand-link">
                <img src="<?= base_url() ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PPDB Online</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>/img/PP/jfn.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('nama_user') ?> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="<?= base_url('admin') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="" class="nav-link ">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Master data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="<?= base_url('jurusan') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-people-arrows"></i>
                                        <p>Jurusan</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('lampiran') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-file"></i>
                                        <p>Lampiran</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('pekerjaan') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p> Pekerjaan</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('pendidikan') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-school"></i>
                                        <p>Pendidikan</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('agama') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-pray"></i>
                                        <p>Agama</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('penghasilan') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-wallet"></i>
                                        <p>Penghasilan</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('user') ?>" class="nav-link">
                                        <i class="nav-icon far fa-user"></i>
                                        <p>User</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="" class="nav-link ">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Pendaftaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="<?= base_url('Ppdb/Masuk') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-download text-info"></i>
                                        <p>Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('/ppdb/listDiterima') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-check-circle text-success"></i>
                                        <p>Diterima</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('/ppdb/listDitolak') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-times-circle text-danger"></i>
                                        <p> Di Tolak</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url('/Ppdb/laporan') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-clipboard-check text-success"></i>
                                        <p>Laporan</p>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    SetUp
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin/setting') ?>" class="nav-link ">
                                        <i class="fas fa-globe nav-icon"></i>
                                        <p>Web</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('ta') ?>" class="nav-link">
                                        <i class="nav-icon fas fa-calendar"></i>
                                        <p>Tahun Ajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('jalurmasuk') ?>" class="nav-link">
                                        <i class="fas fa-sitemap nav-icon"></i>
                                        <p>Jalur Nasuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('banner') ?>" class="nav-link">
                                        <i class=" nav-icon far fa-images"></i>
                                        <p>Banner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/Admin/beranda') ?>" class="nav-link">
                                        <i class=" nav-icon fas fa-home"></i>
                                        <p>Beranda</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> <?= esc($subtitle) ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?= $this->renderSection('content') ?>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        window.setTimeout(function() {
            $('.alert').fadeTo(500.0).slideUp(500,
                function() {
                    $(this).remove();
                })
        }, 3000)
    </script>


    <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#preview_gambar').change(function() {
            bacaGambar(this);
        })
    </script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote();

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })


        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>




</body>

</html>